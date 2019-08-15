<?php

require_once './connection.php';
 session_start();
        $email = $_SESSION['email'];
  if(isset($_POST['shareA'])){
        
             if (isset($_POST['atitle']) && isset($_POST['atext']) ){
                $title = $_POST['atitle'];
                $text = $_POST['atext'];
                $course = $_SESSION['courseName'];
                $date = date("D M d, Y G:i a");
              // $selectCourse=$_POST['selectCourse'];
                  // $CourseName=$selectCourse.options[$selectCourse.selectedIndex].text;
                //$CourseName=$_POST['$a'];
             // $CourseName='android';
                $query = "INSERT INTO announcements(userID,courseName,title,content,date)
                VALUES ('$email','$course','$title','$text','$date');";
                $res = mysqli_query($link, $query);
                
                  if (!$res) {
             die("An error occured");
                  }
                  else{
                      header('Location: ./announcement.php');
                  }
             }
  }

