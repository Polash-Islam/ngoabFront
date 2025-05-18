<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class FrontController extends Controller
{
    public function index(){

        try{

        $url = DB::table('system_information')->first();

        if(!$url){

          $adminUrl = '';
        }else{
            $adminUrl = $url->system_admin_url;

        }

        $noticeList = DB::table('notices')->latest()->get();
        return view('front.other.index',compact('noticeList','adminUrl'));

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }

    }
}
