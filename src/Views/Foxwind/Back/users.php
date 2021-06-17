<?php
ob_start();
?>
    <!-- Titre de la section -->
    <div class="d-sm-flex align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Utilisateurs du site</h1>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">Nom d'utilisateur</th>
            <th scope="col">Email</th>
            <th scope="col">#ID Role</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user) { ?>
            <tr class="tableElement">
                <th scope="row"><?= $user->getIdUser(); ?></th>
                <td><?= $user->getUsername(); ?></td>
                <td><?= $user->getEmail(); ?></td>
                <td><?= $user->getIdRole(); ?></td>
                <td><a href="/user/<?=$user->getIdUser();?>/delete"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

<?php
$content = ob_get_clean();
$description = '';
$title = 'Gerer les utlisateurs ';
require VIEWS . ROAD . '/Back/layout.php';
