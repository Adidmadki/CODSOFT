<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Select Quiz | Quizzy by Adid Madki</title>
    <?php include 'header.php'; ?>

    <style>
        body{
            background:linear-gradient(135deg,#0f2027,#203a43,#2c5364);
        }

        .page-title{
            font-weight:800;
            text-align:center;
            margin-bottom:30px;
            color:#fff;
            letter-spacing:1px;
        }

        .quiz-card{
            border-radius:22px;
            background:rgba(255,255,255,0.08);
            backdrop-filter:blur(14px);
            border:1px solid rgba(255,255,255,0.2);
            animation:fadeIn 1s ease;
        }

        .quiz-btn{
            display:block;
            width:100%;
            padding:18px;
            margin-bottom:18px;
            font-size:18px;
            font-weight:700;
            color:#000;
            background:linear-gradient(135deg,#00eaff,#8a2be2);
            border:none;
            border-radius:35px;
            text-align:center;
            text-decoration:none;
            transition:all .35s ease;
            box-shadow:0 15px 35px rgba(0,0,0,.35);
        }

        .quiz-btn:hover{
            transform:translateY(-6px) scale(1.02);
            box-shadow:0 20px 45px rgba(0,234,255,.7);
            color:#000;
        }

        .back-btn{
            margin-top:15px;
            padding:14px;
            border-radius:30px;
            font-weight:600;
            background:rgba(255,255,255,0.15);
            border:1px solid rgba(255,255,255,0.3);
            color:#fff;
            transition:.3s;
        }

        .back-btn:hover{
            background:#00eaff;
            color:#000;
            box-shadow:0 0 18px rgba(0,234,255,.7);
        }

        @keyframes fadeIn{
            from{opacity:0;transform:translateY(40px)}
            to{opacity:1;transform:translateY(0)}
        }
    </style>
</head>

<body>
<div class="container py-5">
    <div class="card p-5 quiz-card">
        <h2 class="page-title">🎯 Select Your Quiz</h2>

        <?php
        $q = mysqli_query($conn,"SELECT * FROM quizzes");
        while($r = mysqli_fetch_assoc($q)){
        ?>
            <a class="quiz-btn" href="quiz_play.php?id=<?=$r['id']?>">
                <?=$r['title']?> Quiz
            </a>
        <?php } ?>

        <a href="dashboard.php" class="btn back-btn w-100 mt-3">
            ⬅ Back to Dashboard
        </a>
    </div>
</div>
</body>
</html>
