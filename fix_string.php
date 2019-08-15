<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function mysql_fix_string($string) {
	if (get_magic_quotes_gpc()){
        $string = stripslashes($string);}
	return mysql_real_escape_string($string);
}

