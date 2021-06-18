<?php
ob_start();
?>

    <!-- Titre de la section -->
    <div class="d-sm-flex align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Messages/Contacts du site</h1>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">Provient de</th>
            <th scope="col">Status</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($contacts as $contact) { ?>
            <tr class="tableElement" onclick="window.location.href='/contact/show/<?= $contact->getContactID(); ?>'">
                <th scope="row"><?= $contact->getContactID() ?></th>
                <td><?= $contact->getUsername() ?> - <?= $contact->getUserMail() ?></td>
                <td><?= $contact->getUserStatus() ?></td>
                <td><a href="/contact/show/<?= $contact->getContactID(); ?>/delete"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

<?php
$content = ob_get_clean();
$description = '';
$title = 'Gerer les contacts ';
require VIEWS . ROAD . '/Back/layout.php';
