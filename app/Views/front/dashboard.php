<?php $session = \Config\Services::session(); ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid ps-5">
            <a class="navbar-brand" href="#">Programming Fields</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item  pe-5">
                        <a class="nav-link active" aria-current="page">Welcome: <?= $session->get('nombre'); ?> </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url('logout') ?>">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 m-auto">
                <h4 class="text-center"> Dashboard </h4>    
            </div>
        </div>
    </div>