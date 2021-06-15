<?php
ob_start();
?>
    <!-- Titre de la section -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tableau de bord</h1>
    </div>

    <div class="row">

        <!-- Carte de messages de contact -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Messages de contact</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">00 Messages</div>
                        </div>
                        <div class="col-auto">  <i class="fas fa-inbox text-gray-300" style="font-size: 30px"></i> </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carte de commandes -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Commandes</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">00 Commandes</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto"> <i class="fas fa-clipboard-list fa-2x text-gray-300"></i> </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carte nombre de vues -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Vues</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">00 Vues</div>
                        </div>
                        <div class="col-auto">
                            <i class="far fa-eye fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carte nombre de redacteurs -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Rédacteurs</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">00 Rédacteurs</div>
                        </div>
                        <div class="col-auto"> <i class="fas fa-pen-nib fa-2x text-gray-300"></i> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Titre de la section des raccourcis -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Raccourcis</h1>
    </div>






<?php
$content = ob_get_clean();
$description = '';
$title = 'Dashboard ';
require VIEWS . ROAD . '/Back/layout.php';