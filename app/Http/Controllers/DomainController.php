<?php

namespace App\Http\Controllers;

use Request;
use DB;
use Auth;

class DomainController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!(Auth::user()->level >= 1))
        {
            exit('没有权限');
        }
        $domain = DB::table('domains')->orderBy('id','desc')->get();
        return view('domains.index',['domain' => $domain]);
    }

    public function create()
    {
        if(!(Auth::user()->level >= 1))
        {
            exit('没有权限');
        }
        return view('domains.create');
    }

    public function store()
    {
        if(!(Auth::user()->level >= 1))
        {
            exit('没有权限');
        }
        $domain = Request::input('domain','');
        $domain = str_replace('https://', '', $domain);
        $domain = str_replace('http://', '', $domain);
        $domain = str_replace('/', '', $domain);
        if(DB::table('domains')->where('domain',$domain)->first())
        {
            echo "<script>alert('域名已存在')</script>";
            echo "<script>history.go(-1)</script>";
            exit();
        }
        $storeData = [];
        $storeData['domain'] = $domain;
        $storeData['created_at'] = date('Y-m-d H:i:s',time());
        $storeData['updated_at'] = date('Y-m-d H:i:s',(time()-86400));
        DB::table('domains')->insert($storeData);
        return redirect('/domain');
    }

    public function destroy($id)
    {
        if(!(Auth::user()->level >= 1))
        {
            exit('没有权限');
        }
        DB::table('domains')->where('id',$id)->delete();
        return redirect('/domain');
    }
}
