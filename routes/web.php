<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\login;
use App\Http\Controllers\questionBankObj;
use App\Http\Controllers\questionBankSub;
use App\Http\Controllers\classes;
use App\Http\Controllers\group;
use App\Http\Controllers\chapter;
use App\Http\Controllers\book;
use App\Http\Controllers\generator;
use Dompdf\Dompdf;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
});
 */
//Route::get('admin/download',[generator::class,'gen_test']);
Route::get('/',[login::class,'login']);
Route::get('admin/logout',[login::class,'logout']);
Route::post('admin/home',[login::class,'auth']);
Route::get('admin/classes',[classes::class,'show']);
Route::get('admin/classes/add_class',[classes::class,'show_form']);
Route::post('admin/classes/insert_class',[classes::class,'insert']);
Route::get('admin/classes/delete_class/{id}',[classes::class,'delete']);
Route::get('admin/classes/update_class/{id}',[classes::class,'show_update_form']);
Route::post('admin/classes/update_class_insert/{id}',[classes::class,'update_class']);

Route::get('admin/group',[group::class,'show']);
Route::get('admin/group/add_group',[group::class,'show_form']);
Route::post('admin/group/insert_group',[group::class,'insert']);
Route::get('admin/group/delete_group/{id}',[group::class,'delete']);
Route::get('admin/group/update_group/{id}',[group::class,'show_update_form']);
Route::post('admin/group/update_group_insert/{id}',[group::class,'update_group']);

Route::get('admin/chapter',[chapter::class,'show']);
Route::get('admin/chapter/add_chapter',[chapter::class,'show_form']);
Route::post('admin/chapter/insert_chapter',[chapter::class,'insert']);
Route::get('admin/chapter/update_chapter/{id}',[chapter::class,'show_update_form']);
Route::post('admin/chapter/update_chapter_insert/{id}',[chapter::class,'update_chapter']);
Route::get('admin/chapter/delete_chapter/{id}',[chapter::class,'delete']);

Route::get('admin/question_objective',[questionBankObj::class,'show']);
Route::get('admin/objective/add_objective',[questionBankObj::class,'show_form']);
Route::post('admin/objective/insert_objective',[questionBankObj::class,'insert']);
Route::get('admin/question_objective/update_objective/{id}',[questionBankObj::class,'show_update_form']);
Route::post('admin/question_objective/update_objective_insert/{id}',[questionBankObj::class,'update_objective']);
Route::get('admin/question_objective/delete_objective/{id}',[questionBankObj::class,'delete']);
Route::post('admin/objective/getbook',[questionBankObj::class,'getbook']);
Route::get('admin/objective/getchapter',[questionBankObj::class,'getchapter']);


Route::get('admin/question_subjective',[questionBankSub::class,'show']);
Route::get('admin/subjective/add_subjective',[questionBankSub::class,'show_form']);
Route::post('admin/subjective/insert_subjective',[questionBankSub::class,'insert']);
Route::get('admin/question_subjective/update_subjective/{id}',[questionBankSub::class,'show_update_form']);
Route::post('admin/question_subjective/update_subjective_insert/{id}',[questionBankSub::class,'update_subjective']);
Route::get('admin/question_subjective/delete_subjective/{id}',[questionBankSub::class,'delete']);

Route::post('admin/subjective/getbook',[questionBankSub::class,'getbook']);
Route::get('admin/subjective/getchapter',[questionBankSub::class,'getchapter']);


Route::get('admin/book',[book::class,'show']);
Route::get('admin/book/add_book',[book::class,'show_form']);
Route::post('admin/book/insert_book',[book::class,'insert']);
Route::get('admin/book/update_book/{id}',[book::class,'show_update_form']);
Route::post('admin/book/update_book_insert/{id}',[book::class,'update_book']);
Route::get('admin/book/delete_book/{id}',[book::class,'delete']);
Route::get('admin/generator',[generator::class,'show']);

Route::post('admin/generator_test',[generator::class,'gen_test']);
Route::post('admin/generate/getbook',[generator::class,'getbook']);
Route::get('admin/generate/getchapter',[generator::class,'getchapter']);