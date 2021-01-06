<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
//use App\Models\City;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class
CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate(10);
        return view('backend.customers.list',compact('customers'));
    }

    public function create()
    {
        $customer = Customer::all();
        return view('backend.customers.create',compact('customer'));
    }

    public function store(Request $request){
        $customer = new Customer();
        $customer->user     = $request->input('name');
        $customer->address    = $request->input('address');
        $customer->email      = $request->input('email');
        $customer->phone  = $request->input('phone');
        $customer->password =Hash::make($request->password);
        $customer->save();

        //tao moi xong quay ve trang danh sach khach hang
        return redirect()->route('customers.list');
    }

    public function edit($id){
        $customer = Customer::findOrFail($id);
        return view('backend.customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->user = $request->input('name');
        $customer->address = $request->input('address');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('phone');
//        $customer->password =Hash::make($request->password);
        $customer->save();

        return redirect()->route('customers.list');
    }

    public function destroy($id)
    {
        $cutomers = Customer::find($id);
        $cutomers->delete();
        return redirect()->route('customers.list');
    }

}
