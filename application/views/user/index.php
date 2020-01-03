<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-3">
                <div class=" row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $user['name']; ?></h5>
                            <p class="card-text"><?= $user['email']; ?></p>
                            <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $user['date_created']); ?></small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="row">
                <div class="card border-left-success shadow h-100 py-2">
                    <a class="card-body" href="<?= base_url('document'); ?>">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">PDF Documents Uploaded</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_documents; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file-pdf	 fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->