<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Helpers\SMSHelper;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    protected $service;
    public function __construct(UserService $service)
    {
        $this->service = $service;
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

//        if (! $token = auth()->attempt($validator->validated())) {
        if (! $token = JWTAuth::attempt(['email' => $request->email,'password' => $request->password])){
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->createNewToken($token);
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
            return response()->json($validator->errors()->toJson(), 400);
        }
        $helper = new FileHelper();
        $code = $helper->generateRandomString(5);
        $request->code = $code;
        $user = $this->service->store($request);
//        $user = User::create(array_merge(
//            $validator->validated(),
//            ['password' => bcrypt($request->password)]
//        ));
        $message = new SMSHelper();
        $message->sendMessage('Please verify your account with this code: \n'.$user->code, $user->phone);
        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
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
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
//            'expires_in' => auth()->factory()->getTTL() * 60,
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }

    /**
     * edit a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function editProfile(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|unique:users,email,'.Auth::id(),
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|unique:users,phone,'.Auth::id(),
//            'password' => 'required|string|confirmed|min:6',
            'image' => 'nullable|mimes:jpeg,jpg,bmp,png|max:20240'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $user = $this->service->update($request, Auth::id());
        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }

    public function sendCode(Request $request){
        $validator = Validator::make($request->all(), [
            'phone' => 'required|exists:users,phone',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $this->service->sendCode($request);
        return response()->json(['error'=>true,'status'=>200,'message'=>'We send code to your mobile, please check it!'],200);
    }

    public function resetNewPassword(Request $request){
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6',
            'password_confirmation'=> 'required|same:password'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $data = $this->service->resetPassword($request);
        if($data == 'error'){
            return response()->json(['error'=>true,'status'=>1,'message'=>'try again connection failed'],200);
        }else{
            return response()->json(['error'=>false,'status'=>0,'message'=>'password has been changed'],200);

        }
    }

    public function checkCode(Request $request){
            $validator = Validator::make($request->all(), [
                'phone' => 'required|exists:users,phone',
                'code' => 'required|exists:users,code',
            ]);
            if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
            }
            $data = $this->service->checkCode($request);
        if($data){
            return response()->json(['error'=>false,'status'=>200, 'data'=> $data,'message'=>'Code Checked please reset you password'],200);
        }else{
            return response()->json(['error'=>true,'status'=>1,'message'=>'try again code is wrong'],200);
        }
    }
}
