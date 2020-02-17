<?php
class RemoveDup {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums) {
        foreach($nums as $key => $value){
            if($tmp === $value){
                unset($nums[$key]);
            }else{
                $tmp = $value;
            }
        }
    }
}

$arr = [0,0,1,1,1,2,2,3,3,4];
$obj = new RemoveDup();
$obj->removeDuplicates($arr);
var_dump($arr);