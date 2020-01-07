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
                            <h4 style="color: red">Forgot your password ?</h4>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <form class="user" method="post" action="<?= base_url('auth/forgotpassword'); ?>">
                                <div class="form-group">
                                    <input type="text" value="<?= set_value('email'); ?>" class="form-control form-control-user" name="email" id="email" placeholder="Enter Email Address...">
                                    <?= form_error('email', '<small class="text-danger pl-3" >', '</small>'); ?>
                                </div>

                                <button type="submit" class="btn btn-danger btn-user btn-block">
                                    Reset Password
                                </button>
                            </form>

                        </div>
                    </div>
                    <div class="mt-2 text-muted text-center">
                        Don't have an account? <a href="<?= base_url('auth/'); ?>">Back to Login</a>
                    </div>