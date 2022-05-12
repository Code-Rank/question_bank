<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\DB;

use Carbon\Carbon;

use Dompdf\Dompdf;
use PDF;


    
       
    


class generator extends Controller
{
    public $chap=0;
    public $cls=0;
    public $bk=0;
    function show(){
        $data=DB::table('classes')->get();
        return view('admin/genearator',['data'=>$data]);
    }
     function gen_test(request $data){
       
        $mcq=DB::table('objective_type')
        ->where('class_id',$data->post('class_select'))
        ->where('book_id',$data->post('book_select'))
        ->whereIn('chapter_id',$data->post('chapter_select'))
        ->inRandomOrder()->limit($data->post('objective_question'))
        ->get();
        $sq=DB::table('subjective_type')
        ->where('class_id',$data->post('class_select'))
        ->where('book_id',$data->post('book_select'))
        ->where('question_type','SQ')
        ->whereIn('chapter_id',$data->post('chapter_select'))
        ->inRandomOrder()->limit($data->post('s_question'))
        ->get();
        $lq=DB::table('subjective_type')
        ->where('class_id',$data->post('class_select'))
        ->where('book_id',$data->post('book_select'))
        ->where('question_type','LQ')
        ->whereIn('chapter_id',$data->post('chapter_select'))
        ->inRandomOrder()->limit($data->post('l_question'))
        ->get();
        $class=DB::table('classes')->where('id',$data->post('class_select'))->select('classes.*')->first();
        $book=DB::table('book')->where('book_id',$data->post('book_select'))->select('book.*')->first();
        $chapter=DB::table('chapter')->whereIn('id',$data->post('chapter_select'))->select('chapter.*')->get();
        $chap=$data->post('chapter_select');
        $cls=$data->post('class_select');
        $bk=$data->post('book_select');
        
    

        session()->put('short',$data->post('s_question'));
        session()->put('long',$data->post('l_question'));
        session()->put('short_marks',$data->post('marks_short_question'));
        session()->put('long_marks',$data->post('marks_long_question'));
        session()->put('objective',$data->post('objective_question'));
        $totalMarks=(session('short')*session('short_marks'))+(session('long')*session('long_marks'))+session('objective');


      $date=  Carbon::now();
      

      $currentURL = url()->current();
  
      if($currentURL=="http://127.0.0.1:8000/admin/generator_test"){
      
        return view('admin/test',[

            'mcq'=>$mcq,
            'sq'=>$sq,
            'lq'=>$lq,
            'class'=>$class,
            'book'=>$book,
            'chapter'=>$chapter,
            'dt'=>$date->toDateString(),
            'totalMarks'=>$totalMarks,
        ]);

    }
    if($currentURL=="http://127.0.0.1:8000/admin/downlaod"){
      
        echo "new";
        //dd($currentURL);

    }
        
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
        
           
               $html.='<option  value="'.$list->id.'">'."Chapter ".$list->chapter_no.'-'.$list->chapter_name.'</option>';
             
           
       }
      return Response($html) ;
  } 
}
