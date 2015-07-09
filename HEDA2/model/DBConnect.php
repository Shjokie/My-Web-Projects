<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBConnect
 *
 * @author EED Advisory
 */
class DBConnect {

    //put your code here

    function __construct() {
        
    }

    public function getConnection() {
        $conn = mysqli_connect('localhost', 'root', '', 'heda_db', '3306');
        if (!$conn) {
            die('Could not connect to MySQL: ' . mysqli_connect_error());
        }
        return $conn;
    }

}
