<?php
class MidOfTwoSortedArray{
    public function findMedianSortedArrays($nums1, $nums2) {
        $m = count($nums1);
        $n = count($nums2);
        //如果第一个数组元素个数多，则把两个数组换一下，保证第一个数组的元素个数少
        if ($m > $n) { // to ensure m<=n
            $temp = $nums1; 
            $nums1 = $nums2; 
            $nums2 = $temp;

            $tmp = $m; 
            $m = $n; 
            $n = $tmp;
        }
        //初始化iMin为0，iMax为
        $iMin = 0; 
        $iMax = $m;
        //数组长度之和的一半,中间位置
        $halfLen = intval(($m + $n + 1) / 2);
        while ($iMin <= $iMax) {
            $i = intval(($iMin + $iMax) / 2);
            $j = $halfLen - $i;
            if ($i < $iMax && $nums2[$j-1] > $nums1[$i]){
                $iMin = $i + 1; // i is too small
            }else if ($i > $iMin && $nums1[$i-1] > $nums2[$j]) {
                $iMax = $i - 1; // i is too big
            }else { // i is perfect
                $maxLeft = 0;
                if ($i == 0) { 
                    $maxLeft = $nums2[$j-1]; 
                }else if ($j == 0) { 
                    $maxLeft = $nums1[$i-1]; 
                }else { 
                    $maxLeft = max($nums1[$i-1], $nums2[$j-1]); 
                }
                if ( ($m + $n) % 2 == 1 ) { 
                    return $maxLeft; 
                }

                $minRight = 0;
                if ($i == $m) { 
                    $minRight = $nums2[$j]; 
                }else if ($j == $n) { 
                    $minRight = $nums1[$i]; 
                }else { 
                    $minRight = min($nums2[$j], $nums1[$i]); 
                }

                return ($maxLeft + $minRight) / 2.0;
            }
        }
        return 0.0;
    }
}

$A = [1,2,3,4];
$B = [3,4];
$obj = new MidOfTwoSortedArray();
$res = $obj->findMedianSortedArrays($A,$B);
var_dump($res);