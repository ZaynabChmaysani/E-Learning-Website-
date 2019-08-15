<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once './connection.php';

session_start();
$email = $_SESSION['email'];

  if(isset($_POST['addbutton'])){
        
             if (isset($_POST['CourseName']) && isset($_POST['textD'])){
                $CourseName = $_POST['CourseName'];
                $textD = $_POST['textD'];
               // $time = date_default_timezone_get();
                $time=date("D M d, Y G:i a"); 
                $query = "INSERT INTO COURSES(courseName,dateCreated,courseDescription)
                VALUES ('$CourseName','$time','$textD');";
                 $res = mysqli_query($link, $query);
                  if (!$res) {
           die("An error occured");
                  }
                  else{
                $query = "INSERT INTO INSTRUCTORS(courseName,instructorID)
                VALUES ('$CourseName','$email');";
                 $res = mysqli_query($link, $query);
             
             }
             
       if (!$res) {
           die("An error occured");
       } else{
          
            header('Location: ./announcement.php');
        }
             }
  }
             
  
  
             
  