<?php
    // 定会议室，每个预定时间为数组[5,7]，表示5点开始，7点结束，现有多个会议预定，输出最终预定会议室的结果
    // [2,9],
	// [3,6],
	// [1,2],
    // [7,8]
function mergeTime($arr)
{
    $arr = sortArray($arr);
    $len = count($arr);
    $n = 0;
    $tmp[$n] = $arr[0];
    for($i = 1; $i < $len; $i++){
        if($tmp[$n][1] <= $arr[$i][0]){
            $tmp[$n] = [$tmp[$n][0],$arr[$i][1]];
        }elseif($tmp[$n][0] >= $arr[$i][1]){
            $tmp[$n] = [$arr[$i][1],$tmp[$n][0]];
        }else{
            $n++;
            $tmp[$n] = $arr[$i];
        }
    }
    return $tmp;
}

function my_sort($a,$b)
{
    return $a[1]-$b[1];
}

function sortArray($arr)
{
    usort($arr,"my_sort");
    return $arr;
}

$arr=[[7,8],[2,9],[1,2],[3,6]];
$ret = mergeTime($arr);
echo json_encode($ret);