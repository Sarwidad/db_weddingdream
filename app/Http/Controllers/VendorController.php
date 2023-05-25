<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = User::with('vendors')->get()->where('role','Vendor');
        return view('vendors.index', compact('vendors'));
    }

    public function create()
    {
        return view('vendors.create');
    }

    public function store(Request $request)
    {
        $vendor = new User();
        $vendor->name = $request->input('name');
        $vendor->email = $request->input('email');
        $vendor->password = $request->input('password');
        $vendor->role = $request->input('role');
        $vendor->save();

        return redirect()->route('vendors.index')->with('success', 'Vendor created successfully');
    }

    public function show($id)
    {
        $vendor = User::find($id);
        return view('vendors.show', compact('vendor'));
    }

    public function edit($id)
    {
        $vendor = User::find($id);
        $user = Vendor::where('user_id', $id)->get();
        return view('vendors.edit', compact('vendor','user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $vendor = Vendor::find($request->input('user_id'));
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->role = $request->input('role');
        $user->save();

        foreach ($user->vendors as $v) {
            $vendor = Vendor::find($v['id']);
            $vendor->nama_vendor = $request->input('nama_vendor');
            $vendor->desc_vendor = $request->input('desc_vendor');
            $vendor->fotoprofile = $request->input('fotoprofile');
            $vendor->alamat = $request->input('alamat');
            $vendor->no_hp = $request->input('no_hp');
            $vendor->range_harga = $request->input('range_harga');
            $vendor->kontak_vendor = $request->input('kontak_vendor');
            $vendor->rating_vendor = $request->input('rating_vendor');
            $vendor->galeri_vendor = $request->input('galeri_vendor');
            $vendor->save();
        }
        return redirect()->route('vendors.index')->with('success', 'Konsultan updated successfully');
        // $user = Vendor::where('user_id', $id)->get();
        // $user->nama_vendor = $request->input('nama_vendor');
        // $user->desc_vendor = $request->input('desc_vendor');
        // $user->fotoprofile = $request->input('fotoprofile');
        // $user->alamat = $request->input('alamat');
        // $user->no_hp = $request->input('no_hp');
        // $user->range_harga = $request->input('range_harga');
        // $user->kontak_vendor = $request->input('kontak_vendor');
        // $user->rating_vendor = $request->input('rating_vendor');
        // $user->galeri_vendor = $request->input('galeri_vendor');
        // $user->save();
        // return redirect()->route('vendors.index')->with('success', 'Konsultan updated successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        foreach ($user->vendors as $v) {
            $vendor = Vendor::find($v['id']);
            $vendor->delete();
            $user->delete();
        }
        $user->delete();
        return redirect()->route('vendors.index')->with('success', 'Vendor deleted successfully');
    }
}
