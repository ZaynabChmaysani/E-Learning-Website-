<?php
require_once './connection.php';

session_start();
$as = $_SESSION['as'];
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
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>discussion</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
            .toppanel{

                width: 100%;
                color:white;
                font-weight:bold;
                background-color:darkblue;
                height:70px;
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
            .b2{
                border-color:gainsboro;
                border-radius: 5px;
                width:60px;
            }
           
            .b1{
                  border-color:gainsboro;
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
               .title{
              border-color:activeborder;
              width: 857px;
              height: 30px; 
         
              }
              .A{
               margin-left:220px;
              background-color:transparent;
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
             <form method="post" action="select3.php">
                 &emsp;  &emsp; Discussion <label> <input type="image" src="chat.png" class="img1" ></label>
              
                &emsp; &emsp;  &emsp; &emsp; &emsp;
         
                <select id="select" class="Sclasses" name="selectCourse"  >
  <?php
  if($as=="instructor"){
    $sql = mysqli_query($link,"SELECT courseName from instructors where instructorID = '$email'");
  } else{
    $sql = mysqli_query($link,"SELECT courseName from students where studentID = '$email'");
  }
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
        <form method="get" action="back.php">      
       <input class="b1" type="submit" id="back"  name="back" value="back" />
        </form>
           </div>
          </div>
        <br>
        <div style="float:left">
            <p class="instName">
                <?php
        echo"<p style=\"font-size:20px;margin-left:0px\">$name</p>";
        echo "<p style=\"color:darkblue\">$email</p>"
              
          ?>
            </p> 
      </div>
          <div class="formed1">
           <?php
           $course = $_SESSION['courseName'];
         //   echo "$course";
        echo"<p style=\"font-size:50px; color:darkblue\"> $course</p>";
           ?>
           
             </div>
          &emsp;  &emsp;  
         
              
            
       
         
     
      
        
        <div class="formed" style="overflow:scroll">
           <?php
       // $variable = select.options[select.selectedIndex].text;
              $course = $_SESSION['courseName'];
         $query1 = "SELECT * from discussions WHERE courseID='$course';";
         $sql1 = mysqli_query($link,$query1);
         while ($row1 = $sql1->fetch_assoc()){
         echo '<h2>'.$row1['title'].'</h2>';
         echo '<h4>Posted by '.$row1['User'].' on '.$row1['Time'].'</h4>';
         echo '<p>'.$row1['content'].'<br>-----------------------------------------------------------------------------------------------------------------------------------------------------------</p>'; 
     
         } 
        // <form method="POST" action="<?php $_SERVER['PHP_SELF'] 
         ?>
             </div>
          <br>
          <br>
           <div class="A">
               
      <form method="POST" action="addD.php">
      <input class="title" type="text" name="title" placeholder="Discussion Title" />  
       
   
      <br>
      <br>
     <textarea class="post" cols="120" rows="10" name="content" placeholder="Discussion content"></textarea>
      
        <br>
        <br>
        <div class="b"> 
         <table>
               
 <tr> <input class="b2" type="submit" id="share"  name="share" value="share" />
           
        </table>
        </div>
      </form>
      </div>
          
         </div>
            
      
    </body>
</html>