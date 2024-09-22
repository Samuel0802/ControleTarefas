<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/css-pro-layout@1.1.0/dist/css/css-pro-layout.css" rel="stylesheet">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <!-- Styles -->
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="stylesheet" href="/assets/css/responsivo.css" />
    <link rel="stylesheet" href="/assets/css/normalize.css">
    <link rel="stylesheet" href="/assets/css/animate.css">
    <link rel="stylesheet" href="/assets/css/RotaDeCores.css">
    <link rel="stylesheet" href="/assets/css/booststrap.css">



    @yield('css')
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;600&display=swap" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="css/main.css" /> --}}
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/img/logohome.png" type="image/x-icon" />

    <!-- BOOTSTRAP 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
       >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>


    <title>Controle de Tarefas</title>
</head>

<script>
    // Variável para controlar o estado da imagem
    let imagemAtual = 1;

    function mudarImagem() {
        const imagem = document.getElementById('imagem');


        if (imagemAtual === 1) {

            imagem.src = '/assets/img/logofcc.png';
            imagem.alt = 'Segunda Imagem';
            imagemAtual = 2;
            imagem.style.width = '60px';
            imagem.style.height = '60px';

        } else {

            imagem.src = '/assets/img/logofcc.png';
            imagem.alt = 'Imagem Padrão';
            imagemAtual = 1;
            imagem.style.width = '110px';
            imagem.style.height = '80px';
        }
    }
</script>


<body onload="carregar()">


    <div class="layout has-sidebar fixed-sidebar fixed-header">
        <aside id="sidebar" class="sidebar break-point-sm has-bg-image">
            <a id="btn-collapse" class="sidebar-collapser">
                <i class="ri-arrow-left-s-line" onclick="mudarImagem()"></i>
            </a>
            <div class="image-wrapper">
                <img href="/assets/img/logo.png" alt="sidebar background" />
            </div>
            <div class="sidebar-layout">
                <div class="sidebar-header">
                    <div class="pro-sidebar-logo">

                        <a href="{{ route('home') }}">
                            <img id="imagem" class="img-home animated fadeIn" alt="Imagem Padrão"
                                src="/assets/img/logo.png" style="width: 50px; height: 50px; "></a>
                        <h5></h5>
                    </div>
                </div>
                <div class="sidebar-content">

                    <nav class="menu open-current-submenu">




                        <ul>
                            <li class="menu-header"><span> CONTROLES </span></li>
                            <hr class="barra-title" style="width: 60%; background-color: white;">
                            <!-- SETOR DO FINANCEIRO -->

                            @include('layouts.tarefas')

                            <!-- FIM SETOR DO FINANCEIRO -->

                            <!--MENU RH-->

                            {{-- @include('layouts.material') --}}

                            <!--FIM MENU DOWN RH-->

                            <!--MENU DOWN ALMOXARIFADO-->

                            {{-- @include('layouts.almoxarifado') --}}

                            <!--FIM MENU DOWN ALMOXARIFADO-->

                            <!--MENU DOWN COMERCIAL-->
{{--
                            @include('layouts.celulares') --}}

                            <!--FIM MENU DOWN COMERCIAL-->

                             <!-- SETOR DO CQ -->

                             {{-- @include('layouts.maps') --}}

                             <!-- FIM SETOR DO CQ -->


                             <!-- SETOR DO CQ -->

                             {{-- @include('layouts.tema') --}}

                             <!-- FIM SETOR DO CQ -->




                            {{-- <li class="menu-header" style="padding-top: 20px"><span> EXTRA </span></li>
                            <hr class="barra-title" style="width: 60%; background-color: white;"> --}}

                            <!-- MENU DE EXTRAS-->

                            {{-- @include('layouts.extra') --}}

                            <!--FIM MENU EXTRAS-->

                            <li class="menu-header" style="padding-top: 20px"><span> SAIR </span></li>

                            <li class="menu-item">
                                       {{-- Função do laravel logout --}}
                                    <a href="{{ route('logout') }}" id="logout_sis" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <span class="menu-icon">
                                            <i class="ri-shut-down-line"></i>
                                        </span>
                                        <span class="menu-title"> {{ __('Logout') }}</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                            </li>

                        </ul>
                    </nav>
                </div>



                <!-- MENU DE EXTRAS-->


                <!--RODAPÉ NA BARRA LATERAL-->

                <div class="sidebar-footer">
                    <div class="footer-box">
                        <div>
                        </div>
                        <div style="padding: 0 10px">
                            <span style="display: block; margin-bottom: 10px"> Duvida sobre plataforma??
                            </span>
                            <div style="margin-bottom: 15px">
                            </div>
                            <div>
                                <a>samuelsouza0802@gmail.com.br</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <!--RODAPÉ NA BARRA LATERAL-->

        <style>
            .table-bg {
                background: rgba(0, 0, 0, 0.3);
                border-radius: 15px 15px 0 0;
            }

            .box-search {
                display: flex;
                justify-content: center;
                gap: .1%;
            }

            .navbar.bg-primary {
                background-color: #0c1e35 !important;
                /* Cor branca em notação hexadecimal */
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5) !important;
            }
        </style>

        <!--TELA HOME-->

        <div id="overlay" class="overlay"></div>

        <div class="layout">

            <nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="position: fixed; width: 100%">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <a class="navbar-brand wow fadeInDown" href="#">CONTROLE DE TAREFAS</a>
                        </div>
                        <div class="col-6 text-end">
                            <span id="google_translate_element" class="boxTradutor"></span>
                            <a id="btn-toggle" href="#" class="sidebar-toggler break-point-sm">
                                <i class="ri-menu-line ri-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </nav>


            @yield('conteudo')

            <footer class="footer">
                <small style="margin-bottom: 10px; display: inline-block">
                    © 2024 Todos os Direitos reservado

                    <a> Desenvolvido por Samuel Souza </a>

                </small>
                <small style="margin-bottom: 10px; display: inline-block">
                    <br>

                    <a>Versão 1.0.0 </a>

                </small>
            </footer>
            <div class="overlay"></div>


        </div>
        <!--FIM DA TELA HOME-->


        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
        </script>
        <script src="/assets/js/index.js"></script>
        <script src="/assets/js/bootstrap.blundle.min.js"></script>
        <script src="/assets/js/color-modes.js"></script>
        <script src="/assets/js/paginacao_justi.js"></script>
        <script src="/assets/js/calendarioEventos.js"></script>
        <script src="/assets/js/wow.min.js"></script>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Bootstrap JS Bundle (inclui Popper) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="/js/bootstrap.blundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"></script>


        @yield('script')

        {{-- API DO GOOGLE TRADUTOR --}}

        {{-- <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({
                    pageLanguage: 'pt',
                    includedLanguages: 'en,pt,ja',
                    layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL
                }, 'google_translate_element');
            }
        </script>
        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"> --}}

        </script>
        <script>
            new WOW().init();
        </script>



</body>

</html>
