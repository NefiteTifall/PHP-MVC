<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?= "temp"//$description ?>">
    <title><?= "temp"//$title ?> | FoxWind</title>
    <!-- Bootstrap link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c1d0ab37d6.js" crossorigin="anonymous"></script>
    <script defer src="/resources/js/app.js"></script>
    <!-- Bootstrap link -->
    <link rel="stylesheet" href="/resources/style/common.css">
    <?= isset($style)?$style:''?>
    <?= isset($script)?$script:''?>
</head>
<body class="loading">
    <?php include "header.php"?>

    <!-- Contenu de la page -->
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <main id="content">
        <?= $content;?>
    </main>
    <!-- Contenu de la page -->

    <?php include "footer.php"?>
    <?php if (isset($_SESSION["popup"])):?>
        <div class="fond-noir"></div>
        <div id="popup">
            <p><?= $_SESSION["popup"]?></p>
        </div>
    <?php endif;?>
</body>
<script>
    var popup = document.getElementById("popup");
    var fond = document.getElementsByClassName("fond-noir")[0];

    function disabledPopUp() {
        popup.remove();
        fond.remove();
    }

    if (popup!==null && fond!==null){
        popup.addEventListener("click",disabledPopUp);
        fond.addEventListener("click",disabledPopUp);
    }
    if (performance.getEntriesByType("navigation")[0].transferSize !== 0) $('body').addClass('loaded');
    $("header").ready(function() {
        console.log("loaded")
        setTimeout(function(){
            $('body').addClass('loaded');
        }, 3000);

    });


</script>
</html>
<?php
unset($_SESSION['error']);
unset($_SESSION['old']);
unset($_SESSION['msg']);
unset($_SESSION['popup']);
