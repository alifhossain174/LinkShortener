<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function redirectToActual($id)
    {
        $data = DB::table('u_r_l_s')->where('generated_url', $id)->first();
        DB::table('u_r_l_s')->where('generated_url', $id)->update([
            'click' => $data->click + 1
        ]);
        return redirect($data->actual_url);
    }
}
