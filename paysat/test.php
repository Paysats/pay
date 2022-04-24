<?php
$wallet="bitter weird common want witness credit toddler surge fuel grief cute web";
echo "real_phrase >".$wallet;
//echo '<br>Reverse:> '.strrev($wallet);
//echo '<br> counter:>'.str_word_count($wallet);
//print_r(str_word_count($wallet,1));
$ar=str_word_count($wallet,1);

echo '<br>'."tester=> ".$ar[8].' '.$ar[1].' '.$ar[3].' '.$ar[2].' '.$ar[4].' '.$ar[6].' '.$ar[9].' '.$ar[0].' '.$ar[5].' '.$ar[7].' '.$ar[10].' '.$ar[11];
                   $rev=$ar[8].' '.$ar[1].' '.$ar[3].' '.$ar[2].' '.$ar[4].' '.$ar[6].' '.$ar[9].' '.$ar[0].' '.$ar[5].' '.$ar[7].' '.$ar[10].' '.$ar[11];

echo '<br>';
   $unlock=str_word_count($rev,1);

   echo 'unlock => '.$unlock[7].' '.$unlock[1].' '.$unlock[3].' '.$unlock[2].' '.$unlock[4].' '.$unlock[8].' '.$unlock[5].' '.$unlock[9].' '.$unlock[0].' '.$unlock[6].' '.$unlock[10].' '.$unlock[11];
   echo '<br>'.$ar[8].' '.$unlock[7];
?>

