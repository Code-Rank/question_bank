<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\DB;

class questionBankSub extends Controller
{
    function show(){
        $data = DB::table('subjective_type')
        ->join('chapter', 'chapter.id', '=', 'subjective_type.chapter_id')
        ->join('classes', 'classes.id', '=', 'subjective_type.class_id')
        ->join('book', 'book.book_id', '=', 'subjective_type.book_id')
        ->select('subjective_type.*', 'chapter.chapter_name', 'classes.c_name','book_name')
        ->get();
        //print_r($data);
        return view('admin/question_subjective')->with('data',$data);
    }
    function show_form(){
        $data = DB::table('classes')->get();
       // print_r($data);
        return view('admin/add_subjective')->with('data',$data);
    }
    function insert(request $data){


        
        $data->validate([
            'Question_eng.*'=>'required|max:200',
            'Question_urdu.*'=>'required|max:200',
            'class_select'=>'required',
            'book_select'=>'required',
            'chapter_select'=>'required',
            'question_type.*'=>'required',
         
            ]);


            $subjective_eng=$data->post('Question_eng');
            $subjective_urdu=$data->post('Question_urdu');
            $subjective_questionType=$data->post('question_type');
            $subjective_chapter=$data->post('chapter_select');
            $subjective_class=$data->post('class_select');
            $subjective_book=$data->post('book_select');

            foreach($subjective_eng as $key=>$value){
            $subjective['question_eng']=$subjective_eng[$key];
            $subjective['question_urdu']=$subjective_urdu[$key];
            $subjective['question_type']=$subjective_questionType[$key];
            $subjective['chapter_id']=$subjective_chapter;
            $subjective['class_id']=$subjective_class;
            $subjective['book_id']=$subjective_book;

            DB::table('subjective_type')->insert($subjective);     
           }
        
     
          $data->session()->flash('message','Data saved successfully');
          return redirect('admin/subjective/add_subjective');

    }


    function show_update_form($id){
        $class=DB::table('classes')->get();
        $data=DB::table('subjective_type')
        ->join('chapter', 'chapter.id', '=', 'subjective_type.chapter_id')
        ->join('classes', 'classes.id', '=', 'subjective_type.class_id')
        ->join('book', 'book.book_id', '=', 'subjective_type.book_id')
        ->select('subjective_type.*', 'chapter.chapter_name', 'classes.c_name','book_name')
        ->first();

       
       
        return view('admin/update_subjective',[

         'data'=>$data,  
         'class'=>$class, 
                 
        ]);
    }


    function update_subjective(request $data,$id){
        $data->validate([
            'Question_eng'=>'required|max:200',
            'Question_urdu'=>'required|max:100',
            'class_select'=>'required',
            'book_select'=>'required',
            'chapter_select'=>'required',
           
         
            ]);
        
            $check=DB::table('subjective_type')->where('id',$id)->update(array(
                'chapter_id'=>$data->post('chapter_select'),
                'class_id'=>$data->post('class_select'),
                'book_id'=>$data->post('book_select'),
          'question_eng'=>$data->post('Question_eng'),
          'question_urdu'=>$data->post('Question_urdu'),
          'question_type'=>$data->post('question_type'),
          

           ));

            if($check){
            session()->flash('message_update_suc','Record Update successfully');
            }
            else{
            session()->flash('message_update_unsuc','unsuccessfull Updation');   
            }
            return redirect('admin/question_subjective');

    }


    function delete($id){
        $data= DB::table('subjective_type')->where('id',$id)->delete();
        if($data){
         session()->flash('message_delete_suc','Record Delete successfully');    
        }
        else{
         session()->flash('message_delete_unsuc',' unsuccessfully Deletetion');   
        }
         return redirect('admin/question_subjective');
 
     }


     function getbook(Request $request){

           $value=session('bookid');
         
  
          $cid=$request->post('class_id');
          $book=DB::table('book')->where('class_id',$cid)->get();
          
          $html='<option value="">Select book</option>';
          foreach($book as $list){
              $html.='<option value="'.$list->book_id.'">'.$list->book_name.'</option>'; 
           
  
          }
          echo $html;
      }
  
     
  
      function getchapter(Request $request){
          $bid=$request->post('book_id');
          $value=session('chapterid');
          $chapter=DB::table('chapter')->where('book_id',$bid)->get();
          
          $html='<option value="">Select chapter</option>';
          foreach($chapter as $list){
           
              
                  $html.='<option value="'.$list->id.'">'.$list->chapter_name.'</option>';
                
              
          }
          echo $html; 
     } 

 

   }
