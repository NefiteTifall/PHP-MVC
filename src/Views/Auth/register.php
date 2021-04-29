<?php
ob_start();
?>
    <!-- register Form -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 Form">
                <form action="/register" method="post">
                    <h1>Création d'un compte</h1>

                    <div id="rondForm01" class="rond-trans rond-inv"></div>
                    <div id="rondForm02" class="rond-trans rond-inv"></div>

                    <input class="input" type="email" name="" placeholder="E-mail" value=""/>
                    <input class="input" type="text" name="" placeholder="Nom d'utilisateur" value=""/>
                    <input class="input" type="password" name="" placeholder="Mot de passe" value=""/>
                    <input class="input" type="password" name="" placeholder="Confirmation mot de passe" value=""/>
                    <div class="g-recaptcha" data-sitekey="6Ldvq28aAAAAANm9OPFQ6ntihii70-A2cJ6uGIvJ"></div>
                    <input class="submitInput" type="submit" value="Inscription">

                    <a href="">Vous avez déjà un compte ?</a>
                </form>
            </div>
        </div>
    </div>
    <!-- register Form -->

    <!-- style Forms -->
    <div class="topRight">
        <div id="carre02" class="square square-fonce"></div>
        <div id="carre03" class="square square-clair"></div>
    </div>
    <img class="bottomLeftFormSVG" src="./resources/image/BottomLeft_Form.svg" alt="">

    <div id="rond01" class="rond rond-clair"></div>
    <div id="carre01" class="square square-fonce"></div>
    <div id="rond02" class="rond rond-fonce"></div>
    <!-- style Forms -->
<?php

$content = ob_get_clean();

$description = 'Créer vous un compte FoxWind ici ! ';
$title = 'Créer un compte';
$style = '<link rel="stylesheet" href="/resources/style/register/register.css">';

require VIEWS . '/layout.php';
