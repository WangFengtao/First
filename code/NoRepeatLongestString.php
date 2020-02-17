<?php
class NoRepeatLongestString {
    public function lengthOfLongestSubstring($s) {
        if (strlen($s)==0) return 0;
        $map = [];
        $max = 0;
        $left = 0;
        for($i = 0; $i < strlen($s); $i++){
            if(array_key_exists($s[$i],$map)){
                $left = max($left, $map[$s[$i]] + 1);
            }
            $map[$s[$i]] = $i;
            $max = max($max,$i-$left+1);
        }
        return $max;
    }
}

$s = 'pwwkew';
$obj = new NoRepeatLongestString();
$res = $obj->lengthOfLongestSubstring($s);
echo $res;