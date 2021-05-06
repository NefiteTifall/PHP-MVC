<?php
ob_start();
?>
    <img class="rightDecoration" id="rightDecorationDefault" src="resources/image/HeaderBackground_default.svg" alt="">
    <img class="rightDecoration" id="rightDecoration1301" src="resources/image/HeaderBackground_1301.svg" alt="">

    <section id="firstSec">
        <div class="left">
            <p class="help">
                En cette période nous faisons notre maximum pour faciliter votre achat
            </p>
        </div>
        <div class="right">
            <div>
                <img src="resources/image/RightPicture.svg" alt=""/>
            </div>
        </div>
        <span class="square square-clair" id="squareClaire"></span>
        <span class="square square-fonce" id="squareFonce"></span>
        <span class="rond-inv" id="rondInv1"></span>
        <span class="rond-inv" id="rondInv2"></span>

    </section>

    <section id="secondSec">
        <div class="left">
            <img src="resources/image/windTurbineDeco.svg" alt=""/>
            <span class="rond-inv" id="rondInvSecondSec1"></span>
            <span class="rond-inv" id="rondInvSecondSec2"></span>
        </div>
        <div class="right">
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
            <span class="rond rond-fonce" id="rondFonce"></span>
            <span class="rond-inv" id="rondInvSecondSec3"></span>

        </div>
        <span class="rond rond-clair" id="rondClaire"></span>

    </section>

    <section id="thirdSec">
        <div id="buy">
            <div id="eolImages">
                <div class="eolContainer">
                    <img src="resources/image/eol1.svg">
                </div>
                <div class="eolContainer">
                    <img src="resources/image/eol1.svg">
                </div>
                <div class="break"></div>
                <div class="eolContainer">
                    <img src="resources/image/eol1.svg">
                </div>
                <div class="eolContainer">
                    <img src="resources/image/eol1.svg">
                </div>
                <span class="rond rond-clair" id="rondClaireBuy"></span>

            </div>
            <div id="bigEolImage">
                <img src="resources/image/eol1.svg">
            </div>
            <div id="eolDescription">
                <h2>Éolienne <span class="price">666€</span></h2>
                <div class="star-container">
                    <div class="note">5.0</div>
                    <div class="star fill"></div>
                    <div class="star fill"></div>
                    <div class="star fill"></div>
                    <div class="star fill"></div>
                    <div class="star"></div>
                </div>
                <p class="advice">
                    10 Avis | Ajouter votre avis
                </p>
                <p class="desc">
                    This is Photoshop's version of Lorem Ipsum.
                    Proin kdagravida nibh vel velit auctor aliquet.
                    aks Aenean sollicitudin, lorem quis bibendum
                    auctor, nisi elit consequat ipsum kda, nec sagittis
                    sem nibh id elit. Duis sed odio sit amet is life.
                </p>
                <form action="/addCart" method="POST">
                    <p class="number">
                        <span class="left-number">-</span>
                        <input type="number" name="qte" id="qte" min="1" value="1">
                        <span class="right-number">+</span>
                    </p>
                    <button class="add-to-cart"><img src="resources/image/cart.svg"/>Ajout au panier </button>
                </form>
                <span class="square square-clair" id="squareClaireBuy"></span>
            </div>
            <span class="rond-inv" id="rondInvThirdSec1"></span>
            <span class="rond-inv" id="rondInvThirdSec2"></span>
            <span class="rond-inv" id="rondInvThirdSec3"></span>
        </div>
    </section>
    <script>
        let eolContainer = document.getElementsByClassName("eolContainer");
        let bigEol = document.getElementById("bigEolImage").getElementsByTagName("img")[0];
        let less = document.getElementsByClassName("left-number")[0];
        let more = document.getElementsByClassName("right-number")[0];
        let qte = document.getElementById("qte");
        less.addEventListener("click",function() {
            change(-1)
        });
        more.addEventListener("click",function() {
            change(1)
        });

        for (let i = 0; i < eolContainer.length; i++) {
            const container = eolContainer[i];
            container.addEventListener("click",function() {
                bigEol.setAttribute("src",container.getElementsByTagName("img")[0].getAttribute("src"))
            });
        }

        function change(value) {
            let newValue = parseInt(qte.value)+value;
            if(newValue >= qte.getAttribute("min"))
                qte.value = newValue;
        }
    </script>
<?php

$description = 'Bienvenue sur FoxWind ';
$title = 'Découvrez notre éolienne ! ';
$style = '<link rel="stylesheet" href="/resources/style/eolienne/eol.css">';
$content = ob_get_clean();

require VIEWS . '/layout.php';

