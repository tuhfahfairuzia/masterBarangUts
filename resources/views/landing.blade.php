<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-
scale=1.0">
    <title>test</title>
    @vite('resources/sass/app.scss')
</head>

<body>
    <div class="container mt-5">
        <div class="jumbotron">
            <h1 class="display-4">Selamat Datang di Tuhfah Market!</h1>
            <p class="lead">Pusat perdagangan dunia</p>
            <hr class="my-4">
            <p>
                <a class="btn btn-primary btn-lg" href="/profil" role="button">Profil</a>
                <a class="btn btn-success btn-lg" href="/barangs" role="button">Barang</a>
            </p>
        </div>
    </div>
    @vite('resources/js/app.js')
</body>

</html>
