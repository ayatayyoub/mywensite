<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index(){
        $data['users']=User::get();
        return view ('admin.layout.users',$data);
    }
    public function create(){
        return view ('admin.layout.create');
    }
    public function store(Request $request)
    {
//        $request->validate([
//            'name '=> ['required' , ' string' ,'max:255'],
//            'email'=> ['required' , ' string','email' ,'max:255','unique:users'],
//            'password'=>['required' , ' string' ,'min:8','confirmed']
//        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
//        dd($user);
        if ($user) {
            return redirect()->route('admin.users.index')
                ->with('succses', 'تم الاضافة بنجاح');
        }

    }
    public function edit (User $admin){
        $admin = User::find($admin);
        $data['admin'] = $admin;
        return view('admin.layout.edit');

    }

    }

