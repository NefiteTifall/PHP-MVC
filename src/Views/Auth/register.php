<?php
ob_start();
?>
    <img class="rightDecoration" id="rightDecorationDefault" src="/resources/image/HeaderBackground_default.svg" alt="">
    <img class="rightDecoration" id="rightDecoration1301" src="/resources/image/HeaderBackground_1301.svg" alt="">
    <!-- register Form -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 Form">
                <form action="/register" method="post">
                    <h1>Création d'un compte</h1>

                    <div id="rondForm01" class="rond-trans rond-inv"></div>
                    <div id="rondForm02" class="rond-trans rond-inv"></div>

                    <div class="group">
                        <input class="input <?= !empty(error("email"))? "bt-red": ""?>" type="email" name="email" placeholder="E-mail" value="<?= old("email")?>"/>
                        <p class="error"><?= error("email")?></p>
                    </div>

                    <div class="group">
                        <input class="input <?= !empty(error("username"))? "bt-red": ""?>" type="text" name="username" placeholder="Nom d'utilisateur" value="<?= old("username")?>"/>
                        <p class="error"><?= error("username")?></p>
                    </div>

                    <div class="group">
                        <input class="input <?= !empty(error("password"))? "bt-red": ""?>" type="password" name="password" placeholder="Mot de passe" />
                        <p class="error"><?= error("password")?></p>
                    </div>

                    <div class="group">
                        <input class="input <?= !empty(error("passwordConfirm"))? "bt-red": ""?>" type="password" name="passwordConfirm" placeholder="Confirmation mot de passe" />
                        <p class="error"><?= error("passwordConfirm")?></p>
                    </div>

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
