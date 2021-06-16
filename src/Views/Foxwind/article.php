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
            <h1><?= $article->getTitle()?></h1>
            <p><?= $article->getIntro()?></p>
        </div>
        <div class="square square-clair" id="squareClairArticle"></div>
    </section>
    <div class="mainSeparator"></div>
    <section id="contenu" class="ql-editor">
        <?= $article->getContent() ?>
    </section>
    <div class="mainSeparator"></div>

    <section id="comments">
        <h2 class="title">Réagissez à l'article </h2>
        <form action="/comment/<?=$article->getIdArticle()?>" method="post">
            <textarea placeholder="Votre commentaire" name="content"></textarea>
            <p class="error"><?=error("content")?></p>
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
                <?php if(\Foxwind\Controllers\UserController::isAuth() &&  $comment->getAuthor()->getIdUser()==$_SESSION["user"]["id"]){?>
                    <a href="/comment/<?=$comment->getIdCom()?>/delete" class="full-button-green">Supprimer</a>
                <?php }?>
            </div>
            <div class="separator"></div>
        <?php endforeach;?>
        <img src="/resources/image/rightComDeco.svg" id="rightComDeco"/>
        <span class="rond-fonce rond" id="comRound"></span>
    </section>

<?php

$description = $article->getTitle();
$title = 'Article ';
$style = '<link rel="stylesheet" href="/resources/style/article/article.css">
<link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<link href="//cdn.quilljs.com/1.3.6/quill.core.css" rel="stylesheet">';


$content = ob_get_clean();
require VIEWS . '/layout.php';
