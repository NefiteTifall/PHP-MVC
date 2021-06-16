<?php
ob_start();
?>
    <!-- Titre de la section -->
    <div class="d-sm-flex align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Articles du site</h1>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">Titre</th>
            <th scope="col">Introduction</th>
            <th scope="col">Image d'illustration</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($articles as $article) { ?>
            <tr class="tableElement" onclick="window.location.href='/article/<?= $article->getIdArticle();?>/'">
                <th scope="row"><?= $article->getIdArticle(); ?></th>
                <td><?= $article->getTitle(); ?></td>
                <td><?= $article->getIntro(); ?></td>
                <td><img class="img-preview" src="<?= $article->getImg(); ?>"></td>
                <td><a href="/article/<?=$article->getIdArticle();?>/delete"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

<?php
$content = ob_get_clean();
$description = '';
$title = 'Gerer les articles ';
require VIEWS . ROAD . '/Back/layout.php';
