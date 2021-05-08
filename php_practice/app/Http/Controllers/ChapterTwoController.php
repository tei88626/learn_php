<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChapterTwoController extends Controller
{
    //
    public function samples()
    {
        // $ori_text = 'text';
        // $same_text = strcasecmp('Text', $ori_text);

        // echo $same_text;
        // echo '<br>';

        // $num1 = 0.0123;
        // printf('%.5f', $num1);

        // echo 'sample 1:' . '<br>';
        // $price = 4.95 * 2 + 1.95 * 1 + 0.85 * 1;
        // $price_tax = $price * (1 + 0.075);
        // $chip = $price * 0.16;

        // echo $chip +  $price_tax. '<br>';

        echo '<h3> test 3 </h3>';
        $hamburger = 4.95;
        $shake = 1.95;
        $cola = 0.85;
        $tip_rate = 0.16;
        $tax_rate = 0.075;
        $food = (2 * $hamburger) + $shake + $cola;
        $tip = $food * $tip_rate;
        $tax = $food * $tax_rate;
        $total = $food + $tip + $tax;

        print <<< _COMMENT_
        // 指定子	型	説明	使用例 <br>
        // %c	char	文字を出力	"%c" <br>
        // %s	char*	文字列を出力	"%5s","%-5s" <br>
        // %d	int	10進数で出力	"%05d","%-05d" <br>
        // %hd	short int	半分の精度の10進数で出力	"%10hb" <br>
        // ld	long int	倍精度の10進数で出力	"%-10ld" <br>
        // %u	unsigned int	符号なし整数を10進数で出力	"%5u","%-05u" <br>
        // %hu	unsigned short int	符号なし整数を半分の精度の10進数で出力	"%10hu" <br>
        // %lu	unsigned long int	符号なし整数を倍の精度の10進数で出力	"%10lu" <br>
        // %o	int	8進数で出力	"%05o","%05o" <br>
        // %x	int	16進数を小文字で出力	"%05x" <br>
        // %X	int	16進数を大文字で出力	"%05X" <br>
        // %f	float	実数を出力	"%5.2f" <br>
        // %lf	double	倍の精度の実数を出力	"%8.2lf" <br>
        // %e	float	実数を指数表示を小文字で出力	"%5.2e" <br>
        // %E	float	実数を指数表示を大文字で出力	"%E" <br>
        // %g	float	実数を最適な表示で出力する	"%g" <br>
        _COMMENT_;

        echo '<br>';
        printf("%d %-9s at \$%.2f each: \$%5.2f\n", 2, 'Hamburger', $hamburger,2 * $hamburger);
        echo '<br>';
        printf("%d %-9s at \$%.2f each: \$%5.2f\n", 1, 'Shake', $shake, $hamburger);
        echo '<br>';
        printf("%d %-9s at \$%.2f each: \$%5.2f\n", 1, 'Cola', $cola, $cola);
        echo '<br>';
        printf("%25s: \$%5.2f\n", 'Food Total', $food);
        echo '<br>';
        printf("%25s: \$%5.2f\n", 'Food and Tax Total', $food + $tax);
        echo '<br>';
        printf("%25s: \$%5.2f\n", 'Food, Tax, and Tip Total', $total);

        echo '<h3> test 4 </h3>';
        $first_name = 'Srinivasa';
        $last_name = 'Ramanujan';
        $name = "$first_name $last_name";
        print $name;
        echo '<br>';
        print strlen($name);
        echo '<br>';

        echo '<h3> test 5 </h3>';
        $n = 1; $p = 2;
        print "$n, $p\n";
        
        $n++; 
        $p *= 2;
        print "$n, $p\n";
        
        $n++; 
        $p *= 2;
        print "$n, $p\n";
        
        $n++; 
        $p *= 2;
        print "$n, $p\n";
        
        $n++;
        $p *= 2;
        print "$n, $p\n";

    }
}
