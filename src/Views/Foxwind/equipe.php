<?php
ob_start();
?>

    <img class="rightDecoration" id="rightDecorationDefault" src="resources/image/HeaderBackground_default.svg" alt="">
    <img class="rightDecoration" id="rightDecoration1301" src="resources/image/HeaderBackground_1301.svg" alt="">

    <section id="presentation">
        <div class="left">
            <h1>Notre équipe</h1>
        </div>
        <div class="right">
            <img src="./resources/image/team.svg" draggable="false" alt="">
        </div>

        <!-- Forms -->

        <!-- Forms -->
    </section>
    <section id="midText">
        <p>Nous sommes une petite équipe de développeurs passionnés.
            Notre but est de rendre vos vies plus simples.</p>
    </section>
    <div id="team" class="container">
        <div class="row d-flex justify-content-between">
            <div class="col-md-4 dev-card">
                <img src="./resources/image/profile_placeholder.svg" alt="">
                <h3>Antoine Oriol</h3>
            </div>
            <div class="col-md-4 dev-card">
                <img src="./resources/image/profile_placeholder.svg" alt="">
                <h3>Nicolas Guillaume</h3>
            </div>
            <div class="col-md-4 dev-card">
                <img src="./resources/image/profile_placeholder.svg" alt="">
                <h3>Léo Griffoulière</h3>
            </div>
        </div>
    </div>


<?php

$description = 'Voici notre équipe ! ';
$title = 'Notre équipe ! ';
$style = '<link rel="stylesheet" href="/resources/style/equipe/equipe.css">';


$content = ob_get_clean();
require VIEWS . '/layout.php';
