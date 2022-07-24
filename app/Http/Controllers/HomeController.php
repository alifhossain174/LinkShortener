<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
}
