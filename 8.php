<?php
// String Operations in PHP
// 1. String Initialization
$string1 = "Hello";
$string2 = "World";
$combinedString = $string1 . " " . $string2;

// 2. String Length
$stringLength = strlen($combinedString);

// 3. Substring Extraction
$substring = substr($combinedString, 0, 5); // Extracts "Hello"

// 4. String Replacement
$replacedString = str_replace("World", "PHP", $combinedString); // Replaces "World" with "PHP"

// 5. String to Uppercase and Lowercase
$uppercaseString = strtoupper($combinedString); // Converts to "HELLO WORLD"
$lowercaseString = strtolower($combinedString); // Converts to "hello world"

// 6. Finding a Substring
$position = strpos($combinedString, "World"); // Finds the position of "World"

// 7. String Trimming
$trimmedString = trim("   Hello World   "); // Removes spaces from the start and end
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic PHP String Operations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 0 1rem;
        }
        .output {
            background-color: #fff;
            padding: 1.5rem;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }
        h1 {
            text-align: center;
            color: #007bff;
            margin-top: 2rem;
        }
        h2 {
            color: #333;
        }
        .interactive-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 2rem;
        }
        .interactive-section input {
            margin-bottom: 1rem;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            width: 100%;
            max-width: 300px;
            background-color: #f4f4f4;
        }
        .interactive-section button {
            padding: 0.5rem 1.5rem;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .interactive-section button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Dynamic PHP String Operations</h1>

        <div class="interactive-section">
            <input type="text" id="string-input" placeholder="Enter a string">
            <button onclick="displayStringOperations()">Perform Operations</button>
            <div id="string-result" class="output">
                <h2>String Operations</h2>
                <pre></pre>
            </div>
        </div>

        <div class="output">
            <h2>1. String Initialization</h2>
            <p><strong>String 1:</strong> <?php echo $string1; ?></p>
            <p><strong>String 2:</strong> <?php echo $string2; ?></p>
            <p><strong>Combined String:</strong> <?php echo $combinedString; ?></p>
        </div>

        <div class="output">
            <h2>2. String Length</h2>
            <p><strong>Length of Combined String:</strong> <?php echo $stringLength; ?></p>
        </div>

        <div class="output">
            <h2>3. Substring Extraction</h2>
            <p><strong>Extracted Substring:</strong> <?php echo $substring; ?></p>
        </div>

        <div class="output">
            <h2>4. String Replacement</h2>
            <p><strong>Replaced String:</strong> <?php echo $replacedString; ?></p>
        </div>

        <div class="output">
            <h2>5. String Case Conversion</h2>
            <p><strong>Uppercase String:</strong> <?php echo $uppercaseString; ?></p>
            <p><strong>Lowercase String:</strong> <?php echo $lowercaseString; ?></p>
        </div>

        <div class="output">
            <h2>6. Finding a Substring</h2>
            <p><strong>Position of "World":</strong> <?php echo $position !== false ? $position : 'Not found'; ?></p>
        </div>

        <div class="output">
            <h2>7. String Trimming</h2>
            <p><strong>Trimmed String:</strong> "<?php echo $trimmedString; ?>"</p>
        </div>
    </div>

    <script>
        function displayStringOperations() {
            const stringInput = document.getElementById('string-input');
            const stringResult = document.getElementById('string-result');
            const string = stringInput.value;

            stringResult.querySelector('pre').textContent = '';

            if (string) {
                stringResult.querySelector('pre').textContent = Original String: "${string}"\n;
                stringResult.querySelector('pre').textContent += Length: ${string.length}\n;
                stringResult.querySelector('pre').textContent += Substring (0, 5): ${string.slice(0, 5)}\n;
                stringResult.querySelector('pre').textContent += Reversed String: ${string.split('').reverse().join('')}\n;
                stringResult.querySelector('pre').textContent += Uppercase: ${string.toUpperCase()}\n;
                stringResult.querySelector('pre').textContent += Lowercase: ${string.toLowerCase()}\n;
                stringResult.querySelector('pre').textContent += Trimmed: "${string.trim()}";
            } else {
                stringResult.querySelector('pre').textContent = 'Please enter a string.';
            }
        }
    </script>
</body>
</html>