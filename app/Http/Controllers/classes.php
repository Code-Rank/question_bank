<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\DB;
class classes extends Controller
{
    function show(){
        $data=DB::table('classes')->get();
        return view('admin/classes')->with('data',$data);
    }
    function show_form(){
        return view('admin/add_class');
    }
    function show_update_form($id){
        $data=DB::table('classes')->where('id',$id)->first();
       
        return view('admin/update_class',[

         'data'=>$data,          
        ]);
    }
    function delete($id){
       $data= DB::table('classes')->where('id',$id)->delete();
       if($data){
        session()->flash('message_delete_suc','Record Delete successfully');    
       }
       else{
        session()->flash('message_delete_unsuc',' unsuccessfully Deletetion');   
       }
        return redirect('admin/classes');

    }
    function insert(request $data){
        $data->validate([
            'class_name'=>'required|max:50',
         
            ]);
    DB::table('classes')->insert(array(
    'c_name'=>$data->post('class_name')
    ));
   $data->session()->flash('message','Data saved successfully');
    return redirect('admin/classes/add_class');

    }
    function update_class(request $data,$id){
        $data->validate([
            'class_name'=>'required|max:50',
         
            ]);

    $check=DB::table('classes')->where('id',$id)->update(array(
    'c_name'=>$data->post('class_name')
    ));
    if($check){
        session()->flash('message_update_suc','Record Update successfully');
    }
    else{
        session()->flash('message_update_unsuc','unsuccessfull Updation');   
    }
    return redirect('admin/classes');

    }
}
