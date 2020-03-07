<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#adduserModal">Add User</a>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger">
            <?php echo validation_errors(); ?>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-lg-12">
            <table id="mytable" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Picture</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Fungsi</th>
                        <th scope="col">Bagian</th>
                        <th scope="col">Join Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($user_data->result_array() as $m) : ?>
                        <tr>
                            <th scope="row"><?= $i;  ?></th>
                            <td><img src="<?= base_url('assets/img/profile/') . $m['image']; ?>" width="65px" height="70px"></td>
                            <td><?= $m['name'];  ?></td>
                            <td><?= $m['email'];  ?></td>
                            <td><?= $m['fungsi_name'];  ?></td>
                            <td><?= $m['bagian_name'];  ?></td>
                            <td><?= date('d F Y', $m['date_created']); ?></td>
                            <td>
                                <a href="" class="badge badge-warning" data-toggle="modal" data-target="#editmodal<?= $i; ?>">Edit</a>
                                <a href="<?php echo base_url() . 'admin/delete_user/' . $m['email']; ?>" class="badge badge-danger tombol-hapus">Delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<?php $i = 1; ?>

<?php foreach ($user_data->result_array() as $m) : ?>

    <!-- Modal Edit -->
    <div class="modal fade" id="editmodal<?= $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/edit_user/') . $m['email']; ?> " method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <center><img src="<?= base_url('assets/img/profile/') . $m['image']; ?>" width="150px" height="180px" style="object-fit: cover"></center>
                            <input type="text" class="form-control mt-3" id="email" email="email" placeholder="email" value="<?= $m['email'] ?>" disabled>
                            <input type="text" class="form-control mt-3" id="name" name="name" placeholder="name" value="<?= $m['name'] ?>">

                            <div class="row my-3">
                                <div class="form-group col-6">
                                    <label style="margin-left: 8.5px">Fungsi</label>
                                    <select class="form-control" name="fungsi" id="fungsi" required>
                                        <option value="">No Selected</option>

                                        <?php
                                        foreach ($fungsi_data as $data) : ?>
                                            <option <?php if ($m['fungsi'] == $data->id) echo 'selected'; ?> value="<?= $data->id ?>"><?= $data->fungsi_name ?></option>
                                        <?php endforeach; ?>
                                        ?>

                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label>Bagian</label>
                                    <select class="form-control" id="bagian" name="bagian" required>
                                        <?php
                                        foreach ($bagian_data as $data) : ?>
                                            <option <?php if ($m['bagian'] == $data->id) echo 'selected'; ?> value="<?= $data->id ?>"><?= $data->bagian_name ?></option>
                                        <?php endforeach; ?>
                                        ?>

                                    </select>
                                    <div id="loading" style="margin-top: 15px;">
                                        <img src="<?= base_url('assets/img/'); ?>loading.gif" width="18"> <small>Loading...</small>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php $i++; ?>



<?php endforeach; ?>


<!-- Modal -->
<div class="modal fade" id="adduserModal" tabindex="-1" role="dialog" aria-labelledby="adduserModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="user" method="post" action="<?= base_url('admin/registration') ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="name" placeholder="Full Name" name="name" value="<?= set_value('name'); ?>">
                        <?= form_error('name', '<small class="text-danger pl-3" >', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
                        <?= form_error('email', '<small class="text-danger pl-3" >', '</small>'); ?>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label style="margin-left: 8.5px">Fungsi</label>
                            <select class="form-control" name="fungsi" id="fungsi1" required>
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
                            <select class="form-control" id="bagian1" name="bagian" required>
                                <option>No Selected</option>

                            </select>
                            <div id="loading1" style="margin-top: 15px;">
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>