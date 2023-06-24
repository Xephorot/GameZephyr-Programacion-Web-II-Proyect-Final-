<head>
    <link rel="stylesheet" type="text/css" href="models/styles/video.css">
</head>
<body>
    <div id="video-background">
        <?php
        $videoPath = 'public/videos/background.mp4'; // Ruta al archivo de video

        echo '<video autoplay loop muted>';
        echo '<source src="' . $videoPath . '" type="video/mp4">';
        echo '</video>';
        ?>
    </div>
</body>
