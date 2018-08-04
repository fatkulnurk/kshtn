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
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <form role="form" method="post" action="">
                    <div class="box-body">
                        <div class="form-group">
                            <label>ID / Rekam Medis</label>
                            <select name="bidan" class="form-control select2" style="width: 100%;">
                                <?php
                                $data = $dataAkses->ambilRekamMedis();
                                while($a = $dataAkses->fetchAssoc($data)){
                                    echo '<option value="'.$a["id_rm"].'">'.$a["id_rm"].' - '.$a["nama"];
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
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="masukan ...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Keterangan</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
include "footer.php";
?>
