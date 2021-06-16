<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?= $description  ?>">
    <title><?php if(isset($title)) echo $title; ?> | FoxWind</title>
    <!-- Bootstrap, jQuerry, Fontawesomelinks -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script defer src="/resources/js/app.js"></script>
    <link rel="icon" href="/resources/image/HeaderLogo_dark.png">
    <!-- End of Bootstrap, jQuerry, Fontawesomelinks -->
    <link rel="stylesheet" href="/resources/style/common.css">
    <?= $style ?? '' ?>
    <?= $script ?? '' ?>
</head>
<body class="loading" onload="loading()">
<?php include "header.php" ?>

<!-- Contenu de la page -->
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<main id="content">
    <?= $content; ?>
</main>
<!-- Contenu de la page -->

<?php include "footer.php" ?>
<?php if (isset($_SESSION["popup"])): ?>
    <?php include "popup.php" ?>
<?php endif; ?>
</body>
<script>
    function loading() {
        console.log("loaded")
        $('body').addClass('loaded');
        $('.toast__close').on("click", function(e){
            e.preventDefault();
            let parent = $(this).parent('.toast');
            parent.fadeOut("slow", function() { $(this).remove(); } );
            $.post("/destroyPopup")
        });
    };
</script>
<script>
    const popup = document.getElementById("popup");
    const fond = document.getElementsByClassName("fond-noir")[0];

    function disabledPopUp() {
        popup.remove();
        fond.remove();
    }

    if (popup !== null && fond !== null) {
        popup.addEventListener("click", disabledPopUp);
        fond.addEventListener("click", disabledPopUp);
    }
</script>
</html>
<?php
unset($_SESSION['error']);
unset($_SESSION['old']);
unset($_SESSION['msg']);
