<?php 
/**
 * 获取access token之后，请求api
 */
$accessToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImJmNWUxYzExZDk2N2I1YThkZDIxODNkMDg3ZmMxMmViMTY3Y2NkZWNhZmY2M2MxYWNkZDVlNmZiNDg2YmUxODUyOWExMDljMWZlOWNhZmIzIn0.eyJhdWQiOiI2IiwianRpIjoiYmY1ZTFjMTFkOTY3YjVhOGRkMjE4M2QwODdmYzEyZWIxNjdjY2RlY2FmZjYzYzFhY2RkNWU2ZmI0ODZiZTE4NTI5YTEwOWMxZmU5Y2FmYjMiLCJpYXQiOjE1MDQyNTE5NTEsIm5iZiI6MTUwNDI1MTk1MSwiZXhwIjoxNTM1Nzg3OTUxLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.xuKNfQkzqLT9TIzqABMKznHKwyIlFiDCfsHUEP-HHg-1NSzan5HBntkyF5ZJdgRq3BP_q6_gn1xsuqJGi2QdBsFar86iE2wy3J06FlXA2EA2u2fl7NA1EZxlUqayLreT2WHIfJSlUau4U8KAqt-kWccrxMNFRLnaFgq_tk9iZn6woQSABUVVsiQ9VAnlRBTP-9QU8Rj6frl_S6N_dN1OR07tOej38fCu3nwLxiovlOlOdAPUBmkV6o-uOxyljmfWyT2KJ8kc7IGdtXeZtBV7-OHE0MgOUcUgWITclCZ0MrLKko1Yji9VzVJld2f7fKeSq-FGIU01sWi9-Xo1XGGHGpV13BpRZw9E9Zx0rHZiU3444efi8LrzjGnMwASjjJJYyNy4QYEvv31bFwOf1hPrRhxcj689jIuKWTdRtYo_9bWl2fALbSSmls5qmpB9nS5GN_-Evg3mCIkk12kPfMu8SnDNCaVisarplg2lx13Hn6hUsVKefp6wyhOeqzDSop6fatq6mWvqjYJyOyffNFzby7GvE8esG6Y92jFPGZUZZ7st3igZH8JxmWfAqsm6GLyGdNqBJFyxkdt_4aNuhvdxu1VqZDimrsphDtI3TICC4DKVbKm1v7NE38Fwo2ISnR8Jgro8jRZc29sroKE597X23lAIyZEW_HHEA6dTEMNiDqQ';
$url = 'http://chukui.com/api/user';
$headers = [
    'Accept: application/json',
    'Authorization: Bearer '.$accessToken,
    'Set-Cookie:XSRF-TOKEN=eyJpdiI6ImhzN2tBM3VTQXl1RWw5V0lFak5DZ2c9PSIsInZhbHVlIjoielhocUs3N1dmekh3dEdrcVhVUU9JYVI5RHpmMFlGOU5FXC8xNHdqd3NmQUZ5OEo5dWFxQkJWaHllU1Rmc2VXeWdNT3ZpMFdDZ09vaVV0cVUyMTc2SkNBPT0iLCJtYWMiOiIwODY0YWVhZTA1YzgyMjRhNWI0YzgxYzk3MjZhMmI2NzU0NGIxMjRhNjI4YzEzOTI5NzA4MTQwNzcwNTM1MjI4In0%3D; expires=Fri, 01-Sep-2017 12:32:08 GMT; Max-Age=7200; path=/'
];
$info = curl($url, $headers);
echo $info;

function curl($url,$headers){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_HTTPHEADER , $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $icerik = curl_exec($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);
    return $icerik;
}