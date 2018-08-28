<?php
require_once "header.php";
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Rekam Medis
            <small>Daftar Rekam Medis</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <?php
        if(isset($_GET["status"]) && isset($_GET['id'])){
            echo '<div class="callout callout-info"><h4>';
            echo $dataAkses->SM($status,$id);
            echo '</h4></div>';
        }
        ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID Pasien</th>
                                <th>Nama</th>
                                <th>TTL</th>
                                <th>Alamat</th>
                                <th>No Hp</th>
                                <th>Pekerjaan</th>
                                <th>Rekam Medis</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            // ambil semua data di tabel user dan meyimpannya pada variabel data
                            //                                $data = $dataAkses->ambilPeminjaman();
                            $data = $dataAkses->ambilPasien();
                            while($a = $dataAkses->fetchAssoc($data)){
                                echo '
                                <tr>
                                <td>'.$a["id_pasien"].'</td>
                                <td>'.$a["nama"].'</td>
                                <td>'.$a["umur"].'</td>
                                <td>'.$a["alamat"].'</td>
                                <td>'.$a["telepon"].'</td>
                                <td>'.$a["pekerjaan"].'</td>      
                                <td class="text-center">
                                <a class="btn btn-success btn-flat" href="rekam-medis-add.php?id='.$a["id_pasien"].'&nama='.$a["nama"].'">Tambah</a>
                                <a class="btn btn-info btn-flat" href="rekam-medis-view.php?id='.$a["id_pasien"].'&nama='.$a["nama"].'">Lihat Rekam</a>
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
