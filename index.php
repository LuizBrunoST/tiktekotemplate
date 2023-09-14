<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/padrao.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="w3-lght-gray">

    <div class="w3-container w3-center"><span class="w3-spinner-grow w3-blue"></span></div>

<div id="video-container" class="w3-display-container">
    <video id="video-player" muted autoplay loop playsinline>
        <source id="video-source" src="" type="video/mp4">
    </video>
    <div class="w3-display-right">
        <a class="w3-right" href="#">
            <img class="w3-circle w3-card" src="jpg.jpg" style="border:3px solid #2196F3;width:59px;height:59px;object-fit:cover;" alt="My Perfil">
        </a><br>
        <a class="w3-button w3-bar-item w3-block w3-right w3-text-blue" href="#"><i class="fa-solid fa-share-from-square w3-xlarge"></i></a><br>
        <a class="w3-button w3-bar-item w3-block w3-right w3-text-blue" href="#"><i class="fa-regular fa-heart w3-xlarge"></i></a><br>
        <a class="w3-button w3-bar-item w3-block w3-right w3-text-blue" href="#"><i class="fa-brands fa-stack-exchange w3-xlarge"></i></a><br>
        <a class="w3-button w3-bar-item w3-block w3-right w3-text-blue" href=""><span><i class="fa-solid fa-user-plus w3-xlarge"></i></span></a>
    </div>

    <div class="w3-display-bottomleft" style="width:200px;margin-bottom:43px;background:#2196f30a;">
        <span class="w3-text-white"><strong id="userName">@username</strong> - 12h Ago</span><br>
        <span class="w3-text-white"><marquee id="descri">Description</marquee></span><br>
        <span class="w3-text-white"><marquee><strong><i class="fa-solid fa-music"></i></strong> <span id="music">Eminem - Rap God</span></marquee></span>
    </div>

    <div class="w3-display-bottomleft w3-block">
        <div class="w3-row w3-large" style="background:#2196f30a;">
            <div class="w3-col s2">
                <a href="./" class="w3-button w3-text-blue w3-block"><i class="fa-solid fa-house"></i></a>
            </div>
            <div class="w3-col s2">
                <a href="#delivery" class="w3-button w3-text-blue w3-block"><i class="fa-solid fa-magnifying-glass"></i></a>
            </div>
            <div class="w3-col s3">
                <a href="#sorteios" class="w3-button w3-text-blue w3-block"><i class="fa-solid fa-arrow-up-from-bracket"></i></a>
            </div>
            <div class="w3-col s2">
                <a href="#sorteios" class="w3-button w3-text-blue w3-block"><i class="fa-solid fa-arrow-down"></i></a>
            </div>
            <div class="w3-col s3">
                <a href="#sorteios" class="w3-button w3-text-blue w3-block"><i class="fa-solid fa-user"></i></a>
            </div>
        </div>
    </div>
</div>

<style>
#video-container {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background-color: black; /* Cor de fundo do vídeo */
    animation-duration: 0.5s; /* Duração da animação */
    animation-timing-function: ease-in-out; /* Função de temporização da animação */
}

/* Define a animação de slide para cima */
@keyframes slide-up {
    0% {
        transform: translateY(100%);
    }
    100% {
        transform: translateY(0);
    }
}

/* Define a animação de slide para baixo */
@keyframes slide-down {
    0% {
        transform: translateY(0);
    }
    100% {
        transform: translateY(100%);
    }
}

/* Aplica a animação ao elemento de vídeo */
#video-container.up {
    animation-name: slide-up;
}

#video-container.down {
    animation-name: slide-down;
}

#video-player {
    width: 100%;
    height: 100%;
}
</style>

<script>
$(document).ready(function () {
    document.addEventListener('contextmenu', function (e) {
        e.preventDefault();
    });


    const videoPlayer = $('#video-player')[0];
    const videoSource = $('#video-source');
    const userName = $('#userName');
    const descri = $('#descri');
    const music = $('#music');

    const videos = [
        {
            src: "ssstik.io_1687629998943.mp4",
            author: "@naty",
            description: '123456789',
            music: "Vídeo 1"
        },
        {
            src: "ssstik.io_1687630183774.mp4",
            author: "@naty",
            description: 'nfsdjnfsdnfsjdf sdfsdfwef',
            music: "Vídeo 2"
        },
        {
            src: "ssstik.io_1687630214448.mp4",
            author: "@naty",
            description: 'sdfsfw fwewfwef',
            music: "Vídeo 3"
        },
        // Adicione mais vídeos conforme necessário
    ];

    let currentVideoIndex = 0;

    function playVideo(index) {
        const videoPath = videos[index].src;
        const author = videos[index].author;
        const description = videos[index].description;
        const title = videos[index].music;
        videoSource.attr('src', videoPath);
        videoPlayer.load();
        videoPlayer.play();

        userName.text(author);
        descri.text(description);
        music.text(title);
        $('title').text('('+ author +') '+ title + ' | Tiktok')
    }

    playVideo(currentVideoIndex);

    let startY = 0;

    $('#video-container').on('touchstart', function (e) {
        startY = e.originalEvent.touches[0].clientY;
    });

    $('#video-container').on('touchend', function (e) {
        const endY = e.originalEvent.changedTouches[0].clientY;
        const deltaY = startY - endY;

        if (deltaY > 50) { // Deslize para cima
            // Aplica a animação de slide para cima
            $('#video-container').addClass('up');

            // Pausa o vídeo atual
            videoPlayer.pause();

            // Move para o próximo vídeo (circulando se necessário)
            currentVideoIndex = (currentVideoIndex + 1) % videos.length;

            setTimeout(function () {
                // Remove a animação e inicia o próximo vídeo após a animação de slide
                $('#video-container').removeClass('up');
                playVideo(currentVideoIndex);
            }, 1000); // Tempo de espera igual à duração da animação
        } else if (deltaY < -50) { // Deslize para baixo
            // Aplica a animação de slide para baixo
            $('#video-container').addClass('down');

            // Pausa o vídeo atual
            videoPlayer.pause();

            // Move para o vídeo anterior (circulando se necessário)
            currentVideoIndex = (currentVideoIndex - 1 + videos.length) % videos.length;

            setTimeout(function () {
                // Remove a animação e inicia o vídeo anterior após a animação de slide
                $('#video-container').removeClass('down');
                playVideo(currentVideoIndex);
            }, 1000); // Tempo de espera igual à duração da animação
        }
    });
});
</script>
</body>
</html>