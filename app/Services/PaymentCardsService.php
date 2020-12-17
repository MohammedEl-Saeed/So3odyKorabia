<?php

namespace App\Services;

use App\models\PaymentCard;
use App\Repositories\PaymentCardRepository;
use Illuminate\Http\Response;

class PaymentCardsService extends AbstractService
{

    /**
     * @var PaymentCardRepository
     */
    protected $repository;

    /**
     * AbstractService constructor.
     * @param PaymentCardRepository $repository
     */
    public function __construct(PaymentCardRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * @param array $filters
     * @return
     */
    public function index()
    {
        return $this->repository->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param array $data
     * @return Response
     */
    public function store(array $data)
    {
        return $this->repository->create($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param array $data
     * @param PaymentCard $category
     * @return PaymentCard|PaymentCardRepository
     */
    public function update(array $data, PaymentCard $category)
    {
        $this->repository = $category;
        $this->repository->update($data);
        return $this->repository;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Integer $id
     * @return Response
     */
    public function destroy(int $id)
    {
        return $this->repository->where('id', $id)->delete();
    }

}
