<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <div class="row">
        <div class="col-lg-6">
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-file-upload"></i> UPLOAD</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <table id="example" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">File Name</th>
                        <th scope="col">Description</th>
                        <!-- <th scope="col">File Uploader</th> -->
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($document as $m) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $m->file_name;  ?></td>
                            <td><?= $m->description;  ?></td>
                            <td>
                                <a href="<?php echo base_url() . 'document/delete/' . $m->id; ?>" class="badge badge-danger tombol-hapus">DELETE</a>
                                <a href="<?php echo base_url() . 'document/download/' . $m->id; ?>" class="badge badge-info">DOWNLOAD</a>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload PDF</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('document/insert'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="upload" required>
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Description" required></textarea>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" id="pw" name="pw">
                            <label for="pw" class="form-check-label">Protect file with password ?</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="password" placeholder="Password" id="passwordfile" disabled>
                        <input type="hidden" value="<?= $user['email'] ?>" name="uploader">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>