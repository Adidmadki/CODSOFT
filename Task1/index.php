<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Quizzy by Adid Madki</title>
    <?php include 'header.php'; ?>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">

    <style>
        body{
            font-family:'Poppins',sans-serif;
            margin:0;
            overflow:hidden;
            background:radial-gradient(circle at top,#1e3c72,#0f2027);
        }

        /* TOP NAV */
        .top-nav{
            position:absolute;
            top:25px;
            right:40px;
            display:flex;
            gap:12px;
            z-index:10;
        }

        .top-nav a{
            padding:8px 20px;
            font-size:14px;
            border-radius:30px;
            text-decoration:none;
            color:#fff;
            background:rgba(0,0,0,0.35);
            border:1px solid rgba(255,255,255,0.25);
            transition:all .35s ease;
        }

        .top-nav a:hover{
            background:#00eaff;
            color:#000;
            box-shadow:0 0 18px rgba(0,234,255,.8);
        }

        /* BRAND TOP CENTER */
        .brand-top{
            position:absolute;
            top:22px;
            left:50%;
            transform:translateX(-50%);
            text-align:center;
            color:#fff;
            animation:float 4s ease-in-out infinite;
        }

        .brand-top h1{
            font-size:30px;
            font-weight:800;
            margin:0;
            letter-spacing:2px;
            text-shadow:0 0 20px rgba(0,234,255,.8);
        }

        .brand-top span{
            font-size:12px;
            opacity:0.85;
            letter-spacing:1px;
        }

        /* HERO CENTER */
        .hero{
            height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            text-align:center;
            color:#fff;
        }

        .hero h2{
            font-size:74px;
            font-weight:800;
            letter-spacing:3px;
            animation:fadeZoom 1.2s ease;
            text-shadow:0 0 35px rgba(138,43,226,.9);
        }

        .hero p{
            margin-top:14px;
            font-size:18px;
            opacity:.9;
            animation:fadeZoom 1.5s ease;
        }

        .play-btn{
            margin-top:45px;
            display:inline-block;
            padding:22px 75px;
            font-size:24px;
            font-weight:700;
            color:#000;
            text-decoration:none;
            border-radius:50px;
            background:linear-gradient(135deg,#00eaff,#8a2be2);
            box-shadow:0 25px 55px rgba(0,0,0,.6);
            animation:glow 2.5s infinite alternate;
            transition:.4s;
        }

        .play-btn:hover{
            transform:translateY(-6px) scale(1.06);
            box-shadow:0 35px 75px rgba(0,234,255,.8);
            color:#000;
        }

        /* ANIMATIONS */
        @keyframes fadeZoom{
            from{opacity:0;transform:scale(.85)}
            to{opacity:1;transform:scale(1)}
        }

        @keyframes glow{
            from{box-shadow:0 0 25px rgba(0,234,255,.6)}
            to{box-shadow:0 0 45px rgba(138,43,226,.9)}
        }

        @keyframes float{
            0%{transform:translate(-50%,0)}
            50%{transform:translate(-50%,-10px)}
            100%{transform:translate(-50%,0)}
        }

        /* MOBILE */
        @media(max-width:768px){
            .hero h2{font-size:42px}
            .play-btn{font-size:18px;padding:16px 42px}
            .top-nav{right:20px}
        }
    </style>
</head>

<body>

<!-- TOP CENTER BRAND -->
<div class="brand-top">
    <h1>Quizzy</h1>
    <span>by Adid Madki</span>
</div>

<!-- TOP RIGHT NAV -->
<div class="top-nav">
    <a href="index.php">Home</a>
    <a href="about.php">About Us</a>

    <?php if(isset($_SESSION['user'])){ ?>
        <a href="dashboard.php">Dashboard</a>
        <a href="logout.php">Logout</a>
    <?php } else { ?>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    <?php } ?>
</div>

<!-- HERO CONTENT -->
<div class="hero">
    <div>
        <h2>Quizzy</h2>
        <p>Think fast • Play smart • Prove your skills</p>

        <a href="<?php echo isset($_SESSION['user']) ? 'quiz_list.php' : 'login.php'; ?>"
           class="play-btn">
            ▶ START QUIZ
        </a>
    </div>
</div>

</body>
</html>
