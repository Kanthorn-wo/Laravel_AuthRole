<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = bcrypt($request->password);
        $data['role'] = $request->role;
        $data['created_at'] = now();
        DB::table('users')->insert($data);
        return redirect()->route('login')->with('success', "บันทึกข้อมูลสำเร็จ");
    }
}