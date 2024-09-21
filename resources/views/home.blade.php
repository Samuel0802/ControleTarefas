@extends('layouts.layout')

@section('conteudo')

    <main class="content">
        <div class="container ">
            <br><br><br>
            <div class="wrapper">
                <header class="container text-start">
                    <div id="msg"></div>
                    <h2>Bem-vindo(a), {{ Auth()->user()->name }}</h2>
                    <h1></h1>

                </header>
            </div>
            <br>

            <script>
                function carregar() {
                    var msg = document.getElementById('msg');
                    var img = document.getElementById('foto-manha');
                    var data = new Date()
                    var seg = new Date()
                    var hora = data.getHours() //ACABA PEGANDO HORARIO ATUAL DA MAQUINA DO USUARIO
                    // var hora = 20;

                    msg.innerHTML = ` <h1>${img}</h1>`;


                    if (hora >= 0 && hora < 12) {
                        //bom dia

                        // img.src = 'https://i.pinimg.com/736x/8e/81/e7/8e81e795b09eebe6d76313105fa0d32d.jpg'
                        // document.body.style.background = '#e2cd9f'
                        msg.innerHTML = '<h1>Bom Dia!</h1>';
                        msg.style.fontSize = '24px';
                    } else if (hora >= 12 && hora <= 18) {
                        //boa tarde
                        // img.src = 'https://i.pinimg.com/736x/8e/81/e7/8e81e795b09eebe6d76313105fa0d32d.jpg'
                        // document.body.style.background = '#b9846f'
                        msg.innerHTML = '<h1>Boa Tarde!</h1>';
                        msg.style.fontSize = '24px';
                    } else {
                        //boa noite
                        // img.src = 'https://i.pinimg.com/736x/8e/81/e7/8e81e795b09eebe6d76313105fa0d32d.jpg'
                        // document.body.style.background = '#515154'
                        msg.innerHTML = '<h1>Boa Noite!</h1>';
                        msg.style.fontSize = '24px';
                    }

                }
            </script>



            <div class="col-12 col-one text-center mb-5">
                <h1 class="title">
                    <b>Informativos</b>
                </h1>
            </div>


          {{-- ASSUNTO DA TELA HOME --}}



        </div>
    </main>
@endsection
