<?php

namespace App\Http\Controllers\AuthStaff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Staff;
use App\Model\StaffStatistic;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('authStaff.login');
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
          'password' =>$request->password
        ];

       if(Auth::guard('staff')->attempt($credential, $request->member)){
          $staff_id = Auth::guard('staff')->id();
          $date = Carbon::now()->format('d/m/Y');

          $count = StaffStatistic::where('staff_id',$staff_id)->orderBy('id','desc')->value('count');
          $date_statistic = StaffStatistic::where('staff_id',$staff_id)->orderBy('id','desc')->value('date');
          $id = StaffStatistic::where('staff_id',$staff_id)->orderBy('id','desc')->value('id');
          $staff_id_statistic = StaffStatistic::where('staff_id',$staff_id)->orderBy('id','desc')->value('staff_id');

          if($date_statistic == $date && $staff_id_statistic == $staff_id) {
            $statistic = StaffStatistic::findOrFail($id);
            $statistic->count = $count+1;
            $statistic->update();
          } else {
            $statistic = new StaffStatistic;
            $statistic->staff_id = $staff_id;
            $statistic->date = $date;
            $statistic->count = 1;
            $statistic->save();
          }

          return redirect()->intended(route('staff.home'));
       }
       
       return redirect()->back()->withInput($request->only('username','remember'));
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    public function editStaff($id) {
      $staff = Staff::findOrFail($id);
      return view('authStaff/edit-staff')->with('staff',$staff);
    }

    public function editStaffPost(Request $request) {
      $id = $request->get('id');
      $staff = Staff::findOrFail($id);

      if($request->get('password') == '') {
        $staff->update($request->except('password'));
      } else {
        $staff['name'] = $request->get('name');
        $staff['role'] = $request->get('role');
        $staff['status'] = $request->get('status');
        $staff['username'] = $request->get('username');
        $staff['password'] = bcrypt($request->get('password'));
        $staff->update();
      }
      
      return redirect()->action('AuthStaff\RegisterController@ShowRegisterForm');
    }

    public function logout(Request $request)
    {
        Auth::guard('staff')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->intended(route('staff.login'));
    }
}
