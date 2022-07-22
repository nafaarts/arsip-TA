<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Login - Arsip TA Politeknik Aceh</title>
    <link rel="shortcut icon" href="{{ asset('logo-kecil.png') }}" type="image/png">
</head>

<body>
    <section>
        <div class="container-fluid h-custom" style="height: 100vh">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="{{ asset('login.svg') }}" class="img-fluid" alt="Sample image">
                </div>

                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action="/login" method="POST">
                        <a class="navbar-brand py-2 d-flex align-items-center" style="gap: 10px" href="/">
                            <img src="{{ asset('logo.png') }}" alt="Logo Politeknik Aceh" height="24"
                                class="mt-0">
                            <h4 class="fw-light text-dark m-0 border-start ps-2">Arsip Tugas Akhir</h4>
                        </a>

                        <hr style="margin: 30px 0; border: 1px solid #000;">

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @csrf
                        <div class="form-outline mb-3">
                            <label class="form-label" for="email">Email address</label>
                            <input type="email" id="email" name="email" class="form-control"
                                placeholder="Masukan email" value="{{ old('email') }}" />
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-outline mb-5">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Masukan password" />
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-primary"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" value="1" name="remember-me"
                                    id="remember-me" />
                                <label class="form-check-label" for="remember-me">
                                    Remember me
                                </label>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
