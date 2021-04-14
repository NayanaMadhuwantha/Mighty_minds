<?php
/**
 * Created by PhpStorm.
 * User: Nayana Madhuwantha
 * Date: 4/5/2021
 * Time: 9:07 PM
 */
session_start();
include 'includes/Database.include.php';
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

    echo $_SESSION['userInfo']['Name'];
    echo date("Y/m/d") ;
    echo date("l") ;


    //find whether mood submitted or not
    $Database = new Database();
    $conn = $Database->getConnection();
    $sql="SELECT * FROM mood WHERE EmployeeID='".$_SESSION['userInfo']['ID']."' AND DatePosted='".date("Y-m-d")."'";
    $result=$conn->query($sql);


    echo "<br><hr>";
    if (!$row=$result->fetch_assoc()) {
        echo '<form action="includes/Mood.include.php" method="post">
              <input type="hidden" name="employeeID" value="' . $_SESSION['userInfo']['ID'] . '">
              <input type="radio" id="vehicle1" name="mood" value="Bad" required>
              <label for="mood">Bad</label><br>
              <input type="radio" id="vehicle2" name="mood" value="Okay" required>
              <label for="mood">Okay</label><br>
              <input type="radio" id="vehicle3" name="mood" value="Good" required>
              <label for="mood">Good</label><br>
              <input type="radio" id="vehicle3" name="mood" value="Great" required>
              <label for="mood">Great</label><br>
              <button type="submit">Submit</button>
            </form>';
    }
    else{
        echo 'You already submitted today. Mood: '.$row['Mood'];
    }

    //mood data for graph
    $sql="SELECT * FROM mood WHERE DatePosted BETWEEN '2021-04-07' AND '2021-04-15'";
    $result=$conn->query($sql);

    /*if ($result) {
        foreach ($result as $row){
            var_dump($row['Mood']);
        }
    }*/



}