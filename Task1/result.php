<?php
include 'config.php';

if (!isset($_POST['quiz_id']) || !isset($_POST['ans'])) {
    die("Invalid access");
}

$quiz_id = intval($_POST['quiz_id']);
$userAns = $_POST['ans'];

$score = 0;
$details = [];

/* CHECK ANSWERS */
foreach ($userAns as $qid => $ans) {

    $qid = intval($qid);
    $ans = strtoupper($ans);

    $q = mysqli_query($conn,"SELECT question,a,b,c,d,correct FROM questions WHERE id=$qid");
    if ($q && mysqli_num_rows($q) == 1) {

        $row = mysqli_fetch_assoc($q);
        $isCorrect = ($ans === strtoupper($row['correct']));

        if ($isCorrect) $score++;

        $details[] = [
            'question' => $row['question'],
            'your'     => $ans,
            'correct'  => strtoupper($row['correct']),
            'options'  => [
                'A' => $row['a'],
                'B' => $row['b'],
                'C' => $row['c'],
                'D' => $row['d']
            ],
            'status'   => $isCorrect
        ];
    }
}

/* SAVE RESULT */
$uid = $_SESSION['user']['id'];
mysqli_query($conn,"INSERT INTO results(user_id,quiz_id,score) VALUES($uid,$quiz_id,$score)");

$pass = $score >= 5;
?>

<!DOCTYPE html>
<html>
<head>
<title>Result | Quizzy</title>
<?php include 'header.php'; ?>

<style>
body{
    background:linear-gradient(135deg,#141e30,#243b55);
}

.result-card{
    max-width:850px;
    margin:auto;
    background:#fff;
    border-radius:22px;
    animation:fadeUp 1s ease;
}

.score-circle{
    width:150px;
    height:150px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:42px;
    font-weight:800;
    margin:20px auto;
    color:white;
    background:<?= $pass ? 'linear-gradient(135deg,#00b09b,#96c93d)' : 'linear-gradient(135deg,#ff416c,#ff4b2b)' ?>;
}

.q-box{
    background:#f8f9ff;
    border-radius:14px;
    padding:18px;
    margin-bottom:15px;
}

.correct{color:#198754;font-weight:600}
.wrong{color:#dc3545;font-weight:600}

@keyframes fadeUp{
    from{opacity:0;transform:translateY(30px)}
    to{opacity:1;transform:translateY(0)}
}
</style>
</head>

<body>
<div class="container py-5">

<div class="result-card p-5 shadow">

<h2 class="text-center fw-bold">Quiz Result</h2>

<div class="score-circle"><?=$score?></div>

<p class="text-center fw-semibold mb-4">
<?= $pass ? "🎉 Congratulations! You passed the quiz." : "❌ Keep practicing, you’ll do better next time." ?>
</p>

<hr>

<h4 class="fw-bold mb-3">📘 Answer Review</h4>

<?php foreach($details as $i => $d): ?>
<div class="q-box">

    <p class="fw-semibold">
        <?= ($i+1) ?>. <?= htmlspecialchars($d['question']) ?>
    </p>

    <p class="<?= $d['status'] ? 'correct' : 'wrong' ?>">
        Your Answer: <?= $d['your'] ?> —
        <?= $d['options'][$d['your']] ?? 'Not Answered' ?>
    </p>

    <?php if(!$d['status']): ?>
    <p class="correct">
        Correct Answer: <?= $d['correct'] ?> —
        <?= $d['options'][$d['correct']] ?>
    </p>
    <?php endif; ?>

</div>
<?php endforeach; ?>

<div class="d-grid gap-3 mt-4">

<?php if($pass): ?>
<a href="cert/certificate.php?score=<?=$score?>" class="btn btn-primary btn-lg">
⬇ Download Certificate
</a>
<?php endif; ?>

<a href="dashboard.php" class="btn btn-dark btn-lg">
⬅ Back to Dashboard
</a>

</div>

</div>
</div>
</body>
</html>
