<?php
include 'config.php';

if (!isset($_GET['id'])) {
    die("Quiz not found");
}

$quiz_id = intval($_GET['id']);
$qs = mysqli_query($conn, "SELECT * FROM questions WHERE quiz_id=$quiz_id");

if (mysqli_num_rows($qs) == 0) {
    die("No questions found");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Quiz Play | Quizzy</title>
<?php include 'header.php'; ?>

<script>
let time = 120;
let timer = setInterval(() => {
    if (time <= 0) {
        clearInterval(timer);
        document.getElementById('quizForm').submit();
    }
    document.getElementById('timer').innerText = time + " sec";
    time--;
}, 1000);
</script>

<style>
body{
    background:linear-gradient(135deg,#1d2671,#c33764);
}

/* MAIN BOX */
.quiz-box{
    background:#ffffff;
    border-radius:20px;
    padding:35px;
    animation:fadeUp 1s ease;
}

/* TIMER */
.timer-box{
    background:#fff3cd;
    color:#856404;
    padding:10px 18px;
    border-radius:12px;
    font-weight:700;
    display:inline-block;
    animation:pulse 1.5s infinite;
}

/* QUESTION */
.question{
    font-size:19px;
    font-weight:700;
    margin-bottom:18px;
}

/* OPTIONS */
.option{
    background:#f1f4ff;
    padding:15px 20px;
    border-radius:14px;
    margin-bottom:14px;
    display:flex;
    align-items:center;
    gap:12px;
    cursor:pointer;
    transition:all .3s ease;
    border:2px solid transparent;
}

.option:hover{
    background:#e0e7ff;
    transform:translateX(5px);
}

.option input{
    transform:scale(1.3);
}

/* RADIO CHECK EFFECT */
.option input:checked + span{
    color:#0d6efd;
    font-weight:700;
}

/* SUBMIT BUTTON */
.submit-btn{
    background:linear-gradient(135deg,#00c6ff,#0072ff);
    border:none;
    color:white;
    font-size:20px;
    font-weight:700;
    padding:14px;
    border-radius:30px;
    transition:.4s;
}

.submit-btn:hover{
    transform:translateY(-4px);
    box-shadow:0 15px 40px rgba(0,114,255,.6);
}

/* ANIMATIONS */
@keyframes fadeUp{
    from{opacity:0;transform:translateY(40px)}
    to{opacity:1;transform:translateY(0)}
}

@keyframes pulse{
    0%{box-shadow:0 0 0 rgba(255,193,7,.7)}
    70%{box-shadow:0 0 18px rgba(255,193,7,.7)}
    100%{box-shadow:0 0 0 rgba(255,193,7,.7)}
}
</style>
</head>

<body>

<div class="container py-5">
<div class="quiz-box shadow-lg">

<h5 class="mb-4">
⏱ Time Left:
<span id="timer" class="timer-box">120 sec</span>
</h5>

<form method="post" action="result.php" id="quizForm">
<input type="hidden" name="quiz_id" value="<?=$quiz_id?>">

<?php
$i = 1;
while ($q = mysqli_fetch_assoc($qs)) {

    $options = [];
    foreach (['a','b','c','d'] as $o) {
        if (!empty(trim($q[$o]))) {
            $options[$o] = $q[$o];
        }
    }
?>

<div class="mb-4">
    <div class="question">
        <?=$i?>. <?=$q['question']?>
    </div>

<?php
if (count($options) < 2) {
    echo "<p class='text-danger'>⚠ Question has insufficient options</p>";
} else {
    foreach ($options as $key => $val) {
?>
    <label class="option">
        <input type="radio"
               name="ans[<?=$q['id']?>]"
               value="<?=strtoupper($key)?>">
        <span><?=$val?></span>
    </label>
<?php
    }
}
?>
</div>

<?php $i++; } ?>

<button class="submit-btn w-100 mt-3">
🚀 Submit Quiz
</button>

</form>

</div>
</div>

</body>
</html>
