<?php
ob_start();
?>

    <img class="rightDecoration" id="rightDecorationDefault" src="resources/image/HeaderBackground_default.svg" alt="">
    <img class="rightDecoration" id="rightDecoration1301" src="resources/image/HeaderBackground_1301.svg" alt="">

    <section id="contactFirstSec">
        <div class="left">
            <h1>Nous contacter</h1>
        </div>
        <div class="right">
            <img src="./resources/image/rightImgContact.svg" alt=""/>
        </div>
        <div class="rond-inv" id="rondInvContact1"></div>
        <div class="rond-inv" id="rondInvContact2"></div>
        <div class="square square-clair" id="squareContact1"></div>
        <div class="square square-fonce" id="squareContact2"></div>
    </section>

    <section id="contact">
        <div class="content">
            <h2 class="title">Formulaire de contact</h2>
            <form action="/contact" method="post">
                <input value="<?= old("mail")?>" required type="email" name="mail" aria-label="Insérez votre E-MAIL" placeholder="Votre E-mail"/>
                <p class="error"><?= error("mail")?></p>

                <input value="<?= old("who")?>" required type="text" name="who" aria-label="Insérez votre correspondance (Client, Association, Partenaire etc)" placeholder="Qui êtes vous (Client,association etc.)"/>
                <p class="error"><?= error("who")?></p>

                <textarea required aria-label="Insérez ce que vous voulez nous faire parvenir" placeholder="Que voulez-vous nous dire ?" name="content"><?= old("content")?></textarea>
                <p class="error"><?= error("content")?></p>

                <button class="button-white">Envoyer</button>
            </form>
        </div>
    </section>

<?php
$description = 'Bienvenue sur FoxWind ';
$title = 'Vous voulez nous contacter ? Vous êtes au bonne endroit ! ';
$style = '<link rel="stylesheet" href="/resources/style/contact/contact.css">';
$content = ob_get_clean();

require VIEWS . '/layout.php';
