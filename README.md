# php object mapper

## Installation

Require this package with composer using the following command:

```bash
composer require saeedncc/object-mapper
```

## How to use

Define ymal file for custom object like this:

userinfo.yml

```ymal
property: 
 - name: 'id'
   map: 'identify'
   type: 'integer'

 - name: 'frist_name'
   map: 'name'
   type: 'string'

 - name: 'last_name'
   map: 'lastname'
   type: 'string'
   
   
 - name: 'age'
   map: 'old'
   type: 'integer'
   
 - name: 'address'
   map: 'address'
   type: 'string'
   
 - name: 'info'
   map: 'information' 
   type: 'object'
   property:
    - name: 'mobile'
      map: 'mobilenumber'
      type: 'string'
      
    - name: 'tel'
      map: 'telphon'
      type: 'string'

    - name: 'email'
      map: 'mail'
      type: 'string'  
```

Get response json or xml from external api or other and convert to object



```php

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

stdClass Object
(
    [id] => 125
    [frist_name] => tom
    [last_name] => jordan
    [age] => 20
    [address] => north bahar st
    [info] => stdClass Object
        (
            [mobile] => 085236125
            [tel] => 52634855
            [email] => tom@gmail.com
        )

)

$json='{"identify":"125","name":"tom","lastname":"jordan","old":"20","address":"north bahar st","information":{"mobilenumber":"085236125","telphon":"52634855","mail":"tom@gmail.com"}}';


$object=ObjectMapper::map($pathYmal,$json);

print_r($object);

stdClass Object
(
    [id] => 125
    [frist_name] => tom
    [last_name] => jordan
    [age] => 20
    [address] => north bahar st
    [info] => stdClass Object
        (
            [mobile] => 085236125
            [tel] => 52634855
            [email] => tom@gmail.com
        )

)
```

