<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\KonsultanResource;
use App\Models\Konsultan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KonsultanController extends Controller
{
    public function index()
    {
        //get posts
        $konsultans = Konsultan::latest()->paginate(10);

        //return collection of konsultans as a resource
        // return new KonsultanResource(true, 'List Data Konsultans', $konsultans);

        return response()->json(["List data konsultan", $konsultans],200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id'=>'required',
            'no_hp'=>'required',
            'alamat'=>'required',
            'desc_konsultan'=>'required',
            'foto_profile'=>'required'

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $konsultan =Konsultan::create([
            'id_customer'=>$request->id_customer,
            'user_id'=>$request->user_id,
            'no_hp'=>$request->no_hp,
            'alamat'=>$request->alamat,
            'desc_konsultan'=>$request->desc_konsultan,
            'foto_profile'=>$request->foto_profile
        ]);

        return response()->json(["Data berhasil ditambahkan", $konsultan],200);
    }

    public function show($id)
    {
        $konsultan = Konsultan::find($id);
        if (is_null($konsultan)) {
            return response()->json('Data not found', 404);
        }
        return response()->json(["Data berhasil ditemukan", $konsultan],200);
    }

    public function update(Request $request, Konsultan $konsultan)
    {
        $validator = Validator::make($request->all(), [
            'user_id'=>'required',
            'no_hp'=>'required',
            'alamat'=>'required',
            'desc_konsultan'=>'required',
            'foto_profile'=>'required'

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $konsultan->Konsultan::update([
            'user_id'=>$request->user_id,
            'no_hp'=>$request->no_hp,
            'alamat'=>$request->alamat,
            'desc_konsultan'=>$request->desc_konsultan,
            'foto_profile'=>$request->foto_profile
        ]);

        return response()->json(["Data berhasil diubah", $konsultan],200);
    }

    public function destroy(Konsultan $konsultan)
    {
        $konsultan->delete();
        return response()->json("Data berhasil dihapus",200);
    }
}
