<div id="app">
    <section class="section">
        <div class="container mt-2">
            <div class="row">
                <div class="col-lg-5 mx-auto">
                    <div class="login-brand">
                        <img src="<?= base_url('assets/img/'); ?>Pertamina.png" alt="logo" width="275" class="">
                    </div>
                    <div class="card card-danger">
                        <div class="card-header">
                            <h4 style="color: red">Change your password for <?= $this->session->userdata('reset_email'); ?></h4>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <form class="user" method="post" action="<?= base_url('auth/changepassword'); ?>">
                                <div class="form-group">
                                    <input type="password" value="" class="form-control form-control-user" name="password1" id="password1" placeholder="Enter new password...">
                                    <?= form_error('password1', '<small class="text-danger pl-3" >', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="password" value="" class="form-control form-control-user" name="password2" id="password2" placeholder="Repeat password...">
                                    <?= form_error('password2', '<small class="text-danger pl-3" >', '</small>'); ?>
                                </div>

                                <button type="submit" class="btn btn-danger btn-user btn-block">
                                    Change Password
                                </button>
                            </form>

                        </div>
                    </div>
                    <div class="mt-2 text-muted text-center">
                    </div>