<?php 
include 'config.php';

if(isset($_POST['reg'])){

    $n = mysqli_real_escape_string($conn, $_POST['name']);
    $e = mysqli_real_escape_string($conn, $_POST['email']);
    $p = md5($_POST['password']);

    // check duplicate email
    $check = mysqli_query($conn,"SELECT id FROM users WHERE email='$e'");

    if(mysqli_num_rows($check) > 0){
        $error = "Email already registered!";
    } else {
        mysqli_query($conn,
            "INSERT INTO users(name,email,password)
             VALUES('$n','$e','$p')"
        );
        header("location:login.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Register | Quizzy by Adid Madki</title>
<?php include 'header.php'; ?>

<style>
body{
    background:linear-gradient(135deg,#0f2027,#203a43,#2c5364);
}

.auth-card{
    max-width:460px;
    margin:auto;
    border-radius:22px;
    background:rgba(255,255,255,0.08);
    backdrop-filter:blur(14px);
    border:1px solid rgba(255,255,255,0.2);
    animation: flipIn 1s ease;
}

.auth-title{
    font-weight:800;
    margin-bottom:5px;
    color:#fff;
    text-align:center;
    letter-spacing:1px;
}

.auth-sub{
    opacity:.85;
    margin-bottom:28px;
    text-align:center;
    color:#dcdcdc;
}

.form-control{
    padding:14px;
    border-radius:14px;
    background:rgba(255,255,255,0.15);
    border:none;
    color:#fff;
}

.form-control::placeholder{
    color:#d0d0d0;
}

.form-control:focus{
    box-shadow:0 0 0 2px #00eaff;
    background:rgba(255,255,255,0.2);
    color:#fff;
}

.auth-btn{
    padding:14px;
    font-weight:700;
    border-radius:35px;
    font-size:17px;
    background:linear-gradient(135deg,#00eaff,#8a2be2);
    color:#000;
    border:none;
    transition:.35s;
}

.auth-btn:hover{
    transform:translateY(-3px);
    box-shadow:0 12px 35px rgba(0,234,255,.7);
    color:#000;
}

.link-text{
    margin-top:20px;
    text-align:center;
    color:#ccc;
}

.link-text a{
    color:#00eaff;
    text-decoration:none;
}

.link-text a:hover{
    text-decoration:underline;
}

/* ANIMATION */
@keyframes flipIn{
    from{
        opacity:0;
        transform:rotateX(30deg) translateY(40px);
    }
    to{
        opacity:1;
        transform:rotateX(0) translateY(0);
    }
}
</style>
</head>

<body>
<div class="container py-5">
<div class="card p-5 auth-card">

<h2 class="auth-title">Create Account</h2>
<p class="auth-sub">Join <b>Quizzy</b> & start learning</p>

<?php if(isset($error)){ ?>
    <div class="alert alert-danger text-center"><?php echo $error; ?></div>
<?php } ?>

<form method="post">
    <input name="name" class="form-control mb-3" placeholder="Full Name" required>

    <input name="email" type="email" class="form-control mb-3" placeholder="Email Address" required>

    <input type="password" name="password" class="form-control mb-4" placeholder="Password" required>

    <button name="reg" class="btn w-100 auth-btn">
        🚀 Register
    </button>
</form>

<div class="link-text">
    Already have an account?
    <a href="login.php">Login</a>
</div>

</div>
</div>
</body>
</html>
