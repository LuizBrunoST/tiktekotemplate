<?php
// Array simulando URLs de vídeos
$videos = [
    "ssstik.io_1687629998943.mp4",
    "video2.mp4",
    "ssstik.io_1687630214448.mp4",
];

// Obtém o índice do vídeo atual a partir da query string
$currentVideoIndex = isset($_GET['index']) ? intval($_GET['index']) : 0;

// Verifica se o índice está dentro dos limites do array
if ($currentVideoIndex < 0) {
    $currentVideoIndex = 0;
} elseif ($currentVideoIndex >= count($videos)) {
    $currentVideoIndex = count($videos) - 1;
}

// Obtém o URL do vídeo atual
$currentVideoUrl = $videos[$currentVideoIndex];

// Retorna o URL do vídeo como uma resposta JSON
header('Content-Type: application/json');
echo json_encode(['videoUrl' => $currentVideoUrl]);
?>
