<?php
// Menjalankan Session
session_start();

/*********************************
 * INFORMASI CLASS DataAkses
 *
 * Ini adalah class yang di gunakan untuk akses, update, hapus, edit data yang ada di database.
 * Semua fungsi standart dari mysqli di rubah naming convensionnya menjadi CamelCase, agar penulisannya mudah.
 *
*********************************/

include_once "DB.php";

class DataAkses extends DB
{
    // variabel koneksi ke database
    var $conn;

    // konstraktor untuk menyimpan koneksi dar database
    public function __construct()
    {
        $dbconn = new DB();
        $this->conn = $dbconn->koneksi();
    }

    // untuk cek koneksi ke database
    public function connCheck(){
        if(!$this->conn){
            die("Koneksi ke database gagal");
        }else{
            die("Koneksi ke database berhasil");
        }
    }


    /*************************************
     * Method Menambah Data
     *************************************/
    public function addPasien($nama,$umur,$alamat,$telepon,$pekerjaan,$berat,$alergi){
        $result = $this->conn->query("INSERT INTO pasien (nama, umur, alamat, telepon, pekerjaan, berat_badan,alergi) VALUES ('$nama','$umur','$alamat','$telepon','$pekerjaan','$berat','$alergi');");
        if($result){
            return "Berhasil";
        }else{
            return "Gagal";
        }
    }

    public function addRekamMedis($nama,$tanggal,$keluhan,$diagnosa,$idpasien,$idbidan){
        $result = $this->conn->query("INSERT INTO rekam_medis (nama, tanggal, keluhan, diagnosa, id_pasien, id_bidan) VALUES ('$nama','$tanggal','$keluhan','$diagnosa','$idpasien','$idbidan');");
        //return var_dump($result);
        //var_dump($nama,$tanggal,$keluhan,$diagnosa,$idpasien,$idbidan);

        if($result){
            return "Berhasil";
        }else{
            return "Gagal";
        }
    }

    public function addDetailTransaksi($idrm,$idobat,$jumlah){
        $result = $this->ambilObatTertentu($idobat);
        while($a = $this->fetchAssoc($result)){
            $harga = $a["harga_obat"];
            $stok = $a["stok_obat"];
        }

        $stokobat = $stok - $jumlah;
        if ($stokobat <= 0){
            $stokobat=0;
        }

        $hargatotal = $harga * $jumlah;

        $result = $this->conn->query("INSERT INTO detail_transaksi (id_rm, id_obat, harga, jumlah, total) VALUES ('$idrm','$idobat','$harga','$jumlah','$hargatotal');");
        if($result){
            $this->updateJumlahObat($idobat,$stokobat);
            return "Berhasil";
        }else{
            return "Gagal";
        }
    }

    public function addTransaksi(){
        $result = $this->conn->query("INSERT INTO  () VALUES ();");
        if($result){
            return "Berhasil";
        }else{
            return "Gagal";
        }
    }

    public function addBidan($nama,$nip){
        $result = $this->conn->query("INSERT INTO bidan (nama, nip) VALUES ('$nama','$nip');");
        if($result){
            return "Berhasil";
        }else{
            return "Gagal";
        }
    }

    public function addObat($nama,$harga,$stok){
        $result = $this->conn->query("INSERT INTO obat (nama_obat, harga_obat, stok_obat) VALUES ('$nama','$harga','$stok');");
        if($result){
            return "Berhasil";
        }else{
            return "Gagal";
        }
    }

    public function ambilPasien(){
        $result = $this->conn->query("select * from pasien");
        return $result;
    }

    public function ambilRekamMedis(){
        $result = $this->conn->query("select * from rekam_medis");
        return $result;
    }

    // ambil rekap tertentu
    public function ambilRekapUserTertentu($id){
        $result = $this->conn->query("select * from rekam_medis where id_pasien='$id'");
        return $result;
    }

    // ambil detail transaksi tertentu
    public function ambilDetailTertentu($id){
        $result = $this->conn->query("select * from detail_transaksi where id_rm='$id'");
        return $result;
    }


    /*************************************
     * Method
     *************************************/
    public function ambilObat(){
        $result = $this->conn->query("select * from obat");
        return $result;
    }
    public function ambilObatTertentu($id){
        $result = $this->conn->query("select * from obat where id_obat='$id'");
        return $result;
    }

    // mengambil semua data di tabel user
    public function ambilBidan(){
        $result = $this->conn->query("select * from bidan");
        return $result;
    }

