<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//hashing
require_once './connection.php';
require_once './fix_string.php';

if (isset($_POST['login'])){
    if (isset($_POST['email'])&& isset($_POST['password'])) {
        $email = $_POST['email'];
        $pwd = $_POST['password'];
        $LogInAs= $_POST['LogAs'];
        $query = "SELECT * from Users where email='$email' and password='$pwd' and isInstructor = 1";
        $res = mysqli_query($link, $query);

        if (!$res) {
            die("An error occured");
        } elseif (mysqli_num_rows($res) == 1) {
            session_start();
            $row = mysqli_fetch_assoc($res);
            $_SESSION['isloggedin'] = 1;
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['courseName'] = "";
            $_SESSION['as'] = "instructor";
            header('Location: ./announcement.php');
        } else {
            $query = "SELECT * from Users where email='$email' and password='$pwd' and isInstructor = 0";
            $res = mysqli_query($link, $query);
            if (!$res) {
                die("An error occured");
            } elseif (mysqli_num_rows($res) == 1) {
                session_start();
                $row = mysqli_fetch_assoc($res);
                $_SESSION['isloggedin'] = 1;
                $_SESSION['email'] = $row['email'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['courseName'] = "";
                $_SESSION['as'] = "student";
                header('Location: ./Students.php');
            } else {
                
                header('Location: ./index.php?wrong_info=1');
               // alert("email not exist");
            }
             
        }  
    }
}
    

 elseif (isset($_GET['logout'])) {
    session_start();
    session_destroy();
    header('Location: ./index.php');
}
//else
//{
//    header('Location: ./index.php');
//}

 if(isset($_POST['SignUp'])){
        
             echo"inside signup";
             
             if(isset($_POST['name1']) && isset($_POST['password1']) && isset($_POST['email1']) && isset($_POST['LogInAs'])){
                $name = $_POST['name1'];
                $password = $_POST['password1'];
                $email = $_POST['email1'];
                $singUpCat  = $_POST['LogInAs'];
 
                echo"inside signup";
                
                $query1 = "SELECT * FROM USERS WHERE EMAIL = '$email'";
                $res = mysqli_query($link, $query1);
                //$row = mysqli_fetch_assoc($res);
                if (!$res) {
                    die("An error occured");
                } elseif (mysqli_num_rows($res) == 1) {
                    echo"The email is already registered";
                }
                else {
                if ($singUpCat == "0"){
                $query = "INSERT INTO USERS(password, name, isInstructor,email)
                VALUES ('$password','$name',0,'$email');";}
           
                if ($singUpCat == "1"){
                $query = "INSERT INTO USERS(password,name,isInstructor,email)
                VALUES ('$password','$name',1,'$email');";}
                
                $res = mysqli_query($link, $query);
                 if (!$res) {
                    die("An error occured");
                }
           
              

            }
             }
             header('Location: ./index.php');
  }   
  


