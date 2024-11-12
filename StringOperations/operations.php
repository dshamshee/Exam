<?php
// Prompting for user input (using a hardcoded example for demonstration)
$inputString = "Hello, PHP String Operations";

// Length of the string
echo "Length of the string: " . strlen($inputString) . "<br>";

// String to Uppercase
echo "Uppercase: " . strtoupper($inputString) . "<br>";

// String to Lowercase
echo "Lowercase: " . strtolower($inputString) . "<br>";

// Uppercase first character
echo "Uppercase First Character: " . ucfirst($inputString) . "<br>";

// Uppercase first character of each word
echo "Uppercase First Character of Each Word: " . ucwords($inputString) . "<br>";

// Reverse the string
echo "Reversed String: " . strrev($inputString) . "<br>";

// Count the number of words
echo "Word Count: " . str_word_count($inputString) . "<br>";

// Replace a substring (example: replace 'a' with 'X')
echo "Replace 'a' with 'X': " . str_replace('a', 'X', $inputString) . "<br>";

// Check if a substring exists
$substring = "PHP";
if (strpos($inputString, $substring) !== false) {
    echo "The substring '$substring' was found in the input string.<br>";
} else {
    echo "The substring '$substring' was NOT found in the input string.<br>";
}

// Substring extraction (example: extracting first 5 characters)
echo "First 5 characters: " . substr($inputString, 0, 5) . "<br>";

// String position of a character (example: position of 'e')
$char = 'e';
$pos = strpos($inputString, $char);
if ($pos !== false) {
    echo "Position of '$char': $pos<br>";
} else {
    echo "'$char' not found in the string.<br>";
}

// Repeating a string (example: repeat string 3 times)
echo "Repeated String (3 times): " . str_repeat($inputString, 3) . "<br>";

// Trim whitespace
echo "Trimmed String (Whitespace removed): '" . trim($inputString) . "'<br>";

// Explode string into an array (by space)
$arrayFromString = explode(' ', $inputString);
echo "Exploded into Array: <pre>";
print_r($arrayFromString);
echo "</pre>";

// Implode array back into a string (with hyphen)
echo "Imploded Array (joined with '-'): " . implode('-', $arrayFromString) . "<br>";

// Comparing two strings
$anotherString = "Hello World";
if (strcmp($inputString, $anotherString) === 0) {
    echo "The input string is equal to '$anotherString'.<br>";
} else {
    echo "The input string is NOT equal to '$anotherString'.<br>";
}

// Convert a string to an array of characters
$charArray = str_split($inputString);
echo "String to Character Array: <pre>";
print_r($charArray);
echo "</pre>";

// Hashing a string (example: MD5)
echo "MD5 Hash: " . md5($inputString) . "<br>";
echo "SHA1 Hash: " . sha1($inputString) . "<br>";

// Checking if string starts with a specific substring
$startsWith = "Hello";
if (strpos($inputString, $startsWith) === 0) {
    echo "The string starts with '$startsWith'.<br>";
} else {
    echo "The string does NOT start with '$startsWith'.<br>";
}

// Checking if string ends with a specific substring
$endsWith = "Operations";
if (substr($inputString, -strlen($endsWith)) === $endsWith) {
    echo "The string ends with '$endsWith'.<br>";
} else {
    echo "The string does NOT end with '$endsWith'.<br>";
}
?>
