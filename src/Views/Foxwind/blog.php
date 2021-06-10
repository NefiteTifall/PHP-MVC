<?php
ob_start();
?>
    <img class="rightDecoration" id="rightDecorationDefault" src="resources/image/HeaderBackground_default.svg" alt="">
    <img class="rightDecoration" id="rightDecoration1301" src="resources/image/HeaderBackground_1301.svg" alt="">
    <section id="blog-sect1">
        <div class="left">
            <h1>Apprenez-en plus sur notre projet grâce à ntore blog !</h1>
        </div>
        <div class="right">
            <div>
                <img src="../resources/image/blog.svg" draggable="false" alt="">
            </div>
        </div>
        <span class="square square-clair" id="squareClaire"></span>
        <span class="square square-fonce" id="squareFonce"></span>
        <span class="rond-inv" id="rondInv1"></span>
        <span class="rond-inv" id="rondInv2"></span>
    </section>

    <div class="container">
        <section id="articles">
            <?php if (count($articles)>0){?>
                <?php foreach ($articles as $article):?>
                    <div class="row">
                        <!-- Article block -->
                        <div class="col-md-12 articleBlock">
                            <h2><?= $article->getTitre()?></h2>
                            <div id="separator"></div>
                            <img class="postPreviewImage" src="<?= $article->getImg()?>" alt=""/>
                            <p><?= $article->getIntro()?></p>
                            <a href="/article/<?= $article->getIdArticle()?>" class="button">En savoir plus</a>
                            <div class="rond rond-inv" id="rondInv2"></div>
                            <div class="rond rond-inv" id="rondInv3"></div>
                        </div>
                        <!-- Article block -->
                    </div>
                <?php endforeach;?>
            <?php }else{?>
                <p>Il n'y aucun article </p>
            <?php }?>
        </section>

        <div class="col-md-12 d-flex justify-content-center" style="margin-bottom: 100px">
            <button onclick="" class="moreArticles">Plus d'articles...</button>
        </div>
    </div>


<?php
$description = 'Bienvenue sur notre blog !';
$title = 'Blog';
$style = '<link rel="stylesheet" href="/resources/style/blog/blog.css">';



$content = ob_get_clean();
require VIEWS . '/layout.php';
