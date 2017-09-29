<?php
/**
* 调用方法时传入 url 数组，返回 curl_info 信息、错误信息、执行结果信息
* @param  arr $arrUrls      url 数组
* @retunr arr $arrResponses 返回 curl 执行情况、错误信息、返回结果的多维数据
* [
*    '$arrUrls键名' => [
*        'curl_info'     => curl 执行情况信息,
*        'curl_error'    => curl 执行错误信息,
*        'curl_results'  => curl 执行执行结果,
*     ],
*    '$arrUrls键名' => [
*        'curl_info'     => curl 执行情况信息,
*        'curl_error'    => curl 执行错误信息,
*        'curl_results'  => curl 执行执行结果,
*     ],
*     ......
* ]
*/
$url = 'http://ssenbackend.meikaiinfotech.com/api/get_merchant_list.php';
$maxLoopCount = 125;
$concurrentCount = 2;
$count = 100;
$start = 0;
$urlList = [];

$start_time = microtime(TRUE);
do {
    $urls = [];
    for ($j=0; $j < $concurrentCount; $j++) { 
        $urls[] = sprintf($url.'?start=%d&limit=%d', $start, $count);
        $start += $count;
    }
    $urlList[] = $urls;
    $maxLoopCount --;
}while ($maxLoopCount > 0);
// print_r($urlList);die;
foreach ($urlList as $k => $v) {
    $f = curl_multi_task($v);
    if(!empty($f))
    {
        foreach ($f as $k => $v) {
            $tmp = json_decode($v, TRUE);
            foreach ($tmp as $kk => $vv) {
                $str = $vv['ID'].'-'.$vv['BCGID'].PHP_EOL;
                file_put_contents('./test.txt', $str, FILE_APPEND);
            }
            
        }
    }
}
$end_time = microtime(TRUE);

echo $end_time - $start_time;

function curl_multi_task($arrUrls) {

    // 创建批处理 cURL 句柄
    $mh = curl_multi_init();

    $responsesKeyMap = [];

    $arrResponses = [];

    // 添加 Curl 批处理会话 
    foreach ($arrUrls as $urlsKey=>$strUrlVal) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $strUrlVal);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, "mg_comm_user:mg_comm_user");
        curl_multi_add_handle($mh, $ch);
        $strCh = (string) $ch;
        $responsesKeyMap[$strCh] = $urlsKey;
    }
    // 批处理执行
    $active = null;

    do {

        $mrc = curl_multi_exec($mh, $active);

    } while (CURLM_CALL_MULTI_PERFORM == $mrc);

    while ($active && CURLM_OK == $mrc) {

        if (-1 == curl_multi_select($mh)) {
            usleep(100);
        }

        do {

            $mrc = curl_multi_exec($mh, $active);

            if (CURLM_OK == $mrc) {
                while ($multiInfo = curl_multi_info_read($mh)) {
                    $curl_info    = curl_getinfo($multiInfo['handle']);
                    $curl_error   = curl_error($multiInfo['handle']); 
                    $curl_results = curl_multi_getcontent($multiInfo['handle']);
                    $strCh       = (string) $multiInfo['handle'];
                    // $arrResponses[$responsesKeyMap[$strCh]] = compact('curl_info', 'curl_error', 'curl_results');
                    $arrResponses[$responsesKeyMap[$strCh]] = $curl_results;
                    curl_multi_remove_handle($mh, $multiInfo['handle']);
                    curl_close($multiInfo['handle']);
                }
            }

        } while (CURLM_CALL_MULTI_PERFORM == $mrc);
    }

    // 关闭资源
    curl_multi_close($mh);

    return $arrResponses;
}