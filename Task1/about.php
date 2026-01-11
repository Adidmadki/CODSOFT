<!DOCTYPE html>
<html lang="en">
<head>
    <title>About Us | Quizzy by Adid Madki</title>
    <?php include 'header.php'; ?>

    <style>
        body{
            background:linear-gradient(135deg,#0f2027,#203a43,#2c5364);
        }

        .about-title{
            font-weight:800;
            text-align:center;
            margin-bottom:10px;
            color:#fff;
            letter-spacing:1px;
        }

        .about-sub{
            text-align:center;
            opacity:.85;
            margin-bottom:30px;
            color:#dcdcdc;
        }

        .about-box{
            font-size:16px;
            line-height:1.9;
            text-align:center;
            color:#e6e6e6;
        }

        .highlight{
            font-weight:700;
            color:#00eaff;
        }

        .about-card{
            border-radius:22px;
            background:rgba(255,255,255,0.08);
            backdrop-filter:blur(14px);
            border:1px solid rgba(255,255,255,0.2);
            animation:slideGlow 1s ease;
        }

        .fade-up{
            animation:slideGlow 1s ease;
        }

        @keyframes slideGlow{
            from{
                opacity:0;
                transform:translateY(40px);
                box-shadow:none;
            }
            to{
                opacity:1;
                transform:translateY(0);
                box-shadow:0 0 40px rgba(0,234,255,.35);
            }
        }

        .back-btn{
            padding:12px 45px;
            border-radius:30px;
            font-weight:600;
            background:linear-gradient(135deg,#00eaff,#8a2be2);
            border:none;
            color:#000;
            transition:.3s;
        }

        .back-btn:hover{
            transform:translateY(-3px);
            box-shadow:0 12px 35px rgba(0,234,255,.7);
            color:#000;
        }
    </style>
</head>

<body>
<div class="container py-5 fade-up">
    <div class="card p-5 about-card">

        <h1 class="about-title">About Quizzy</h1>
        <p class="about-sub">Think • Play • Achieve</p>

        <div class="about-box">
            <p>
                <span class="highlight">Quizzy by Adid Madki</span> is a modern and interactive
                quiz platform built to challenge your knowledge, sharpen your skills,
                and make learning fun and competitive.
            </p>

            <p>
                Every quiz is time-based to improve focus and decision-making speed.
                The platform supports multiple quiz categories, live scoring,
                and instant results.
            </p>

            <p>
                Whether you are a student or a lifelong learner, Quizzy helps you
                grow through smart practice and performance.
            </p>
        </div>

        <div class="text-center mt-4">
            <a href="index.php" class="btn back-btn">⬅ Back to Home</a>
        </div>

    </div>
</div>
</body>
</html>
