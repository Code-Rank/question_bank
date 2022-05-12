<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\DB;

class book extends Controller
{
    function show(){
        $data=DB::table('book')
        ->join('classes', 'classes.id', '=', 'book.class_id')
        ->select('book.*',  'classes.c_name')
        ->get();
        return view('admin/book')->with('data',$data);
    }
    function show_form(){
        $class_data=DB::table('classes')->get();
      
        return view('admin/add_book',[
            'class_data'=>$class_data,
           
        ]);
    }
    function show_update_form($id){
        $data=DB::table('book')->where('book_id',$id)->first();
        $class_data=DB::table('classes')->get();
        
        return view('admin/update_book',[

         'data'=>$data,
         'class_data'=>$class_data,
         

        ]);
    }
    function delete($id){
       $data= DB::table('book')->where('book_id',$id)->delete();
       if($data){
        session()->flash('message_delete_suc','Record Delete successfully');    
      }
       else{
        session()->flash('message_delete_unsuc',' unsuccessfully Deletetion');   
       }
        return redirect('admin/book');

    }
    function insert(request $data){
        $data->validate([
            'book_name'=>'required|max:50',
          
                'class_select'=>'required',
         
            ]);
    DB::table('book')->insert(array(
    'book_name'=>$data->post('book_name'),
  
    'class_id'=>$data->post('class_select'),
    ));
   $data->session()->flash('message','Data saved successfully');
    return redirect('admin/book/add_book');

    }
    function update_book(request $data,$id){
        $data->validate([
            'book_name'=>'required|max:50',
            
                'class_select'=>'required',
         
            ]);
            $check=DB::table('book')->where('book_id',$id)->update(array(
    'book_name'=>$data->post('book_name'),
    
    'class_id'=>$data->post('class_select'),
    ));
    if($check){
        session()->flash('message_update_suc','Record Update successfully');
    }
    else{
        session()->flash('message_update_unsuc','unsuccessfull Updation');   
    }
    return redirect('admin/book');

    }
}
