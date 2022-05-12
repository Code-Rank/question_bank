@extends('admin/home') 
@section('title','generator test ') 
@section('contain')

        <!-- DATA TABLE-->
<div id="pdfdocument">
      <page size="A4" > 
  <!-- CSS Code: Place this code in the document's head (between the 'head' tags) -->
<!-- <style>
table.GeneratedTable {
  width: 100%;
  background-color: #ffffff;
  border-collapse: collapse;
  border-width: 1px;
  border-color: #000000;
  border-style: solid;
  color: #000000;
}

table.GeneratedTable td, table.GeneratedTable th {
  border-width: 1px;
  border-color: #000000;
  border-style: solid;
}

table.GeneratedTable thead {
  background-color: #ffffff;
}

</style> -->


<!-- HTML Code: Place this code in the document's body (between the 'body' tags) where the table should appear -->
<div class="t1">
	
<table>
	<tbody style="font-size:12px;">
		<tr>
			<!-- <td></td> -->
			<td colspan="5"><center><b style="font-size:30px;">ASIM SCIENCE ACADEMY </b></center></td>
		</tr>
		<tr > 
			<td>Name:</td>
			<td colspan="3" rowspan="3" style="text-align:center;">
                <p>{{$book->book_name}}&nbsp;&nbsp;{{$class->c_name}}</p>
                <br>
                <p>Syllabus
					@foreach($chapter as $list)
					{{$list->chapter_no}},
					@endforeach
				</p>

            </td>
			<td>Date:&nbsp;&nbsp;&nbsp;&nbsp;{{$dt}}</td>
		</tr>
		<tr>
			<td>Roll No:</td>
			<td>Total Marks: {{$totalMarks}}</td>
		</tr>
		<tr>
			<td>Time:2 hour</td>
			<td>Obtain Marks:</td>
		</tr>
	</tbody>
</table>
</div>
<div class="t2">
<table>
	<tbody style="font-size:12px;">
		<tr>
			<td>Q#</td>
			<td>A</td>
			<td>B</td>
			<td>C</td>
			<td>D</td>
			<td>Q#</td>
			<td>A</td>
			<td>B</td>
			<td>C</td>
			<td>D</td>
			<td>Q#</td>
			<td>A</td>
			<td>B</td>
			<td>C</td>
			<td>D</td>
			<td>Q#</td>
			<td>A</td>
			<td>B</td>
			<td>C</td>
			<td>D</td>
			<td>Q#</td>
			<td>A</td>
			<td>B</td>
			<td>C</td>
			<td>D</td>
		</tr>
		<tr>
			<td>01</td>
			<td><div class="circle"></div></td>
			<td><div class="circle"></div></td>
			<td><div class="circle"></div></td>
			<td><div class="circle"></div></td>
			<td>02</td>
			<td><div class="circle"></div></td>
			<td><div class="circle"></div></td>
			<td><div class="circle"></div></td>
			<td><div class="circle"></div></td>
			<td>03</td>
			<td><div class="circle"></div></td>
			<td><div class="circle"></div></td>
			<td><div class="circle"></div></td>
			<td><div class="circle"></div></td>
			<td>04</td>
			<td><div class="circle"></div></td>
			<td><div class="circle"></div></td>
			<td><div class="circle"></div></td>
			<td><div class="circle"></div></td>
			<td>05</td>
			<td><div class="circle"></div></td>
			<td><div class="circle"></div></td>
			<td><div class="circle"></div></td>
			<td><div class="circle"></div></td>
		</tr>
		<tr>
			<td>06</td>
			<td><div class="circle"></div></td>
			<td><div class="circle"></div></td>
			<td><div class="circle"></div></td>
			<td><div class="circle"></div></td>
			<td>07</td>
			<td><div class="circle"></div></td>
			<td><div class="circle"></div></td>
			<td><div class="circle"></div></td>
			<td><div class="circle"></div></td>
			<td>08</td>
			<td><div class="circle"></div></td>
			<td><div class="circle"></div></td>
			<td><div class="circle"></div></td>
			<td><div class="circle"></div></td>
			<td>09</td>
			<td><div class="circle"></div></td>
			<td><div class="circle"></div></td>
			<td><div class="circle"></div></td>
			<td><div class="circle"></div></td>
			<td>10</td>
			<td><div class="circle"></div></td>
			<td><div class="circle"></div></td>
			<td><div class="circle"></div></td>
			<td><div class="circle"></div></td>
		</tr>
	</tbody>
