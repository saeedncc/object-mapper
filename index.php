<?php

require 'vendor/autoload.php';

use \saeedncc\ObjectMapper\ObjectMapper;


$xml = <<<XML
<?xml version='1.0'?> 
<document>
 <identify>125</identify>
 <name>tom</name>
 <lastname>jordan</lastname>
 <old>20</old>
 <address>north bahar st</address>
</document>
XML;

$json='{"identify":"125","name":"tom","lastname":"jordan","old":"20","address":"north bahar st"}';


$pathYmal='./yaml/user.yml';

$object=ObjectMapper::map($pathYmal,$json);

print_r((array)$object);








