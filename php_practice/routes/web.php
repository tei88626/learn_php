<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/phpver', function(){
    return phpinfo();
});

Route::get ('answers', function()
{
    header("Location: https://www.oreilly.co.jp/pub/9784873117935/php_appB.pdf");
    exit();
});

//chap 1
//D:\tei\Study\Repsitories\learn_php\php_practice\app\Http\Controllers\ChapterOneController.php
//D:\tei\Study\Repsitories\learn_php\php_practice\resources\views\chap_one\sample_1.blade.php

Route::get('/chap1_sample1', 'ChapterOneController@sample_1_get');
Route::post('/chap1_sample1', 'ChapterOneController@sample_1_post');

Route::get('/chap1_sample1/checklen', 'ChapterOneController@sample_1_check_len');

//chap 2
Route::get('/chap2_sample', 'ChapterTwoController@samples');

//chap 3
Route::get('/chap3_sample', 'ChapterThreeToSevenController@samples_chap3');

//chap 4
Route::get('/chap4_sample', 'ChapterThreeToSevenController@samples_chap4');

//chap 5
Route::get('/chap5_sample', 'ChapterThreeToSevenController@samples_chap5');

//chap 6
Route::get('/sample_chap6', 'ChapterThreeToSevenController@samples_chap6');

//chap 7
Route::get('/sample_chap7', 'ChapterThreeToSevenController@samples_chap7_get');
Route::post('/sample_chap7', 'ChapterThreeToSevenController@samples_chap7_post');

//chap8
Route::get('/sample_chap8', 'ChapterEightAndAfterController@chap8_sample_dbsample');

//chap9
Route::get('/sample_chap9', 'ChapterEightAndAfterController@chap9_sample');

//chap10
Route::get('/sample_chap10', 'ChapterEightAndAfterController@chap10_sample');
Route::post('/sample_chap10', 'ChapterEightAndAfterController@chap10_postinfo');

//chap11
Route::get('/sample_chap11', 'ChapterEightAndAfterController@chap11_sample');

//chap12
Route::get('/sample_chap12', 'ChapterEightAndAfterController@chap12_sample');