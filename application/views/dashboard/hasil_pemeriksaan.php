<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"></h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
            <button type="button" class="btn btn-primary btn-sm float-right" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Data</button>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?= $this->session->flashdata('pesan'); ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No. Periksa</th>
                        <th>Pemeriksa</th>
                        <th>Keterangan</th>
                        <th>Resep Dokter</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $id = 1;
                    foreach ($periksa as $key) : $id++
                    ?>
                        <tr>
                            <td><?= $key['id_periksa'] ?></td>
                            <td><?= $key['nama_dokter'] ?></td>
                            <td><?= $key['keterangan'] ?></td>
                            <td><?= $key['resep'] ?></td>
                            <td>
                                <center>
                                    <!-- btn info -->
                                    <button class="btn btn-sm btn-info btn-circle" data-bs-toggle="modal" data-bs-target="#editModal<?= $key['id_periksa']; ?>">
                                        <i class="fas fa-info"></i></button>
                                    <!-- btn hapus -->
                                    <button class="btn btn-sm btn-danger btn-circle" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $key['id_periksa']; ?>">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </center>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    <?php
    $id = 1;
    foreach ($periksa as $periksa) : $id++;
    ?>

        <!-- Modal edit-->
        <div class="modal fade" id="editModal<?= $periksa['id_periksa']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Edit Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('dashboard/riwayat/edit_hasil') ?>" method="post">


                            <input type="hidden" name="id_periksa" value="<?= $periksa['id_periksa'] ?>">

                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea type="textarea" name="keterangan" cols="40" rows="5" placeholder="Keterangan" class="form-control"><?= $periksa['keterangan'] ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="resep">Resep Dokter</label>
                                <textarea name="resep" placeholder="Masukkan Resep Dokter" cols="40" rows="5" class="form-control"><?= $periksa['keterangan'] ?></textarea>
                            </div>

                            <div class="modal-footer">
                                <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach; ?>

    <!-- end Modal edit-->

    <!-- Modal Hapus  -->
    <?php foreach ($periksa as $row) : ?>
        <div class="modal fade" id="hapusModal<?= $row['id_petugas'] ?>" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data?</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url() ?>dashboard/people/hapus_petugas/<?= $row['id_petugas'] ?>" method="post">
                            <input type="hidden" name="id" value="<?= $row['id_petugas'] ?>">
                            Anda yakin ingin menghapus data ini?
                            Tindakan ini tidak dapat dibatalkan, pastikan Anda telah mempertimbangkan dengan cermat sebelum melanjutkan.
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php endforeach; ?>
<!-- end Modal Hapus -->

<!-- Modal Tambah data -->
<div class="modal fade bd-example-modal-lg" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data periksa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- modal content-->
            <div class="modal-body">

                <?= form_open_multipart('dashboard/Riwayat/tambah_hasil'); ?>

                <div class="form-group">
                    <label for="id_periksa">No. Pemeriksaan</label>
                    <select name="id_periksa" id="" class="form-control">
                        <option value="0">Masukkan No pemeriksaan</option>
                        <?php foreach ($h_periksa->result() as $row) {
                            echo "<option value=" . $row->id_periksa . ">" . $row->id_periksa . "</option>";
                        } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea type="textarea" name="keterangan" cols="40" rows="5" placeholder="Keterangan" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="resep">Resep Dokter</label>
                    <textarea name="resep" placeholder="Masukkan Resep Dokter" cols="40" rows="5" class="form-control"></textarea>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                <?= form_close(); ?>
            </div>
            <!-- end modal content-->

        </div>
    </div>
</div>
</div>