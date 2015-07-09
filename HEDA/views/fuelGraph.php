<?php

/*
  Example13: A 2D exploded pie graph
 */

// Standard inclusions   
require_once("../pChart/pData.class");
require_once("../pChart/pChart.class");

// Dataset definition 
$DataSet = new pData;
$data = array(10, 12, 13);
$sum = array_sum($data);
$DataSet->AddPoint(array(10, 12, 13), "Serie1");
$DataSet->AddPoint(array("Charcoal", "Firewood", "Kerosene"), "Serie2");
$DataSet->AddAllSeries();
$DataSet->SetAbsciseLabelSerie("Serie2");

// Initialise the graph
$Test = new pChart(420,250);
$Test->setFontProperties("../Fonts/tahoma.ttf", 8);
$Test->drawFilledRoundedRectangle(7,7,413,243,5,240,240,240);
 $Test->drawRoundedRectangle(5,5,415,245,5,230,230,230);
//$Test->drawRoundedRectangle(5, 5, 295, 195, 5, 230, 230, 230);

// Draw the pie chart
$Test->AntialiasQuality = 0;
$Test->setShadowProperties(2, 2, 200, 200, 200);
$Test->drawFlatPieGraphWithShadow($DataSet->GetData(), $DataSet->GetDataDescription(), 150,130,90, PIE_PERCENTAGE, 8);
$Test->clearShadow();

$Test->drawPieLegend(330, 15, $DataSet->GetData(), $DataSet->GetDataDescription(), 250, 250, 250);
$Test->setFontProperties("../Fonts/tahoma.ttf",13);
$Test->drawTitle(10,20,"Fuel Usage in 2015",114,16,46);
$Test->drawTitle(320,220,'Total :'.$sum.'kg',224,46,147);
$Test->Render("fuel.png");
?>