<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OpenTalent;
use App\Models\Talent;
use App\Models\TalentOpenTalents;
use App\Models\Vendor;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class OpenTalentController extends Controller
{
    public function index()
    {
        $open_talent = OpenTalent::latest()->paginate(10);
        return response()->json($open_talent, 200);
    }
    public function myVendorIndex($vendor_id)
    {
        $open_talent = OpenTalent::where("vendor_id", $vendor_id)->latest()->paginate(10);
        if (is_null($open_talent)) {
            return response()->json("Data kosong!", 402);
        }
        return response()->json($open_talent, 200);
    }
    public function myTalentIndex($talent_id)
    {
        // $talent = Talent::find($talent_id);
        $open_talent =   new OpenTalent();
        $open_talent->talent->where('id', $talent_id);
        if (is_null($open_talent)) {
            return response()->json("Data kosong!", 402);
        }
        return response()->json($open_talent, 200);
    }

    public function show($id)
    {
        $open_talent = OpenTalent::find($id);
        if (is_null($open_talent)) {
            return response()->json('Data not found', 404);
        }
        return response()->json($open_talent, 200);
    }
    public function join($talent_id, $open_talent_id)
    {
        $talent = Talent::find($talent_id);
        if (is_null($talent)) {
            return response()->json('Gagal Mendaftar', 422);
        }
        $talentOpenTalent = new TalentOpenTalents();
        $talentOpenTalent->talent_id = $talent->id;
        $talentOpenTalent->open_talents_id = $open_talent_id;
        $talentOpenTalent->save();
        return response()->json('Berhasil Mendaftar', 200);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vendor_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'category' => 'required',
            'talent_count' => 'required',
            'period' => 'required',
            'salary_estimate' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->error(), 422);
        }
        $vendor =  Vendor::find($request->vendor_id);
        if (is_null($vendor)) {
            return response()->json("Vendor tidak ditemukan", 422);
        }
        $open_talent = new OpenTalent();
        $open_talent->title = $request->title;
        $open_talent->description = $request->description;
        $open_talent->status = $request->status;
        $open_talent->category = $request->category;
        $open_talent->talent_count = $request->talent_count;
        $open_talent->period = $request->period;
        $open_talent->salary_estimate = $request->salary_estimate;
        $open_talent->vendor_id = $vendor->id;
        // $open_talent->vendor_id()->associate($vendor->id);
        $open_talent->save();

        return response()->json($open_talent, 200);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'vendor_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'category' => 'required',
            'talent_count' => 'required',
            'period' => 'required',
            'salary_estimate' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->error(), 422);
        }
        $open_talent =  OpenTalent::find($request->id);
        if (is_null($open_talent)) {
            return response()->json("OpenTalent tidak ditemukan", 422);
        }
        $open_talent->title = $request->title;
        $open_talent->description = $request->description;
        $open_talent->status = $request->status;
        $open_talent->category = $request->category;
        $open_talent->talent_count = $request->talent_count;
        $open_talent->period = $request->period;
        $open_talent->salary_estimate = $request->salary_estimate;
        $open_talent->vendor_id = $request->vendor_id;
        // $open_talent->vendor_id()->associate($vendor->id);
        $open_talent->save();

        return response()->json($open_talent, 200);
    }

    public function destroy($id)
    {
        $open_talent = OpenTalent::find($id);
        if (!is_null($open_talent)) {
            $open_talent->delete();
        }
        // return new openTalentResource(true, 'Data openTalent Berhasil Dihapus!', null);
        return response()->json("Berhasil menghapus data", 200);
    }
}
