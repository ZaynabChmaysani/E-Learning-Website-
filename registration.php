<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
 <?php
     
     require_once './connection.php';
     session_start();
     $email = $_SESSION['email'];
        ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
              <style type="text/css">
            div.addCourse{
                border-radius:5px;
                border-color:black;
                margin-left: 520px;
                width: 390px;
                height:270px;  
                margin-top:120px;

                background-color:mintcream;
                opacity:0.8;
                border-radius:10px;
                border: 1px solid darkblue;

            }
            .b1{
                margin-top: 140px;
                margin-left:150px;
                width:80px;
                background-color: lavender;
                border-radius:5px;
            }
         
          
            
            .h1{
                margin-left:520px;
                font:60px bold;

            }
            .Sclasses{
                margin-left:50px;
                width:55%;
                background:lavender;
                border-color: darkblue;
                border-radius: 5px;
               
            }
             </style>
    </head>
    <body>
         &emsp;&emsp;<h1 class="h1">Register courses</h1>
        <form method="post" action="register.php">
            <div class="addCourse">


                <br>
                <br>
              
               
                
                <label>choose courses</label><select id="select" class="Sclasses" name="selectCourse"  >
                    <?php
                        $sql = mysqli_query($link,"SELECT I.courseName, U.name from instructors I, Users U where U.email = I.instructorID and I.courseName not in (select coursename from students where studentID = '$email');");
                        while ($row = $sql->fetch_assoc()){
                            echo '<option value="'.$row['courseName'].'">'.$row['courseName'].'-'.$row['name'].'</option>';
                        }
                    ?>
                </select> 
               <input class="b1" type="submit" id="regOK"  name="regbutton" value="OK" 
                       />   
                </div> 
                            
        </form>

        
    </body>
</html>
