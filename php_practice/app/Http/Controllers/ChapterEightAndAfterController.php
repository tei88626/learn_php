<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //DB参照
use DateTime;

class ChapterEightAndAfterController extends Controller
{
    //chap 8 database
    public function chap8_sample_dbsample() {

		$insert = DB::connection('mysql');
        self::chap8_sample_dbinsert();
        $data = DB::select('select * from learnphp_db_table_01');
        //var_dump($data);
        //echo DB::table('learnphp_db_table_01')->get();

        //self::chap8_sample_dbdelete('learnphp_db_table_01');

        foreach(DB::table('learnphp_db_table_01')->get() as $item)
        {
            echo $item->id . ': ' . $item->name . '<br>';
        }
    }

    public function chap8_sample_dbinsert(){
        $now = new DateTime();
        //增加多条记录
        DB::table('learnphp_db_table_01')->insert([
            [
                'id' => 1,
                'name' => "a",

            ],
            [
                'id' => 0011100002,
                'name' => "b",
            ]
        ]); 

    }

    public function chap8_sample_dbdelete($table){
        DB::table($table)->delete();
    }//chap 8/////

    //chap9 file stream
    public function chap9_sample(){       
        echo '<h5>open "adressses.txt" </h5>';
        self::chap9_sample_open_rw_text();

        echo '<h5>open "dishes.csv" </h5>';
        self::chap9_sample_open_rw_csv();

    }

    public function chap9_sample_open_rw_text(){
        // アドレス数を累積する配列
        $addresses = array();

        //dir: D:\tei\Study\Repsitories\learn_php\php_practice\public\
        //config: D:\tei\Study\Repsitories\learn_php\php_practice\config\filesystems.php
        $fh = fopen('addresses.txt','rb');

        if (!$fh) {
            die("Can't open addresses.txt: $php_errormsg");
        }

        while ((! feof($fh)) && ($line = fgets($fh))) {
            $line = trim($line);
            echo $line . '<br>';
            // $addressesではアドレスをキーとして使う
            // 値はアドレスの出現回数
            if (! isset($addresses[$line])) {
                $addresses[$line] = 0;
            }
            $addresses[$line] = $addresses[$line] + 1;
        }

        if (! fclose($fh)) {
            die("Can't close addresses.txt: $php_errormsg");
        }

        // $addressesを要素値で逆順（最大値が最初）にソートする
        arsort($addresses);

        $fh = fopen('addresses-count.txt','wb');

        if (! $fh) {
            die("Can't open addresses-count.txt: $php_errormsg");
        }

        foreach ($addresses as $address => $count) {
            // 末尾に改行を忘れない
            if (fwrite($fh, "$count,$address\n") == false) {
                die("Can't write $count,$address: $php_errormsg");
            }
        }

        if (! fclose($fh)) {
            ie("Can't close addresses-count.txt: $php_errormsg");
        }
    }

    public function chap9_sample_open_rw_csv(){
        $fh = fopen('dishes.csv','rb');
        if (! $fh) {
            die("Can't open dishes.csv: $php_errormsg");
        }
        print "<table>\n";
        while ((! feof($fh)) && ($line = fgetcsv($fh))) {
            // 4章と同様にimplode()を使う
            print "<tr><td>" . implode("</td><td>", $line) . "</td></tr>\n";
        }
        print "</table>";
    }//chap 9/////


    //chap10
    public function chap10_sample(){
        // self::chap10_sample_01();
        //self::chap10_sample_02();
        return view('chap_ten/login');
    }

    public function chap10_postinfo(){
        // echo \Session::get('username') . '<br>';
        // $res = \Session::all();
        // var_dump($res);
        if(\Session::has('login') == 'yes'){
            echo 'You already login, admin';
        }


        if(!\Session::has('login') && isset($_POST['login']))
        {
            if($_POST['username'] != 'admin') {
                \Session::flash('msg1', 'username wrong.');
                return back();
            }
            if($_POST['username'] == 'admin' && $_POST['password'] != 'aaa') {
                \Session::flash('msg2', 'password wrong.');
                return back();
            }        
            \Session::put('login','yes');
            echo 'Welcome, ' . $_POST['username'] . '. ';
        }

        if(isset($_POST['logout']))
        {
            \Session::forget('login');
            \Session::flash('msg', 'log out');
            return back();
        }

        
    }

    public function chap10_sample_01(){
        $view_cookie_count = 1 + ($_COOKIE['view_cookie_count'] ?? 0);
        setcookie('view_cookie_count', $view_cookie_count);
        print "<p>cookie sample - Hi! Number of times you've viewed this page: $view_cookie_count.</p>";
    }

    //page 36
    public function chap10_sample_02(){
        if(isset($_COOKIE['view_count']) && $_COOKIE['view_count'] == 1){
            session_start();
        }
        
        $view_count = 1 + ($_SESSION['view_count'] ?? 0);
        setcookie('view_count', $view_count);
        print "<p>session sample - Hi! Number of times you've viewed this page: $view_count.</p>";
    }//chap 10/////

    //chap11
    public function chap11_sample(Request $request){
        //self::chap11_sample_01($request);
        self::chap11_sample_03($request);
    }

    public function chap11_sample_01(Request $request)
    {
        $res = [
            'name' => 'name_value',
            'age' => 99,
            'gender' => 'male',
        ];

        var_dump(response()->json($res));
    }

    public function chap11_sample_02(Request $request){
        $json = file_get_contents("http://php.net/releases/?json");
        if ($json == false) {
            print "Can't retrieve feed.";
        }
        else {
            $feed = json_decode($json, true);
            // $feedはトップレベルキーがメジャーリリース番号の配列である
            // まず最大の番号を取得する必要がある
            $major_numbers = array_keys($feed);
            rsort($major_numbers);

            $biggest_major_number = $major_numbers[0];
            
            // この配列のメジャー番号キーの「version」要素が
            // そのメジャーバージョン番号の最新リリースである
            $version = $feed[$biggest_major_number]['version'];
            print "The latest version of PHP released is $version.";
        }
    }

    public function chap11_sample_03(Request $request){
        $url = 'https://api.github.com/gists';
        $data = [
            'public' => true,
            'description' => "This program a gist of itself.",
            // APIドキュメントに記述されているように、
            // ファイルオブジェクトのキーは文字列ファイル名であり、
            // 値は内容のキーとファイル内容の値を持つ
            // 別のオブジェクトである。
            'files' => [ basename(__FILE__) =>
            [ 'content' => file_get_contents(__FILE__) ] ] 
        ];
        
        $c = curl_init($url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($c, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($c, CURLOPT_USERAGENT, 'learning-php-7/exercise');
        $response = curl_exec($c);

        if ($response == false) {
            print "Couldn't make request.";
        }
        else {
            $info = curl_getinfo($c);
            if ($info['http_code'] != 201) {
            print "Couldn't create gist, got {$info['http_code']}\n";
            print $response;
            } 
            else {
                $body = json_decode($response);
                print "Created gist at {$body->html_url}\n";
            }
        }
    }//chap 11/////

    //chap12
    public function chap12_sample()
    {
        //https://learnku.com/articles/21996
        header("Location: https://www.oreilly.co.jp/pub/9784873117935/php_appB.pdf");
        exit();
    }

}
