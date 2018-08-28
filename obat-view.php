<?php
require_once "header.php";
if(isset($_GET['nama'])){
    $nama = $_GET['nama'];
    $id   = $_GET['id'];
}
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Lihat Semua Obat
    </h1>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <?php
//                if(isset($_GET['act'])){
//                    $act = $_GET['act'];
//                    if($act == 'tambah'){
//                        echo '
//                        <form action="" method="POST">
//                        <div class="box-body">
//                        <h3>Tambah Stok Obat '.$nama.'</h3>
//                            <div class="form-group">
//                                <label for="exampleInputEmail1">Harga Obat</label>
//                                <input type="number" class="form-control" id="exampleInputEmail1" placeholder="input angka" name="number">
//                            </div>
//                            <div class="box-footer">
//                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
//                            </div>
//                        </div>
//                        </form>
//                        ';
//                    }elseif ($act == 'ganti'){
//                        echo '
//                        <form action="" method="POST">
//                        <div class="box-body">
//                        <h3>Rubah Harga Obat '.$nama.'</h3>
//                            <div class="form-group">
//                                <label for="exampleInputEmail1">Harga Obat</label>
//                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="input number" name="number">
//                            </div>
//                            <div class="box-footer">
//                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
//                            </div>
//                        </div>
//                        </form>
//                        ';
//                    }
//
//                    if(isset($_POST['submit'])){
//                        $jumlah = $_POST['number'];
//                        echo '<div class="callout callout-info">';
//                        echo '<h4>';
//                        if($act == 'tambah'){
//                            //$dataAkses->updateJumlahObat()
//                        }
//                            echo '</h4>';
//                        echo '</div>';
//                    }
//                }
//
//                if(isset($_POST['submit'])){
//
//                }
                ?>
                <hr>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID Obat</th>
                            <th>Nama Obat</th>
                            <th>Harga Obat</th>
                            <th>Stok Obat</th>
<!--                            <th>Menu</th>-->
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
                                <!--  
                                <td class="text-center">
                                <a class="btn btn-success btn-flat" href="?id='.$a["id_obat"].'&nama='.$a["nama_obat"].'&act=tambah">Tambah Stok</a>
                                <a class="btn btn-info btn-flat" href="?id='.$a["id_obat"].'&nama='.$a["nama_obat"].'&act=ganti">Ganti Harga</a>
                                </td>
                                </tr>
                                -->
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
<!--                            <th>Menu</th>-->
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