    // ambil user tertentu
    public function ambilBidanTertentu($id){
        $result = $this->conn->query("select * from bidan where id_bidan='$id'");
        return $result->fetch_assoc();
    }

    // menambah bidan
    function tambahBidan($nama,$nip){
        $result = $this->conn->query("INSERT INTO bidan (nama,nip) VALUES ('$nama','$nip');");
        if($result){
            return "Berhasil";
        }else{
            return "Gagal";
        }
    }

    // Hapus tertentu
    public function hapusBidanTertentu($id){
        $result = $this->conn->query("DELETE FROM bidan where id_bidan='$id'");
        if($result){
            return "Hapus Sukses";
        }else{
            return "Hapus Gagal";
        }
    }
    // update
    function updateBidan($id,$akses){
        $result = $this->conn->query("UPDATE bidan SET user_tipe_akun='$akses' WHERE user_id='$id'");
        if($result){
            return "Update Hak Akses Berhasil";
        }else{
            return "Update Hak Akses Gagal";
        }
    }

    function updateJumlahObat($id,$jumlah){
        $result = $this->conn->query("update obat set stok_obat='$jumlah' where id_obat='$id';");
        if($result){
            return "Berhasil";
        }else{
            return "Gagal";
        }
    }

    

    /*************************************************
     *                 CRUD USER
     *************************************************/
//    // mengambil semua data di tabel user
//    public function ambilUsers(){
//        $result = $this->conn->query("select * from user");
//        return $result;
//    }
//
//    // ambil user tertentu
//    public function ambilUserTertentu($id){
//        $result = $this->conn->query("select * from user where user_id='$id'");
//        return $result->fetch_assoc();
//    }
//
//    // Hapus user tertentu
//    public function hapusUserTertentu($id){
//        $result = $this->conn->query("DELETE FROM user where user_id='$id'");
//        if($result){
//            return "Hapus Sukses";
//        }else{
//            return "Hapus Gagal";
//        }
//    }
//
//
//    function tambahPeminjaman($id,$nama,$jangkawaktu,$nominal){
//        $result = $this->conn->query("INSERT INTO peminjaman (peminjaman_user_id, peminjaman_nama_lengkap, peminjaman_nominal, peminjaman_jangka_waktu) VALUES ('$id','$nama','$nominal','$jangkawaktu');");
//        if($result){
//            return "Pengajuan Peminjaman Berhasil";
//        }else{
//            return "Pengajuan Peminjaman Gagal";
//        }
//    }
//
//    // login checker
//    function masuk($email,$password){
//        $password = md5($password);
//        $result = $this->conn->query("select * from user where user_email='$email' AND user_password='$password';");
//        $data = $this->fetchAssoc($result);
//
//        $_SESSION['id'] = $data['user_id'];
//
//        return $this->numRows($result);
//    }
//
//    // update hak akses
//    function updateHakAkses($id,$akses){
//        $result = $this->conn->query("UPDATE user SET user_tipe_akun='$akses' WHERE user_id='$id'");
//        if($result){
//            return "Update Hak Akses Berhasil";
//        }else{
//            return "Update Hak Akses Gagal";
//        }
//    }
//
//    // hapus peminjaman file semua-peminjaman.php
//    function hapusPeminjaman($id){
//        $result = $this->conn->query("delete from peminjaman where peminjaman_id='$id'");
//        if($result){
//            return "Pinjaman id ".$id." Berhasil di hapus.";
//        }else{
//            return "Penghapusan Gagal";
//        }
//    }

    /******************************************************************************
     *              FUNGSI PEMBANTU KONEKSI DAN PENGAMBILAN DATA
     *    BAWAAN PHP TAPI DI RUBAH NAMING CONVENSIONNYA MENJADI CAMELCASE)
     ******************************************************************************/
    // untuk escape string (agar data sesuai format mysql)
    function mysqlEscapeString($result)
    {
        return mysqli_real_escape_string($this->conn,$result);
    }

    function query($result){
        return $this->conn->query($result);
    }

    // untuk menghitung jumlah baris
    function numRows($result)
    {
        return $result->num_rows;
    }

    // untuk cek jumlah baris apakah lebih dari 1
    function numRowsOverOne($result){
        return $result > 0 ? true : false;
    }

    // untuk fetch assoc
    function fetchAssoc($result){
        return mysqli_fetch_assoc($result);
    }

    // untuk fetch array
    function fetchArray($result){
        return mysqli_fetch_array($result);
    }

    // fetch object
    function fetchObject($result){
        return mysqli_fetch_object($result);
    }

    // fetch length
    function fetchLength($result){
        return mysqli_fetch_lengths($result);
    }
}