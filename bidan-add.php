<?php
include "header.php";
?>

<section class="content-header">
    <h1>
        Tambah Bidan
        <small>Tambah Bidan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tambah Bidan</li>
    </ol>
</section>
<section class="content">
    <?php
    if(isset($_POST['submit'])){
        echo '<div class="callout callout-info">';
        echo '<h4>';
        echo $dataAkses->addBidan($dataAkses->mysqlEscapeString($_POST['nama']),$dataAkses->mysqlEscapeString($_POST['nip']));
        //echo $dataAkses->addPasien($_POST['nama'],$_POST['umur'],$_POST['alamat'],$_POST['telepon'],$_POST['pekerjaan']);
        echo '</h4>';
        echo '</div>';
    }
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Tambah Bidan</h3>
                </div>
                <form role="form" method="post" action="">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Bidan</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="masukan nama" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nip</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="masukan nip" name="nip">
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
