<?php

namespace App\Http\Controllers\AuthAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Admin;
use Validator;

class RegisterController extends Controller
{
    public function ShowRegisterForm(Request $request){
        $NUM_PAGE = 20;
        $admins = Admin::get();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('authAdmin/register')->with('NUM_PAGE',$NUM_PAGE)
                                         ->with('page',$page)
                                         ->with('admins',$admins);
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_register(), $this->messages_register());
        if($validator->passes()) {
            $admin = $request->all();
            $admin['password'] = bcrypt($admin['password']);
            $admin = Admin::create($admin);
            $request->session()->flash('alert-success', 'ลงทะเบียนผู้ดูแลระบบสำเร็จ');
            return back();
        }
        else {
            $request->session()->flash('alert-danger', 'ลงทะเบียนผู้ดูแลระบบไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function rules_register() {
        return [
            'name' => 'required',
            'username' => 'required|unique:admins',
            'password' => 'required',
            'password_confirmation' => 'required',
        ];
    }

    public function messages_register() {
        return [
            'name.required' => 'กรุณากรอกชื่อผู้ใช้งาน',
            'username.required' => 'กรุณากรอกชื่อเข้าใช้งาน',
            'username.unique' => 'ชื่อนี้มีผู้ใช้แล้ว กรุณากรอกชื่อเข้าใช้ใหม่',
            'password.required' => 'กรุณากรอกรหัสผ่าน',
            'password_confirmation.required' => 'กรุณายืนยันรหัสผ่าน',
        ];
    }
}
