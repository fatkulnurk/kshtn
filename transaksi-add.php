<?php
require_once "header.php";
?>

<section class="content-header">
    <h1>
        Tambah Transaksi
        <small>Tambah Transaksi</small>
    </h1>
</section>
<section class="content">
    <?php
    if(isset($_POST['submit'])){
        echo '<div class="callout callout-info">';
        echo '<h4>';
        $rekammedis = $_POST['rekammedis'];
        $bidan      = $_POST['bidan'];
        $biaya      = $_POST['biaya'];
        $keterangan = $_POST['keterangan'];

        echo $dataAkses->addTransaksi($rekammedis,$bidan,$biaya,$keterangan);

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
                            <label>ID / Rekam Medis</label>
                            <select name="rekammedis" class="form-control select2" style="width: 100%;">
                                <?php
                                $data = $dataAkses->ambilRekamMedis();
                                while($a = $dataAkses->fetchAssoc($data)){
                                    echo '<option value="'.$a["id_rm"].'">'.$a["id_rm"].'. '.$a["nama"]." - Tanggal ".$a['tanggal'];
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>ID / Nama Bidan</label>
                            <select name="bidan" class="form-control select2" style="width: 100%;">
                                <?php
                                $data = $dataAkses->ambilBidan();
                                while($a = $dataAkses->fetchAssoc($data)){
                                    echo '<option value="'.$a["id_bidan"].'">'.$a["id_bidan"].' - '.$a["nama"];
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Biaya Periksa</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" placeholder="masukan ..." name="biaya">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Keterangan</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." name="keterangan"></textarea>
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
