<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>{{ config('app.name', 'SISTEMA DE CONTROLE') }}</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/img/logohome.png" type="image/x-icon" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1">


</head>

<body>
    <!-- <img class="wave" src="img/wave.png"> -->
    <div class="alert-container">

    </div>

    <div class="container">
        <div class="login-content">

            <div class="img col-sm-6">
                <img src="/assets/img/bg.svg" style="height: 200px; margin-right: 300px;">
            </div>

            <div class="login-content">

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <img src="/assets/img/avatar.svg">

                    <h2 class="title">LOGIN</h2>
                    {{-- Mensagem de ERRO   --}}
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style="color: red">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="input-div one">
                        <div class="i">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="div">
                            <h5>EMAIL</h5>
                            <input type="text" name="email" id="nome" class="input">
                        </div>
                    </div>
                    <div class="input-div pass">
                        <div class="i">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div class="div">
                            <h5>SENHA</h5>
                            <input type="password" name="password" id="senha" class="input">
                        </div>
                    </div>

                    <input type="submit" name="submit" class="btn" value="enviar">

                    <a  href="{{ route('register') }}">CRIAR CONTA</a>

                    <div class="row">
                        <div>
                            @if (Route::has('password.request'))
                            <a  href="{{ route('password.request') }}">
                                {{ __('ESQUECEU SUA SENHA?') }}
                            </a>
                        @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <script src="/assets/js/main.js"></script>

        <script type="text/javascript" src="/assets/js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
        </script>
</body>

</html>
