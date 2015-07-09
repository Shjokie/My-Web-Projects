<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of userModel
 *
 * @author EED Advisory
 */
require_once 'DBConnect.php';
//include 'fpdf.php';
include 'PDF.php';

class SystemUsersModel extends DBConnect {

//put your code here

    protected $conn;
    protected $dbConnect;

    function __construct() {
        //$this->dbConnect = new DBConnect();
        //$this->conn = $this->dbConnect->getConnection();
        $this->conn = $this->getConnection();
    }

    function login($username, $password) {
        $success = 0;
        $result = mysqli_query($this->conn, "SELECT username, first_name, last_name, password FROM system_users WHERE username='$username' AND password ='$password' AND deleted =0 ");
        $row = mysqli_fetch_array($result);
        if ($row["username"] == $username && $row["password"] == $password) {
            $success = 1;
        }
        return $success;
    }

    function addUser($first_name, $middle_name, $last_name, $appointment, $email, $username, $password, $role) {
        $result = 0;
        $db = $this->conn;
        $query = "INSERT INTO system_users( first_name, middle_name, last_name, appointment, email, username, password,role) VALUES (?,?,?,?,?,?,?,?)";
        $insertstmt = $db->prepare($query);
        $insertstmt->bind_param("ssssssss", $first_name, $middle_name, $last_name, $appointment, $email, $username, $password, $role);
        $insertstmt->execute();
        $result = $insertstmt->affected_rows;
        return $result;
    }

    function viewUsers() {

        $db = $this->conn;
        $result = mysqli_query($db, "SELECT * FROM system_users WHERE deleted=0");
        echo "<table width = '880' border='0' class='table_s1' >";
        echo "<th width='30'>#</th>";
        echo "<th>Name</th>";
        echo "<th>Appointment</th>";
        echo "<th>Email Address</th>";
        echo "<th>Role</th>";
        echo "<th></th>";
        echo "<tbody>";
        $num = 0;
        while ($row = mysqli_fetch_array($result)) {
            $num++;
            echo "<tr>";
            echo "<td>";
            echo $num;
            echo "</td>";
            echo "<td>";
            echo $row['first_name'] . " " . $row['middle_name'] . ' ' . $row['last_name'];
            echo "</td>";
            echo "<td>";
            echo $row['appointment'];
            echo "</td>";
            echo "<td >";
            echo $row['email'];
            echo "</td>";
            echo "<td>";
            echo $row['role'];
            echo "</td>";
            echo "</td>";
            echo "<td>";
            $id = $row['id'];
            echo "<form name='form1' method='post' action='delete.php'>
            <input type='hidden' name='id' value=$id>
            <input type='submit' name='delete-user' value='Delete' class='button'>
            </form>


                   ";

            echo "</td>";
            echo "</tr>";
            echo "</tbody>";
        }
        echo "</table>";
    }

    public function deleteUser($id) {
        $result = 0;
        $db = $this->conn;
        $query = "UPDATE system_users SET deleted=1 WHERE id=$id ";
        $result = mysqli_query($db, $query);
        return $result;
    }

    function printUsers() {

        $db = $this->conn;
        $result = mysqli_query($db, "SELECT * FROM system_users WHERE deleted=0");
        $num = 0;
        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->SetFont('Arial', '', 12);
        $data = Array();
        while ($row = mysqli_fetch_array($result)) {
            $num++;
            $name = $row['first_name'] . " " . $row['middle_name'] . ' ' . $row['last_name'];
            $appointment = $row['appointment'];
            $email = $row['email'];
            $role = $row['role'];
            $data [] = [$num, $name, $appointment, $email, $role];
        }
        $pdf->AddPage();
        $pdf->FancyTable($data);
        $pdf->Output("../files/List of Users.pdf");
    }

}
