<?php
require_once "header.php";
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Peminjaman Yang Sudah Lunas
        <small>Daftar Pinjaman Sudah Lunas</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="./index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Pengajuan Pinjaman</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <?php
    if(isset($_GET["id"])){
        $id = $_GET['id'];
    }else{
        $id=0;
    }
    ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Peminjaman Sudah Lunas</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID RM</th>
                            <th>ID Pasien</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Keluhan</th>
                            <th>Diagnosa</th>
                            <th>ID Bidan</th>
                            <th>MENU</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        // ambil semua data di tabel user dan meyimpannya pada variabel data
                        //                                $data = $dataAkses->ambilPeminjaman();
                        $data = $dataAkses->ambilRekapUserTertentu($id);
                        while($a = $dataAkses->fetchAssoc($data)){
                            echo '
                                <tr>
                                <td>'.$a["id_rm"].'</td>
                                <td>'.$a["id_pasien"].'</td>
                                <td>'.$a["nama"].'</td>
                                <td>'.$a["tanggal"].'</td>
                                <td>'.$a["keluhan"].'</td>
                                <td>'.$a["diagnosa"].'</td>
                                <td>'.$a["id_bidan"].'</td>      
                                <td class="text-center">
                                <a class="btn btn-info btn-flat" href="rekam-medis-obat-add.php?idrm='.$a["id_rm"].'">Tambah Obat</a>
                                <a class="btn btn-info btn-flat" href="rekam-medis-obat-view.php?idrm='.$a["id_rm"].'">Lihat Obat</a>
                                </td>
                                </tr>
                                ';
                        }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>ID Pasien</th>
                            <th>Nama</th>
                            <th>TTL</th>
                            <th>Alamat</th>
                            <th>No Hp</th>
                            <th>Pekerjaan</th>
                            <th>Lihat</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
<!-- /.content -->

<?php
include "footer.php";
?>
