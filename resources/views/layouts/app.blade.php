<!DOCTYPE html>
<html lang="en" data-theme="cupcake">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? 'SB-2'}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        html {
            scroll-behavior: smooth;
        }

        /* Menambahkan margin-top untuk mengatasi navbar sticky */
        #cats {
            margin-top: 80px;  /* Sesuaikan dengan tinggi navbar Anda */
        }
    </style>
</head>

<body class="font-sans antialiased">
    {{$slot}}
</body>

</html>