<?php
ob_start();
?>

    <!-- Titre de la section -->
    <div class="d-sm-flex align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Message de <?= $contact->getUsername(); ?></h1>
    </div><br>

    <div>
        <label class="h3 mb-0 text-gray-800">Status de <?= $contact->getUsername(); ?></label><br>
        <hr>
        <div class="font-italic"><?= $contact->getUserStatus(); ?><div/><br><br>

        <label class="h3 mb-0 text-gray-800">Email de <?= $contact->getUsername(); ?></label><br>
        <hr>
        <div class="font-italic"><?= $contact->getUserMail(); ?><div/><br><br>

        <label class="h3 mb-0 text-gray-800">Contenu du message</label><br>
        <hr>
        <div class="font-italic"><?= $contact->getContent(); ?><div/><br><br>
    </div>

<?php
$content = ob_get_clean();
$description = '';
$title = 'Gerer les contacts ';
$style = '<link rel="stylesheet" href="/resources/style/create/create.css">';
require VIEWS . ROAD . '/Back/layout.php';
