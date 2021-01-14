<?php

require 'functions.php';

$id= $_GET["id"];

if (delete($id) > 0 )
{
    echo "
    <script>
    alert('buku sudah dikembalikan !');
    document.location.href = 'pinjam_buku.php';
    </script>
    ";
}
else
{
    echo"<script>
    
    alert ('data gagal dihapus
    !');
    document.location.href = 'pinjam_buku.php';
    </script>
    ";
}
?>