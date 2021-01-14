<?php
$conn = mysqli_connect("localhost","root","","user_level");


function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row; 
    }
    return $rows;
}

function tambah ($data) {
    global $conn;

    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $no_tlp = htmlspecialchars($data['no_tlp']);
    $barcode = htmlspecialchars($data['barcode']);
   
    
    $Gambar = upload();
    if(!$Gambar){
        return false ;
    }

    $query ="INSERT INTO mahasiswa
                 VALUES
                 ('','$nama','$email','$Gambar','$no_tlp','$barcode'
                 )
                 ";
    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);
}

function upload () {

    $namaFile = $_FILES ['Gambar']['name'];
    $ukuranFile  = $_FILES['Gambar']['size'];
    $error  = $_FILES['Gambar']['error'];
    $tmpName  = $_FILES['Gambar']['tmp_name'];
    

    if ( $error === 4){
        echo"<script>
            alert('Pilih gambar terlebih dahulu');
            </script>";
            return  false;
    }

    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
            echo"<script>
                alert('yang anda upload bukan gmabar!');
                </script>";
                return  false;
    }

    if( $ukuranFile > 1000000 ) {
        echo"<script>
        alert('ukuran gambar terlalu besar!');
        </script>";
        return  false;
    }


    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar ;


    move_uploaded_file($tmpName,'img/'. $namaFileBaru);
 
    return $namaFileBaru;
        

}


function Cari($keyword) {

       
    $query = "SELECT * FROM pinjam_buku
              WHERE 
              penulis_buku LIKE '%$keyword%' OR
              judul_buku LIKE '%$keyword%'
              ";
        return query($query);
}


function register($data)  {
    global $conn;

    $nama = strtolower(stripslashes($data["nama"]));
    $alamat = strtolower(stripslashes($data["alamat"]));
    $no_tlp = strtolower(stripslashes($data["no_tlp"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $barcode = strtolower(stripslashes($data["barcode"]));

    $Gambar = upload();
    if(!$Gambar){
        return false ;
    }
    $result = mysqli_query($conn, "SELECT nama FROM user WHERE
         nama = '$nama'" ); 
    
    if( mysqli_fetch_assoc($result) ) {
        echo " <script>
               alert(' Username sudah terdaftar!');
              </script>";
        return false;
    }

    if( $password !== $password2 ) {
        echo "<script>
              alert('konfirmasi password tidak sesuai!'); 
        </script>";
        return false;
    }

     $password = password_hash($password, PASSWORD_DEFAULT);
      

    mysqli_query($conn, "INSERT INTO user VALUES('','$nama','$alamat','$no_tlp','$password','$Gambar','$barcode')"); 
    

    return mysqli_affected_rows($conn);
}

function hapus ($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);

}

function edit($data) {
    global $conn;

    $id = ($data['id']);
    $nama = htmlspecialchars($data['nama']);
    $barcode = htmlspecialchars($data['barcode']);
    $email = htmlspecialchars($data['email']);
    $no_tlp = htmlspecialchars($data['no_tlp']);
    $gambarlama = htmlspecialchars($data['gambarlama']);


    if( $_FILES['Gambar']['error'] === 4){
        $Gambar = $gambarlama; 
    } else {
        $Gambar = upload();
    }

    

    $query ="UPDATE mahasiswa SET
                barcode = '$barcode',
                nama = '$nama',
                email = '$email', 
                no_tlp = '$no_tlp',
                Gambar = '$Gambar'
                WHERE id = $id
                 ";
    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);
}

function isi ($data) {
    global $conn;

    $no_buku = htmlspecialchars($data['no_buku']);
    $barcode_anggota = htmlspecialchars($data['barcode_anggota']);
    $barcode_petugas = htmlspecialchars($data['barcode_petugas']);
    $judul_buku = htmlspecialchars($data['judul_buku']);
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = strtotime("+7 day", strtotime($tgl_pinjam)); // +7 hari dari tgl peminjaman
    $tgl_kembali = date('Y-m-d', $tgl_kembali); // format tgl peminjaman tahun-bulan-hari
   
    $query ="INSERT INTO pinjambuku
                 VALUES
                 (' ','$no_buku','$barcode_anggota','$barcode_petugas','$judul_buku','$tgl_pinjam','$tgl_kembali'
                 )
                 ";
    mysqli_query($conn, $query);
    


    return mysqli_affected_rows($conn);
    
   

    }   


function delete($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM pinjambuku WHERE id = $id");
    return mysqli_affected_rows($conn);

}

function search($keyword) {

       
    $query = "SELECT * FROM pinjambuku
              WHERE 
              barcode_anggota LIKE '%$keyword%' OR
              judul_buku LIKE '%$keyword%'
              ";
       return query($query);
}




?>

      
