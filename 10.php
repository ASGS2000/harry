<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Management</title>
    <style>
        :root {
            --primary-color: #4a90e2;
            --secondary-color: #2ecc71;
            --error-color: #e74c3c;
            --dark-color: #2c3e50;
            --light-color: #ecf0f1;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 400px;
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            color: var(--dark-color);
            font-size: 2em;
            margin-bottom: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--dark-color);
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            border-color: var(--primary-color);
            outline: none;
        }

        .btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: var(--primary-color);
            color: white;
        }

        .btn-danger {
            background: var(--error-color);
            color: white;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .message {
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }

        .message.error {
            background: #fde8e8;
            color: var(--error-color);
            border: 1px solid #fbd5d5;
        }

        .message.success {
            background: #def7ec;
            color: var(--secondary-color);
            border: 1px solid #bcf0da;
        }

        .dashboard {
            text-align: center;
        }

        .user-info {
            margin: 20px 0;
            padding: 20px;
            background: var(--light-color);
            border-radius: 8px;
        }

        .welcome-message {
            color: var(--dark-color);
            font-size: 1.5em;
            margin-bottom: 15px;
        }

        .session-info {
            color: var(--dark-color);
            margin: 10px 0;
            font-size: 0.9em;
        }

        .nav-links {
            margin-top: 20px;
        }

        .nav-links a {
            color: var(--primary-color);
            text-decoration: none;
            margin: 0 10px;
        }
    </style>
</head>
<body>

<?php
session_start();

// Initialize variables
$error = '';
$success = '';

// Login handling
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Simple validation (in real world, use proper authentication)
    if ($username === 'admin' && $password === 'password') {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['login_time'] = time();
        $success = 'Login successful!';
    } else {
        $error = 'Invalid username or password!';
    }
}

// Logout handling
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

// Check if user is logged in
if (!isset($_SESSION['logged_in'])) {
    // Login Form
    ?>
    <div class="container">
        <div class="header">
            <h1>Login</h1>
            <p>Please enter your credentials</p>
        </div>
        
        <?php if ($error): ?>
            <div class="message error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <?php if ($success): ?>
            <div class="message success"><?php echo $success; ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit" name="login" class="btn btn-primary">Login</button>
        </form>
    </div>
    <?php
} else {
    // Dashboard
    ?>
    <div class="container dashboard">
        <div class="header">
            <h1>Dashboard</h1>
        </div>
        
        <div class="user-info">
            <div class="welcome-message">
                Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!
            </div>
            
            <div class="session-info">
                <p>Login Time: <?php echo date('Y-m-d H:i:s', $_SESSION['login_time']); ?></p>
                <p>Session Duration: <?php 
                    $duration = time() - $_SESSION['login_time'];
                    echo floor($duration / 60) . ' minutes ' . ($duration % 60) . ' seconds';
                ?></p>
            </div>
        </div>
        
        <form method="POST" action="">
            <button type="submit" name="logout" class="btn btn-danger">Logout</button>
        </form>
    </div>
    <?php
}
?>

<script>
    // Add animation to messages
    document.addEventListener('DOMContentLoaded', function() {
        const messages = document.querySelectorAll('.message');
        messages.forEach(message => {
            message.style.animation = 'slideDown 0.5s ease-out';
        });
    });

    // Add form validation
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(e) {
            const username = document.getElementById('username');
            const password = document.getElementById('password');
            
            if (username.value.trim() === '' || password.value.trim() === '') {
                e.preventDefault();
                alert('Please fill in all fields');
            }
        });
    }
</script>

</body>
</html>