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
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIP</th>
                        <th>Spesialis</th>
                        <th>Nama</th>
                        <th>Kontak</th>
                        <th>info</th>
                    </tr>
                </thead>
                <tfoot>
                </tfoot>
                <tbody>
                    <?php
                    $id = 1;
                    foreach ($data_dokter as $key) :
                    ?>
                        <tr>
                            <td><?= $id++ ?></td>
                            <td><?= $key['nip'] ?></td>
                            <td><?= $key['nama_dokter'] ?></td>
                            <td><?= $key['spesialis'] ?></td>
                            <td><?= $key['kontak'] ?></td>
                            <td>
                                <center>
                                    <!-- btn info -->
                                    <button class="btn btn-sm btn-info btn-circle" data-bs-toggle="modal" data-bs-target="#editModal<?= $key['nip']; ?>">
                                        <i class="fas fa-info"></i></button>
                                    <!-- btn delete -->
                                    <a href="#" class="btn btn-sm btn-danger btn-circle">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </center>
                            </td>
                        </tr>
                    <?php endforeach; ?>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    <?php
    $id = 1;
    foreach ($data_dokter as $row) : $id++;
    ?>

        <!-- Modal -->
        <div class="modal fade" id="editModal<?= $row['nip']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('dashboard/people/edit_petugas') ?>" method="post">

                            <input type="text" value="<?= $row['nip'] ?>" hidden name="id">

                            <div class="form-group">
                                <label for="nip">nip</label>
                                <input type="text" name="nip" placeholder="Masukkan nip" class="form-control" value="<?= $row['nip'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="spesialis">spesialis</label>
                                <input type="text" name="spesialis" placeholder="Masukkan spesialis" class="form-control" value="<?= $row['spesialis'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" placeholder="Masukkan Nama" class="form-control" value="<?= $row['nama_dokter'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="kontak">No. Telp</label>
                                <input type="text" name="kontak" placeholder="Masukkan No. Telp" class="form-control" value="<?= $row['kontak'] ?>">
                            </div>

                            <div class="modal-footer">
                                <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>

                        </form>
                        <!-- end form -->
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach; ?>

    <!-- end Modal edit-->
    <!-- modal tambah -->

    <div class="modal fade bd-example-modal-lg" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Petugas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- modal content-->
                <div class="modal-body">
                    <?= form_open_multipart('dashboard/people/proses_tambah_petugas'); ?>

                    <div class="form-group">
                        <label for="nip">nip</label>
                        <input type="text" name="nip" placeholder="Masukkan nip" class="form-control" value="<?= $row['nip'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="spesialis">spesialis</label>
                        <input type="text" name="spesialis" placeholder="Masukkan spesialis" class="form-control" value="<?= $row['spesialis'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" placeholder="Masukkan Nama" class="form-control" value="<?= $row['nama_dokter'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="kontak">No. Telp</label>
                        <input type="text" name="kontak" placeholder="Masukkan No. Telp" class="form-control" value="<?= $row['kontak'] ?>">
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    <?= form_close(); ?>

                </div>
                <!-- end modal content-->

            </div>
        </div>
    </div>


</div>