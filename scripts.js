$(document).ready(function () {

    $('#tombol-cari').hide();

    $('#keyword').on('keyup', function () {
        $('.loader').show();

        // ajax menggunakan load
        //$('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());


        $.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(),
            function (data) {

                $('#container').html(data);
                $('.loader').hide();



            });
    });

});

$(document).ready(function () {

    $('#tombol-search').hide();

    $('#keyword').on('keyup', function () {
        $('.loader').show();

        // ajax menggunakan load
        //$('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());


        $.get('ajax/pinjam.php?keyword=' + $('#keyword').val(),
            function (data) {

                $('#container').html(data);
                $('.loader').hide();



            });
    });

});