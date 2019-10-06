<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<!-- HAYTHAM -->

<?php

require_once './connection.php';

session_start();
if (!isset($_SESSION['isloggedin']) || $_SESSION['isloggedin'] == 0) {
    header('Location: ./index.php');//7atayneha l2n mamnu3 a3mal access 3ala lpage illa iza knt login
}

$email = $_SESSION['email'];
$password= $_SESSION['password'];

//requied..query..(select..)
$query="SELECT NAME FROM USERS WHERE EMAIL='$email'";
$res = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($res);
$name = $row['NAME'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
            <style type="text/css">
            .toppanel{

                width: 100%;
                color:white;
                font-weight:bold;
                background-color:darkblue;
                height:50px;
                font-size:35px;
                margin-top:0px;
                

            }
           
            
            .myDiv{
             width: 90%;  
             height: 80%;
            }
            .Sclasses{
             
                width:25%;
                background:lavender;
                border-color: darkblue;
                border-radius: 5px;
               
            }
          
            .img{
                 width:30px;
                 height:30px; 
             
            }
           
       
            .content{
                margin-left:150px; 
            }
            
                    input.post{
              
               background-color:transparent;
              opacity:0.8;
               border-radius: 5px;
               border-color:darkblue;
               
              opacity:0.8;
               margin-left:50px;
             
            }
             
            .Announcement{
                background-position:center;
                width: 100%;
                height: 1100px;
                background-color:lavender;
                margin-top:0px;
            } 
            .b{
                margin-left: 700px;
            }
           
            .b1{
                  border-color:darkblue;
                float:right;
                color: white;
                background-color: darkblue;
                margin-top: 15px;
                  margin-right: 10px; 
            }
            .oldp{
               width: 70%;
                height: 450px;  
             
            }
            .formed1{
               width: 857px;
               height: 50px; 
               margin-left:220px;  
               background-color:whitesmoke;
             
            }
              div.formed{
             
                width: 857px;
               height: 500px;
              margin-left:220px;
               margin-top:0px;
              
               border-radius:5px;
                background-color:whitesmoke;
                opacity:0.8;
              }
           
              .A{
               margin-left:220px;
              background-color:transparent;
            
              }
              .img{
                  margin-top:2px;
              }
              .lr{
                  font-size: xx-small;
              }
              .img1{
                   margin-left:1180px; 
              }
              .submitButton{
                  width:200px;
                  margin-left: 500px;
                  height: 50px;
                  border: 0.1px solid darkblue;
              }
               .ok{
                  border-bottom-color: aqua;
                 background: darkblue;
                 color: white;
                  border-radius:6px;
                  border-left-color:  darkblue;
                  border-right-color: darkblue;
                  border-top-color: darkblue;
                  width: 25px;
                  font-size:12px;
              }
             
              
        </style>
    </head>
    <body>
        <div class="Announcement">
          <div class="toppanel">  
           <div style="width:60%; height:90% ;float: left;height:30%; text-align: center; margin-top: 0px;">
         <div>
             <form method="post" action="select2.php">
            &emsp;  Announcement
              
                &emsp; &emsp;  &emsp; &emsp; &emsp;
         
                <select id="select" class="Sclasses" name="selectCourse"  >
  <?php
  $sql = mysqli_query($link,"SELECT courseName from students where studentID = '$email'");
  while ($row = $sql->fetch_assoc()){
      echo '<option value="'.$row['courseName'].'">'.$row['courseName'].'</option>'; 
  }
  ?>
        
  </select> 
                <input type="submit" value="ok" id="ok" name="ok" class="ok" />
             </form>
                 </div> 
         </div>
     
      
           <div style="width:5%;height:30px ; float:right; text-align:center;margin-top:2px;">
        <form method="get" action="login.php">      
       <input class="b1" type="submit" id="logout"  name="logout" value="logout" />
        </form>
           </div>
          </div>
        <br>
      
        <p class="instName"></p>
         <?php
   
        echo"<p style=\"font-size:25px;margin-left:0px\">Welcome $name!</p>";
        echo "<p style=\"color:darkblue\">$email</p>"
              
      
        ?>
          <div class="formed1">
              <?php 
        
            $course = $_SESSION['courseName'];
         //   echo "$course";
        echo"<p style=\"font-size:50px; color:darkblue\"> $course</p>";
         ?>
           <p class="title">   </p> 
           
             </div>
          &emsp;  &emsp;  
         
          <form method="post" action="discuss.php">    
          <input type="image" src="chat.png" class="img1" > 
          </form>
                     
    
       
         
     
      
        
        <div class="formed" style="overflow:scroll">
            <?php
       // $variable = select.options[select.selectedIndex].text;
              $course = $_SESSION['courseName'];
                $query1 = "SELECT * from announcements WHERE courseName='$course';";
                $query2 = "select * from courses where courseName = '$course';";
                $sql1 = mysqli_query($link,$query1);
                $sql2 = mysqli_query($link,$query2);
                while($row2 = $sql2->fetch_assoc()){
                    echo "<h4 style=\"color:darkblue\">This course was created in ".$row2['dateCreated']."</h4>";
                    echo "<h4 style=\"color:darkblue\">Course description:<br> </h4>";
                    echo "<p style=\"color:darkblue\">".$row2['courseDescription']."<br>-----------------------------------------------------------------------------------------------------------------------------------------------------------</p>";
                }
                while ($row1 = $sql1->fetch_assoc()){
                    echo '<h3>'.$row1['title'].'</h3>';
                    echo '<p>'.$row1['content'].'</p>';
                    echo '<p>'.$row1['date'].'<br>-----------------------------------------------------------------------------------------------------------------------------------------------------------</p>';  
                } 
        // <form method="POST" action="<?php $_SERVER['PHP_SELF'] 
         ?>
           
        </div>
          
          <br>
          <br>
    <form method="post" action="r.php">
     <input type="submit" class="submitButton" value="Register courses" >
       
     </form>
       </div>   
        <?php
        // put your code here
        ?>
           <script>
function myfunction(){
            var select = document.getElementById("select");
              var title = document.getElementById("title");
           
        title.innerHTML=select.options[select.selectedIndex].text;

} 
            </script>
    </body>
</html>
