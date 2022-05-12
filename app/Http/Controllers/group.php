<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\DB;
class group extends Controller
{
    function show(){
        return view('admin/group')->with('data',DB::table('group')->get());
    }

    function show_form(){
        return view('admin/add_group');
    }
    function show_update_form($id){
        $data=DB::table('group')->where('id',$id)->first();
       
        return view('admin/update_group',[

         'data'=>$data,          
        ]);
    }
    function delete($id){
       $data= DB::table('group')->where('id',$id)->delete();
       if($data){
        session()->flash('message_delete_suc','Record Delete successfully');    
       }
       else{
        session()->flash('message_delete_unsuc',' unsuccessfully Deletetion');   
       }
        return redirect('admin/group');

    }
    function insert(request $data){
        $data->validate([
            'group_name'=>'required|max:50',
         
            ]);
    DB::table('group')->insert(array(
    'g_name'=>$data->post('group_name')
    ));
   $data->session()->flash('message','Data saved successfully');
    return redirect('admin/group/add_group');

    }
    function update_group(request $data,$id){
        $data->validate([
            'group_name'=>'required|max:50',
         
            ]);

    $check=DB::table('group')->where('id',$id)->update(array(
    'g_name'=>$data->post('group_name')
    ));
    if($check){
        session()->flash('message_update_suc','Record Update successfully');
    }
    else{
        session()->flash('message_update_unsuc','unsuccessfull Updation');   
    }
    
    return redirect('admin/group');

    }
}
