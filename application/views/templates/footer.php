<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website <?= date('Y') ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets') ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets') ?>/js/sb-admin-2.min.js"></script>

<!-- DATATABLE -->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>

<!-- sweetalert 2 -->
<script src="<?= base_url('assets') ?>/sweetalert2/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets') ?>/js/myscript.js"></script>
<script>
    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');
        $.ajax({
            url: "<?= base_url('admin/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
            }
        });
    });
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
    $(document).ready(function() {
        $('#example').DataTable();
    });
    //sweetalert
    const flashData = $('.flash-data').data('flashdata');
    // console.log(flashData);
    if (flashData) {
        Swal.fire({
            title: flashData,
            text: '',
            icon: 'success'
        });
    }
    //sw tombolhapus
    $('.tombol-hapus').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');
        Swal.fire({
            title: 'Are you sure to delete this file ?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#fungsi').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url('Auth/get_bagian'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].bagian_id + '>' + data[i].name + '</option>';
                    }
                    $('#bagian').html(html);
                }
            });
            return false;
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#mytable').DataTable();
    });
</script>
<script>
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

<script>
    document.getElementById('pw').onchange = function() {
        document.getElementById('passwordfile').disabled = !this.checked;
    };
</script>
<script>
    $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("fa-fw fa-eye-slash");
                $('#show_hide_password i').removeClass("fa-fw fa-eye");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("fa-fw fa-eye-slash");
                $('#show_hide_password i').addClass("fa-fw fa-eye");
            }
        });
    });
</script>
<script>
    document.getElementById('pw_edit').onchange = function() {
        document.getElementById('myInput').disabled = !this.checked;
    };
</script>

<script>
    $(document).ready(function() {
        var i = 1;
        $('#add').click(function() {
            i++;
            $('#dynamic_field').append('<tr id="row' + i + '"><td><div class="custom-file"><input type="file" class="custom-file-input name_list" name="upload[]" required><label class="custom-file-label" for="upload">Choose file</label></div></td><td><div class="form-group"><input class="form-control name_list" type="text" name="description" id="description" placeholder="Description"></div></td><td><div class="input-group" id="show_hide_password"><input class="form-control name_list" type="password" id="passwordfile" name="password" placeholder="Enter password"> <div class="input-group-addon"><a href=""><i class="fa fa-fw fa-eye-slash" aria-hidden="true"></i></a></div></div> </td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
        $('#submit').click(function() {
            $.ajax({
                url: "<?= base_url('document/multiple'); ?>",
                method: "POST",
                data: $('#add_name').serialize(),
                success: function(data) {
                    alert(data);
                    $('#add_name')[0].reset();
                }
            });
        });
    });
</script>

<script type="text/javascript">
    function add_row() {
        $rowno = $("#employee_table tr").length;
        $rowno = $rowno + 1;
        $("#employee_table tr:last").after("<tr id='row" + $rowno + "'><td><div class='form-group'><div class='custom-file'><input type='file' class='custom-file-input' name='upload[]' required><label class='custom-file-label' for='upload'>Choose file</label></div></div></td><td><input class='form-control' type='text' name='description[]' placeholder='Enter Description'></td><td><input class='form-control' type='text' name='file_password[]' placeholder='Enter Password'><input type='hidden' name='uploader[]' placeholder='Enter Job' value='Anang'></td><td><input type='button' value='DELETE' onclick=delete_row('row" + $rowno + "')></td></tr>");
    }

    function delete_row(rowno) {
        $('#' + rowno).remove();
    }
</script>

</body>

</html>