<?php

namespace App\Http\Controllers\Api;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Http\Resources\CUstomerResource;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index()
    {
        //get posts
        $customers = Customer::latest()->paginate(10);

        //return collection of customers as a resource
        // return new CustomerResource(true, 'List Data Customers', $customers);

        return response()->json(['List data customer', $customers],200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id'=>'required',
            'no_hp'=>'required',
            'alamat'=>'required',
            'tanggal_lahir'=>'required',
            'foto_profile'=>'required'

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $customer =Customer::create([
            'id_customer'=>$request->id_customer,
            'user_id'=>$request->user_id,
            'no_hp'=>$request->no_hp,
            'alamat'=>$request->alamat,
            'tanggal_lahir'=>$request->tanggal_lahir,
            'foto_profile'=>$request->foto_profile
        ]);

        // return new CustomerResource(true, 'Data Customer Berhasil Ditambahkan!', $customer);

        return response()->json(['Data berhasil ditambahkan', $customer],200);
    }

    public function show($id)
    {
        $customer = Customer::find($id);
        if (is_null($customer)) {
            return response()->json('Data not found', 404);
        }
        // return new CustomerResource(true, 'Data Customer Ditemukan!', $customer);

        return response()->json(['Data berhasil ditemukan', $customer],200);
    }

    public function update(Request $request, Customer $customer)
    {
        $validator = Validator::make($request->all(), [
            'user_id'=>'required',
            'no_hp'=>'required',
            'alamat'=>'required',
            'tanggal_lahir'=>'required',
            'foto_profile'=>'required'

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $customer->Customer::update([
            'user_id'=>$request->user_id,
            'no_hp'=>$request->no_hp,
            'alamat'=>$request->alamat,
            'tanggal_lahir'=>$request->tanggal_lahir,
            'foto_profile'=>$request->foto_profile
        ]);

        // return new CustomerResource(true, 'Data Customer Berhasil Diubah!', $customer);
        return response()->json(['Data customer berhasil diubah!', $customer]);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        // return new CustomerResource(true, 'Data Customer Berhasil Dihapus!', null);
        return response()->json('Data customer berhasil dihapus!');
    }
}