</table>
</div>
<div class='t3' >
<table >
	<tbody>
     <td colspan="25" style="width:95%;"><p style="font-size:11px;text-align:right;" ><b> سوال نمبر 1:ہر سوال کو غور سے پڑھیں۔ درست جواب کے خط کے مطابق دائرے کو پُر کریں۔ حلقوں پر نشان نہ لگائیں، دائرہ کریں، کراس کریں یا انڈر لائن نہ کریں۔ ہر ایک سوال کے 
     لیے صرف<br> ایک دائرہ بھریں۔ اگر ایک سوال کے لیے ایک سے زیادہ حلقے بھرے جاتے ہیں، تو اس سوال کے لیے آپ کا جواب غلط ہوگا۔
</b></p></td>

<?php $i=1;?>
        @foreach($mcq as $list)
	   

		<tr>
			<td style="width:2%;"><p style="font-size:12px;"> {{$i}})</p></td>
			<td colspan="11" style="width:38%;"><p style="font-size:12px;">{{$list->question_eng}}</p>
            </td>
			<td colspan="12" style="width:38%;" ><p style="font-size:12px;text-align:right;">{{$list->question_urdu}}</p></td>
			<td style="width:2%;"><p style="font-size:12px;">({{$i}}</p></td>
		</tr>
		<tr>
			<td><p style="font-size:12px;">A</p></td>
			<td colspan="5"><p style="font-size:12px;">  {{$list->option_1}}  </p></td>
			<td style="width:2%;"><p style="font-size:12px;">B</p></td>
			<td colspan="5"><p style="font-size:12px;">  {{$list->option_2}}  </p></td>
			<td style="width:2%;"><p style="font-size:12px;">C</p></td>
			<td colspan="5"><p style="font-size:12px;">  {{$list->option_3}} </p></td>
			<td style="width:2%;"><p style="font-size:12px;">D</p></td>
			<td colspan="5"><p style="font-size:12px;">  {{$list->option_4}}  </p></td>
			<td></td>
		</tr>
		<?php $i++;?>
       @endforeach

	 
	</tbody>
</table>

</div>
<div class='t4'>
<table>
	<tbody>
		<tr>
			<td colspan="2" style="width:8%;"><p style="font-size:12px;"><b>Q#2:</b></p></td>
            <td colspan="9"><p style="font-size:12px;">Write short answer of given question </p></td>
			<td colspan="3"><p style="font-size:12px;text-align:center;">{{session('short')}}*{{session('short_marks')}}={{session('short')*session('short_marks')}}</p></td>
			<td colspan="9"><p style="font-size:12px;text-align:right;">دیئے گئے سوال کا مختصر جواب لکھیں۔</p></td>
            <td colspan="2" style="width:8%;"><p style="font-size:12px;">  <b>:2سوال نمبر </b></p></td>
		</tr>
        <?php $j=1;?>
        @foreach($sq as $list)
		<tr>
			<td><p style="font-size:12px;">{{$j}})</p></td>
			<td colspan="11"><p style="font-size:12px;">{{$list->question_eng}}</p></td>
			<td colspan="12"><p style="font-size:12px;text-align:right;">{{$list->question_urdu}}</p></td>
			<td><p style="font-size:12px;">({{$j}}</p></td>
		</tr>
		<?php $j++;?>
        @endforeach
	</tbody>
</table>
</div>
<div class='t4'>
<table>
	<tbody>
		<tr>
			<td colspan="2" style="width:8%;"><p style="font-size:12px;"><b>Q#3:</b></p></td>
            <td colspan="9"><p style="font-size:12px;">Write detail answer of given question </p></td>
			<td colspan="3"><p style="font-size:12px;text-align:center;">{{session('long')}}*{{session('long_marks')}}={{session('long')*session('long_marks')}}</p></td>
			<td colspan="9"><p style="font-size:12px;text-align:right;">دیئے گئے سوال کا تفصیلی جواب لکھیں۔</p></td>
            <td colspan="2" style="width:8%;"><p style="font-size:12px;">  <b>:3سوال نمبر </b></p></td>
		</tr>
        <?php $k=1;?>
        @foreach($lq as $list)
		<tr>
			<td><p style="font-size:12px;">{{$k}})</p></td>
			<td colspan="11"><p style="font-size:12px;">{{$list->question_eng}} </p></td>
			<td colspan="12"><p style="font-size:12px;text-align:right;">{{$list->question_urdu}}
</p></td>
			<td><p style="font-size:12px;">({{$k}}</p></td>
		</tr>
		<?php $k++;?>
        @endforeach
	</tbody>
</table>
</div>

<!-- Codes by Quackit.com -->


    

</page> 
</div>
 <!-- <button  onclick="generatePDF()">Download</button>  -->
<script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>

<script>


	function generatePDF(){

		const element=document.getElementById('pdfdocument');
		
		html2pdf(element, {
			
  filename:     'myfile.pdf',
  image:        { type: 'jpeg', quality: 0.98 },
  html2canvas:  { scale: 2, logging: false, dpi: 192, letterRendering: false },
  jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' }
});
	}
</script>

        <!-- END DATA TABLE-->
    

@endsection

