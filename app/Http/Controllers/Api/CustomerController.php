<?php

namespace App\Http\Controllers\Api;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CUstomerResource;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index()
    {
        //get posts
        $customers = Customer::latest()->paginate(10);

        //return collection of customers as a resource
        return $customers;
    }

    static  public function store(Request $request, $user_id)
    {
        $validator = Validator::make($request->all(), [
            // 'user_id' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'fotoprofile' => 'file|image|mimes:jpeg,png,jpg'

        ]);
        if ($validator->fails()) {
            return null;
        }

        if (!is_null($request->fotoprofile)) {
            $file = $request->file('fotoprofile');
            $file_name = time() . "_" . $file->getClientOriginalName();
            $destination = 'fotoprofile';
            $file->move($destination, $file_name);
        }


        // $customer = Customer::create([
        //     'id_customer' => $request->id_customer,
        //     'user_id' => $request->user_id,
        //     'no_hp' => $request->no_hp,
        //     'alamat' => $request->alamat,
        //     'tanggal_lahir' => $request->tanggal_lahir,
        //     'fotoprofile' => $request->fotoprofile
        // ]);
        $customer = new Customer();
        $customer->user_id = $user_id;
        $customer->no_hp = $request->no_hp;
        $customer->alamat = $request->alamat;
        $customer->tanggal_lahir = $request->tanggal_lahir;
        if (!is_null($request->fotoprofile)) $customer->fotoprofile =  $destination . "/" . $file_name;
        $customer->save();
        return $customer;
    }

    static public function show($id)
    {
        $customer = Customer::find($id);
        if (is_null($customer)) {
            return response()->json('Data not found', 404);
        }
        return $customer;
    }

    static  public function update(Request $request, $user_id)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'fotoprofile' => 'file|image|mimes:jpeg,png,jpg'

        ]);
        if ($validator->fails()) {
            return null;
        }
        $customer = Customer::where($user_id, "user_id")->first();

        if (is_null($customer)) {
            return null;
        }
        if (!is_null($request->fotoprofile)) {
            $file = $request->file('fotoprofile');
            $file_name = time() . "_" . $file->getClientOriginalName();
            $destination = 'fotoprofile';
            $file->move($destination, $file_name);
        }


        // $customer->Customer::update([
        //     'user_id' => $request->user_id,
        //     'no_hp' => $request->no_hp,
        //     'alamat' => $request->alamat,
        //     'tanggal_lahir' => $request->tanggal_lahir,
        //     'fotoprofile' => $request->fotoprofile
        // ]);

        $customer->no_hp = $request->no_hp;
        $customer->alamat = $request->alamat;
        $customer->tanggal_lahir = $request->tanggal_lahir;
        if (!is_null($request->fotoprofile)) $customer->fotoprofile = $destination . "/" . $file_name;

        return $customer;
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        if (!is_null($customer)) {
            $customer->delete();
        }
        return true;
    }
}
