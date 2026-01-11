<?php 
include 'config.php';

if(isset($_POST['login'])){
    $e = $_POST['email'];
    $p = md5($_POST['password']);

    $q = mysqli_query($conn,"SELECT * FROM users WHERE email='$e' AND password='$p'");
    if(mysqli_num_rows($q) == 1){
        $_SESSION['user'] = mysqli_fetch_assoc($q);
        header("location:dashboard.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login | Quizzy by Adid Madki</title>
    <?php include 'header.php'; ?>

    <style>
        body{
            background:linear-gradient(135deg,#0f2027,#203a43,#2c5364);
        }

        .login-title{
            font-weight:800;
            text-align:center;
            margin-bottom:25px;
            color:#fff;
            letter-spacing:1px;
        }

        .login-box{
            max-width:430px;
            margin:auto;
            border-radius:22px;
            background:rgba(255,255,255,0.08);
            backdrop-filter:blur(14px);
            border:1px solid rgba(255,255,255,0.2);
            animation: zoomIn 1s ease;
        }

        .login-box input{
            padding:14px;
            font-size:15px;
            background:rgba(255,255,255,0.15);
            border:none;
            color:#fff;
            border-radius:14px;
        }

        .login-box input::placeholder{
            color:#d0d0d0;
        }

        .login-box input:focus{
            box-shadow:0 0 0 2px #00eaff;
            background:rgba(255,255,255,0.2);
            color:#fff;
        }

        .login-btn{
            padding:14px;
            font-weight:700;
            border-radius:35px;
            font-size:17px;
            background:linear-gradient(135deg,#00eaff,#8a2be2);
            color:#000;
            border:none;
            transition:.35s;
        }

        .login-btn:hover{
            transform:translateY(-3px);
            box-shadow:0 12px 35px rgba(0,234,255,.7);
            color:#000;
        }

        .login-link{
            text-align:center;
            margin-top:18px;
            color:#ccc;
        }

        .login-link a{
            color:#00eaff;
            text-decoration:none;
            font-weight:600;
        }

        .login-link a:hover{
            text-decoration:underline;
        }

        @keyframes zoomIn{
            from{opacity:0;transform:scale(.85)}
            to{opacity:1;transform:scale(1)}
        }
    </style>
</head>

<body>
<div class="container py-5">
    <div class="card p-5 login-box">

        <h2 class="login-title">Welcome Back</h2>

        <form method="post">
            <input name="email" class="form-control mb-3" placeholder="Email Address" required>
            <input type="password" name="password" class="form-control mb-4" placeholder="Password" required>

            <button name="login" class="btn w-100 login-btn">
                🔐 Login
            </button>
        </form>

        <div class="login-link">
            Don’t have an account?<br>
            <a href="register.php">Create Account</a>
        </div>

    </div>
</div>
</body>
</html>
