1<?php
 /*
     Example10 : A 3D exploded pie graph
 */

 // Standard inclusions   
 require_once("../pChart/pData.class");
 require_once("../pChart/pChart.class");

 // Dataset definition 
 $DataSet = new pData;
 $data = array(10,2,3,5,13,11,13,12,11,15,15,6);
 $sum = array_sum($data);
 $DataSet->AddPoint($data,"Serie1");
 $DataSet->AddPoint(array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"),"Serie2");
 $DataSet->AddAllSeries();
 $DataSet->SetAbsciseLabelSerie("Serie2");

 // Initialise the graph
 $Test = new pChart(420,250);
 $Test->drawFilledRoundedRectangle(7,7,413,243,5,210,200,240);
 $Test->drawRoundedRectangle(5,5,415,245,5,0,230,230);
 $Test->createColorGradientPalette(195,204,56,223,110,41,5);

 // Draw the pie chart
 $Test->setFontProperties("../Fonts/tahoma.ttf",8);
 $Test->AntialiasQuality = 0;
 $Test->drawPieGraph($DataSet->GetData(),$DataSet->GetDataDescription(),180,130,110,PIE_PERCENTAGE_LABEL,FALSE,50,20,5);
 $Test->drawPieLegend(330,15,$DataSet->GetData(),$DataSet->GetDataDescription(),250,250,250);

 // Write the title
 $Test->setFontProperties("../Fonts/tahoma.ttf",13);
 $Test->drawTitle(10,20,"Charcoal Usage in 2015",114,16,46);
 $Test->drawTitle(320,220,'Total :'.$sum.'kg',224,46,147);
 $Test->Render("charcoal.png");
?>