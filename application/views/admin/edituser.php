<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('admin/edit_action/') . $m['email']; ?> " method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <img src="<?= base_url('assets/img/profile/') . $m['image']; ?>" width="150px" height="180px" style="object-fit: cover">
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


                <div class="ml-3">
                    <a href="<?= base_url('admin/user_management') ?>" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- modal -->
<!-- Button trigger modal -->