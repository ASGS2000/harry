<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic PHP Control Statements</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 40px;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        .code-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 40px;
        }
        .code {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
        }
        .code pre {
            margin: 0;
            font-family: monospace;
            font-size: 16px;
            line-height: 1.5;
        }
        .interactive-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 40px;
        }
        .interactive-section input {
            margin-bottom: 10px;
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            width: 200px;
        }
        .interactive-section button {
            padding: 8px 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Dynamic PHP Control Statements</h1>

    <div class="interactive-section">
        <input type="number" id="age-input" placeholder="Enter your age">
        <button onclick="checkAge()">Check Age</button>
        <div id="age-result" class="code">
            <pre></pre>
        </div>
    </div>

    <div class="interactive-section">
        <input type="number" id="day-input" placeholder="Enter a day number">
        <button onclick="checkDay()">Check Day</button>
        <div id="day-result" class="code">
            <pre></pre>
        </div>
    </div>

    <div class="code-container">
        <h2>If Statement</h2>
        <div class="code">
            <?php
            $age = 20;
            echo "<pre>";
            if ($age >= 18) {
                echo "You are an adult.";
            } else {
                echo "You are a minor.";
            }
            echo "</pre>";
            ?>
        </div>
    </div>

    <div class="code-container">
        <h2>Switch Statement</h2>
        <div class="code">
            <?php
            $day = 3;
            echo "<pre>";
            switch ($day) {
                case 1:
                    echo "Today is Monday.";
                    break;
                case 2:
                    echo "Today is Tuesday.";
                    break;
                case 3:
                    echo "Today is Wednesday.";
                    break;
                case 4:
                    echo "Today is Thursday.";
                    break;
                case 5:
                    echo "Today is Friday.";
                    break;
                default:
                    echo "It's a weekend!";
            }
            echo "</pre>";
            ?>
        </div>
    </div>

    <div class="code-container">
        <h2>For Loop</h2>
        <div class="code">
            <?php
            echo "<pre>";
            for ($i = 1; $i <= 5; $i++) {
                echo "Number: $i<br>";
            }
            echo "</pre>";
            ?>
        </div>
    </div>

    <div class="code-container">
        <h2>While Loop</h2>
        <div class="code">
            <?php
            echo "<pre>";
            $i = 1;
            while ($i <= 5) {
                echo "Count: $i<br>";
                $i++;
            }
            echo "</pre>";
            ?>
        </div>
    </div>

    <script>
        function checkAge() {
            const ageInput = document.getElementById('age-input');
            const ageResult = document.getElementById('age-result');
            const age = parseInt(ageInput.value);

            ageResult.querySelector('pre').textContent = '';

            if (age >= 18) {
                ageResult.querySelector('pre').textContent = 'You are an adult.';
            } else {
                ageResult.querySelector('pre').textContent = 'You are a minor.';
            }
        }

        function checkDay() {
            const dayInput = document.getElementById('day-input');
            const dayResult = document.getElementById('day-result');
            const day = parseInt(dayInput.value);

            dayResult.querySelector('pre').textContent = '';

            switch (day) {
                case 1:
                    dayResult.querySelector('pre').textContent = 'Today is Monday.';
                    break;
                case 2:
                    dayResult.querySelector('pre').textContent = 'Today is Tuesday.';
                    break;
                case 3:
                    dayResult.querySelector('pre').textContent = 'Today is Wednesday.';
                    break;
                case 4:
                    dayResult.querySelector('pre').textContent = 'Today is Thursday.';
                    break;
                case 5:
                    dayResult.querySelector('pre').textContent = 'Today is Friday.';
                    break;
                default:
                    dayResult.querySelector('pre').textContent = 'It\'s a weekend!';
            }
        }
    </script>
</body>
</html>