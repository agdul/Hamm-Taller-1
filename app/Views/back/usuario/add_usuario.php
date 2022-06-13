<div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 m-auto">

                <?php
                if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <?php echo session()->getFlashdata('success') ?>
                    </div>
                <?php elseif (session()->getFlashdata('failed')) : ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <?php echo session()->getFlashdata('failed') ?>
                    </div>
                <?php endif; ?>

                <?php $validation =  \Config\Services::validation(); ?>

                <form action="<?= base_url('add_usuario') ?>" method="post">

                    <?= csrf_field() ?>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Agregar Usuario </h4>
                        </div>

                        <div class="card-body p-5">
                            <div class="form-group">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control <?php if ($validation->getError('nombre')) : ?>is-invalid<?php endif ?>" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo set_value('nombre'); ?>" />
                                <?php if ($validation->getError('nombre')) : ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nombre') ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="apellido" class="form-label">Apellido</label>
                                <input type="text" class="form-control <?php if ($validation->getError('apellido')) : ?>is-invalid<?php endif ?>" name="apellido" id="apellido" placeholder="Apellido" value="<?php echo set_value('apellido'); ?>" />
                                <?php if ($validation->getError('apellido')) : ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('apellido') ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="direccion" class="form-label">Direccion</label>
                                <input type="text" class="form-control <?php if ($validation->getError('direccion')) : ?>is-invalid<?php endif ?>" name="direccion" id="direccion" placeholder="Direccion" value="<?php echo set_value('direccion'); ?>" />
                                <?php if ($validation->getError('direccion')) : ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('direccion') ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="form-group pt-3">
                                <label for="email"> Email </label>
                                <input type="text" class="form-control <?php if ($validation->getError('email')) : ?>is-invalid<?php endif ?>" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>" />
                                <?php if ($validation->getError('email')) : ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('email') ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="form-group pt-3">
                                <label for="usuario"> Usuario </label>
                                <input type="text" class="form-control <?php if ($validation->getError('usuario')) : ?>is-invalid<?php endif ?>" name="usuario" placeholder="Usuario" value="<?php echo set_value('usuario'); ?>" />
                                <?php if ($validation->getError('usuario')) : ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('usuario') ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="form-group pt-3">
                                <label for="password"> Password </label>
                                <input type="password" class="form-control <?php if ($validation->getError('pass')) : ?>is-invalid <?php endif ?>" name="pass" placeholder="Password" value="<?php echo set_value('pass'); ?>" />
                                <?php if ($validation->getError('pass')) : ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('pass') ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="form-group pt-5 d-flex justify-content-between align-items-center">
                                <button type="submit" class="btn btn-success">AGREGAR</button>
                                <p class="d-flex justify-content-between align-items-center m-0"> VOLVER<a href="<?= base_url('panel_usuarios') ?>" class="nav-link"> ATRAS </a> </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>