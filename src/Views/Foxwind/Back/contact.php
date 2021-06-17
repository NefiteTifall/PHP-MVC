<?php
ob_start();
?>


    <!-- -------------------------------------------- -->
    <!-- -------------------------------------------- -->
    <!--  W . I . P  -------------------------------- -->
    <!-- PAGE DE CONTACT A TERMINER MAX POUR SAMEDI - -->
    <!-- 19.06.2021  --  LEO GRIFFOULIERE ----------- -->
    <!-- + EVOLUTIONS POUR LES ARTICLES / USER SI --- -->
    <!-- POSSIBLE ----------------------------------- -->
    <!-- -------------------------------------------- -->
    <!-- -------------------------------------------- -->



    <!-- Titre de la section -->
    <div class="d-sm-flex align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Messages/Contacts du site</h1>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">Provient de</th>
            <th scope="col">Titre</th>
            <th scope="col">Qui</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user) { ?>
            <tr class="tableElement">
                <th scope="row">ID POST</th>
                <td>WRITER'S USERNAME</td>
                <td>TITLE</td>
                <td>WHO</td>
                <td><a href="/contact/CONTACTID/delete"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

<?php
$content = ob_get_clean();
$description = '';
$title = 'Gerer les contacts ';
require VIEWS . ROAD . '/Back/layout.php';
