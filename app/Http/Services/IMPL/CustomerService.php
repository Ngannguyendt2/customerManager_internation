<?php


namespace App\Http\Services\IMPL;


use App\Customer;
use App\Http\Repositories\CustomerRepositoryInterface;
use App\Http\Services\CustomerServiceInterface;

class CustomerService implements CustomerServiceInterface
{
    protected $customerRepo;

    public function __construct(CustomerRepositoryInterface $customerRepo)
    {
        $this->customerRepo = $customerRepo;
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
        return $this->customerRepo->getAll();
    }

    public function getId($id)
    {
        // TODO: Implement getId() method.
        return $this->customerRepo->getId($id);
    }

    public function save($object)
    {
        // TODO: Implement save() method.
        $this->customerRepo->save($object);
    }

    public function delete($object)
    {
        // TODO: Implement delete() method.
        $this->customerRepo->delete($object);
    }

    public function create($request)
    {
        // TODO: Implement create() method.
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->view_count=0;
        $this->customerRepo->create($customer);

    }
    public function update($request, $object)
    {
        // TODO: Implement update() method.
        $object->name=$request->name;
        $object->email=$request->email;
        $this->customerRepo->update($object);
    }
}
