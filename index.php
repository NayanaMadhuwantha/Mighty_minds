<?php
/**
 * Created by PhpStorm.
 * User: Nayana Madhuwantha
 * Date: 4/5/2021
 * Time: 9:07 PM
 */
session_start();
date_default_timezone_set("Asia/Colombo");
if(!isset($_SESSION['username'])){
    echo "<form action='includes/login.include.php' method='post'>
            <label for='uname'><b>Username</b></label>
            <input type='text' placeholder='Enter Username' name='username' required>
        
            <label for='psw'><b>Password</b></label>
            <input type='password' placeholder='Enter Password' name='password' required>
            <button type='submit'>Login</button>
        </form>";
}
else{
    echo "<form action='includes/logout.include.php' method='post'>
            <button type='submit'>Logout</button>
        </form>";
}