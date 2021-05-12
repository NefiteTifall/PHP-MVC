<?php
ob_start();
?>

    <img class="rightDecoration" id="rightDecorationDefault" src="/resources/image/HeaderBackground_default.svg" alt="">
    <img class="rightDecoration" id="rightDecoration1301" src="/resources/image/HeaderBackground_1301.svg" alt="">

    <section id="firstSec">
        <div class="left">
            <img src="<?= $article->getImg()?>"/>
        </div>
        <div class="right">
            <h1><?= $article->getTitre()?></h1>
            <p><?= $article->getIntro()?></p>
        </div>
        <div class="square square-clair" id="squareClairArticle"></div>
    </section>

    <?php foreach ($sections as $section){?>
        <?php if ($section["type"]==="left-img"){?>
            <section class="left-image">
                <div class="left">
                    <img src="<?= $section["image"] ?>"/>
                </div>
                <div class="right">
                    <p><?= $section["content"] ?></p>
                </div>
            </section>
        <?php }elseif ($section["type"]==="right-img"){?>
            <section class="right-image">
                <div class="left">
                    <p><?= $section["content"] ?></p>
                </div>
                <div class="right">
                    <img src="<?= $section["image"] ?>"/>
                </div>
            </section>
        <?php }elseif ($section["type"]==="full-img"){?>
            <section class="full-image">
                <div>
                    <img src="<?= $section["image"] ?>"/>
                </div>
                <div>
                    <p><?= $section["content"] ?></p>
                </div>
            </section>
        <?php } ?>

    <?php } ?>

    <section id="comments">
        <?php

        var_dump($article->getComments());
        ?>
        <h2 class="decoration-title">Réagissez à l'article <img src="/resources/image/com.svg"/> </h2>
        <form action="/comment/" method="post">
            <textarea placeholder="Votre commentaire" name="content"></textarea>
            <button class="button-white">Envoyer</button>
        </form>
        <?php foreach ($article->getComments() as $comment):?>
            <div class="comment">
                <img src="/resources/image/pp.svg"/>
                <div>
                    <h3><?= $comment->getAuthor()->getUsername()?></h3>
                    <p class="date"><?= dateTextToFr(strftime("%A %d %B %G", strtotime($comment->getDate()))); ?></p>
                </div>
                <p>
                    <?= $comment->getContenu()?>
                </p>
            </div>
        <?php endforeach;?>

        <div class="separator"></div>
        <div class="comment">
            <img src="/resources/image/pp.svg"/>
            <div>
                <h3>Jacque</h3>
                <p class="date">Jeudi 25 Avril 2077</p>
            </div>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Cumque nobis distinctio consequatur quae perferendis commodi.
            </p>
        </div>
        <img src="/resources/image/rightComDeco.svg" id="rightComDeco"/>
        <span class="rond-fonce rond" id="comRound"></span>
    </section>

<?php

$description = 'Bienvenue sur notre blog';
$title = '';
$style = '<link rel="stylesheet" href="/resources/style/article/article.css">';


$content = ob_get_clean();
require VIEWS . '/layout.php';
