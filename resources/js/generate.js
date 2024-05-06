$(document).ready(function () {
    $("#generate").on("click", function (event) {
        event.preventDefault(); // Menghentikan perilaku default dari tombol submit

        var title = $("#title").val();
        var subtitle = $("#subtitle").val();
        var designation = $("#designation").val();

        $.ajax({
            type: "POST",
            url: "{{ route('generate-description') }}",
            data: {
                title: title,
                subtitle: subtitle,
                designation: designation,
                _token: "{{ csrf_token() }}", // Menambahkan token CSRF untuk keamanan
            },
            success: function (data) {
                // console.log(data);
                $("#desc").val(data); // Mengambil data dari respons JSON
            },
            error: function (error) {
                console.error(error); // Menampilkan pesan kesalahan jika terjadi error
            },
        });
    });
});
