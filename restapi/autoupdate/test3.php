<?php
$datetime = "2018-08-20";
$dayorder = 3;
    $lenght = 20;
    for($i=0;$i<=$lenght;$i++) {
        $date = date('Y-m-d', strtotime("+$i days", strtotime($datetime)));   
        $is_sunday = date('l', strtotime($date)); 
        if($is_sunday == "Sunday")
        {
            $i=$i+1;
        }
        $do=$dayorder%5;
        if($do == 0) {
            $do = 5;
        }
        $day = date('Y-m-d', strtotime("+$i days",strtotime($datetime)));   
        echo $day."<br>".$do."<br>";
        $dayorder++;
    }

    ?>