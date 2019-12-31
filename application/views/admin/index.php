<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <a class="card-body" href="<?= base_url('admin/user_management'); ?>">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">User</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_user; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class=" row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Admin</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_admin; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
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
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->