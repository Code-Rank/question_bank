<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\DB;

class questionBankObj extends Controller
{
    function show(){
        $data = DB::table('objective_type')
        ->join('chapter', 'chapter.id', '=', 'objective_type.chapter_id')
        ->join('book', 'book.book_id', '=', 'chapter.book_id')
        ->join('classes', 'classes.id', '=', 'book.class_id')
        ->select('objective_type.*', 'chapter.chapter_name', 'classes.c_name','book.book_name')
        ->get();
      
        return view('admin/question_objective')->with('data',$data);
    }
    function show_form(){
        $class = DB::table('classes') ->get();
        $group=DB::table('group') ->get();
     
        return view('admin/add_objective',['data'=>$class,'group'=>$group]);
    }
    function insert(request $data){


         $data->validate([
            'Question_eng.*'=>'required|max:200',
            'option1.*'=>'required|max:100',
            'option2.*'=>'required|max:100',
            'option3.*'=>'required|max:100',
            'option4.*'=>'required|max:100',

            'class_select'=>'required',
            'book_select'=>'required',
            'chapter_select'=>'required',
           
         
            ]); 
          


            $objective_eng=$data->post('Question_eng');
            $objective_urdu=$data->post('Question_urdu');
            $objective_option1=$data->post('option1');
            $objective_option2=$data->post('option2');
            $objective_option3=$data->post('option3');
            $objective_option4=$data->post('option4');
            $objective_chapter=$data->post('chapter_select');
            $objective_class=$data->post('class_select');
            $objective_book=$data->post('book_select');

            foreach($objective_eng as $key=>$value){
            $objective['question_eng']=$objective_eng[$key];
            $objective['question_urdu']=$objective_urdu[$key];
            $objective['option_1']=$objective_option1[$key];
            $objective['option_2']=$objective_option2[$key];
            $objective['option_3']=$objective_option3[$key];
            $objective['option_4']=$objective_option4[$key];
            $objective['chapter_id']=$objective_chapter;
            $objective['class_id']=$objective_class;
            $objective['book_id']=$objective_book;

            DB::table('objective_type')->insert($objective);     
           }
            
    
          $data->session()->flash('message','Data saved successfully');
          return redirect('admin/objective/add_objective');

    }


    function show_update_form($id){
        $data=DB::table('objective_type')->where('id',$id)->first();
        session()->put('bookid',$data->book_id);
        session()->put('chapterid',$data->chapter_id);
        
 
        $class=DB::table('classes')->get();
        $book=DB::table('book')->where('book_id',$data->book_id)->get();
        $chapter=DB::table('chapter')->where('id',$data->chapter_id)->get();
        return view('admin/update_objective',[

         'data'=>$data,  
         'class'=>$class, 

         'book'=>$book,  
         'chapter'=>$chapter,  
      
        ]);
    }


    function update_objective(request $data,$id){
        $data->validate([
            'Question_eng'=>'required|max:200',
            'option1'=>'required|max:100',
            'option2'=>'required|max:100',
            'option3'=>'required|max:100',
            'option4'=>'required|max:100',

            'class_select'=>'required',
            'book_select'=>'required',
            'chapter_select'=>'required',
           
         
            ]);
            $check= DB::table('objective_type')->where('id',$id)->update(array(
                'chapter_id'=>$data->post('chapter_select'),
                'class_id'=>$data->post('class_select'),
                'book_id'=>$data->post('book_select'),
          'option_1'=>$data->post('option1'),
          'option_2'=>$data->post('option2'),
          'option_3'=>$data->post('option3'),
          'option_4'=>$data->post('option4'),
          'question_eng'=>$data->post('Question_eng'),
          'question_urdu'=>$data->post('Question_urdu'),
      
                 ));

            if($check){
            session()->flash('message_update_suc','Record Update successfully');
            }
            else{
            session()->flash('message_update_unsuc','unsuccessfull Updation');   
            }
            return redirect('admin/question_objective');

    }


    function delete($id){
        $data= DB::table('objective_type')->where('id',$id)->delete();
        if($data){
         session()->flash('message_delete_suc','Record Delete successfully');    
        }
        else{
         session()->flash('message_delete_unsuc',' unsuccessfully Deletetion');   
        }
         return redirect('admin/question_objective');
 
     }

      function getbook(Request $request){

      $value=session('bookid');
       

		$cid=$request->post('class_id');
		$book=DB::table('book')->where('class_id',$cid)->get();
		
        $html='<option value="">Select book</option>';
		foreach($book as $list){
           if($value == $list->book_id){
			$html.='<option value="'.$list->book_id.'" selected>'.$list->book_name.'</option>';
           }
           else{
            $html.='<option value="'.$list->book_id.'">'.$list->book_name.'</option>'; 
           }

		}
		echo $html;
	}

   

    function getchapter(Request $request){
		$bid=$request->post('book_id');
        $value=session('chapterid');
		$chapter=DB::table('chapter')->where('book_id',$bid)->get();
		
        $html='<option value="">Select chapter</option>';
		foreach($chapter as $list){
            if($value == $list->id){
                $html.='<option value="'.$list->id.'" selected>'.$list->chapter_name.'</option>';
               }
               else{
                $html.='<option value="'.$list->id.'">'.$list->chapter_name.'</option>';
               }
			
		}
		echo $html;
	}
}
