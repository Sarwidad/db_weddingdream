<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        //get posts
        $users = User::latest()->paginate(10);

        //return collection of users$users as a resource
        return response()->json($users, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username'=>'required',
            'email'=>'required',
            'password'=>'required',
            'role'=>'required'

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user =User::create([
            'id_user'=>$request->id_user,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>$request->password,
            'role'=>$request->role
        ]);

        // return new UserResource(true, 'Data User Berhasil Ditambahkan!', $user);
        return response()->json($user, 200);
    }

    public function show($id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return response()->json('Data user tidak ditemukan!', 404);
        }else{
        return response()->json($user, 200);
    }
    }

    public function logins(Request $request)
    {
        // $input = $request->all();

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
    $user = DB::table('users')->where('email', $request->email)->where('password', $request->password)->get();

if(is_null($user)) {
    return response()->json('user tidak ditemukan! '. $request->email.$request->password, 404);
}
    return response()->json($user[0],200);

        // $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        // if(auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password'])))
        // {
            // return redirect()->route('home');
        // }else{
            // return redirect()->route('login')
            //     ->with('error','Email-Address And Password Are Wrong.');
        // }

    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'username'=>'required',
            'email'=>'required',
            'password'=>'required',
            'role'=>'required'

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user->User::update([
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>$request->password,
            'role'=>$request->role
        ]);

        // return new UserResource(true, 'Data User Berhasil Diubah!', $user);
        return response()->json(["Data user berhasil diubah!",$user], 200);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json("Data user berhasil dihapus!", 200);
    }
}
