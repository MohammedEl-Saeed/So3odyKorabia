<?php namespace App\Repositories\payment;

use App\Http\Traits\BasicTrait;
use App\models\PaymentCard;
use App\Repositories\Abstracts\AbstractRepository;
use App\Repositories\Payment\Interfaces\PaymentCardInterface;

/**
 * @method get()
 * @method create(array $data)
 * @method where(string $string, int $id)
 */
//class PaymentCardRepository extends AbstractRepository
class PaymentCardRepository
{
    use BasicTrait;

    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(PaymentCard $model)
    {
        $this->model = $model;
        parent::__construct($model);
    }

    /** get all items */

    public function index()
    {
        return $this->traitIndex($this->model);
    }

}
