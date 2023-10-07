<?php

namespace App\Http\Controllers\AuthStaff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Staff;
use Validator;

class RegisterController extends Controller
{
    public function ShowRegisterForm(Request $request){
        $NUM_PAGE = 20;
        $staffs = Staff::paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('authStaff/register')->with('NUM_PAGE',$NUM_PAGE)
                                         ->with('page',$page)
                                         ->with('staffs',$staffs);
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(), $this->rules_register(), $this->messages_register());
        if($validator->passes()) {
            $staff = $request->all();
            $staff['password'] = bcrypt($staff['password']);
            $staff = Staff::create($staff);
            $request->session()->flash('alert-success', 'ลงทะเบียนพนักงานขายสำเร็จ');
            return back();
        }
        else {
            $request->session()->flash('alert-danger', 'ลงทะเบียนพนักงานขายไม่สำเร็จ');
            return back()->withErrors($validator)->withInput();
        }
    }

    public function rules_register() {
        return [
            'name' => 'required',
            'branch' => 'required',
            'username' => 'required|unique:staffs',
            'password' => 'required',
            'password_confirmation' => 'required',
        ];
    }

    public function messages_register() {
        return [
            'name.required' => 'กรุณากรอกชื่อ',
            'branch.required' => 'กรุณากรอกสาขา',
            'username.required' => 'กรุณากรอกชื่อผู้ใช้งาน',
            'username.unique' => 'ชื่อนี้มีผู้ใช้แล้ว กรุณากรอกชื่อเข้าใช้ใหม่',
            'password.required' => 'กรุณากรอกรหัสผ่าน',
            'password_confirmation.required' => 'กรุณายืนยันรหัสผ่าน',
        ];
    }
}
