<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

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
                    <?php foreach ($user_data->result() as $m) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><img src="<?= base_url('assets/img/profile/') . $m->image; ?>" width="65px" height="70px"></td>
                            <td><?= $m->name;  ?></td>
                            <td><?= $m->email;  ?></td>
                            <td><?= $m->fungsi_name;  ?></td>
                            <td><?= $m->bagian_name;  ?></td>
                            <td><?= date('d F Y', $m->date_created); ?></td>
                            <td>
                                <a href="" class="badge badge-success">Edit</a>
                                <a href="<?php echo base_url() . 'admin/delete/' . $m->id; ?>" class="badge badge-danger">Delete</a>
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

<!-- modal -->
<!-- Button trigger modal -->