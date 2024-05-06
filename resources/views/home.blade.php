<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Generate Description</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite('resources/css/app.css')

</head>

<body class="antialiased">
    <div class="flex w-full min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="container mx-auto py-8">
            <div class="mb-8">
                <h1 class="font-extrabold text-2xl">Personal Info</h1>
                <p class="text-sm text-gray-500">Use this app to generate your description!</p>
            </div>
            <form id="generateForm" class="bg-slate-50 shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @method('POST')
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                        Title
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" name="title" type="text" placeholder="example : php developer">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="subtitle">
                        Sub Title
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="subtitle" name="subtitle" type="text" placeholder="example : junior developer">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="designation">
                        Designation
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="designation" name="designation" type="text" placeholder="example : fullstack developer">
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" id="generate">
                        Generate Description
                    </button>
                </div>
                <div class="mt-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="desc">
                        Description
                    </label>
                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="desc" name="desc" rows="5" readonly></textarea>
                </div>
            </form>
        </div>
    </div>

    <!-- script jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- script vit -->
    @vite('resources/js/app.js')

    {{-- <script>
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
    </script> --}}
</body>
</html>
