<?php
/**
 * 测试数据：一组学生的语文，数学成绩
 */
//生成测试数据
$studentCount = 100;
$studentData = [];
for($i=0;$i<100;$i++)
{
    $tmp = [];
    $tmp['Chinese'] = rand(50,100);
    $tmp['Math'] = rand(50,100);
    $studentData[] = $tmp;
}

//测试array_column，算出语文平均成绩
$ChineseData = array_column($studentData, 'Chinese');
$averageScore = floor(array_sum($ChineseData)/100);
print_r($averageScore);