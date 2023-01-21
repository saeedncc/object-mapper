<?php

require 'vendor/autoload.php';

use \saeedncc\ObjectMapper\ObjectMapper;

$pathYmal='./yaml/userinfo.yml';

$xml = <<<XML
<?xml version='1.0'?> 
<document>
 <identify>125</identify>
 <name>tom</name>
 <lastname>jordan</lastname>
 <old>20</old>
 <address>north bahar st</address>
 <information>
	<mobilenumber>085236125</mobilenumber>
	<telphon>52634855</telphon>
	<mail>tom@gmail.com</mail>
 </information>
</document>
XML;

$object=ObjectMapper::map($pathYmal,$xml);

print_r($object);


$json='{"identify":"125","name":"tom","lastname":"jordan","old":"20","address":"north bahar st","information":{"mobilenumber":"085236125","telphon":"52634855","mail":"tom@gmail.com"}}';



$object=ObjectMapper::map($pathYmal,$json);

print_r($object);








