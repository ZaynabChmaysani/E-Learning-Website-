<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$hostname = 'localhost';
$username = 'root';
$pwd = '';
$dbname = 'finaldb';

$link = mysqli_connect($hostname, $username, $pwd, $dbname);
 if (mysqli_connect_errno()) {
            die("Connection faild: " . mysqli_connect_error());

}



