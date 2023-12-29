<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"></h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title ?>
                <button type="button" class="btn btn-primary btn-sm float-right" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Data</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="example1" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama Ibu</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <td>Opsi</td>
                        </tr>
                    </thead>

                    <!-- proses memmanggil data dari tabel -->

                    <tbody>
                        <?php
                        $id = 1;
                        foreach ($data_ibu as $key) : ?>
                            <tr>
                                <td><?= $id++ ?></td>
                                <td><?= $key['nik_ibu']; ?></td>
                                <td><?= $key['nama_ibu']; ?></td>
                                <td><?= date('d - m - Y', strtotime($key['tgl_lahir'])); ?></td>
                                <td><?= $key['alamat']; ?></td>
                                <td>
                                    <center>
                                        <!-- btn info -->
                                        <button class="btn btn-sm btn-info btn-circle" data-bs-toggle="modal" data-bs-target="#editModal<?= $key['nik_ibu']; ?>">
                                            <i class="fas fa-info"></i>

                                        </button>
                                        <a href="<?= base_url() ?>dashboard/people/hapus_i_data/<?= $key['nik_ibu'] ?>" class="btn btn-sm btn-danger btn-circle">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </center>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <?php
    $id = 1;
    foreach ($data_ibu as $ibu) : $id++;
    ?>

        <!-- Modal -->
        <div class="modal fade" id="editModal<?= $ibu['nik_ibu']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('dashboard/people/edit_ibu') ?>" method="post">

                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" name="nik" placeholder="Masukkan NIK" class="form-control" value="<?= $ibu['nik_ibu'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" placeholder="Masukkan Nama" class="form-control" value="<?= $ibu['nama_ibu'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir" class="form-control" value="<?= $ibu['tgl_lahir'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" placeholder="Masukkan Alamat" class="form-control" value="<?= $ibu['alamat'] ?>">
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

    <!-- Modal edit-->

    <!-- end Modal edit-->

    <!-- Modal Tambah data -->
    <div class="modal fade bd-example-modal-lg" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Ibu</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- modal content-->
                <div class="modal-body">
                    <?= form_open_multipart('dashboard/people/proses_tambah_ibu'); ?>

                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" name="nik" placeholder="Masukkan NIK" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" placeholder="Masukkan Nama" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" placeholder="Masukkan Alamat" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" name="password" placeholder="Masukkan Password" class="form-control">
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