<?php
// index.php
session_start();

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'set':
                if (isset($_POST['cookie_name']) && isset($_POST['cookie_value']) && isset($_POST['expiry'])) {
                    $expiry = time() + (intval($_POST['expiry']) * 60 * 60 * 24); // Convert days to seconds
                    setcookie($_POST['cookie_name'], $_POST['cookie_value'], $expiry);
                    $_SESSION['message'] = "Cookie '{$_POST['cookie_name']}' has been set!";
                }
                break;
            case 'delete':
                if (isset($_POST['cookie_name'])) {
                    setcookie($_POST['cookie_name'], '', time() - 3600); // Set expiry to past
                    unset($_COOKIE[$_POST['cookie_name']]);
                    $_SESSION['message'] = "Cookie '{$_POST['cookie_name']}' has been deleted!";
                }
                break;
        }
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
}

// Get message from session if exists
$message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
unset($_SESSION['message']); // Clear message after displaying
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie Manager</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .message {
            padding: 10px;
            margin-bottom: 20px;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
            color: #155724;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f8f9fa;
        }
        .delete-form {
            display: inline;
        }
        .delete-button {
            background-color: #dc3545;
            padding: 5px 10px;
            font-size: 0.9em;
        }
        .delete-button:hover {
            background-color: #c82333;
        }
        h2 {
            color: #333;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cookie Manager</h1>
        
        <?php if ($message): ?>
            <div class="message"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>

        <h2>Set New Cookie</h2>
        <form method="POST">
            <input type="hidden" name="action" value="set">
            <div class="form-group">
                <label for="cookie_name">Cookie Name:</label>
                <input type="text" id="cookie_name" name="cookie_name" required>
            </div>
            <div class="form-group">
                <label for="cookie_value">Cookie Value:</label>
                <input type="text" id="cookie_value" name="cookie_value" required>
            </div>
            <div class="form-group">
                <label for="expiry">Expiry (days):</label>
                <input type="number" id="expiry" name="expiry" value="30" min="1" required>
            </div>
            <button type="submit">Set Cookie</button>
        </form>

        <h2>Current Cookies</h2>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Value</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($_COOKIE)): ?>
                    <tr>
                        <td colspan="3">No cookies found</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($_COOKIE as $name => $value): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($name); ?></td>
                            <td><?php echo htmlspecialchars($value); ?></td>
                            <td>
                                <form method="POST" class="delete-form">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="cookie_name" value="<?php echo htmlspecialchars($name); ?>">
                                    <button type="submit" class="delete-button">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>