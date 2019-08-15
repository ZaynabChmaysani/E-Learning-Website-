<?php
 session_start();
        require_once './connection.php';
        if (isset($_SESSION['isloggedin']) && $_SESSION['isloggedin'] == 1) {
            if($_SESSION['as']=="instructor"){
                header('Location: ./announcement.php');
            } else {
                header('Location: ./Students.php');
            }
        }//mamnu3 y3mal log in huwe w already login
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Final Project</title>
        <style type="text/css">
            div.toppanel{

                width: 100%;
                color:white;
                font-weight:bold;
                background-color:darkblue;
                height:80px;
              
                margin-top:0px;


            }



            div.background{

                background-position:center;
                width: 100%;
                height: 700px;
                background-color:lavender;
                margin-top:0px;

            }


            div.img{
                float:left;
            }
            .hn{
                color:midnightblue;

            }
            .hn1{
                color:midnightblue;
                font-size:45px;

            }
            .content{
                margin-right:200px ;
                float:right;
            }
            .img{
                float: left;  
            }
            .I3 {
                width:400px;
                height:25px; 
                border-radius:3px;

            }
            div.toppanel:hover{
                color:lightblue;
            }
            .I3:hover{
                background-color:lightblue;
            }
            .I1:hover{
                background-color:lightblue;
            }

            .b1{
                border-color:activeborder;



            }
            .b2{
                border-color:activeborder;
                background-color:activecaption;
                height: 30px;
                border-radius:3px;
                width:250px;
                border-color: lightgray;

            }
            .p1{
                  font-size:35px;
            }
           
           
        </style>
    </head>
    <body>
              

        <div class="background"> 

            <div class="toppanel">


                <div style="width: 30%; float: left; height: 90%; text-align: center; margin-top: 0px; ">
                    <p class="p1">E-learning</p>
                </div>

                <div style="width: 70%; float: left; margin-left: 0; text-align: center; margin-top: 25px;">

                    <form method="post" action="login.php">
                        <input class="I1" type="text" id="email"  name="email" placeholder="email"  required
                               />

                        <input class="I1" type="password" id="password"  name="password"  placeholder="password"  required
                               />
                        
                  
                        &emsp; &emsp;&emsp; &emsp;
                        <input class="b1" type="submit" id="login"  name="login" value="login" 
                               /> 
                       
                       </form>  
                </div>






            </div>




            <br>

            <div class="img">  
                <h3 class="hn">E-learning helps students and instructors communicate among each other   </h3>

                &emsp; &emsp;<img src="img.png" alt="img" style="width:400px;height:400px;">
            </div>

            <div class="content">


                <h1 class="hn1">Create an account</h1>
                <h3 class="hn">It's free and always will be.</h3>
                <br>
                <form method="post" action="./login.php" id="f" >
                    <table class="table1">                     
                        <tr>
                        <input class="I3" type="text" id="name1"  name="name1" placeholder="name"  required
                               />    
                        </tr>
                        <br>
                        <br>

                        <tr>
                        <input class="I3" type="text" id="email1"  name="email1"  placeholder="email" required
                               /></tr>  
                        <br>
                        <br>
  
                        <tr>
                        <input class="I3" type="password" id="password1"  name="password1"  placeholder="password"  required/>
                        
                    </table>
                    <br>



                    <input type="radio" name="LogInAs" value="1">Instructor
                    <input type="radio" name="LogInAs" value="0" checked="checked">Student


                    <br>
                    <br>
                    <br>
                    &emsp; &emsp; &emsp; &emsp;
                    <input class="b2" type="submit" id="signUp"  name="SignUp" value="SignUp" onclick = "return checkform()"/>


                </form> 



            </div>          
        </div>


        <?php
       
      
       
        

        if (isset($_GET['wrong_info'])) {
            echo 'Wrong email/password combination';
        }

//        
//        if(isset($_POST['SignUp'])){
//            require_once './connection.php';
//             if (isset($_POST['name1']) && isset($_POST['email1'])&& isset($_POST['passwod1'])) {
//             if($_POST['name1'] && $_POST['password1'] && $_POST['email1'] ){
//                $name = $_POST['name1'];
//                $password = $_POST['password1'];
//                $email = $_POST['email1'];
//            }
//            
//            if(isset($_POST['LogInAs']))  
//            {
//                $query1 = "SELECT * FROM USERS WHERE EMAIL = '$email'";
//                $res1 = mysqli_query($link, $query1);
//                $row = mysqli_fetch_assoc($res);
//                if (!$res) {
//                    die("An error occured..");
//                } elseif (mysqli_num_rows($res) == 1) {
//                    alert("The email is already registered");
//                }
//                else {
//                if ($_POST['LogInAs'] == "student"){
//                $query = "INSERT INTO users(name, password, isInstructor,email)
//                VALUES ('$name','$password',0,'$email')";}
//           
//                if ($_POST['LogInAs'] == "instructor"){
//                $query = "INSERT INTO users(name, password, isInstructor,email)
//                VALUES ('$name','$password',1,'$email')";}
//                
//                $res = mysqli_query($link, $query);
//                
//                }
//
//            }
//           
//        }
//        }
//      // close connection
//      // mysqli_close($link);
         ?>
  
    </body>
    
    <script>
              var f = document.getElementById("f");
             
           
             function checkemail(){
                 value = document.getElementById("email1").value;
                    if (value.search(/(\w+)@(\w+)\.(\w+)/) ==-1)
                    {
                      alert("email not valid!") ;
                      return false;
                    }
                    return true;
                };
                
                function checkform(){
                    if(checkemail()){
                        if(chkName()){
                            if(checkpass()){
                                return true;
                            }
                        }
                    }
                    return false;
                }
                 function chkName()
                {
                 value = document.getElementById("name1").value;
                 if (value.search(/^[a-zA-Z]+$/) ==-1)
                    {
                      alert("name not valid!") ;
                      return false;
                    }
                    return true;
                };

                function checkpass(){
                   p = document.getElementById("password1").value; 
                   if(p.length<8){
                       alert("password must be longer than 8 charachters!") ;
                       return false;
                   }
                   else {
                    if(p.search(/[a-z]/) ==-1 || p.search(/[A-Z]/)==-1)
                       {
                           alert("password weak!") ;
                        return false;
                       } 
                       return true;
                   }  
                }
            
            


            </script>
            
</html>
