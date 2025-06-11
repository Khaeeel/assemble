<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Barangay Daang Bakal Health Center</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            display: flex;
            height: 100vh;
            background-color: #0a2d5e;
        }

        .left-side {
            flex: 1;
            background: url('images/bg.jpeg') no-repeat center center;
            background-size: cover;
        }

        .right-side {
            flex: 1;
            background-color: #0a2d5e;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            background-color: #fff;
            padding: 40px 30px;
            border-radius: 20px;
            width: 100%;
            max-width: 400px;
            text-align: center;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        .logo {
            width: 80px;
            margin-bottom: 15px;
        }

        h2 {
            font-size: 20px;
            margin-bottom: 30px;
            color: #333;
        }

        .google-login {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            padding: 10px 15px;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            color: #444;
            font-weight: bold;
            transition: background 0.2s;
        }

        .google-login:hover {
            background-color: #eaeaea;
        }

        .google-login img {
            width: 20px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="left-side"></div>
    <div class="right-side">
        <div class="login-card">
            <img src="<?php echo e(asset('images/logo1.png')); ?>" alt="Barangay Logo" class="logo">
            <h2>Welcome to Barangay Daang Bakal Health Center</h2>

            <!-- wag nyo na to galawin hehe -->
            <a href="<?php echo e(route('auth.google.redirect')); ?>" class="google-login">
                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/google/google-original.svg" alt="Google Logo">
                Sign in with Google
            </a>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\AssembleP2\resources\views\login.blade.php ENDPATH**/ ?>