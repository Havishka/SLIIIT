<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DB_3 {

    //put your code here
    public static function create_conn() {

//        $servername = "mysql3000.mochahost.com";
          //$servername = "ftp.caddcentre.lk";
        $username = "caddcent_user";
        $password = "asdf1234";
        $dbname = "caddcent_cadd";

// Create connection
        $conn = new mysqli("localhost", $username, $password, $dbname);
// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            return;
        }

        return $conn;
    }

}
