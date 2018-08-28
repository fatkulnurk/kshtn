<?php
include "header.php";
?>

<?php
if(isset($_GET["idrm"])){
    $id = $_GET['idrm'];
}else{
    $id=0;
}
?>
<section class="content-header">
    <h1>
        Tambah Obat Untuk Rekam Medis
    </h1>
</section>
<section class="content">
    <?php
    if(isset($_POST['submit'])){
        echo '<div class="callout callout-info">';
        echo '<h4>';
        echo $dataAkses->addDetailTransaksi($id,$dataAkses->mysqlEscapeString($_POST['obat']),$dataAkses->mysqlEscapeString($_POST['jumlah']));
        //echo $dataAkses->addPasien($_POST['nama'],$_POST['umur'],$_POST['alamat'],$_POST['telepon'],$_POST['pekerjaan']);
        echo '</h4>';
        echo '</div>';
    }
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <form role="form" method="post" action="">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Nama Obat</label>
                            <select name="obat" class="form-control select2" style="width: 100%;">
                                <?php
                                $data = $dataAkses->ambilObat();
                                while($a = $dataAkses->fetchAssoc($data)){
                                    echo '<option value="'.$a["id_obat"].'">['.$a["id_obat"].']. '.$a["nama_obat"].' - Rp'.$a["harga_obat"];
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jumlah</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" placeholder="masukan" name="jumlah">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
include "footer.php";
?>
