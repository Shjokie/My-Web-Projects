<?php 
include ("../views/session.php");

$user = $login_session;
?>
<?php

include 'fpdf.php';
require_once '../model/DBConnect.php';
require_once '../model/Messages.php';

class Profile extends FPDF {

    protected $conn;
    protected $dbConnect;
    public $id;
    public $first_name;
    public $second_name;
    public $last_name;
    protected $gender;
    protected $passport;
    protected $country;
    protected $province;
    protected $county;
    protected $district;
    protected $division;
    protected $location;
    protected $nearest_town;
    protected $postal_address;
    protected $postal_town;
    public $mobile;
    protected $email;
    protected $marital_status;
    protected $family_size;
    protected $rooms;
    protected $connected;
    protected $distance;
    protected $energy;
    protected $gps;
    protected $household_head;
    protected $household_category;
    protected $building_materials;
    protected $income_sources;
    protected $main_source;
    protected $monthly_income;
    protected $cooking_methods;
    protected $cooking_frequency;
    protected $cooking_type;
    protected $lighting_methods;
    protected $rooms_lit;
    protected $lighting_duration;
    protected $model;

    function Header() {
        // Logo
        $this->Image('../images/logo.png', 90, 10, 30);
        $this->Ln(5);
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(0, 6, 'RESPONDENT PROFILE ', 0, 0, 'C');
        $this->Ln(3);
        $this->SetFont('Arial', 'B', 13);
        $this->Cell(0, 10, 'RESPONDENT ID : ' . $this->id, 0, 0, 'C');

        $this->Ln(10);
        // Colors, line width and bold font
    }

    function clientData($mobNum) {
        $this->model = new DBConnect();
        $this->conn = $this->model->getConnection();
        $db = $this->conn;
        $result = mysqli_query($db, "SELECT * FROM client_table WHERE deleted=0 AND mobile_number='$mobNum' ");
        while ($row = mysqli_fetch_array($result)) {
            $this->id = $row['id'];
            $this->first_name = $row['first_name'];
            $this->second_name = $row['second_name'];
            $this->last_name = $row['last_name'];
            $this->gender = $row['gender'];
            $this->passport = $row['passport'];
            $this->country = $row['country'];
            $this->province = $row['province'];
            $this->county = $row['county'];
            $this->district = $row['district'];
            $this->division = $row['division'];
            $this->location = $row['location'];
            $this->nearest_town = $row['nearest_town'];
            $this->postal_address = $row['postal_address'];
            $this->postal_town = $row['postal_town'];
            $this->mobile = $row['mobile_number'];
            $this->email = $row['email'];
            $this->marital_status = $row['marital_status'];
            $this->family_size = $row['family_size'];
            $this->rooms = $row['rooms'];
            $this->connected = $row['connected'];
            $this->distance = $row['distance'];
            $this->energy = $row['energy_source'];
            $this->gps = $row['gps'];
            $this->household_head = $row['household_head'];
            $this->household_category = $row['household_category'];
            $this->building_materials = $row['building_materials'];
            $this->income_sources = $row['income_sources'];
            $this->main_source = $row['main_income'];
            $this->monthly_income = $row['monthly_income'];
            $this->cooking_methods = $row['cooking_methods'];
            $this->cooking_frequency = $row['cooking_frequency'];
            $this->cooking_type = $row['cooking_type'];
            $this->lighting_methods = $row['lighting_methods'];
            $this->rooms_lit = $row['rooms_lit'];
            $this->lighting_duration = $row['lighting_duration'];
        }
    }

