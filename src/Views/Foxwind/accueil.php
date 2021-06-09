<?php
ob_start();
?>
        <img class="rightDecoration" id="rightDecorationDefault" src="resources/image/HeaderBackground_default.svg" alt="">
        <img class="rightDecoration" id="rightDecoration1301" src="resources/image/HeaderBackground_1301.svg" alt="">

        <section id="presentation">
            <div class="left">
                <h1>Éclairons notre prochain </h1>
                <p>Une éolienne construite seulement avec des matériaux recyclés, elle est la plus propre du marché !</p>
                <button class="full-button-green" aria-label="En savoir plus sur nos éoliennes">En savoir plus</button>
            </div>
            <div class="right">
                <img src="resources/image/home.svg" draggable="false" alt="">
            </div>
            <span class="rond rond-clair" id="rondPres"></span>
            <span class="square square-fonce" id="squarePres"></span>
            <span class="rond-inv" id="rondInv1"></span>
            <span class="rond-inv" id="rondInv2"></span>
        </section>

        <section id="steps">
            <h2 class="text-center">Nous nous occupons de toutes les Étapes</h2>
            <div id="allCards">
                <div class="card">
                    <img src="resources/image/mind.svg" alt="">
                    <p class="stepsDesc">Réflexion</p>
                </div>
                <div class="card">
                    <img src="resources/image/engineer.svg" alt="">
                    <p class="stepsDesc">Ingénierie </p>
                </div>
                <div class="card">
                    <img src="resources/image/tools.svg" alt="">
                    <p class="stepsDesc">Contruction</p>
                </div>
                <div class="card">
                    <img src="resources/image/delivery.svg" alt="">
                    <p class="stepsDesc">Livraison</p>
                </div>
            </div>
        </section>

        <section id="advantages">
            <h2 class="">Découvrez les avantages</h2>

            <div>
                <div class="left">
                    <div class="advElem">
                        <div><img src="resources/image/wind.svg" alt=""></div>
                        <div><h3>Energie naturelle </h3>
                            <p>Utilisez le vent pour vous fournir en électricité ou recharger vos batteries.</p></div>
                    </div>
                    <div class="advElem">
                        <div><img src="resources/image/mountain.svg" alt=""></div>
                        <div><h3>Simple d'utilisation </h3>
                            <p>Grace à la taille et le poids de l'éolienne vous pouvez l'utiliser où vous voulez. </p></div>
                    </div>
                    <div class="advElem">
                        <div><img src="resources/image/trash.svg" alt=""></div>
                        <div><h3>Entièrement recyclée </h3>
                            <p>Profitez d'une éolienne entièrement faite en matériaux recyclés. </p></div>
                    </div>
                </div>
                <div class="right">
                    <img src="resources/image/windmill.svg" alt="">
                </div>
            </div>
        </section>

        <section id="donation" class="d-block text-center">
            <h2 class="text-center">Décollez avec nous en nous soutenant ! </h2>
            <button class="full-button-white">Faites un don</button>
            <span class="rond rond-clair" id="rondDon"></span>
            <span class="square square-clair" id="squareDon"></span>
        </section>
        <section id="why">
            <h2 class="">Pourquoi choisir nos éoliennes</h2>
            <div>
                <div class="left">
                    <div class="advElem">
                        <img class="icon" src="resources/image/light.svg" alt="">
                        <p>Longue utilisation </p>
                    </div>
                    <div class="advElem">
                        <img class="icon" src="resources/image/dollar.svg" alt="">
                        <p>Réduction des coûts </p>
                    </div>
                    <div class="advElem">
                        <img class="icon" src="resources/image/energy.svg" alt="">
                        <p>Energie réutilisable</p>
                    </div>
                </div>

                <div class="center">
                    <img src="resources/image/earth.svg" alt="">
                </div>

                <div class="right">
                    <div class="advElem">
                        <p>Multiples utilisations </p>
                        <img class="icon" src="resources/image/battery.svg" alt="">
                    </div>
                    <div class="advElem">
                        <p>Energie propre </p>
                        <img class="icon" src="resources/image/windP.svg" alt="">
                    </div>
                    <div class="advElem">
                        <p>Simple d'installation</p>
                        <img class="icon" src="resources/image/hand.svg" alt="">
                    </div>
                </div>
            </div>
            <img class="leftDecoration" src="resources/image/Left%20decoration.svg" alt="">
            <img class="rightDecoration" src="resources/image/Right%20decoration.svg" alt="">
            <span class="square square-fonce" id="squareWhy"></span>
        </section>

<?php

$description = 'Bienvenue sur le site de FoxWind !';
$title = 'Accueil ';
$style = '<link rel="stylesheet" href="/resources/style/accueil/accueil.css">';


$content = ob_get_clean();
require VIEWS . '/layout.php';
