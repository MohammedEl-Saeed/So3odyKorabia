<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Traits\ResponseTraits;
use App\Models\CartDetail;
use App\Services\UserService;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Helpers\SMSHelper;

class AuthController extends Controller
{
    use ResponseTraits;
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    protected $service;
    public function __construct(UserService $service)
    {
        $this->service = $service;
        $this->middleware('auth:api', ['except' => ['login', 'register','sendCode','checkCode','resetNewPassword']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'phone' => 'required|exists:users',
            'password' => 'required|string|min:6',
        ],[
            'phone.exists' => 'Incorrect Phone no. or Password',
        ]);

        if ($validator->fails()) {
            return $this->prepareResponse(true,$validator->errors(),'Error validation',null,1,200) ;
        }
        $user = User::where('phone',$request->phone)->where('code_verified',1)->first();
        if($user) {
            if (!$token = JWTAuth::attempt(['phone' => $request->phone, 'password' => $request->password])) {
                return $this->prepareResponse(true, json_decode('{"error":["Incorrect Phone no. or Password"]}'), 'Invalid Credential', null, 1, 200);
            }
            return $this->createNewToken($token);
        } else{
            return $this->prepareResponse(true, json_decode('{"error":["you are not verified"]}'), 'you are not verified', null, 2, 200);
        }
    }

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'string|email|max:100|unique:users',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|unique:users',
            'password' => 'required|string|confirmed|min:6',
            'image' => 'nullable|mimes:jpeg,jpg,bmp,png|max:20240'
        ]);
        if($validator->fails()){
            return $this->prepare_response(true,$validator->errors(),'Error validation',$request->all(),1,200) ;
        }
        $helper = new FileHelper();
        $code = $helper->generateRandomString(5);
        $request->code = $code;
        $user = $this->service->store($request);
        $message = new SMSHelper();
        $message->sendMessage('Please verify your account with this code: '.$user->code, $user->phone);
//        return response()->json([
//            'message' => 'User successfully registered',
//            'user' => $user
//        ], 201);
        return   $this->prepare_response(false,null,'User successfully registered',$user,0,201) ;
    }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout() {
        auth()->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile() {
        return response()->json(auth()->user());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
        $data = [];
        $user = auth()->user();
        $data['user'] = $user;
        $userAddress = $user->addresses->where('default_address',1)->first();
        if(!is_null($userAddress)){
            $userAddress = $userAddress->getData();
        }
        $data['address'] = $userAddress;
        unset($user['addresses']);
        $data['token'] = $token;
        $data['token_type'] = 'bearer';
        $hasCart = $this->checkCart();
        return $this->prepareResponse(false,null,'User successfully logged in',$data,0,200,$hasCart) ;
//        return response()->json([
//            'access_token' => $token,
//            'token_type' => 'bearer',
////            'expires_in' => auth()->factory()->getTTL() * 60,
//            'expires_in' => auth('api')->factory()->getTTL() * 60,
//            'user' => auth()->user()
//        ]);
    }

    /**
     * edit a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function editProfile(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'string|email|max:100|unique:users,email,'.Auth::id(),
            'phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|unique:users,phone,'.Auth::id(),
            'password' => 'required|string|confirmed|min:6',
            'image' => 'nullable|mimes:jpeg,jpg,bmp,png|max:20240'
        ]);
        if($validator->fails()){
//            return response()->json($validator->errors()->toJson(), 400);
            return $this->prepare_response(true,$validator->errors(),'Error validation',$request->all(),1,200) ;
        }
        $user = $this->service->update($request, Auth::id());
//        return response()->json([
//            'message' => 'User successfully registered',
//            'user' => $user
//        ], 201);
        return $this->prepare_response(false,null,'User successfully edited',$user,0,200) ;
    }

    public function sendCode(Request $request){
        $validator = Validator::make($request->all(), [
            'phone' => 'required|exists:users,phone',
        ]);
        if($validator->fails()){
//            return response()->json($validator->errors()->toJson(), 400);
            return $this->prepare_response(true,$validator->errors(),'Error validation',$request->all(),1,200) ;
        }
        $this->service->sendCode($request->phone);
        return $this->prepare_response(false,null,'We send code to your mobile, please check it!',null,0,200) ;
    }

    public function resetNewPassword(Request $request){
        $validator = Validator::make($request->all(), [
            'phone' => 'required|exists:users,phone',
            'password' => 'required|min:6',
            'password_confirmation'=> 'required|same:password'
        ]);
        if($validator->fails()){
//            return response()->json($validator->errors()->toJson(), 400);
            return $this->prepare_response(true,$validator->errors(),'Error validation',null,1,400) ;
        }
        $data = $this->service->resetPassword($request);
        if($data == 'error'){
//            return response()->json(['error'=>true,'status'=>1,'message'=>'try again connection failed'],200);
            return $this->prepare_response(true,null,'try again connection failed',null,1,200) ;
        }else{
//            return response()->json(['error'=>false,'status'=>0,'message'=>'password has been changed'],200);
            return $this->prepare_response(false,null,'password has been changed',null,0,200) ;
        }
    }

    public function checkCode(Request $request){
        $validator = Validator::make($request->all(), [
            'phone' => 'required|exists:users,phone',
            'code' => 'required|exists:users,code',
        ]);
        if($validator->fails()){
            return $this->prepare_response(true,$validator->errors(),'Error validation',null,1,200) ;
        }
        $data = $this->service->checkCode($request);
        if($data){
            return $this->prepare_response(false,null,'Code Checked',null,0,200) ;
        }else{
            return $this->prepare_response(true,null,'try again code is wrong',null,1,200) ;
//            return response()->json(['error'=>true,'status'=>1,'message'=>'try again code is wrong'],200);
        }
    }

    public function prepareResponse($error = false, $errors = null, $message = '', $data = null, $status = 0, $server_status,$hasCart = false)
    {
        $array = array(
            'status'  =>$status,
            'error'   => $error,
            'errors'  => $errors,
            'haseCart'    => $hasCart,
            'message' => $message,
            'data'    => $data
        );
        return response()->json($array ,$server_status);
    }

    public function changePhone(Request $request){
        $validator = Validator::make($request->all(), [
            'new_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|unique:users,phone',
        ]);
        if($validator->fails()){
//            return response()->json($validator->errors()->toJson(), 400);
            return $this->prepare_response(true,$validator->errors(),'Error validation',$request->all(),1,200) ;
        }
        $user = \auth()->user();
        $user->new_phone = $request->new_phone;
        $user->save();
        $this->service->sendCode($request->new_phone,'new_phone');
        return $this->prepare_response(false,null,'We send code to your mobile, please check it!',null,0,200) ;

    }

    public function verifyPhone(Request $request){
        $validator = Validator::make($request->all(), [
            'new_phone' => 'required|exists:users,new_phone',
            'code' => 'required|exists:users,code',
        ]);
        if($validator->fails()){
            return $this->prepare_response(true,$validator->errors(),'Error validation',null,1,200) ;
        }
        $data = $this->service->checkPhone($request);
        if($data){
            return $this->prepare_response(false,$validator->errors(),'Code Checked your phone is changed',null,0,200) ;
        }else{
            return $this->prepare_response(true,$validator->errors(),'try again code is wrong',null,1,200) ;
        }
    }
}
