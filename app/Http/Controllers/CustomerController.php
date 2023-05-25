<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::with('customers')->get()->where('role','Customer');
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $customer = new User();
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->password = $request->input('password');
        $customer->role = $request->input('role');
        $customer->save();

        return redirect()->route('customers.index')->with('success', 'Customer created successfully');
    }

    public function show($id)
    {
        $customer = User::find($id);
        return view('customers.show', compact('customer'));
    }

    public function edit($id)
    {
        $customer = User::find($id);
        $user = Customer::where('user_id', $id)->get();
        return view('customers.edit', compact('customer','user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $customer = Customer::find($request->input('user_id'));
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->role = $request->input('role');
        $user->save();

        foreach ($user->customers as $c) {
            $customer = Customer::find($c['id']);
            $customer->alamat = $request->input('alamat');
            $customer->save();
        }
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully');
    }

    // public function updateCustomer(Request $request, $id)
    // {
    //     $customer = Customer::find($id);
    //     $customer->foto_profile = $request->input('foto_profile');
    //     $customer->alamat = $request->input('alamat');
    //     $customer->desc_konsultan = $request->input('desc_konsultan');
    //     $customer->save();

    //     return redirect()->route('customers.index')->with('success', 'Customer updated successfully');
    // }

    public function destroy($id)
    {
        $user = User::find($id);
        foreach ($user->customers as $c) {
            $customer = Customer::find($c['id']);
            $customer->delete();
            $user->delete();
        }
        $user->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully');
    }
}
