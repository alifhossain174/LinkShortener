<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = DB::table('u_r_l_s')->orderBy('id', 'desc')->paginate(15);
        return view('welcome', compact('data'));
    }

    public function generateUrl(Request $request)
    {
        DB::table('u_r_l_s')->insert([
            'actual_url' => $request->actual_url,
            'generated_url' => time(),
        ]);
        return back();
    }

    public function redirectToActual($id)
    {
        $data = DB::table('u_r_l_s')->where('generated_url', $id)->first();
        DB::table('u_r_l_s')->where('generated_url', $id)->update([
            'click' => $data->click + 1
        ]);
        return redirect($data->actual_url);
    }

    public function deleteUrl($id)
    {
        DB::table('u_r_l_s')->where('id', $id)->delete();
        return back();
    }

    public function changePasswordPage()
    {
        $userInfo = User::where('id', Auth::user()->id)->first();
        return view('changePassword', compact('userInfo'));
    }

    public function changePassword(Request $request)
    {
        $userInfo = User::where('id', Auth::user()->id)->first();
        if (Hash::check($request->password, $userInfo->password)) {
            User::where('id', Auth::user()->id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            if ($request->new_password != '') {
                User::where('id', Auth::user()->id)->update([
                    'password' => Hash::make($request->new_password),
                    'updated_at' => Carbon::now()
                ]);
            }
            Toastr::success('Successfully Chnaged', 'Success');
            return redirect()->back();
        } else {
            Toastr::error('Your given current Password is wrong', 'Wrong Password');
            return redirect()->back();
        }
    }
}
