<?php
$doc = new DOMDocument("1.0");
$carlot = $doc->createElement("carlot");
$carlot = $doc->appendChild($carlot);
$car1 = $doc->createElement("car");
$car1 = $carlot->appendChild($car1);
$make1 = $doc->createAttribute("make");
$make1->value = "Dodge";
$car1->appendChild($make1);
$model1 = $doc->createElement("model", "Challenger");
$model1 = $car1->appendChild($model1);
$model2 = $doc->createElement("model", "Charger");
$model2 = $car1->appendChild($model2);
$car2 = $doc->createElement("car");
$car2 = $carlot->appendChild($car2);
$make2 = $doc->createAttribute("make");
$make2->value = "Ford";
$car2->appendChild($make2);
$model3 = $doc->createElement("model", "Mustang");
$model3 = $car2->appendChild($model3);
$output = $doc->saveXML();
header("Content-type: application/xml");
echo $output;
?>