<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
    public function manajemenUser(){
        $data['user'] = User::with('roles')->get();
        // return $data;
        // return $data['user'];
        return view('user.user',$data);
    }

    public function create() {
        $data['role'] = Role::get();
        return view('user.tambah-user',$data);
    }

    public function store(Request $request){
        // return $request;
        $cek = Validator::make($request->all(), [
            'name' => ['required','unique:users'],
            'email' => ['required'],
            'password' => ['required'],
        ],[
            'name.required' => 'name wajib di isi !',
            'name.unique' => 'name sudah ada !',
            'email.required' => 'Email wajib di isi !',
            'password.required' => 'Password wajib di isi !',
        ]);

        if ($cek->fails()) {
            return redirect()->back()
                ->withErrors($cek)
                ->withInput();
        }else{
            $user = new User();
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->password = bcrypt($request['password']);
            $user->save();
            $user->addRole($request['roles']);
        }
        return redirect('/manajemen-user');
    }

    public function edit($id) {
        $data['user'] = User::where('id',$id)->with('roles')->first();
        $data['role'] = Role::get();

        // return $data;
        return view('user.edit-user',$data);
    }

    public function update(Request $request,$id){
        $cek = Validator::make($request->all(), [
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
        ],[
            'name.required' => 'name wajib di isi !',
            'email.required' => 'Email wajib di isi !',
            'password.required' => 'Password wajib di isi !',
        ]);

        if ($cek->fails()) {
            return redirect()->back()
                ->withErrors($cek)
                ->withInput();
        }else{
            $user = User::where('id',$id)->first();
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->password = bcrypt($request['password']);
            $user->update();
            $user->addRole($request['roles']);
        }
        return redirect('/manajemen-user');
    }

    public function changePassword()
    {
        return view('auth.change-password');
    }
}
