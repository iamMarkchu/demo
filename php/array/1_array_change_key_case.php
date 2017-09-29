<?php
$test_arr = [
    'firSt' => '123',
    'SeCond' => '456',
];
print_r(array_change_key_case($test_arr));
print_r(array_change_key_case($test_arr, CASE_UPPER));