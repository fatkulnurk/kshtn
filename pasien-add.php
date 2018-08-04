<?php
include "header.php";
?>

<section class="content-header">
    <h1>
        Tambah Pasien
        <small>Tambah Pasien</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tambah Pasien</li>
    </ol>
</section>
<section class="content">
    <?php
    if(isset($_POST['submit'])){
        echo '<div class="callout callout-info">';
        echo '<h4>';
        echo $dataAkses->addPasien($dataAkses->mysqlEscapeString($_POST['nama']),$dataAkses->mysqlEscapeString($_POST['umur']),$dataAkses->mysqlEscapeString($_POST['alamat']),$dataAkses->mysqlEscapeString($_POST['telepon']),$dataAkses->mysqlEscapeString($_POST['pekerjaan']),$dataAkses->mysqlEscapeString($_POST['beratbadan']),$dataAkses->mysqlEscapeString($_POST['alergi']));
        //echo $dataAkses->addPasien($_POST['nama'],$_POST['umur'],$_POST['alamat'],$_POST['telepon'],$_POST['pekerjaan']);
        echo '</h4>';
        echo '</div>';
    }
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Tambah Pasien</h3>
                </div>
                <form role="form" action="" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Umur</label>
                            <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Umur" name="umur">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" rows="3" placeholder="Alamat" name="alamat"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Telepon</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="No Telpon" name="telepon">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pekerjaan</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="pekerjaan" name="pekerjaan">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Berat Badan</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" placeholder="berat badan" name="beratbadan">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alergi</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="alergi" name="alergi">
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
