<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="container-fluid">
        <form action="/login" method="post" class="mx-auto">
            @csrf
            <h4 class="text-center">Login</h4>
            <div class="form-floating mb-3 mt-5">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                    value="{{ old('email') }}">
                <label for="email" class="form-label">Email</label>
                @error('email')
                    <small class="text-danger">{{ '*' . $message }}</small>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" id="password" placeholder="Contraseñá"
                    value="{{ old('password') }}">
                <label for="password" class="form-label">Contraseñá</label>
                @error('password')
                    <small class="text-danger">{{ '*' . $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-4">Ingresar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
