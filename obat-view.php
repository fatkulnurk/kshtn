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
                            <th>ID Obat</th>
                            <th>Nama Obat</th>
                            <th>Harga Obat</th>
                            <th>Stok Obat</th>
                            <th>Menu</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        // ambil semua data di tabel user dan meyimpannya pada variabel data
                        //                                $data = $dataAkses->ambilPeminjaman();
                        $data = $dataAkses->ambilObat();
                        while($a = $dataAkses->fetchAssoc($data)){
                            echo '
                                <tr>
                                <td>'.$a["id_obat"].'</td>
                                <td>'.$a["nama_obat"].'</td>
                                <td>'.$a["harga_obat"].'</td> 
                                <td>'.$a["stok_obat"].'</td>    
                                <td class="text-center">
                                <a class="btn btn-success btn-flat" href="?id='.$a["id_obat"].'&nama='.$a["nama_obat"].'&act=tambah">Tambah</a>
                                <a class="btn btn-info btn-flat" href="?id='.$a["id_obat"].'&nama='.$a["nama_obat"].'&act=ganti">Ganti Harga</a>
                                </td>
                                </tr>
                                ';
                        }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>ID Obat</th>
                            <th>Nama Obat</th>
                            <th>Harga Obat</th>
                            <th>Stok Obat</th>
                            <th>Menu</th>
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