    function generalInfo() {
        $this->SetFillColor(200, 220, 255);
        $this->SetTextColor(0);
        $this->Cell(0, 6, "GENERAL INFORMATION", 0, 1, 'L', true);
        $this->Ln(4);
        $this->SetFillColor(255);
        $data = array(
            array("NAME", $this->first_name . ' ' . $this->second_name . ' ' . $this->last_name),
            array("GENDER", $this->gender),
            array("ID NUMBER", $this->passport),
            array("COUNTRY", $this->country),
            array("PROVINCE", $this->province),
            array("COUNTY", $this->county),
            array("DISTRICT", $this->district),
            array("DIVISION", $this->division),
            array("LOCATION", $this->location),
            array("NEAREST TOWN", $this->nearest_town),
            array("GPS", $this->gps),
        );
        foreach ($data as $row) {
            $this->SetFont('Arial', 'B', 9);
            $this->Cell(50, 6, $row[0], 1, 0, 'LR', false);
            $this->SetFont('', '', 9);
            $this->Cell(100, 6, $row[1], 1, 1, 'LR', false);
        }
        $this->Ln();
    }

    function contactInfo() {
        $this->SetFillColor(200, 220, 255);
        $this->SetTextColor(0);
        $this->Cell(0, 6, "CONTACT INFORMATION", 0, 1, 'L', true);
        $this->Ln(4);
        $this->SetFillColor(255);
        $data = array(
            array("POSTAL ADDRESS", $this->postal_address),
            array("TOWN", $this->postal_town),
            array("MOBILE NUMBER", $this->mobile),
            array("EMAIL ADDRESS", $this->email),
        );
        foreach ($data as $row) {
            $this->SetFont('Arial', 'B', 9);
            $this->Cell(50, 6, $row[0], 1, 0, 'LR', false);
            $this->SetFont('', '', 9);
            $this->Cell(100, 6, $row[1], 1, 1, 'LR', false);
        }
        $this->Ln();
    }

    function householdInfo() {
        $this->SetFillColor(200, 220, 255);
        $this->SetTextColor(0);
        $this->Cell(0, 6, "HOUSEHOLD INFORMATION", 0, 1, 'L', true);
        $this->Ln(4);
        $this->SetFillColor(255);
        $data = array(
            array("MARITAL STATUS", $this->marital_status),
            array("HOUSEHOLD HEAD", $this->household_head),
            array("FAMILY SIZE", $this->family_size . ' Members'),
            array("NUMBER OF ROOMS", $this->rooms),
            array("HOUSEHOLD CATEGORY", $this->household_category),
            array("BUILDING ITEMS USED", $this->building_materials),
            array("INCOME/LIVELIHOOD SOURCES", $this->income_sources),
            array("MAIN INCOME SOURCE",$this->main_source),
            array("MONTHLY INCOME (KSH)", $this->monthly_income),
        );
        foreach ($data as $row) {
            $this->SetFont('Arial', 'B', 9);
            $this->Cell(75, 6, $row[0], 1, 0, 'LR', false);
            $this->SetFont('', '', 9);
            $this->Cell(75, 6, $row[1], 1, 1, 'LR', false);
        }
        $this->Ln();
    }

    function energySystemInfo() {
        $this->Ln();
        $this->Ln();
        $this->Ln();
        $this->SetFillColor(200, 220, 255);
        $this->SetTextColor(0);
        $this->Cell(0, 6, "ENERGY SYSTEM AND USE INFORMATION", 0, 1, 'L', true);
        $this->Ln(4);
        $this->SetFillColor(255);
        $data = array(
            array("CONNECTED TO GRID", $this->connected),
            array("DISTANCE FROM GRID", $this->distance.' Meters'),
            array("ENERGY SOURCES USED", $this->energy),
            array("COOKING METHODS", $this->cooking_methods),
            array("COOKING FREQUENCY", $this->cooking_frequency),
            array("COOKING TYPE", $this->cooking_type),
            array("LIGHTING METHODS", $this->lighting_methods),
            array("LIGHTING DURATION", $this->lighting_duration . '/DAY'),
            array("NUMBER OF ROOMS LIT", $this->rooms_lit),
        );
        foreach ($data as $row) {
            $this->SetFont('Arial', 'B', 9);
            $this->Cell(70, 6, $row[0], 1, 0, 'LR', false);
            $this->SetFont('', '', 9);
            $this->Cell(80, 6, $row[1], 1, 1, 'LR', false);
        }
        $this->Ln();
        
    }

