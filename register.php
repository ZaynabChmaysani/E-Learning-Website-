<?php
require_once './connection.php';

session_start();
$email = $_SESSION['email'];

  if(isset($_POST['regbutton'])){
        
             if (isset($_POST['selectCourse'])){
                $title = split("-", $_POST['selectCourse'])[0];
                
               // $time = date_default_timezone_get();
                $time=date("D M d, Y G:i a"); 
                $query = "INSERT INTO students(courseName,studentID)
                VALUES ('$title','$email');";
                $res = mysqli_query($link, $query);
                  if (!$res) {
                    die("An error occured");
                  }
                  else {
                      header('Location: ./Students.php');
                  }
             }
  }
  ?>

