<?php 
include 'config.php';

if (!isset($_SESSION['user'])) {
    header("location:login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard | Quizzy by Adid Madki</title>
    <?php include 'header.php'; ?>

    <style>
        body{
            background:linear-gradient(135deg,#0f2027,#203a43,#2c5364);
        }

        .dashboard-title{
            font-weight:800;
            text-align:center;
            margin-bottom:8px;
            color:#fff;
            letter-spacing:1px;
        }

        .dashboard-sub{
            text-align:center;
            opacity:.9;
            margin-bottom:35px;
            color:#dcdcdc;
        }

        .action-btn{
            display:block;
            width:100%;
            padding:18px;
            font-size:20px;
            font-weight:700;
            border-radius:40px;
            margin-bottom:15px;
            background:linear-gradient(135deg,#00eaff,#8a2be2);
            border:none;
            color:#000;
            transition:all .35s ease;
        }

        .action-btn:hover{
            transform:translateY(-6px);
            box-shadow:0 15px 40px rgba(0,234,255,.7);
            color:#000;
        }

        .fade-up{
            animation:slideIn 1s ease;
        }

        @keyframes slideIn{
            from{opacity:0;transform:translateY(40px)}
            to{opacity:1;transform:translateY(0)}
        }
    </style>
</head>

<body>
<div class="container py-5 fade-up">
    <div class="card p-5 text-center"
         style="border-radius:22px;background:rgba(255,255,255,0.08);backdrop-filter:blur(14px);border:1px solid rgba(255,255,255,0.2);">

        <h1 class="dashboard-title">
            Welcome, <?= htmlspecialchars($_SESSION['user']['name']) ?> 👋
        </h1>

        <p class="dashboard-sub">
            Ready to test your knowledge and earn a certificate?
        </p>

        <!-- ONLY PLAY QUIZ BUTTON -->
        <a href="quiz_list.php" class="btn action-btn">
            ▶ Play Quiz
        </a>

    </div>
</div>
</body>
</html>
