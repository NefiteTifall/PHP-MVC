<?php
ob_start();
?>
    <!-- Titre de la section -->
    <div class="d-sm-flex align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Articles de <?= $_SESSION["user"]["name"] ?></h1>
    </div>

    <?php if(!empty($_SESSION["error"])){ ?>
        <h3 class="h3 mb-0 alert-danger p-2"><?= $_SESSION["error"] ?></h3><br>
    <?php } ?>
    <?php if(!empty($_SESSION["success"])){ ?>
        <h3 class="h3 mb-0 alert-success p-2"><?= $_SESSION["success"] ?></h3><br>
    <?php } ?>

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
        <?php foreach ($userArticles as $article) { ?>
            <tr class="tableElement" onclick="window.location.href=''">
                <th scope="row"><?= $article->getIdArticle(); ?></th>
                <td><?= $article->getTitle(); ?></td>
                <td><?= $article->getIntro(); ?></td>
                <td><img class="img-preview" src="<?= $article->getImg(); ?>"></td>
                <td><a href=""><i class="fas fa-trash-alt"></i></a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

<?php
$content = ob_get_clean();
$description = '';
$title = 'Mes articles ';
require VIEWS . ROAD . '/Back/layout.php';