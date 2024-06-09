<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Role;
use App\Models\User;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

            $profile = new Profil();
            $profile->nama_profil = $request['name'];
            $profile->email = $request['email'];
            $profile->email = $request['email'];
            $profile->save();

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

    public function destroy($id){
        if ($id == Auth::user()->id) {
            return redirect('manajemen-user')->with('error', 'Gagal menghapus data!');
        } else {
            $admin = User::where('id', $id)->delete();
            return redirect('manajemen-user')->with('success', 'Berhasil menghapus data!');
        }
    }
}
