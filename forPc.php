<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/padrao.css">
<link rel="stylesheet" href="fontawesome/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div id="video-container">
    <div id="video-wrapper">
        <video id="video-player" muted autoplay loop playsinline>
            <source id="video-source" src="" type="video/mp4">
        </video>
        <span id="prev-button" class="w3-display-left w3-button w3-blue"><i class="fa-solid fa-chevron-left w3-xxlarge"></i></span>
<span id="next-button" class="w3-display-right w3-button w3-blue"><i class="fa-solid fa-chevron-right w3-xxlarge"></i></span>
    </div>
</div>


<script>
$(document).ready(function () {
    const videoPlayer = $('#video-player')[0];
    const videoSource = $('#video-source');

    const videos = [
        "1.mp4",
        "2.mp4",
        "3.mp4",
        // Adicione mais vídeos conforme necessário
    ];

    let currentVideoIndex = 0;

    function playVideo(index) {
        const videoPath = videos[index];
        videoSource.attr('src', videoPath);
        videoPlayer.load();
        videoPlayer.play();
    }

    playVideo(currentVideoIndex);

    $('#prev-button').on('click', function () {
        // Pausa o vídeo atual
        videoPlayer.pause();

        // Move para o vídeo anterior (circulando se necessário)
        currentVideoIndex = (currentVideoIndex - 1 + videos.length) % videos.length;

        // Inicia o vídeo anterior com efeito de slide para a esquerda
        $('#video-wrapper').addClass('slide-right');
        setTimeout(function () {
            $('#video-wrapper').removeClass('slide-right');
            playVideo(currentVideoIndex);
        }, 500); // Duração da animação em milissegundos (0,5 segundos)
    });

    $('#next-button').on('click', function () {
        // Pausa o vídeo atual
        videoPlayer.pause();

        // Move para o próximo vídeo (circulando se necessário)
        currentVideoIndex = (currentVideoIndex + 1) % videos.length;

        // Inicia o próximo vídeo com efeito de slide para a direita
        $('#video-wrapper').addClass('slide-left');
        setTimeout(function () {
            $('#video-wrapper').removeClass('slide-left');
            playVideo(currentVideoIndex);
        }, 500); // Duração da animação em milissegundos (0,5 segundos)
    });
});
</script>

<style>
#video-container {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background-color: black; /* Cor de fundo do vídeo */
    display: flex;
    justify-content: center;
    align-items: center;
}

#video-wrapper {
    max-width: 100%;
    max-height: 100%;
    overflow: hidden;
    white-space: nowrap;
}

#video-player {
    display: inline-block;
    vertical-align: middle;
    width: 100%;
    height: 100%;
    transition: transform 0.5s ease-in-out; /* Adiciona efeito de slide */
}

/* Aplica a animação de slide */
#video-wrapper.slide-left #video-player {
    transform: translateX(-100%);
}

#video-wrapper.slide-right #video-player {
    transform: translateX(100%);
}
</style>

