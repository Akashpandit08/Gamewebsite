<?php 

    function trimText($str, $len){
        if(strlen($str)<=$len){
            return $str;
        }
        $newString = substr($str,0,$len-3).'...';
        return $newString;
    }

    function reviewStars($rating){
        $a = $rating;
        $html = '';
        while ($a > 0) {
            if ((int)$a % 10 != 0) { // Check if $a is not divisible by 10
                $html.='<i class="fa-solid fa-star"></i>';
                $a = $a - 1;
            } else {
                $html.='<i class="fa-solid fa-star-half"></i>';
                break;
            }
        }
        return $html;
    }