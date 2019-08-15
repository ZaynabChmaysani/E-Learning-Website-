<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <style type="text/css">
            div.addCourse{
                border-radius:5px;
                border-color:black;
                margin:auto;
                width: 370px;
                height:270px;  
                margin-top:120px;

                background-color:mintcream;
                opacity:0.8;
                border-radius:10px;
                border: 1px solid darkblue;

            }
            .b1{
                margin-left:140px;
                width:80px;
                background-color: lavender;
                border-radius:5px;
            }
            .courseName{
                width:200px;
                border: 0.1px solid darkblue;
                border-radius:5px;
            }

            .courseD{
                border: 0.1px solid darkblue;
                border-radius:5px;
            }
            .h1{
                margin-left:520px;
                font:60px bold;

            }

        </style>

        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        ?>
        &emsp;&emsp;&emsp;<h1 class="h1">Add course</h1>
        <form method="post" action="addOK.php">
            <div class="addCourse">


                <br>
                <br>
                course name <input class="courseName" type="text" id="cs"  name="CourseName" required />
                <br> 
                <br> 

                <br>
                &emsp;&emsp;&emsp;<textarea class="courseD" cols="36" rows="6" name="textD" placeholder="course description" required></textarea>
                <br>
                <br>
                <br>

                <input class="b1" type="submit" id="addOK"  name="addbutton" value="OK" 
                       />   
                </div>

        </form>

    
</body>
</html>
