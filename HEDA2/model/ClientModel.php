<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClientModel
 *
 * @author EED Advisory
 */
require_once '../model/DBConnect.php';

class ClientModel extends DBConnect {

//put your code here
    protected $conn;
    protected $dbConnect;

    function __construct() {
        //$this->dbConnect = new DBConnect();
        //$this->conn = $this->dbConnect->getConnection();
        $this->conn = $this->getConnection();
    }

    function addUser($first_name, $second_name, $last_name, $gender, $passport, $country, $province, $county, $district, $division, $location, $nearest_town, $gps, $postal_address, $postal_town, $mobile, $email, $marital_status,$household_head,$household_category,$building_materials,$income_sources,$main_income_source,$monthly_income, $family_size, $rooms, $connected, $distance, $energy_source, $cooking_methods, $cooking_frequency,$cooking_type,$lighting_methods,$lighting_duration,$rooms_lit) {
        $result = 0;
        $db = $this->conn;
        $query = "INSERT INTO client_table( first_name, second_name, last_name, gender, passport, country, province,county,district,division,location,nearest_town,gps, postal_address,postal_town,mobile_number,email,marital_status,household_head,household_category,building_materials,income_sources,main_income,monthly_income, family_size,rooms,connected,distance,energy_source,cooking_methods,cooking_frequency,cooking_type,lighting_methods,lighting_duration,rooms_lit) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $insertstmt = $db->prepare($query);
        $insertstmt->bind_param("sssssssssssssssssssssssssssssssssss", $first_name, $second_name, $last_name, $gender, $passport, $country, $province, $county, $district, $division, $location, $nearest_town, $gps, $postal_address, $postal_town, $mobile, $email, $marital_status,$household_head,$household_category,$building_materials,$income_sources,$main_income_source,$monthly_income, $family_size, $rooms, $connected, $distance, $energy_source, $cooking_methods, $cooking_frequency,$cooking_type,$lighting_methods,$lighting_duration,$rooms_lit);
        $insertstmt->execute();
        $result = $insertstmt->affected_rows;
        return $result;
    }
    function editClient($id,$first_name, $second_name, $last_name, $gender, $passport, $country, $province, $county, $district, $division, $location, $nearest_town, $gps, $postal_address, $postal_town, $mobile, $email, $marital_status,$household_head,$household_category,$building_materials,$income_sources,$main_income_source,$monthly_income, $family_size, $rooms, $connected, $distance, $energy_source, $cooking_methods, $cooking_frequency,$cooking_type,$lighting_methods,$lighting_duration,$rooms_lit) {
        $result = 0;
        $db = $this->conn;
        $query = "UPDATE client_table SET first_name='$first_name',second_name='$second_name',last_name='$last_name',gender='$gender',passport='$passport',country='$country',province='$province',county='$county',district='$district',division='$division',location='$location',nearest_town='$nearest_town',gps='$gps',postal_address='$postal_address',postal_town='$postal_town',mobile_number='$mobile',email='$email',marital_status='$marital_status',household_head='$household_head',household_category='$household_category',building_materials='$building_materials',income_sources='$income_sources',main_income='$main_income_source',monthly_income='$monthly_income',family_size='$family_size',rooms='$rooms',connected='$connected',distance='$distance',energy_source='$energy_source',cooking_methods='$cooking_methods',cooking_frequency='$cooking_frequency',cooking_type='$cooking_type',lighting_methods='$lighting_methods',lighting_duration='$lighting_duration',rooms_lit='$rooms_lit' WHERE id=$id ";
        $result = mysqli_query($db, $query);
        return $result;
    }

    function getCoordinates() {
        $db = $this->conn;
        $points = array();
        $result = mysqli_query($db, "SELECT first_name, second_name, gps FROM client_table WHERE deleted=0");
        while ($row = mysqli_fetch_array($result)) {
            $points[] = array('name' => $row['first_name'] . ' ' . $row['second_name'], 'gps' => $row['gps']);
        }
        return $points;
    }

