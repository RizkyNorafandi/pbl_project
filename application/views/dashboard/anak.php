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
                            <th>Nama Anak</th>
                            <th>Tanggal Lahir</th>
                            <th>Tinggi Badan</th>
                            <th>Berat Badan</th>
                            <th>Jenis Kelamin</th>
                            <th>Lingkar Kepala</th>
                            <td>Opsi</td>
                        </tr>
                    </thead>

                    <!-- proses memmanggil data dari tabel -->

                    <tbody>
                        <?php
                        $id = 1;
                        foreach ($data_anak as $key) : ?>
                            <tr>
                                <td><?= $id++ ?></td>
                                <td><?= $key['nik_anak']; ?></td>
                                <td><?= $key['nama_anak']; ?></td>
                                <td><?= date('d - m - Y', strtotime($key['tgl_lahir'])); ?></td>
                                <td><?= $key['tb_lahir']; ?> mm</td>
                                <td><?= $key['bb_lahir']; ?> Kg</td>
                                <td><?php if ($key['jenis_kelamin'] == 'L') {
                                        echo 'Laki-Laki';
                                    } else {
                                        echo 'Perempuan';
                                    };
                                    ?></td>
                                <td><?= $key['lingkar_kepala']; ?></td>
                                <td>
                                    <center>
                                        <!-- btn info -->
                                        <button class="btn btn-sm btn-info btn-circle" data-bs-toggle="modal" data-bs-target="#editModal<?= $key['nik_anak']; ?>">
                                            <i class="fas fa-info"></i>

                                        </button>
                                        <a href="<?= base_url() ?>dashboard/people/hapus_i_data/<?= $key['nik_anak'] ?>" class="btn btn-sm btn-danger btn-circle">
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
    foreach ($data_anak as $anak) : $id++;
    ?>

        <!-- Modal -->
        <div class="modal fade" id="editModal<?= $anak['nik_anak']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('dashboard/people/edit_anak') ?>" method="post">

                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" name="nik" placeholder="Masukkan NIK" class="form-control" value="<?= $anak['nik_anak'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" placeholder="Masukkan Nama" class="form-control" value="<?= $anak['nama_anak'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir" class="form-control" value="<?= $anak['tgl_lahir'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="tb_lahir">Tinggi Badan</label>
                                <input type="text" name="tb_lahir" placeholder="Tinggi Badan" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="bb_lahir">Berat Badan</label>
                                <input type="text" name="bb_lahir" placeholder="Berat Badan" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis</label>
                                <select name="jenis_kelamin" id="" class="form-control">
                                    <option class="form-control" value="">-- jenis kelamin --</option>
                                    <option value="L" <?= $anak['jenis_kelamin'] == "L" ? "selected" : null ?>>Laki-Laki</option>
                                    <option value="P" <?= $anak['jenis_kelamin'] == 'P' ? 'selected' : null ?>>Perempuan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="lingkar_kepala">Lingkar Kepala</label>
                                <input type="text" name="lingkar_kepala" placeholder="Lingkar Kepala" class="form-control">
                            </div>

                            <div class="modal-footer">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data anak</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- modal content-->
                <div class="modal-body">
                    <?= form_open_multipart('dashboard/people/proses_tambah_anak'); ?>

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
                        <label for="tb_lahir">Tinggi Badan</label>
                        <input type="text" name="tb_lahir" placeholder="Tinggi Badan" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="bb_lahir">Berat Badan</label>
                        <input type="text" name="bb_lahir" placeholder="Berat Badan" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="" class="form-control">
                            <option class="form-control" value="">-- jenis_kelamin --</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="lingkar_kepala">Lingkar Kepala</label>
                        <input type="text" name="lingkar_kepala" placeholder="Lingkar Kepala" class="form-control">
                    </div>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    <?= form_close(); ?>
                </div>
                <!-- end modal content-->

            </div>
        </div>
    </div>



</div>