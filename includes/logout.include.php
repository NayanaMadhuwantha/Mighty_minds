<?php
/**
 * Created by PhpStorm.
 * User: Nayana Madhuwantha
 * Date: 4/5/2021
 * Time: 9:05 PM
 */
session_start();
session_destroy();
header("Location: ../index.php");
