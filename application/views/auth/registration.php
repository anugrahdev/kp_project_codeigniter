<div id="app">
    <section class="section">
        <div class="container mt-2">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="login-brand">
                        <img src="<?= base_url('assets/img/'); ?>Pertamina.png" alt="logo" width="275" class="">
                    </div>

                    <div class="card card-danger">
                        <div class="card-header">
                            <h4 style="color: red">Register</h4>
                        </div>

                        <div class="card-body">
                            <form class="user" method="post" action="<?= base_url('auth/registration') ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="name" placeholder="Full Name" name="name" value="<?= set_value('name'); ?>">
                                    <?= form_error('name', '<small class="text-danger pl-3" >', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
                                    <?= form_error('email', '<small class="text-danger pl-3" >', '</small>'); ?>
                                </div>
                                <div class="form-divider ml-2">
                                    Fungsi & Bagian
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label style="margin-left: 8.5px">Fungsi</label>
                                        <select class="form-control" name="fungsi" id="fungsi" required>
                                            <option value="">No Selected</option>

                                            <?php
                                            foreach ($fungsi_data as $data) { // Lakukan looping pada variabel siswa dari controller
                                                echo "<option value='" . $data->id . "'>" . $data->fungsi_name . "</option>";
                                            }
                                            ?>

                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Bagian</label>
                                        <select class="form-control" id="bagian" name="bagian" required>
                                            <option>No Selected</option>

                                        </select>
                                        <div id="loading" style="margin-top: 15px;">
                                            <img src="<?= base_url('assets/img/'); ?>loading.gif" width="18"> <small>Loading...</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password1" class="form-control form-control-user" id="password1" placeholder="Password">
                                        <?= form_error('password1', '<small class="text-danger pl-3" >', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="password2" class="form-control form-control-user" id="password2" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-danger btn-user btn-block">
                                    Register Account
                                </button>

                            </form>
                        </div>
                    </div>

                    <div class="simple-footer">
                        Copyright &copy; Stisla 2018
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>