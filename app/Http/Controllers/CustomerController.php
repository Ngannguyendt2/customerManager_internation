<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\FormCreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    //
    public function index()
    {
        $customers = Customer::all();
        return view('customers.list', compact('customers'));
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(FormCreateRequest $request, $id)
    {
        $success = "Dữ liệu được xác thực thành công";
        $customer = Customer::findOrFail($id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->save();
        return redirect()->route('customers.index', compact('success'));
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customers.index');
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(FormCreateRequest $request)
    {
        $success = "Dữ liệu được xác thực thành công";
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->view_count=0;
        $customer->save();
        return redirect()->route('customers.index', compact('success'));
    }

    public function detail($id)
    {
        $customer = Customer::find($id);
        $customerKey = 'customer' . $id;
        if (!Session::has($customerKey)) {
            Customer::where('id', $id)->increment('view_count');
            Session::put($customerKey, 1);
        }
        return view('customers.detail', compact('customer'));
    }
}
