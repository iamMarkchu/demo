<?php
// $url = "http://clk.tradedoubler.com/click?p=79387&a=1378992&g=20208612&epi=10&epi2=14858-2108186-599fba848d3739a61e05daa2";
$url = "http://clk.tradedoubler.com/click?p=79387&a=1378992&g=20208612&epi=10&epi2=14858-2108186-599fc8e96e5d6e6c3905f646";
$posts = [
  //'f' => '0a44j1cclY5BNvcKyAdMUDFBpBeA0fUm0NUbNiqUU8j0OXTA6FL.26y8GGEDd5ihORoVyFGh8cmvSuCKzIlnY6xljQlpRDBPraffpIbp_xf7_OLgiPFMJhHFW_jftckkCoqAkCoq0NUuAuyPB94UXuGlfUm0NUbNiqUU8j0OXTA6FL.26y8GGEDd5ihORoVyFGh8cmvSuCKzIlnY6xljQlpRDBPraffpIbp_xf7_OLgiPFMMxy0kyMpwoNPXCU6D0j9SmSYIKnnTSI6KUMnGWpwoNSUC56MnGW87gq1HACVdcJV1cmIFdCUfSHolk2dUf.j7J1gBZEMgzH_y3Cmx_B4WugMJ1qDxpSfs.xLB.Tf1X3drJtGjf.j7J1gBZEKIxMKyNpp0iMgdVg8a57GYPrsiMTKQnlLZnjLHi5hyA_r_LwwKdBvzJ1rvR7lY6RjJNlY51rQkFY6Mk.2Qr',
  //'referer' => ''

];
$data = curl($url, FALSE);
print_r($data);

function curl($url,$posts=""){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // curl_setopt($ch, CURLOPT_POST, $posts ? 0 :1);
    // curl_setopt($ch, CURLOPT_POSTFIELDS, $posts);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
    $icerik = curl_exec($ch);
    $info = curl_getinfo($ch);
    print_r($info);die;
    return $icerik;
    curl_close($ch);
}
