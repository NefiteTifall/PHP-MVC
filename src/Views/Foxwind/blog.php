<?php
ob_start();
?>
    <img class="rightDecoration" id="rightDecorationDefault" src="resources/image/HeaderBackground_default.svg" alt="">
    <img class="rightDecoration" id="rightDecoration1301" src="resources/image/HeaderBackground_1301.svg" alt="">
    <div>
        <div class="rond rond-inv" id="rondInv1"></div>
        <div class="square square-fonce" id="rond01"></div>
    </div>

    <section id="blog-sect1">
        <div class="left">
            <h1>Apprenez-en plus sur notre projet grâce à notre blog !</h1>
        </div>
        <div class="right">
            <img src="../resources/image/blog.svg" draggable="false" alt="">
        </div>
    </section>

    <section id="articles">
        <div class="d-flex justify-content-center flex-wrap">
            <?php if (count($articles)>0){?>
                <?php foreach ($articles as $key => $article):?>
                    <!-- Article block -->
                    <div class="articleBlock">
                        <div class="background-left">
                            <h2 id="card-title"><?= $article->getTitle() ?></h2>
                            <div class="separator"></div>
                            <p id="card-intro"><?= $article->getIntro() ?></p>
                            <a href="/article/<?= $article->getIdArticle() ?>" class="button zindex25">En savoir
                                plus</a>
                        </div>
                        <img class="background-right" alt="" src="<?= $article->getImg() ?>">
                        <?php if($key%2 === 0) { ?>
                            <div class="rond2 rond-inv" id="rondInv2"></div>
                        <?php } ?>
                        <div class="rond rond-inv" id="rondInv3"></div>
                    </div>
                    <!-- Article block -->
                <?php endforeach; ?>
            <?php } else { ?>
                <p>Il n'y aucun article </p>
            <?php } ?>
        </div>
    </section>

    <div class="col-md-12 d-flex justify-content-center" style="margin-bottom: 100px">
        <button onclick="" class="moreArticles">Plus d'articles...</button>
    </div>


<?php
$description = 'Bienvenue sur notre blog !';
$title = 'Blog';
$style = '<link rel="stylesheet" href="/resources/style/blog/blog.css">';


$content = ob_get_clean();
require VIEWS . '/layout.php';
