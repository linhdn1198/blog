<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Session;
class SettingsController extends Controller
{
    function __construct(){
        $this->middleware('admin');
    }
    public function index()
    {
        return view('admin.settings.settings')->with('settings',Setting::first());
    }

    public function update(Request $request){
        $this->validate($request,
                        [
                            'site_name' => 'required | min:5',
                            'contact_number' => 'required | min:10',
                            'contact_email' => 'required | email',
                            'address' => 'required | min:5',
                        ],
                        [
                            'site_name.required' => 'Tên blog không được để trống.',
                            'site_name.min' => 'Tên blog ít nhất phải có 5 kí tự.',
                            'contact_number.required' => 'Số điện thoại liên hệ không được để trống.',
                            'contact_number.required' => 'Số điện thoại ít nhất phải có 10 kí tự.',
                            'contact_email.required' => 'Email liên hệ không được bỏ trống.',
                            'contact_email.email' => 'Email phải là địa chỉ email.',
                            'address.required' => 'Địa chỉ liên hệ không được để trống',
                            'address.min' => 'Địa chỉ liên hệ ít nhất phải có 5 ký tự'
                        ]);
        $settings = Setting::first();
        $settings->site_name = $request->site_name;
        $settings->contact_number = $request->contact_number;
        $settings->contact_email = $request->contact_email;
        $settings->address = $request->address;
        $settings->save();
        Session::flash('success','Cập nhật thành công');
        return redirect()->route('settings');
    }

}
