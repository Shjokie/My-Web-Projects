<?php

/*
  Example7 : A filled cubic curve graph
 */

// Standard inclusions   
require_once("../pChart/pData.class");
require_once("../pChart/pChart.class");

// Dataset definition 
$DataSet = new pData;
$DataSet->AddPoint(array(10, 9.4, 7.7, 5, 1.7,11,13,11,13,11.2,13.6,6.5), "Serie1");
$DataSet->AddPoint(array(3.4, 6.4, 8.6, 9.8, 9.9,9.4,7.7,13,11,13.6,11.2,5.6), "Serie2");
$DataSet->AddPoint(array(7.1, 9.1, 10, 9.7, 8.2,10,7.7,9.9,9.8,6.4,11.6,15.6), "Serie3");
$DataSet->AddPoint(array("Jan", "Feb", "Mar", "Apr", "May","June","July","Aug","Sept","Oct","Nov","Dec"), "Serie4");
//$DataSet->AddAllSeries();
$DataSet->AddSerie("Serie1");
$DataSet->AddSerie("Serie2");
$DataSet->AddSerie("Serie3");
$DataSet->SetAbsciseLabelSerie("Serie4");
$DataSet->SetSerieName("Charcoal", "Serie1");
$DataSet->SetSerieName("Firewood", "Serie2");
$DataSet->SetSerieName("Kerosene", "Serie3");
$DataSet->SetYAxisName("Amount Used (kg)");
$DataSet->SetXAxisName("Month of the year");

$DataSet->SetSerieSymbol("Serie1", "../Sample/Point_Asterisk.gif");
$DataSet->SetSerieSymbol("Serie2", "../Sample/Point_Cd.gif");


// Initialise the graph
$Test = new pChart(850, 250);
$Test->drawGraphAreaGradient(132, 153, 172, 50, TARGET_BACKGROUND);
$Test->reportWarnings("GD");
$Test->setFixedScale(0, 18, 5);
$Test->setFontProperties("../Fonts/tahoma.ttf", 8);
$Test->setGraphArea(65, 30, 570, 185);
$Test->drawFilledRoundedRectangle(7, 7, 693, 223, 5, 240, 240, 240);
//$Test->drawRoundedRectangle(5, 5, 695, 225, 5, 230, 230, 230);
$Test->drawGraphArea(255, 255, 255, TRUE);
$Test->drawScale($DataSet->GetData(), $DataSet->GetDataDescription(), SCALE_NORMAL, 0, 0, 0, TRUE, 0, 2, TRUE, 1);
$Test->drawGraphAreaGradient(162, 183, 202, 50);
$Test->drawGrid(4, TRUE, 230, 230, 230, 20);
// Draw the 0 line
$Test->setFontProperties("../Fonts/tahoma.ttf", 6);
$Test->drawTreshold(0, 143, 55, 72, TRUE, TRUE);

//$DataSet->RemoveSerie("Serie4");
$Test->drawLineGraph($DataSet->GetData(), $DataSet->GetDataDescription());
//$Test->drawPlotGraph($DataSet->GetData(),$DataSet->GetDataDescription(),3,2,255,255,255);
// Finish the graph   
$Test->setFontProperties("../Fonts/tahoma.ttf", 8);
$Test->drawLegend(590, 90, $DataSet->GetDataDescription(), 0, 255, 255);
$Test->setFontProperties("../Fonts/tahoma.ttf", 10);
// Draw the title
$Title = "Comparison of Household fuel usage in 2015";
$Test->drawTextBox(7, 225, 693, 245, $Title, 0, 255, 255, 255, ALIGN_RIGHT, TRUE, 0, 0, 0, 30);
//$Test->drawTitle(60,22,"Comparison Graph",50,50,50,585);
$Test->addBorder(2);
$Test->Render("clientsGraph.png");
?>
