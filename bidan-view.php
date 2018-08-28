<?php
require_once "header.php";
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Daftar Semua Bidan
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
                            <th>ID Bidan</th>
                            <th>Nama</th>
                            <th>Nip</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        // ambil semua data di tabel user dan meyimpannya pada variabel data
                        //                                $data = $dataAkses->ambilPeminjaman();
                        $data = $dataAkses->ambilBidan();
                        while($a = $dataAkses->fetchAssoc($data)){
                            echo '
                                <tr>
                                <td>'.$a["id_bidan"].'</td>
                                <td>'.$a["nama"].'</td>
                                <td>'.$a["nip"].'</td> 
                                </tr>
                                ';
                        }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>ID Bidan</th>
                            <th>Nama</th>
                            <th>Nip</th>
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
