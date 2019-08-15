<?php

session_start();
        require_once './connection.php';
        
if (isset($_POST['selectCourse'])){
      $select = $_POST['selectCourse'];
      $_SESSION['courseName'] = $select;
      header('Location: ./Students.php');
}