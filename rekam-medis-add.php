<?php
require_once "header.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $nama = $_GET['nama'];
}else{
    $id = 0;
    $nama="null";
}
?>

<section class="content-header">
    <h1>
        Tambah Rekap Medis
        <small>Tambah Rekap Medis</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tambah Rekap Medis</li>
    </ol>
</section>
<section class="content">
    <?php
    if(isset($_POST['submit'])){
        echo '<div class="callout callout-info">';
        echo '<h4>';
        // die($_POST['bidan']);
        echo $dataAkses->addRekamMedis($dataAkses->mysqlEscapeString($nama),$dataAkses->mysqlEscapeString($_POST['tanggal']),$dataAkses->mysqlEscapeString($_POST['keluhan']),$dataAkses->mysqlEscapeString($_POST['diagnosa']),$id,$dataAkses->mysqlEscapeString($_POST['bidan']));
        // $result = $dataAkses->query( "INSERT INTO rekam_medis (nama, tanggal, keluhan, diagnosa, id_pasien, id_bidan) VALUES ($nama,$_POST['tanggal'],$keluhan,$diagnosa,$idpasien,$idbidan);");

        echo '</h4>';
        echo '</div>';
    }
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Tambah Rekap Medis</h3>
                </div>
                <form role="form" method="post" action="">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="masukan ..." name="nama" value="<?php echo $nama;?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal</label>
                            <input type="date" class="form-control" id="exampleInputEmail1" placeholder="masukan ..." name="tanggal">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Keluhan</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." name="keluhan"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Diagnosa</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." name="diagnosa"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID / Nama Pasien</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $id." - ".$nama; ?>" disabled>
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
