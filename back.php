<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once './connection.php';
session_start();
$as = $_SESSION['as'];
if($as=="instructor"){
    header('Location: ./announcement.php');
} else{
    header('Location: ./Students.php');
}