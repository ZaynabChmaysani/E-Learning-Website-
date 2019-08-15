<?php

require_once './connection.php';
 session_start();
 $email = $_SESSION['email'];
  if(isset($_POST['share'])){
        
             if (isset($_POST['title']) && isset($_POST['content']) ){
                $title = $_POST['title'];
                $text = $_POST['content'];
                $course = $_SESSION['courseName'];
                $date = date("D M d, Y G:i a");

                $query = "INSERT INTO discussions(title,courseID,content,Time,User)
                VALUES ('$title','$course','$text','$date','$email');";
                $res = mysqli_query($link, $query);
                  if (!$res) {
             die("An error occured");
                  }
                  else{
                      header('Location: ./discussion.php');
                  }
             }
  }

