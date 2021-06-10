<?php
ob_start();
?>

    <img class="rightDecoration" id="rightDecorationDefault" src="resources/image/HeaderBackground_default.svg" alt="">
    <img class="rightDecoration" id="rightDecoration1301" src="resources/image/HeaderBackground_1301.svg" alt="">
    <!-- Navbar -->

    <!-- login Form -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 Form">
                <form method="post" action="/login">
                    <h1>Connexion au compte</h1>
                    <p class="error"><?= error("message")?></p>
                    <div id="rondForm01" class="rond-trans rond-inv"></div>
                    <div id="rondForm02" class="rond-trans rond-inv"></div>

                    <div class="group">
                        <input class="input" type="email" name="email" placeholder="E-mail" value="<?=old("email")?>"/>
                        <p class="error"><?= error("email")?></p>
                    </div>

                    <div class="group">
                        <input class="input" type="password" name="password" placeholder="Mot de passe" value=""/>
                        <p class="error"><?= error("password")?></p>
                    </div>
                    <div class="g-recaptcha" data-sitekey="6Ldvq28aAAAAANm9OPFQ6ntihii70-A2cJ6uGIvJ"></div>
                    <input class="submitInput" type="submit" value="Connexion">

                    <a href="/register">Inscrivez-vous ici !</a>
                </form>
            </div>
        </div>
    </div>
    <!-- /login Form -->

    <!-- style Forms -->
    <div class="topRight">
        <div id="carre02" class="square square-fonce"></div>
        <div id="carre03" class="square square-clair"></div>
    </div>

    <div id="rond01" class="rond rond-fonce"></div>
    <div id="carre01" class="square square-fonce"></div>
    <div id="rond02" class="rond rond-fonce"></div>
    <!-- /style Forms -->

<?php

$description = 'Connectez vous ici ';
$title = 'Connecter vous ! ';
$style = '<link rel="stylesheet" href="/resources/style/login/login.css">';
$script = "<script src='https://www.google.com/recaptcha/api.js?hl=fr'></script>";


$content = ob_get_clean();
require VIEWS . '/layout.php';
