<?php
// Integer to Float
$int = 42;
$floatVal = (float)$int;
echo "Integer to Float: " . $floatVal . " (" . gettype($floatVal) . ")\n", "<br>";

// Float to Integer
$float = 42.58;
$intVal = (int)$float;
echo "Float to Integer: " . $intVal . " (" . gettype($intVal) . ")\n", "<br>";

// String to Integer
$string = "123";
$intFromString = (int)$string;
echo "String to Integer: " . $intFromString . " (" . gettype($intFromString) . ")\n", "<br>";

// String to Float
$stringFloat = "123.456";
$floatFromString = (float)$stringFloat;
echo "String to Float: " . $floatFromString . " (" . gettype($floatFromString) . ")\n", "<br>";

// Integer to String
$intToStr = (string)$int;
echo "Integer to String: " . $intToStr . " (" . gettype($intToStr) . ")\n", "<br>";

// Boolean to Integer
$boolTrue = true;
$boolFalse = false;
$intFromBoolTrue = (int)$boolTrue;
$intFromBoolFalse = (int)$boolFalse;
echo "Boolean (true) to Integer: " . $intFromBoolTrue . "\n", "<br>";
echo "Boolean (false) to Integer: " . $intFromBoolFalse . "\n", "<br>";

// Array to Object
$array = ['key1' => 'value1', 'key2' => 'value2'];
$objFromArray = (object)$array;
echo "Array to Object: ";
print_r($objFromArray);
echo  "<br>";
// Object to Array
$obj = new stdClass();
$obj->name = "John";
$obj->age = 30;
$arrayFromObj = (array)$obj;
echo "Object to Array: ";
print_r($arrayFromObj);
echo  "<br>";
// String to Boolean
$nonEmptyString = "Hello";
$emptyString = "";
$boolFromNonEmptyString = (bool)$nonEmptyString;
$boolFromEmptyString = (bool)$emptyString;
echo "String (non-empty) to Boolean: " . ($boolFromNonEmptyString ? 'true' : 'false') . "\n", "<br>";
echo "String (empty) to Boolean: " . ($boolFromEmptyString ? 'true' : 'false') . "\n", "<br>";

// JSON to Array (decoding)
$jsonStr = '{"name": "Alice", "age": 25}';
$jsonToArray = json_decode($jsonStr, true);
echo "JSON to Array: ";
print_r($jsonToArray);
echo  "<br>";
// JSON to Object (decoding)
$jsonToObj = json_decode($jsonStr);
echo "JSON to Object: ";
print_r($jsonToObj);
echo  "<br>";
// Array to JSON (encoding)
$arrayToJson = json_encode($array);
echo "Array to JSON: " . $arrayToJson . "\n", "<br>";

// Type Juggling
$var = "10";
echo "Original (string): " . $var . " (" . gettype($var) . ")\n", "<br>";
$var += 2; // Automatic type conversion to integer
echo "After addition (converted to int): " . $var . " (" . gettype($var) . ")\n", "<br>";

// Casting to Boolean
$zeroInt = 0;
$nonZeroInt = 42;
$zeroToBool = (bool)$zeroInt;
$nonZeroToBool = (bool)$nonZeroInt;
echo "Integer (0) to Boolean: " . ($zeroToBool ? 'true' : 'false') . "\n", "<br>";
echo "Integer (non-zero) to Boolean: " . ($nonZeroToBool ? 'true' : 'false') . "\n", "<br>";

// Null to String
$nullVal = null;
$nullToString = (string)$nullVal;
echo "Null to String: '" . $nullToString . "' (" . gettype($nullToString) . ")\n", "<br>";
?>
