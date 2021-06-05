<?php
ob_start();
?>

<?= count($_SESSION["cart"]["eol"])?>
    <img id="rightDecoration" src="/resources/image/rightCartShape.svg" alt="">
    <section id="cart">
        <div class="cart-content">
            <?php if (isset($_SESSION["cart"]) && isset($_SESSION["cart"]["eol"]) && count($_SESSION["cart"]["eol"])>0){?>
                <h1>Votre panier (<?= count($_SESSION["cart"]["eol"])?>)</h1>
                <?php foreach ($_SESSION["cart"]["eol"] as $key=>$elem){?>
                    <div class="cart-elements">
                        <div class="cart-img-container">
                            <img src="<?=$elem["img"]?>">
                        </div>
                        <div class="cart-text-container">
                            <h3><?=$elem["name"]?> <span class="price">Total : <span class="total"><?=$elem["prix"]*$elem["qte"]?></span>€</span></h3>
                            <p><span class="bold">Qte: </span> <span class="qte"><?=$elem["qte"]?></span> pièce(s)</p>
                            <p><span class="bold">Prix par unité : </span> <span class="unit"><?=$elem["prix"]?></span>€</p>
                            <a href="/deleteCart/<?=$key?>" class="delete">Supprimer</a>
                        </div>
                    </div>
                <?php }?>
            <?php }else{?>
                <h1 class="error">Vous n'avez aucun article dans votre panier !</h1>
            <?php }?>
        </div>
        <?php if (isset($_SESSION["cart"]["eol"]) && count($_SESSION["cart"]["eol"])>0){?>
            <div class="resume">
                <div class="content">
                    <?php
                    $total =0;
                    foreach ($_SESSION["cart"]["eol"] as $elem){
                        $total += intval($elem["prix"])*intval($elem["qte"]);
                    }?>
                    <div class="top">
                        <h2>RÉSUMÉ</h2>
                    </div>

                    <div class="separator"></div>

                    <div class="price">
                        <p>
                            Sous-total <span class="right subtotal"><?=$total*0.80?>€</span>
                        </p>
                        <p>
                            TVA(20%) <span class="right tva"><?=$total*0.20?>€</span>
                        </p>
                    </div>

                    <div class="separator"></div>

                    <div class="bottom">
                        <p class="total">
                            Total : <span class="right totalMain"><?=$total?>€</span>
                        </p>
                    </div>
                    <a href="/checkout" class="button">Continuer</a>
                </div>
            </div>
        <?php } ?>

    </section>

<?php

$description = 'Bienvenue sur votre panier.';
$title = 'Panier';
$style = '<link rel="stylesheet" href="/resources/style/cart/cart.css">';

$content = ob_get_clean();
require VIEWS . '/layout.php';
