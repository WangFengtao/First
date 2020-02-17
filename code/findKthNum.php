<?php
/**
 * 在两个排序数组中找到第k小的数, 时间复杂度要求O(log(min(m,n)))
 */
class FindKthNum{
    public function getUpMidian($arr1,$start1,$end1,$arr2,$start2,$end2){
        $mid1 = 0;
        $mid2 = 0;
        $offset = 0;
        while($start1 < $end1){
            $mid1 = intval(($start1+$end1)/2);
            $mid2 = intval(($start2+$end2)/2);
            $offset = ($end1-$start1+1)%2 == 0 ? 1 : 0;
            if($arr1[$mid1] > $arr2[$mid2]){
                $end1 = $mid1;
                $start2 = $mid2 + $offset;
            }elseif($arr1[$mid1] < $arr2[$mid2]){
                $start1 = $mid1 + $offset;
                $end2 = $mid2;
            }else{
                return $arr1[$mid1];
            }
        }
        return min($arr1[$start1],$arr2[$start2]);
    }

    public function find($arr1,$arr2,$kth){
        if(empty($arr1) || empty($arr2)){
            return 0;
        }
        if($kth < 0 || $kth > count($arr1) + count($arr2)){
            return 0;
        }
        $longs = count($arr1) >= count($arr2) ? $arr1 : $arr2;
        $shorts = count($arr1) < count($arr2) ? $arr1 : $arr2;
        $l = count($longs);
        $s = count($shorts);
        if($kth < $s){
            return $this->getUpMidian($shorts,0,$kth-1,$longs,0,$kth-1);
        }
        if($kth > $l){
            if($shorts[$kth - $l - 1] >= $longs[$l - 1]){
                return $shorts[$kth - $l - 1];
            }
            if($longs[$kth - $s - 1] >= $shorts[$s - 1]){
                return $longs[$kth - $s - 1];
            }
            return $this->getUpMidian($shorts, $kth - $l, $s-1, $longs, $kth - $s, $l - 1);
        }
        if($longs[$kth - $s - 1] >= $shorts[$s - 1]){
            return $longs[$kth - $s - 1];
        }
        return $this->getUpMidian($shorts, 0, $s - 1, $longs, $kth - $s, $kth - 1);
    }

    public function findMid($arr1,$arr2){
        $longs = count($arr1) >= count($arr2) ? $arr1 : $arr2;
        $shorts = count($arr1) < count($arr2) ? $arr1 : $arr2;
        $l = count($longs);
        $s = count($shorts);
        $key = ($l + $s) % 2 == 0 ? 0 : 1;
        $kth = intval($l + $s + 1)/2;
        
        if($kth > $l){
            if($shorts[$kth - $l - 1] >= $longs[$l - 1]){
                if($key){
                    return $shorts[$kth - $l - 1];
                }else{
                    return ($shorts[$kth - $l - 1] + $shorts[$kth - $l])/2;
                }
            }
            if($longs[$kth - $s - 1] >= $shorts[$s - 1]){
                if($key){
                    return $longs[$kth - $s - 1];
                }else{
                    return ($longs[$kth - $s - 1] + $longs[$kth - $l])/2;
                }
            }
            return ($this->getUpMidian($shorts, $kth - $l, $s-1, $longs, $kth - $s,$l - 1) + $this->getUpMidian($shorts, $kth - $l, $s-1, $longs, $kth - $s,$l))/2;
        }
        if($longs[$kth - $s - 1] >= $shorts[$s - 1]){
            if($key){
                return $longs[$kth - $s - 1];
            }else{
                return ($longs[$kth - $s - 1] + $longs[$kth - $l])/2;
            }
        }
        return ($this->getUpMidian($shorts, 0, $s - 1, $longs, $kth - $s, $kth - 1) + $this->getUpMidian($shorts, 0, $s - 1, $longs, $kth - $s, $kth))/2;
    }
}

$arr1 = [2,5,7,8];
$arr2 = [1,3,4,6,9,10];
$obj = new FindKthNum();
$ret = $obj->findMid($arr1,$arr2);
var_dump($ret);


