<?php
/**
 * Created by PhpStorm.
 * User: Nayana Madhuwantha
 * Date: 4/13/2021
 * Time: 10:24 PM
 */

$tmp = shell_exec("python predict.py 2 7");
var_dump($tmp);