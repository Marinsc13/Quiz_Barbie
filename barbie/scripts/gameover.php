<?php

$total_questions = $_SESSION['game']['total_questions'];
$correct_answers = $_SESSION['game']['correct_answers']; 
$incorrect_answers = $_SESSION['game']['incorrect_answers'];
?>

<div class="result-container">   
    <h1> Quiz da Barbie</h1>
    <hr> 
    <h3>Total de perguntas: <strong class="result-value"><?= $total_questions ?></strong></h3>

    <h3>Acertos: <strong class="result-value"><?= $correct_answers ?></strong></h3>
    <h3>Erros: <strong class="result-value"><?= $incorrect_answers ?></strong></h3>
    <div>
        <a href="index.php?route=start" class="btn btn-secondary p-3 w-50"> Jogar Novamente </a>
    </div>
</div>