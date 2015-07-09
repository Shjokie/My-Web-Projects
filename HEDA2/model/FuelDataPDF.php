<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sentMessagesPDF
 *
 * @author EED Advisory
 */
require_once 'fpdf.php';
class FuelDataPDF extends FPDF  {
    //put your code here
    function Header() {
        // Logo
        $this->Image('../images/logo.png', 130, 10, 30);
        $this->Ln(5);
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(0, 10, 'LIST OF HOUSEHOLD ENERGY USE', 0, 0, 'C');
        $this->Ln(10);
        
        $this->SetFillColor(255, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont('Arial', 'B',12);
        // Header
        $header = array('#', 'RESPONDENT','FUEL', 'AMOUNT (KG)', 'DATE');
        $w = array(20, 70, 50, 40,50);
        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'L', true);
        }
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
    function FuelTable($data) {
        
        // Colors, line width and bold font
        
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $w = array(20, 70, 50, 40,50);
        $fill = false;
        foreach ($data as $row) {
            $this->Cell($w[0], 6, $row[0], '', 0, 'L', $fill);
            $this->Cell($w[1], 6, $row[1], '', 0, 'L', $fill);
            $this->Cell($w[2], 6, $row[2], '', 0, 'L', $fill);
            $this->Cell($w[3], 6, $row[3], '', 0, 'L', $fill);
            $this->Cell($w[4], 6, $row[4], '', 0, 'L', $fill);
            //$this->Cell($w[4], 6, $row[4], 'LR', 0, 'L', $fill);
            //$this->Cell($w[2], 6, number_format($row[2]), 'LR', 0, 'R', $fill);
            //$this->Cell($w[3], 6, number_format($row[3]), 'LR', 0, 'R', $fill);
            $this->Ln();
            $fill = !$fill;
        }
        // Closing line
        $this->Cell(array_sum($w), 0, '', 'T');
    }
}