    function viewClients() {

        $db = $this->conn;
        $result = mysqli_query($db, "SELECT * FROM client_table WHERE deleted=0");
        echo "<table width = '880' border='0' class='table_s1' >";
        echo "<th width='10'>#</th>";
        echo "<th>Name</th>";
        echo "<th>Country</th>";
        echo "<th>Phone Number</th>";
        echo "<th>Connected</th>";
        echo "<th>Enegy Source</th>";
        echo "<th></th>";
        echo "<th></th>";
        echo "<th></th>";
        echo "<tbody>";
        $num = 0;
        while ($row = mysqli_fetch_array($result)) {
            $num++;
            echo "<tr>";
            echo "<td>";
            echo $num . '.';
            echo "</td>";
            echo "<td>";
            echo $row['first_name'] . " " . $row['second_name'];
            echo "</td>";
            echo "<td>";
            echo $row['country'];
            echo "</td>";
            echo "<td>";
            echo $row['mobile_number'];
            echo "</td>";
            echo "<td>";
            echo $row['connected'];
            echo "</td>";
            echo "<td>";
            echo $row['energy_source'];
            echo "</td>";
            echo "<td>";
            $id = $row['id'];
            $first_name = $row['first_name'];
            $second_name = $row['second_name'];
            $last_name = $row['last_name'];
            $gender = $row['gender'];
            $passport = $row['passport'];
            $country = $row['country'];
            $province = $row['province'];
            $county = $row['county'];
            $district = $row['district'];
            $division = $row['division'];
            $location = $row['location'];
            $nearest_town = $row['nearest_town'];
            $postal_address = $row['postal_address'];
            $postal_town = $row['postal_town'];
            $mobile = $row['mobile_number'];
            $email = $row['email'];
            $marital_status = $row['marital_status'];
            $family_size = $row['family_size'];
            $rooms = $row['rooms'];
            $connected = $row['connected'];
            $distance = $row['distance'];
            $energy = $row['energy_source'];
            $gps = $row['gps'];
            
            $household_head = $row['household_head'];
            $household_category = $row['household_category'];
            $building_materials = $row['building_materials'];
            $income_sources = $row['income_sources'];
            $main_source = $row['main_income'];
            $monthly_income = $row['monthly_income'];
            
            $cooking_methods = $row['cooking_methods'];
            $cooking_frequency = $row['cooking_frequency'];
            $cooking_type = $row['cooking_type'];
            $lighting_methods = $row['lighting_methods'];
            $rooms_lit = $row['rooms_lit'];
            $lighting_duration = $row['lighting_duration'];
            
            echo "<form action='view_client.php' method='POST'>
              <input type='text' name='first_name' value='$first_name' hidden>
              <input type='text' name='second_name' value='$second_name' hidden>
              <input type='text' name='last_name' value='$last_name' hidden>
              <input type='text' name='gender' value='$gender' hidden>
              <input type='text' name='passport' value='$passport' hidden>
              <input type='text' name='country' value='$country' hidden>
              <input type='text' name='province' value='$province' hidden>
              <input type='text' name='county' value='$county' hidden>
              <input type='text' name='district' value='$district' hidden>
              <input type='text' name='division' value='$division' hidden>
              <input type='text' name='location' value='$location' hidden>
              <input type='text' name='nearest_town' value='$nearest_town' hidden>
              <input type='text' name='postal_address' value='$postal_address' hidden>
              <input type='text' name='postal_town' value='$postal_town' hidden>
              <input type='text' name='mobile' value='$mobile' hidden>
              <input type='text' name='email' value='$email' hidden>
              <input type='text' name='marital_status' value='$marital_status' hidden>
              <input type='text' name='family_size' value='$family_size' hidden>
              <input type='hidden' name='rooms' value='$rooms' >
              <input type='hidden' name='connected' value='$connected' >
              <input type='hidden' name='distance' value='$distance' >
              <input type='hidden' name='fuel' value='$energy'>
              <input type='text' name='id' value='$id'  hidden>
              <input type='text' name='gps' value='$gps'  hidden>
              
              <input type='hidden' name='household_head' value='$household_head' >
              <input type='hidden' name='household_category' value='$household_category' >
              <input type='hidden' name='building_materials' value='$building_materials' >
              <input type='hidden' name='income_sources' value='$income_sources' >
              <input type='hidden' name='main_source' value='$main_source'  >
              <input type='hidden' name='monthly_income' value='$monthly_income'  >
              
              <input type='hidden' name='cooking_methods' value='$cooking_methods' >
              <input type='hidden' name='cooking_frequency' value='$cooking_frequency'>
              <input type='hidden' name='cooking_type' value='$cooking_type' >
              <input type='hidden' name='lighting_methods' value='$lighting_methods' >
              <input type='hidden' name='rooms_lit' value='$rooms_lit'>
              <input type='hidden' name='lighting_duration' value='$lighting_duration' >
              <input type='submit' name='view_client' value='View'>"
            . "</form>";
            echo "</td>";
            echo "<td>";
            echo "<form name='editForm' method='post' action='edit-client.php'>
            <input type='text' name='first_name' value='$first_name' hidden>
              <input type='text' name='second_name' value='$second_name' hidden>
              <input type='text' name='last_name' value='$last_name' hidden>
              <input type='text' name='gender' value='$gender' hidden>
              <input type='text' name='passport' value='$passport' hidden>
              <input type='text' name='country' value='$country' hidden>
              <input type='text' name='region' value='$province' hidden>
              <input type='text' name='county' value='$county' hidden>
              <input type='text' name='district' value='$district' hidden>
              <input type='text' name='division' value='$division' hidden>
              <input type='text' name='location' value='$location' hidden>
              <input type='text' name='nearest_town' value='$nearest_town' hidden>
              <input type='text' name='postal_address' value='$postal_address' hidden>
              <input type='text' name='postal_town' value='$postal_town' hidden>
              <input type='text' name='mobile' value='$mobile' hidden>
              <input type='text' name='email' value='$email' hidden>
              <input type='text' name='marital_status' value='$marital_status' hidden>
              <input type='text' name='family_size' value='$family_size' hidden>
              <input type='text' name='rooms' value='$rooms' hidden>
              <input type='hidden' name='connected' value='$connected' >
              <input type='text' name='distance' value='$distance' hidden>
              <input type='hidden' name='fuel' value='$energy' >
              <input type='text' name='id' value='$id'  hidden>
              <input type='text' name='gps' value='$gps'  hidden>
              <input type='text' name='household_head' value='$household_head' hidden>
              <input type='text' name='household_category' value='$household_category' hidden>
              <input type='text' name='building_materials' value='$building_materials' hidden>
              <input type='text' name='income_sources' value='$income_sources' hidden>
              <input type='text' name='main_source' value='$main_source'  hidden>
              <input type='text' name='monthly_income' value='$monthly_income'  hidden>
              <input type='hidden' name='cooking_methods' value='$cooking_methods' >
              <input type='hidden' name='cooking_frequency' value='$cooking_frequency' >
              <input type='hidden' name='cooking_type' value='$cooking_type' >
              <input type='hidden' name='lighting_methods' value='$lighting_methods' >
              <input type='hidden' name='rooms_lit' value='$rooms_lit'  >
              <input type='hidden' name='lighting_duration' value='$lighting_duration'  >
            <input type='submit' name='edit-client' value='Edit'>";
            echo "</form>";
            echo "</td>";
            echo "<td>";
            echo "<form name='deleteForm' method='post' action='delete.php'>";
            echo "<input type='text' name='id' value='$id'  hidden>";
            echo "<input type='submit' name='delete-client' value='Delete'>";
            echo "</form>";
            echo "</td>";

            echo "</tr>";
            echo "</tbody>";
        }
        echo "</table>";
    }
    
    function deleteClient($id) {
        $result = 0;
        $db = $this->conn;
        $query = "UPDATE client_table SET deleted=1 WHERE id=$id ";
        $result = mysqli_query($db, $query);
        return $result;
    }

    function getClientNameByMobNum($mobNum) {
        $db = $this->conn;
        $name = "";
        $result = mysqli_query($db, "SELECT first_name, second_name, last_name FROM client_table WHERE deleted=0 AND mobile_number='$mobNum' ");
        while ($row = mysqli_fetch_array($result)) {
            $firstName = $row['first_name'];
            $secondName = $row['second_name'];
            $lastName = $row['last_name'];
            $name = $firstName . ' ' . $secondName . ' ' . $lastName;
        }
        return $name;
    }

    function getClientsContacts() {
        $db = $this->conn;
        $num = array();
        $result = mysqli_query($db, "SELECT mobile_number FROM client_table WHERE deleted=0");
        while ($row = mysqli_fetch_array($result)) {
            $mobile = $row['mobile_number'];
            $num[] = $mobile;
        }
        return $num;
    }

}
