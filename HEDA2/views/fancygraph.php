<?php  
 // Standard inclusions     
require_once("../pChart/pData.class");
require_once("../pChart/pChart.class");
  
 // Dataset definition   
 $DataSet = new pData;  
 /*$DataSet->AddPoint(array(110,101,118,108,110,106,104),"Serie1");  
 $DataSet->AddPoint(array(700,2705,2041,1712,2051,846,903),"Serie2");  
 $DataSet->AddPoint(array("Jan","Feb","Mar","Apr","May","June","July"),"Serie3");  
 $DataSet->AddSerie("Serie1");  
 $DataSet->SetAbsciseLabelSerie("Serie3");  
 $DataSet->SetSerieName("Amount of Fuel Used","Serie1");  
 $DataSet->SetSerieName("Web Hits","Serie2");  */
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
  
 // Initialise the graph  
 $Test = new pChart(660,230);  
 $Test->drawGraphAreaGradient(90,90,90,90,TARGET_BACKGROUND);  
  
 // Prepare the graph area  
 $Test->setFontProperties("fonts/tahoma.ttf",8);  
 $Test->setGraphArea(60,40,595,190);  
  
 // Initialise graph area  
 $Test->setFontProperties("../Fonts/tahoma.ttf",8);  
  
 // Draw the SourceForge Rank graph  
 $DataSet->SetYAxisName("Amount of Fuel Used");  
 $Test->drawScale($DataSet->GetData(),$DataSet->GetDataDescription(),SCALE_NORMAL,213,217,221,TRUE,0,0);  
 $Test->drawGraphAreaGradient(40,40,40,-50);  
 $Test->drawGrid(4,TRUE,230,230,230,10);  
 $Test->setShadowProperties(3,3,0,0,0,30,4);  
 $Test->drawCubicCurve($DataSet->GetData(),$DataSet->GetDataDescription());  
 $Test->clearShadow();  
 $Test->drawFilledCubicCurve($DataSet->GetData(),$DataSet->GetDataDescription(),.1,30);  
 $Test->drawPlotGraph($DataSet->GetData(),$DataSet->GetDataDescription(),3,2,255,255,255);  
  
 // Clear the scale  
 $Test->clearScale();  
  
 // Draw the 2nd graph  
 /*$DataSet->RemoveSerie("Serie1");  
 $DataSet->AddSerie("Serie2");  
 $DataSet->SetYAxisName("Web Hits");  
 $Test->drawRightScale($DataSet->GetData(),$DataSet->GetDataDescription(),SCALE_NORMAL,213,217,221,TRUE,0,0);  
 $Test->drawGrid(4,TRUE,230,230,230,10);  
 $Test->setShadowProperties(3,3,0,0,0,30,4);  
 $Test->drawCubicCurve($DataSet->GetData(),$DataSet->GetDataDescription());  
 $Test->clearShadow();  
 $Test->drawFilledCubicCurve($DataSet->GetData(),$DataSet->GetDataDescription(),.1,30);  
 $Test->drawPlotGraph($DataSet->GetData(),$DataSet->GetDataDescription(),3,2,255,255,255);  */
  
 // Write the legend (box less)  
 $Test->setFontProperties("../Fonts/tahoma.ttf",8);  
 $Test->drawLegend(530,5,$DataSet->GetDataDescription(),0,0,0,0,0,0,255,255,255,FALSE);  
  
 // Write the title  
 $Test->setFontProperties("../Fonts/tahoma.ttf",18);  
 $Test->setShadowProperties(1,1,0,0,0);  
 $Test->drawTitle(0,0,"Comparison of Fuel usage in 2015",255,255,255,660,30,TRUE);  
 $Test->clearShadow();  
  
 // Render the picture  
 $Test->Render("clientsGraph.png");  
?>  