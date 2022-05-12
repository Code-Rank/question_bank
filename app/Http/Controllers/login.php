<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\Db;

class login extends Controller
{
    function login(){
        return view('login');
    }

    function auth(request $data ){
        $store=DB::table('admin')->where('user_name',$data->post('user'))->where('password',$data->post('password'))->get();
        
        if(isset($store[0]->user_name)){
            $data->session()->put('admin_mail',$store[0]->user_name);
            $data->session()->put('admin_name',$store[0]->password);
            return view('admin/home');
        }
        else{
            $data->session()->flash('error','password or user name does not match');
            return redirect('/');
        }

    }
    function logout(){
       
        Session()->flush();
       
    return redirect("/");
     


    }


}
