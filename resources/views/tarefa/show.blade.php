@extends('layouts.layout')

@section('conteudo')
    <main class="content col-one">

        <div class="container-sm  ">

            <div align="center">
                <br><br>
                <h1 class="title margin-bottom: 10px; wow fadeInDown">Tarefa Solicitada</h1>
                <hr class="barra-title" style="width: 60%; background-color: white;">
                <br>


                <form class="row g-3  border-light mt-4 ">

                    <div class="row g-3 t ">

                    <div class="mb-3">
                        <h3 class="title margin-bottom: 10px; wow fadeInDown title-sub">{{ $tarefa->tarefa }}</h3>

                        </div>

                        <fieldset disabled>
                        <div class="col-sm col-md-12">
                            <label for="inputEmail4" class="form-label title-sub"><b>Data limite conclusão</b></label>
                            <input type="date" name="data_limite_conclusao" value="{{ $tarefa->data_limite_conclusao }}" id="date" class="form-control"
                            aria-label="Last name" required>
                        </div>
                        </fieldset>


                        <div class="col-md-12 " align="right" style="right: 50px;">
                        {{-- Retroceder rota --}}
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar</a>

                        </div>
                    </div>
                </form>

            </div>

        </div>

    </main>
@endsection

@section('script')
    <script>

    </script>
@endsection
