<?php  ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Member
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Member</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
                            + Tambah Dosen
                        </button>
                    </div>
                    <div class="box-body">
                        <?= $this->session->flashdata('message') ?>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Username</th>
                                    <th class="text-center">Nama Dosen</th>
                                    <th class="text-center">Status Aktif</th>
                                    <th class="text-center">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($member as $data) {

                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no; ?></td>
                                        <td class="text-center"><?= $data['username']; ?></td>
                                        <td class="text-center"><?= $data['nama_member']; ?></td>
                                        <td><?= ($data['status_aktif'] == "Y") ? "Aktif" : "Tidak Aktif"; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <div class="text-center">
                                                    <a href="<?= site_url('admin/ubah_statusaktif/' . $data['id_member']); ?>" class="btn-sm btn-warning">Ubah Status Aktif</a>
                                                    <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#edit-<?= $data['id_member']; ?>" title="Edit Dosen"><span class="fa fa-edit"></span></a>
                                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete-<?= $data['id_member']; ?>" title="Delete Dosen"><span class="fa fa-trash"></span></a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="edit-<?= $data['id_member']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Edit Dosen</h4>
                                                </div>

                                                <form action="<?php echo base_url() ?>admin/edit_member" method="POST">
                                                    <input type="hidden" name="id_member" value="<?= $data['id_member']; ?>">
                                                    <div class="modal-body">

                                                        <div class="form-group">
                                                            <label for="email">Username</label>
                                                            <input type="text" name="username" class="form-control" id="username" value="<?= $data['username']; ?>">
                                                            <label for="email">Nama Dosen</label>
                                                            <input type="text" name="nama_member" class="form-control" id="nama_member" value="<?= $data['nama_member']; ?>">
                                                            <label for="password">Password</label>
                                                            <input type="password" name="password" class="form-control" id="password" value="<?= $data['password']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="delete-<?= $data['id_member']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Hapus Dosen</h4>
                                                </div>

                                                <form action="<?php echo base_url() ?>admin/delete_member" method="POST">
                                                    <div class="modal-body">
                                                        <h5>Apakah Kamu Yakin Akan Menghapus Data Ini?</h5>
                                                        <input type="hidden" name="id_member" value="<?= $data['id_member']; ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php $no++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Dosen</h4>
            </div>

            <form action="<?php echo base_url() ?>admin/add_member" method="POST">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="email">Username</label>
                        <input type="text" name="username" class="form-control" id="username" required>
                        <label for="email">Nama Dosen</label>
                        <input type="text" name="nama_member" class="form-control" id="nama_member" required>
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>