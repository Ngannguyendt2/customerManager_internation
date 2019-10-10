<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\FormCreateRequest;
use App\Http\Services\CustomerServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    //
    protected $customer;

    public function __construct(CustomerServiceInterface $customer)
    {
        $this->customer = $customer;
    }

    public function index()
    {
        $customers = $this->customer->getAll();
        return view('customers.list', compact('customers'));
    }

    public function edit($id)
    {
        $customer = $this->customer->getId($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(FormCreateRequest $request, $id)
    {
        $success = "Dữ liệu được xác thực thành công";
        $customer = $this->customer->getId($id);
        $this->customer->update($request, $customer);
        return redirect()->route('customers.index', compact('success'));
    }

    public function destroy($id)
    {
        $customer = $this->customer->getId($id);
        $this->customer->delete($customer);
        return redirect()->route('customers.index');
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(FormCreateRequest $request)
    {
        $success = "Dữ liệu được xác thực thành công";
        $this->customer->create($request);
        return redirect()->route('customers.index', compact('success'));
    }

    public function detail($id)
    {
        $customer = $this->customer->getId($id);
        $customerKey = 'customer' . $id;
        if (!Session::has($customerKey)) {
            Customer::where('id', $id)->increment('view_count');
            Session::put($customerKey, 1);
        }
        return view('customers.detail', compact('customer'));
    }

    public function changeLanguage(Request $request)
    {
        Session::put('language',$request->language);
        return redirect()->back();
    }
}
