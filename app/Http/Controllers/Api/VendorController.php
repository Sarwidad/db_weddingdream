<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
// use App\Http\Resources\VendorResource;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VendorController extends Controller
{
    public function index()
    {
        //get posts
        $vendors = Vendor::latest()->paginate(10);

        //return collection of vendors$vendors as a resource
        // return new VendorResource(true, 'List Data Vendors', $vendors);

        return response()->json(['List data vendor', $vendors],200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id'=>'required',
            'no_hp'=>'required',
            'alamat'=>'required',
            'nama_vendor'=>'required',
            'desc_vendor'=>'required',
            'range_harga'=>'required',
            'kontak_vendor'=>'required',
            'rating_vendor'=>'required',
            'galeri_vendor'=>'required',
            'fotoprofile'=>'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $vendor =Vendor::create([
            'id_vendor'=>$request->id_vendor,
            'user_id'=>$request->user_id,
            'no_hp'=>$request->no_hp,
            'alamat'=>$request->alamat,
            'nama_vendor'=>$request->nama_vendor,
            'desc_vendor'=>$request->desc_vendor,
            'range_harga'=>$request->range_harga,
            'kontak_vendor'=>$request->kontak_vendor,
            'rating_vendor'=>$request->rating_vendor,
            'galeri_vendor'=>$request->galeri_vendor,
            'fotoprofile'=>$request->fotoprofile
        ]);

        return response()->json(['Data vendor berhasil ditambah!', $vendor]);
    }

    public function show($id)
    {
        $vendor = Vendor::find($id);
        if (is_null($vendor)) {
            return response()->json('Data not found', 404);
        }
        return response()->json(['Data vendor berhasil ditemukan!', $vendor]);
    }

    public function update(Request $request, Vendor $vendor)
    {
        $validator = Validator::make($request->all(), [
            'user_id'=>'required',
            'no_hp'=>'required',
            'alamat'=>'required',
            'nama_vendor'=>'required',
            'desc_vendor'=>'required',
            'range_harga'=>'required',
            'kontak_vendor'=>'required',
            'rating_vendor'=>'required',
            'galeri_vendor'=>'required',
            'fotoprofile'=>'required'

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $vendor->Vendor::update([
            'user_id'=>$request->user_id,
            'no_hp'=>$request->no_hp,
            'alamat'=>$request->alamat,
            'nama_vendor'=>$request->nama_vendor,
            'desc_vendor'=>$request->desc_vendor,
            'range_harga'=>$request->range_harga,
            'kontak_vendor'=>$request->kontak_vendor,
            'rating_vendor'=>$request->rating_vendor,
            'galeri_vendor'=>$request->galeri_vendor,
            'fotoprofile'=>$request->fotoprofile
        ]);

        return response()->json(['Data vendor berhasil diubah!', $vendor]);
    }

    public function destroy(Vendor $vendor)
    {
        $vendor->delete();
        return response()->json('Data vendor berhasil dihapus!');
    }
}
