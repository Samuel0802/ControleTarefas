@extends('layouts.layout')

@section('conteudo')
    <main class="content col-one">

        <div class="container-sm  ">

            <div align="center">
                <br><br>
                <h1 class="title margin-bottom: 10px; wow fadeInDown">Atualizar Tarefa</h1>
                <hr class="barra-title" style="width: 60%; background-color: white;">
                <br>


                <form class="row g-3  border-light mt-4 " method="POST" action="{{ route('tarefa.update', ['tarefa' => $tarefa->id]) }}">

                    @csrf
                    @method('PUT')

                    <div class="row g-3 t ">

                    <div class="mb-3">
                        <label for="inputEmail4" class="form-label title-sub"><b>Tarefa</b></label>
                          <input type="text" class="form-control"  aria-describedby="emailHelp" name="tarefa" value="{{$tarefa->tarefa }}">

                          <div class="text-danger">
                            {{ $errors->has('tarefa') ? $errors->first('tarefa') : '' }}
                        </div>
                        </div>


                        <div class="col-sm col-md-12">
                            <label for="inputEmail4" class="form-label title-sub"><b>Data limite conclusão</b></label>
                            <input type="date" name="data_limite_conclusao" value="{{ $tarefa->data_limite_conclusao }}" id="date" class="form-control"
                            aria-label="Last name" required>

                            <div class="text-danger">
                            {{ $errors->has('data_limite_conclusao') ? $errors->first('data_limite_conclusao') : '' }}
                        </div>

                        </div>


                        <div class="col-md-12 " align="right" style="right: 50px;">
                            <button type="submit" class="btn btn-primary">Atualizar</button>
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
