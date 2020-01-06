<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

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

                <div class="modal-body">
                    <div class="form-group">
                        <center><img src="<?= base_url('assets/img/profile/') . $m['image']; ?>" width="150px" height="180px" style="object-fit: cover"></center>
                        <input type="text" class="form-control mt-3" id="name" name="name" placeholder="name" value="<?= $m['name'] ?>">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
        </div>
    </div>
    <?php $i++; ?>

<?php endforeach; ?>