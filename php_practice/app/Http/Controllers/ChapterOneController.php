<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChapterOneController extends Controller
{
    //
    public function sample_1_get()
    {
        return view('chap_one/sample_1');
    }

    //
    public function sample_1_post()
    {
        return 'hello ' . $_POST['name'];
    }

    //
    public function sample_1_check_len()
    {
        echo 'lengh of abc is ' . trim(strlen('abc'));
    }
}
