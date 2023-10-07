<?php

namespace App\Http\Controllers\AuthAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Admin;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('authAdmin.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
          'username' => 'required',
          'password' => 'required|min:6'
        ],[
          'username.required' => "กรุณากรอกชื่อผู้ใช้",
          'password.required' => "กรุณากรอกรหัสผ่าน",
          'password.min' => "กรุณากรอกรหัสผ่านอย่างน้อย 6 ตัวอักษร",
        ]);


        $credential = [
          'username' => $request->username,
          'password' => $request->password
        ];

        $username = $request->username;
        $admin_status = Admin::where('username',$username)->value('status');

        if($admin_status == "เปิด") {
          if(Auth::guard('admin')->attempt($credential, $request->member)){
            return redirect()->intended(route('admin.home'));
          }
          $request->session()->flash('alert-danger', 'ชื่อเข้าใช้งานหรือรหัสผ่านไม่ถูกต้อง');
          return redirect()->back()->withInput($request->only('username','remember'));
        } else {
          $request->session()->flash('alert-danger', 'เข้าสู่ระบบไม่สำเร็จ user ถูกปิดการใช้งาน');
          return redirect()->back()->withInput($request->only('username','remember'));
        }
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    public function editAdmin($id) {
      $admin = Admin::findOrFail($id);
      return view('authAdmin/edit-admin')->with('admin',$admin);
    }

    public function editAdminPost(Request $request) {
      $id = $request->get('id');
      $admin = Admin::findOrFail($id);

      if($request->get('password') == '') {
        $admin->update($request->except('password'));
      } else {
        $admin['name'] = $request->get('name');
        $admin['role'] = $request->get('role');
        $admin['status'] = $request->get('status');
        $admin['username'] = $request->get('username');
        $admin['password'] = bcrypt($request->get('password'));
        $admin->update();
      }
      
      return redirect()->action('AuthAdmin\RegisterController@ShowRegisterForm');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->intended(route('admin.login'));
    }
}
