<?php
require_once "header.php";
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Peminjaman Yang Sudah Lunas
        <small>Daftar Pinjaman Sudah Lunas</small>
    </h1>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <?php
    if(isset($_GET["idrm"])){
        $id = $_GET['idrm'];
    }else{
        $id=0;
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
                            <th>ID TRX</th>
                            <th>ID RM</th>
                            <th>ID Obat</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        // ambil semua data di tabel user dan meyimpannya pada variabel data
                        //                                $data = $dataAkses->ambilPeminjaman();
                        $data = $dataAkses->ambilDetailTertentu($id);
                        while($a = $dataAkses->fetchAssoc($data)){
                            echo '
                                <tr>
                                <td>'.$a["id_transaksi_det"].'</td>
                                <td>'.$a["id_rm"].'</td>
                                <td>'.$a["id_obat"].'</td> 
                                <td>'.$a["harga"].'</td> 
                                <td>'.$a["jumlah"].'</td>     
                                <td>'.$a["total"].'</td>     
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
