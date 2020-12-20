<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentCardRequest;
use App\Http\Resources\PaymentCardResource;
use App\Http\Traits\NotificationTrait;
use App\Http\Traits\ResponseTraits;
use App\models\PaymentCard;
use App\Services\PaymentCardsService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Setting;
class PaymentCardsController extends Controller
{
    use ResponseTraits;
    use NotificationTrait;

    protected $service;

    public function __construct(PaymentCardsService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $paymentCards = $this->service->index($request->all());
        return PaymentCardResource::collection($paymentCards);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PaymentCardRequest $request
     * @return PaymentCardResource
     */
    public function store(PaymentCardRequest $request)
    {
        $paymentCard = $this->service->store($request->validated());
        return new PaymentCardResource($paymentCard);
    }

    /**
     * Display the specified resource.
     *
     * @param PaymentCard $paymentCard
     * @return PaymentCardResource
     */
    public function show(PaymentCard $paymentCard)
    {
        return new PaymentCardResource($paymentCard);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param PaymentCardRequest $request
     * @param PaymentCard $paymentCard
     * @return PaymentCardResource
     */
    public function update(PaymentCardRequest $request, PaymentCard $paymentCard)
    {
//        dd($request->all(), $paymentCard->name);
        $paymentCard = $this->service->update($request->validated(), $paymentCard);
        return new PaymentCardResource($paymentCard);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PaymentCard $paymentCard
     * @return Response
     */
    public function destroy(PaymentCard $paymentCard)
    {
        $paymentCard = $this->service->destroy($paymentCard->id);
        if ($paymentCard)
            return response(['message' => 'Deleted']);
        else
            return response(['message' => 'Not deleted']);
    }

    public function getBankSetting(){
        // try{
        $bank_account=Setting::get('bank_account');
        $data['bank_account']=$bank_account;

        return  $this->prepare_response(false,null,'ٌreturn Successfully',$data,0 ,200);

        // } catch(\Exception $e){
        //     return  $this->prepare_response(true,$e,'ٌFailed',null,1 ,200);
        // }

    }

}
