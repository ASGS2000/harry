<?php
// String Creation
$string1 = 'Hello, World!';
$string2 = "Hello, World!";

echo "<strong>String Operations</strong><br><br>";

// String Length
$length = strlen($string1);
echo "<strong>Length:</strong> $length<br>"; // Output: Length: 13
echo "<br>";

// String Position
$position = strpos($string1, 'World');
echo "<strong>Position of 'World':</strong> $position<br>"; // Output: Position of 'World': 7
echo "<br>";

// Substring
$substring = substr($string1, 7, 5);
echo "<strong>Substring:</strong> $substring<br>"; // Output: Substring: World
echo "<br>";

// String Replacement
$newString = str_replace('World', 'PHP', $string1);
echo "<strong>Replaced String:</strong> $newString<br>"; // Output: Replaced String: Hello, PHP!
echo "<br>";

// String Concatenation
$concatenated = $string1 . ' How are you?';
echo "<strong>Concatenated String:</strong> $concatenated<br>"; // Output: Hello, World! How are you?
echo "<br>";

// String to Lower/Upper Case
$lowercase = strtolower($string1);
$uppercase = strtoupper($string1);
echo "<strong>Lowercase:</strong> $lowercase<br>"; // Output: Lowercase: hello, world!
echo "<strong>Uppercase:</strong> $uppercase<br>"; // Output: Uppercase: HELLO, WORLD!
echo "<br>";

// Trimming Strings
$trimmed = trim("  Hello, World!  ");
echo "<strong>Trimmed String:</strong> '$trimmed'<br>"; // Output: Trimmed String: 'Hello, World!'
echo "<br>";

// String Splitting
$array = explode(', ', $string1);
echo "<strong>Array after splitting:</strong> ";
print_r($array); // Output: Array ( [0] => Hello [1] => World! )
echo "<br><br>";

// Joining Strings
$joined = implode(' ', $array);
echo "<strong>Joined String:</strong> $joined<br>"; // Output: Joined String: Hello World!
echo "<br>";

// Searching for a Substring
$found = strstr($string1, 'World');
echo "<strong>Found Substring:</strong> $found<br>"; // Output: Found Substring: World!
echo "<br>";
// String Comparison
$isEqual = strcmp($string1, $string2) === 0;
echo "<strong>Strings are equal:</strong> " . ($isEqual ? 'Yes' : 'No') . "<br>"; // Output: Strings are equal: Yes
echo "<br>";
?>