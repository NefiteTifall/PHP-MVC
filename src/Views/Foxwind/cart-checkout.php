<?php
ob_start();
?>
    <img id="rightDecoration" src="./resources/image/rightCartShape.svg" alt="">

    <section id="formul">
        <div class="cart-content">
            <h1>Vos articles (1)</h1>
            <?php if (isset($_SESSION["cart"]["eol"]) && count($_SESSION["cart"]["eol"])>0){?>
                <?php foreach ($_SESSION["cart"]["eol"] as $key=>$elem){?>
                    <div class="cart-elements">
                        <div class="cart-img-container">
                            <img src="<?=$elem["img"]?>">
                        </div>
                        <div class="cart-text-container">
                            <h3><?=$elem["name"]?> <span class="price">Total : <?=$elem["prix"]*$elem["qte"]?>€</span></h3>
                            <p><span class="bold">Qte: </span> <?=$elem["qte"]?> pièce(s)</p>
                            <p><span class="bold">Prix par unité : </span> <?=$elem["prix"]?>€</p>
                        </div>
                    </div>
                <?php }?>
            <?php }?>
            <?php
            $total = 0;
            foreach ($_SESSION["cart"]["eol"] as $elem){
                $total += intval($elem["prix"])*intval($elem["qte"]);
            }?>
            <p class="total">Total : <?=$total?>€</p>
        </div>
    </section>

    <section class="cart-form">
        <!-- Formulaire de commande - Début -->
        <form action="/" method="post">
            <div class="input-group">
                <div class="input-contain">
                    <label for="nom">Nom :</label>
                    <input name="nom" id="nom" placeholder="Nom"/>
                </div>
                <div class="input-contain">
                    <label for="prenom">Prénom :</label>
                    <input name="prenom" id="prenom" placeholder="Prénom"/>
                </div>
            </div>

            <div class="input-contain">
                <label for="rue">Rue et numéro de livraison :</label>
                <input name="rur" id="rue" placeholder="Rue et numéro de livraison"/>
            </div>

            <div class="input-group">
                <div class="input-contain">
                    <label for="ville">Ville :</label>
                    <input name="ville" id="ville" placeholder="Ville"/>
                </div>
                <div class="input-contain">
                    <label for="code">Code Postal :</label>
                    <input name="code" id="code" placeholder="Code Postal"/>
                </div>
            </div>

            <div class="input-contain">
                <label for="pays">Pays :</label>
                <input name="pays" id="pays" placeholder="Pays"/>
            </div>

            <button>Valider et payer</button>
        </form>
        <!-- Formulaire de commande - Fin -->
    </section>

<?php

$description = 'Bienvenue sur votre page de commande. ';
$title = 'Commander ';
$style = '<link href="/resources/style/formul/formul.css" rel="stylesheet">';

$content = ob_get_clean();
require VIEWS . '/layout.php';
