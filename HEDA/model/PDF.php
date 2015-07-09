<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PDF
 *
 * @author EED Advisory
 */
include 'fpdf.php';

/* class PDF1 extends FPDF {

  // Page header
  function Header() {
  // Logo
  $this->Image('C:\Users\EED Advisory\Documents\Bridge\images\BEL.png', 10, 6, 30);
  // Arial bold 15
  $this->SetFont('Arial', 'B', 15);
  // Move to the right
  $this->Cell(80);
  // Title
  $this->Cell(30, 10, 'Title', 1, 0, 'C');
  // Line break
  $this->Ln(20);
  }

  // Page footer
  function Footer() {
  // Position at 1.5 cm from bottom
  $this->SetY(-15);
  // Arial italic 8
  $this->SetFont('Arial', 'I', 8);
  // Page number
  $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
  }

  } */

class PDF extends FPDF {

// Load data
    function Header() {
        // Logo
        $this->Image('../images/logo.png', 130, 10, 30);
        $this->Ln(5);
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(0, 10, 'LIST OF SYSTEM USERS', 0, 0, 'C');
        $this->Ln(10);
        // Colors, line width and bold font
        $this->SetFillColor(255, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont('', 'B');
        // Header
        $header = array('#', 'Name', 'Appointment', 'Email Address','Role');
        $w = array(10, 70, 60, 65, 25);
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
        $this->Ln();
       
        
    }

// Page footer
    function Footer() {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    function LoadData($file) {
        // Read file lines
        $lines = file($file);
        $data = array();
        foreach ($lines as $line)
            $data[] = explode(';', trim($line));
        return $data;
    }

// Simple table
    function BasicTable($header, $data) {
        // Header
        $i = array(10, 60, 30, 55, 25);
        $num = 0;
        foreach ($header as $col) {
            $this->Cell($i[$num], 7, $col, 1);
            $num++;
        }
        $this->Ln();
        // Data

        foreach ($data as $row) {
            $j = 0;
            foreach ($row as $col) {
                $this->Cell($i[$j], 6, $col, 1);
                $j++;
            }
            $this->Ln();
        }
    }

// Better table
    function ImprovedTable($header, $data) {
        // Column widths
        $w = array(5, 45, 30, 50, 25);
        // Header
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
        $this->Ln();
        // Data
        foreach ($data as $row) {
            $this->Cell($w[0], 6, $row[0], 'LR');
            $this->Cell($w[1], 6, $row[1], 'LR');
            $this->Cell($w[2], 6, $row[2], 'LR');
            $this->Cell($w[3], 6, $row[3], 'LR');
            $this->Cell($w[4], 6, $row[4], 'LR');
            //$this->Cell($w[2], 6, number_format($row[2]), 'LR', 0, 'R');
            //$this->Cell($w[3], 6, number_format($row[3]), 'LR', 0, 'R');
            $this->Ln();
        }
        // Closing line
        $this->Cell(array_sum($w), 0, '', 'T');
    }

// Colored table
    function FancyTable($data) {
        
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $w = array(10, 70, 60, 65, 25);
        $fill = false;
        foreach ($data as $row) {
            $this->Cell($w[0], 6, $row[0], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $row[1], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, $row[2], 'LR', 0, 'L', $fill);
            $this->Cell($w[3], 6, $row[3], 'LR', 0, 'L', $fill);
            $this->Cell($w[4], 6, $row[4], 'LR', 0, 'L', $fill);
            $this->Ln();
            $fill = !$fill;
        }
        // Closing line
        $this->Cell(array_sum($w), 0, '', 'T');
    }

    

}
