<!-- ini bagian isi  -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Bimbingan UAS
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Bimbingan UAS</li>
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
                            + Tambah Bimbingan UAS
                        </button>
                    </div>
                    <div class="box-body">
                        <?= $this->session->flashdata('message') ?>
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Nama Mahasiswa</th>
                                    <th class="text-center">NIM</th>
                                    <th class="text-center">Prodi</th>
                                    <th class="text-center">Nama Dosen Pembimbing</th>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Materi Bimbingan</th>
                                    <th class="text-center">Tindak Lanjut</th>
                                    <th class="text-center">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($uas as $data) { ?>

                                    <tr>
                                        <td class="text-center"><?= $no; ?></td>
                                        <td class="text-center"><?= $data->nama_mhs; ?></td>
                                        <td class="text-center"><?= $data->nim_mhs; ?></td>
                                        <td class="text-center"><?= $data->prodi_mhs; ?></td>
                                        <td class="text-center"><?= $data->nama_member; ?></td>
                                        <td class="text-center"><?= $data->tanggal; ?></td>
                                        <td class="text-center"><?= $data->materi_bimbingan; ?></td>
                                        <td class="text-center"><?= $data->tindak_lanjut; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <div class="text-center">
                                                    <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#edit-<?= $data->id_uas; ?>" title="Edit UAS"><span class="fa fa-edit"></span></a>
                                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete-<?= $data->id_uas; ?>" title="Delete UAS"><span class="fa fa-trash"></span></a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="edit-<?= $data->id_uas; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Edit Bimbingan UAS</h4>
                                                </div>

                                                <form action="<?php echo base_url() ?>dosen/edit_uas" method="POST">
                                                    <input type="hidden" name="id_uas" value="<?= $data->id_uas; ?>">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="email">Nama Mahasiswa</label>
                                                            <input type="text" name="nama_mhs" class="form-control" id="nama_mhs" required value="<?= $data->nama_mhs; ?>">
                                                            <label for="email">Nim Mahasiswa</label>
                                                            <input type="text" name="nim_mhs" class="form-control" id="nim_mhs" required value="<?= $data->nim_mhs; ?>">
                                                            <label for="email">Prodi</label>
                                                            <label for="email">Prodi</label>
                                                            <select name="prodi_mhs" class="form-control" id="prodi_mhs" required>
                                                                <option value="" disabled>Pilih</option>
                                                                <option value="Rekam Medis" <?php echo ($data->prodi_mhs == 'Rekam Medis') ? 'selected' : ''; ?>>Rekam Medis</option>
                                                                <option value="Farmasi" <?php echo ($data->prodi_mhs == 'Farmasi') ? 'selected' : ''; ?>>Farmasi</option>
                                                                <option value="Administrasi Rumah Sakit" <?php echo ($data->prodi_mhs == 'Administrasi Rumah Sakit') ? 'selected' : ''; ?>>Administrasi Rumah Sakit</option>
                                                                <option value="Bidan" <?php echo ($data->prodi_mhs == 'Bidan') ? 'selected' : ''; ?>>Bidan</option>
                                                            </select>
                                                            <label for="email">Nama Dosen Pembimbing</label>
                                                            <select name="id_member" id="id_member" class="selectpicker form-control" required>
                                                                <option value="" disabled>Pilih Dosen</option>
                                                                <?php foreach ($data_member as $row) : ?>
                                                                    <option value="<?php echo $row->id_member ?>" <?php echo (isset($data->id_member) && $data->id_member == $row->id_member) ? 'selected' : ''; ?>><?php echo $row->nama_member; ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                            <label for="email">Tanggal</label>
                                                            <input type="date" name="tanggal" class="form-control" id="tanggal" required value="<?= $data->tanggal; ?>">
                                                            <label for=" materi_bimbingan">Materi Bimbingan</label>
                                                            <textarea id="materi_bimbingan" name="materi_bimbingan" rows="4" placeholder="Tuliskan materi bimbingan yang telah dilakukan..." required><?php echo $data->materi_bimbingan; ?></textarea>
                                                            <label for="tindak_lanjut">Tindak Lanjut</label>
                                                            <textarea id="tindak_lanjut" name="tindak_lanjut" rows="4" placeholder="Tuliskan tindak lanjut dari hasil bimbingan..." required><?php echo $data->tindak_lanjut; ?></textarea>
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
                                    <div class="modal fade" id="delete-<?= $data->id_uas; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Hapus Bimbingan UAS</h4>
                                                </div>

                                                <form action="<?php echo base_url() ?>dosen/delete_uas" method="POST">
                                                    <div class="modal-body">
                                                        <h5>Apakah Kamu Yakin Akan Menghapus Data Ini?</h5>
                                                        <input type="hidden" name="id_uas" value="<?= $data->id_uas; ?>">
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



                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

    <!-- Modal -->
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Bimbingan UAS</h4>
                </div>

                <form id="form_add_uts" action="<?php echo base_url() ?>dosen/add_uas" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="email">Nama Mahasiswa</label>
                            <input type="text" name="nama_mhs" class="form-control" id="nama_mhs" required>
                            <label for="email">Nim Mahasiswa</label>
                            <input type="text" name="nim_mhs" class="form-control" id="nim_mhs" required>
                            <label for="email">Prodi</label>
                            <select name="prodi_mhs" class="form-control" id="prodi_mhs">
                                <option value="">Pilih</option>
                                <option value="Rekam Medis">Rekam Medis</option>
                                <option value="Farmasi">Farmasi</option>
                                <option value="Administrasi Rumah Sakit">Administrasi Rumah Sakit</option>
                                <option value="Bidan">Bidan</option>
                            </select>
                            <label for="email">Nama Dosen Pembimbing</label>
                            <select name="id_member" id="id_member" class="selectpicker form-control" required>
                                <option value="" selected disabled>Pilih Dosen</option>
                                <?php foreach ($data_member as $row) : ?>
                                    <option value="<?php echo $row->id_member ?>"><?php echo $row->nama_member; ?></option>
                                <?php endforeach ?>
                            </select>
                            <label for="email">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" id="tanggal" required>
                            <label for="materi_bimbingan">Materi Bimbingan</label>
                            <textarea id="materi_bimbingan" name="materi_bimbingan" rows="4" placeholder="Tuliskan materi bimbingan yang telah dilakukan..." required></textarea>
                            <label for="tindak_lanjut">Tindak Lanjut</label>
                            <textarea id="tindak_lanjut" name="tindak_lanjut" rows="4" placeholder="Tuliskan tindak lanjut dari hasil bimbingan..." required></textarea>
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
</div>

<!-- /.content-wrapper -->