
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
                <form action="<?= base_url('login') ?>" method="post">

                    <?= csrf_field() ?>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Login </h4>
                        </div>

                        <div class="card-body p-5">
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
                                <label for="pass"> Password </label>
                                <input type="password" class="form-control <?php if ($validation->getError('pass')) : ?>is-invalid <?php endif ?>" name="pass" placeholder="Password" value="<?php echo set_value('pass'); ?>" />
                                <?php if ($validation->getError('pass')) : ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('pass') ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="form-group pt-5 d-flex justify-content-between align-items-center">
                                <button type="submit" class="btn btn-success">Login</button>
                                <p class="d-flex justify-content-between align-items-center m-0"> No tenes cuenta!? <a href="<?= base_url('register') ?>" class="nav-link"> REGISTRATE</a> </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>