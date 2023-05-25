<?php

namespace App\Http\Controllers;

use App\Models\Konsultan;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KonsultanController extends Controller
{
    public function index()
    {
        $konsultans = User::with('konsultans')->get()->where('role','Wedding Konsultan');
        // $konsultans = User::all()->where('role','Wedding Konsultan');
        return view('konsultans.index', compact('konsultans'));
    }

    public function create()
    {
        return view('konsultans.create');
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->role = $request->input('role');
        $user->save();

        return redirect()->route('konsultans.index')->with('success', 'Konsultan created successfully');
    }

    public function show($id)
    {
        $konsultan = User::find($id);
        // $user = User::find($id);
        return view('konsultans.show', compact('konsultan'));
    }

    public function edit($id)
    {
        $konsultan = User::find($id);
        $user = Konsultan::where('user_id', $id)->get();
        return view('konsultans.edit', compact('konsultan','user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $konsultan = Konsultan::find($request->input('user_id'));
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->role = $request->input('role');
        $user->save();

        foreach ($user->konsultans as $k) {
            $konsultan = Konsultan::find($k['id']);
            $konsultan->fotoprofile = $request->input('fotoprofile');
            $konsultan->alamat = $request->input('alamat');
            $konsultan->desc_konsultan = $request->input('desc_konsultan');
            $konsultan->save();
        }
        return redirect()->route('konsultans.index')->with('success', 'Konsultan updated successfully');
        // $konsultan = Konsultan::where('user_id', $id)->get();
        // $konsultan->fotoprofile = $request->input('fotoprofile');
        // $konsultan->alamat = $request->input('alamat');
        // $konsultan->desc_konsultan = $request->input('desc_konsultan');
        // $konsultan->save();
        // return redirect()->route('konsultans.index')->with('success', 'Konsultan updated successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        foreach ($user->konsultans as $k) {
            $konsultan = Konsultan::find($k['id']);
            $konsultan->delete();
            $user->delete();
        }
        $user->delete();

        return redirect()->route('konsultans.index')->with('success', 'Konsultan deleted successfully');
    }
}
