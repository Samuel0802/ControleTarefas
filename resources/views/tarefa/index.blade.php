@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    {{-- Recuperando nova da tarefa --}}
                    <div class="card-header">Minhas Tarefas</div>

                    <div class="card-body">


                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tarefas</th>
                                    <th scope="col">Data limite conclusão</th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($tarefas as $tarefa)
                                <tr>
                                    <th scope="row">{{ $tarefa->id }}</th>
                                    <td>{{ $tarefa->tarefa }}</td>
                                    <td>{{ date('d/m/Y', strtotime($tarefa['data_limite_conclusao'])) }}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- paginação --}}
                        <nav aria-label="Page navigation example " >
                            <ul class="pagination" >
                              <li class="page-item" ><a class="page-link" href="{{ $tarefas->previousPageUrl() }}">Voltar</a></li>

                              {{--lastPage(): Retorna a ultima pagina entre relação de pagina com quantidade de registro exibido --}}
                              @for($i = 1; $i <= $tarefas->lastPage(); $i++)
                              {{-- currentPage: indica qual pagina que está sendo exibida no momento --}}
                              <li class="page-item {{ $tarefas->currentPage() == $i ? 'active' : '' }} ">
                                {{-- url: vai montar url cadaa uma das paginas que forem construida --}}
                                <a class="page-link" href="{{ $tarefas->url($i) }}">{{ $i }}</a>
                            </li>
                             @endfor


                              <li class="page-item"><a class="page-link" href="{{ $tarefas->nextPageUrl() }}">Avançar</a></li>
                            </ul>
                          </nav>
                                   {{-- paginação --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
