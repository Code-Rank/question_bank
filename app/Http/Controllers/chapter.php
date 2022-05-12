<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\DB;

class chapter extends Controller
{
    function show(){
        $data = DB::table('chapter')
        ->join('book', 'book.book_id', '=', 'chapter.book_id')
        ->select('chapter.*','book.book_name')
        ->get();
   
   /*  foreach($data as $key=>$list){
       $attribute['id']=$data->id;
        $attribute['chapter_no']=$data->chapter_no;
        $attribute['group_no']=DB::table('group')->select('name')->where('id',$data->group_id)->first();
        $attribute['class_no']=DB::table('class')->select('name')->where('id',$data->class_id)->first();

        
    } */
    /* $data=(array)$data;
    print_r($data); */
    return view('admin/chapter')->with('data',$data);

    }
    function show_form(){
        
        $book_data=DB::table('book')->get();
      
        return view('admin/add_chapter',[
            'book_data'=>$book_data,
           
        ]);
    
        }

        function insert(request $data){
            $data->validate([
                'chapter_no'=>'required|numeric',
                'chapter_name'=>'required|max:50',
                'book_select'=>'required',
                
             
                ]);
             DB::table('chapter')->insert(array(
                 'chapter_no'=>$data->post('chapter_no'),
                 'chapter_name'=>$data->post('chapter_name'),
                 'book_id'=>$data->post('book_select'),
                 
                 ));
                 session()->flash('message','Data saved successfully');
                 return redirect('admin/chapter/add_chapter');
    
        }
        function show_update_form($id){
            $data=DB::table('chapter')->where('id',$id)->first();
            $book_data=DB::table('book')->get();
           
            return view('admin/update_chapter',[
    
             'data'=>$data,
             'book_data'=>$book_data,
         

            ]);
        }


        function update_chapter(request $data,$id){
            $data->validate([
                'chapter_no'=>'required|numeric',
                'chapter_name'=>'required|max:50',
                'book_select'=>'required',
                
             
                ]);
    
                $check=DB::table('chapter')->where('id',$id)->update(array(
                    'chapter_no'=>$data->post('chapter_no'),
                    'chapter_name'=>$data->post('chapter_name'),
                    'book_id'=>$data->post('book_select'),
                    ));
                if($check){
                    session()->flash('message_update_suc','Record Update successfully');
                }
                else{
                    session()->flash('message_update_unsuc','unsuccessfull Updation');   
                }
        
        
        return redirect('admin/chapter');
    
        }

        function delete($id){
            $data= DB::table('chapter')->where('id',$id)->delete();
            if($data){
             session()->flash('message_delete_suc','Record Delete successfully');    
            }
            else{
             session()->flash('message_delete_unsuc',' unsuccessfull Deletetion');   
            }
             return redirect('admin/chapter');
     
         }


}
