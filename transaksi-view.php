<?php
require_once "header.php";
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Semua Transaksi
    </h1>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID TRX</th>
                            <th>ID RM</th>
                            <th>ID BIDAN</th>
                            <th>Keterangan</th>
                            <th>Biaya Periksa</th>
                            <th>Biaya Obat</th>
                            <th>Total Biaya</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        // ambil semua data di tabel user dan meyimpannya pada variabel data
                        //                                $data = $dataAkses->ambilPeminjaman();
                        $data = $dataAkses->ambilTransaksi();
                        while($a = $dataAkses->fetchAssoc($data)){
                            echo '
                                <tr>
                                <td>'.$a["id_transaksi"].'</td>
                                <td>'.$a["id_rm"].'</td>
                                <td>'.$a["id_bidan"].'</td> 
                                <td>'.$a["keterangan"].'</td> 
                                <td>'.$a["biaya_periksa"].'</td>     
                                <td>'.$a["total_bayar_obat"].'</td>     
                                <td>'.$a["total_bayar"].'</td>     
                                </tr>
                                ';
                        }
                        ?>
                        </tbody>
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
