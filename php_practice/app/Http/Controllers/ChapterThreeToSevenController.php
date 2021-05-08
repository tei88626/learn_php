<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ChapterThreeToSevenController;

class ChapterThreeToSevenController extends Controller
{
    //chap 3
    public function samples_chap3()    {
        echo '<h5>chap 3. page 54 </h5> <br>';
        echo 'no 1, no 2 omit <br>';
        echo 'no3 <br>';
        $f = -50;
        echo 'method while <br>'; 
        while($f <= 50)
        {
            printf("%d degrees F (equals %d degrees C).",$f,($f-32) * (5/9));
            echo '<br>';
            $f+=5;
        }
        echo 'method for <br>';

        for ($i = -50; $i<= 50; $i+=5)
        {
            printf("%d degrees F (equals %d degrees C).",$i,($i-32) * (5/9));
            echo '<br>';
        }
    }

    public function samples_chap4()    {
        echo '<h5>chap 4. page 54 </h5> <br>'; 
        //array_key_exists();

        $array_foo = ['a' => 'apple', 'b' => 'banna'];
        if(array_key_exists('a', $array_foo))
        {
            echo 'array_key_exists: true';
        };

        echo '<br>';
        $cities = ['city a' => 10000, 'city b' => 2000];

        $total = 0;

        foreach($cities as $city => $count)
        {
            echo "$city: $count <br>";
            $total += $count;
        }

        echo "$total<br>";
        asort($cities);

        foreach($cities as $city => $count)
        {
            echo "$city: $count <br>";
        }

    }

    //chap5////////////////////////////////////////////
    public function samples_chap5()    {
        //関数参照
        self::samples_chap5_foo_func();
        self::samples_chap5_bar_func('p');
        echo self::samples_chap5_return_func('return');

        //cant get cause by laravel.
        $url = "/images/foo.jpg";
        echo self::samples_chap5_showimg($url);
        echo '<p><img src="/content/img/pic1-thumb.png" alt="ケーキ" /></p>';
        echo '<br>';
        self::samples_chap5_webcolor("255", "0", "255", false);
    }
    
    public function samples_chap5_foo_func()    {
        echo 'some function <br>';
    }

    public function samples_chap5_bar_func($param)    {
        echo "some function with param: $param <br>";
    }

    public function samples_chap5_return_func($param)    {
        return $param . '<br>';
    }

    public function samples_chap5_showimg($url, $alt = null, $height = null, $width = null)    {
        $html = '<img src = "' . $url . '"';
        $html .= '/>';
        if(isset($alt))
        {
            $html .= 'alt = "' . $alt > '"';
        }
        return $html;
    }

    public function samples_chap5_webcolor($r, $g, $b, $usedechex)    {
        if($usedechex){
            echo 'dechex';
        }   
        echo sprintf('#%02x%02x%02x', $r, $g, $b); 
    }
    //chap5////////////////////////////////////////////

    //chap6
    public function samples_chap6()    {
        $c6c = new Chap6Class(1,2,3);
        $c6c;

        $sub_c = new SubChap6Class(4,5,6);
        $sub_c; 
    }

    //chap7
    public function samples_chap7_get()    {
        return view('chap_seven/get');
    }

    public function samples_chap7_post()    {
        // //check form user and passworkd
        // if($_POST['sometext1'] == "admin"){
        //     echo 'Success: hello admin';        
        // }
        // else{
        //     //
        //     \Session::flash('error', 'text1 shoud not be: ' . $_POST['sometext1']);
        //     return back();
        // }
        self::samples_chap7_validates();
        return back();
    }

    public function samples_chap7_validates(){
        
        $validate_items = array(
            'sometext1' => $_POST['sometext1'] == "admin",
            'sometext2' => $_POST['sometext2'] == "admin",
        );

        if(array_search(false, $validate_items))
        {
            \Session::flash('error', 'something wrong.');
        }
        else
        {
            echo 'Success';
        }
    }

}

class Chap6Class {
    public $p1;
    private $p2;
    protected $p3;

    public function __construct($p1 ,$p2, $p3)
    {
        echo $p1 ,$p2, $p3 . '<br>';
    }
}

class SubChap6Class extends Chap6Class {
    public function __construct($p1 ,$p2, $p3)
    {
        parent::__construct($p1 ,$p2, $p3);
    }
}

