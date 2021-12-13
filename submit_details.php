<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{

    if(empty($_POST['fname']) || empty($_POST['uname']) || empty($_POST['pass']) || empty($_POST['number']) || empty($_POST['mail']))
    {
      $error="Required details cannot be empty";
    }
    else
    {
      //Initialising database parameters
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "proj_users";
 
      
      //Getting form parameters
      $fname=$_POST['fname'];
      $uname=$_POST['uname'];
      $pass=$_POST['pass'];
      $mail=$_POST['mail'];
      $number=$_POST['number'];
      
      echo $fname,$uname,$pass,$mail,$number;

      $conn=new mysqli($servername,$username,$password,$dbname);
      
      if($conn->connect_error){
        die("Connection failed:".$conn->connect_error);
      }
      
      $sql="INSERT INTO user_login (uname,pass,fname) VALUES('$uname','$pass','$fname')";
      
      $sql1="INSERT INTO user_details (fname,uname,pass,number,email) VALUES('$fname','$uname','$pass','$number','$mail')";
      
      // $sql1="INSERT INTO recommend_details VALUES('','','','','','')";
      
      mysqli_query($conn, $sql);
      mysqli_query($conn, $sql1);
    }
header("Location: login.php");
}