# php object mapper

## Installation

Require this package with composer using the following command:

```bash
composer require saeedncc/object-mapper
```

## How to use

Define ymal file for custom object like this:

user.yml

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
```

Get response json or xml from external api or other and convert to object



```php

require 'vendor/autoload.php';

use \saeedncc\ObjectMapper\ObjectMapper;

$pathYmal='./yaml/user.yml';

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

$object=ObjectMapper::map($pathYmal,$json);

$object=ObjectMapper::map($pathYmal,$xml);

print_r((array)$object);
```

