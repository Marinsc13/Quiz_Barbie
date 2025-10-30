<?php

// Verifica se a requisição é do tipo POST (quando o formulário é enviado)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Obtém o número total de perguntas escolhidas pela jogadora (ou usa 10 como padrão)
    $total_questions = intval($_POST['text_total_questions'] ?? 10);

    prepare_game($total_questions);
    header('Location: index.php?route=game');
    exit;
}

function prepare_game($total_questions)
{
    global $capitals; 

    $ids = [];

    while (count($ids) < $total_questions) {
        $id = rand(0, count($capitals) - 1);
        if (!in_array($id, $ids)) {
            $ids[] = $id;
        }
    }

    $questions = [];
    foreach ($ids as $id) {
        $answers = [];
        $answers[] = $id;

        while (count($answers) < 3) {
            $tmp = rand(0, count($capitals) - 1);
            if (!in_array($tmp, $answers)) {
                $answers[] = $tmp;
            }
        }

        shuffle($answers);

        $questions[] = [
            'question' => $capitals[$id][0], // Pergunta (ex: "Qual o nome da amiga da Barbie?")
            'correct_answer' => $id,
            'answers' => $answers
        ];
    }

    $_SESSION['questions'] = $questions;

    $_SESSION['game'] = [
        'total_questions' => $total_questions,
        'current_question' => 0,
        'correct_answers' => 0,
        'incorrect_answers' => 0
    ];
}
?>

<!-- Início do código HTML para a tela inicial do jogo -->
<div class="container">
  <div class="row">
    <!-- Título do quiz -->
    <h1> Quiz da Barbie </h1>
    <hr>

    <!-- Formulário para escolher o número de perguntas -->
    <form action="index.php?route=start" method="post">
      <h3>
        <label for="text_total_questions" class="form-label">Quantas perguntas você quer jogar?</label>
        <input type="number" class="form-control" id="text_total_questions" name="text_total_questions"
               value="10" min="1" max="20">
      </h3>

      <!-- Botão para começar o jogo -->
      <div>
        <button type="submit" class="btn"> Começar o Quiz </button>
      </div>
    </form>
  </div>
</div>