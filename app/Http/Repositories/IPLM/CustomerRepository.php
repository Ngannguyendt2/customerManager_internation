<?php


namespace App\Http\Repositories\IPLM;


use App\Customer;
use App\Http\Repositories\CustomerRepositoryInterface;

class CustomerRepository implements CustomerRepositoryInterface
{
    protected $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
        return $this->customer->all();
    }

    public function getId($id)
    {
        // TODO: Implement getId() method.
        return $this->customer->find($id);
    }

    public function save($object)
    {
        // TODO: Implement save() method.
        $object->save();
    }

    public function delete($object)
    {
        // TODO: Implement delete() method.
        $object->delete();
    }

    public function create($object)
    {
        // TODO: Implement create() method.
        $object->save();
    }
    public function update($object)
    {
        // TODO: Implement update() method.
        $object->save();
    }
}
