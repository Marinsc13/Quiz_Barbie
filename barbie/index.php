<?php
// Inicia a sessão — isso permite armazenar informações entre as páginas,
// como o progresso do jogador, pontuação, perguntas, etc.
session_start();

// Obtém o parâmetro 'route' da URL (por exemplo, start, game ou gameover).
// Caso não exista, o valor padrão será 'start' — a página inicial do Quiz da Barbie.
$route = $_GET['route'] ?? 'start';

// Define qual arquivo de script será carregado com base na rota escolhida.
$script = null;

// Escolhe o conteúdo a ser mostrado 
switch ($route) {

    // Página inicial do Quiz da Barbie
    case 'start':
        $script = 'start';
        break;

    // Tela principal do jogo 
    case 'game':
        $script = 'game';
        break;

    // Tela de resultados — mostra os acertos e erros do jogador
    case 'gameover':
        $script = 'gameover';
        break;

    // Caso a rota não exista, mostra uma página de erro personalizada (404)
    default:
        $script = '404';
        break;
}

// Carrega o arquivo de dados 
$capitals = require __DIR__ . '/data/capitals.php';

// Carrega o cabeçalho da página 
require_once __DIR__ . '/scripts/header.php';

// Carrega o conteúdo correspondente à rota atual (start, game ou gameover).
require_once __DIR__ . "/scripts/$script.php";

// Carrega o rodapé da página 
require_once __DIR__ . '/scripts/footer.php';