    function summaryofEnergyUse() {

        $this->SetFillColor(255, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont('Arial', 'B', 8);
        // Header
        $header = array('FUEL', 'TOTAL CONSUMPTION(KG)', 'AVERAGE CONSUMPTION(KG/MONTH)');
        $w = array(30, 50, 70);
        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'L', true);
        }
        $this->Ln();
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');

        $total_charcoal = $total_kerosene = $total_firewood = 0.0;
        $formattedNum_charcoal = $formattedNum_kerosene = $formattedNum_firewood = 0.0;
        $messages = new Messages();
        //charcoal
        $array_charcoal = $messages->getTotalFuelConsumptionPerUser($this->mobile);
        if (count($array_charcoal) > 0) {
            $total_charcoal = array_sum($array_charcoal);
            $size_charcoal = count($array_charcoal);
            $mean_charcoal = $total_charcoal / $size_charcoal;
            $formattedNum_charcoal = number_format($mean_charcoal, 2);
        }

        //kerosene
        $array_kerosene = [12, 36, 14, 11, 18, 7, 10];
        if (count($array_kerosene) > 0) {
            $total_kerosene = array_sum($array_kerosene);
            $size_kerosene = count($array_kerosene);
            $mean_kerosene = $total_kerosene / $size_kerosene;
            $formattedNum_kerosene = number_format($mean_kerosene, 2);
        }

        //Firewood
        $array_firewood = [12, 36, 14, 11, 18, 7, 10, 18, 23, 65, 25, 71, 100, 12, 15, 36];
        if (count($array_firewood) > 0) {
            $total_firewood = array_sum($array_firewood);
            $size_firewood = count($array_firewood);
            $mean_firewood = $total_firewood / $size_firewood;
            $formattedNum_firewood = number_format($mean_firewood, 2);
        }
        $data = array(
            array("Charcoal", $total_charcoal, $formattedNum_charcoal),
            array("Kerosene", $total_kerosene, $formattedNum_kerosene),
            array("Firewood", $total_firewood, $formattedNum_firewood),
        );
        foreach ($data as $row) {
            $this->Cell(30, 6, $row[0], 1, 0, 'LR', false);
            $this->Cell(50, 6, $row[1], 1, 0, 'LR', false);
            $this->Cell(70, 6, $row[2], 1, 1, 'LR', false);
        }
        $this->Ln();
    }
    function signature($user) {
        date_default_timezone_set("Africa/Nairobi");
        $date = date('Y-m-d H:i:s');
        $this->Ln();
        $this->Ln();
        $this->Ln();
        $this->Ln();
        $this->Ln();
        $this->Ln();
        $this->SetFillColor(255);
        $this->SetTextColor(0);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 6, "Generated by :".$user, 0, 1, 'LR', false);
        $this->Cell(0, 6, "Generated on :".$date, 0, 1, 'L', true);
        $this->Ln(4);
    }

    function Footer() {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Household Energy Data Aggregator (HEDA) : Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    //put your code here
}

$pdf = new Profile("P");
$mob = $_GET['mobile'];
$pdf->clientData($mob);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->generalInfo();
$pdf->contactInfo();
$pdf->householdInfo();
$pdf->energySystemInfo();
$pdf->summaryofEnergyUse();
$pdf->signature($user);
//$pdf->SetFont('Arial','B',16);
//$pdf->Cell(40,10,'Hello World!');
$name = $pdf->first_name . '_' . $pdf->second_name . '_' . $pdf->last_name . '_' . 'Profile.pdf';
$pdf->Output("../files/Profiles/$name");
header("location: download-client-profile.php?file=$name");
?>
