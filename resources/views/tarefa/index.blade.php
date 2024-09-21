@extends('layouts.layout')

@section('conteudo')
    <main class="content">
        <div class="container">
            <div align="center">
                <br>

                <br> <br>

                <h1 class="title margin-bottom: 10px; animated fadeInDown">Lista de tarefas</h1>
                <hr class="barra-title" style="width: 60%; background-color: black;">
                <br>
                <form>
                    <div class="box-search pesquisar-style">

                        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar" name="search">
                        <button type="submit" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </button>

                    </div>
                </form>
                <br><br>
                <div class="tabela-list">


                    <table class="table tabela-list" align="center">
                        <thead align="center">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tarefas</th>
                                <th scope="col">Data limite conclusão</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody align="center">
                            @foreach ($tarefas as $tarefa)
                                <tr>
                                    <th scope="row">{{ $tarefa->id }}</th>
                                    <td>{{ $tarefa->tarefa }}</td>
                                    <td>{{ date('d/m/Y', strtotime($tarefa['data_limite_conclusao'])) }}</td>
                                    <td><a class="btn btn-warning"
                                            href="{{ route('tarefa.edit', $tarefa['id']) }}">Editar</a></td>

                                    <form id="form_{{ $tarefa['id'] }}" method="POST"
                                        action="{{ route('tarefa.destroy', ['tarefa' => $tarefa['id']]) }}">
                                        @method('DELETE')
                                        @csrf

                                        <td><a class="btn btn-danger" href="#"
                                                onclick="document.getElementById('form_{{ $tarefa['id'] }}').submit()">Excluir</a>
                                        </td>
                                    </form>

                                </tr>
                            @endforeach



                        </tbody>
                    </table>

                    {{-- paginação --}}
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="{{ $tarefas->previousPageUrl() }}">Voltar</a>
                            </li>

                            {{-- lastPage(): Retorna a última página de acordo com o total de registros exibidos --}}
                            @for ($i = 1; $i <= $tarefas->lastPage(); $i++)
                                {{-- currentPage: Indica a página que está sendo exibida no momento --}}
                                <li class="page-item {{ $tarefas->currentPage() == $i ? 'active' : '' }}">
                                    {{-- url: Monta a URL para cada página --}}
                                    <a class="page-link" href="{{ $tarefas->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            <li class="page-item">
                                <a class="page-link" href="{{ $tarefas->nextPageUrl() }}">Avançar</a>
                            </li>
                        </ul>
                    </nav>
                    {{-- paginação --}}


                </div>
            </div>
        </div>
    </main>
@endsection


@section('script')
    <script>
        var url_atual = window.location.href;
        let teste = url_atual.split('?')
        console.log(teste[1]);

        search = "&login={{ $_GET['search'] ?? '' }}";
        link = $('a.page-link');
        for (i = 0; i < $('a.page-link ').length; i++) {
            // console.log(link[i]);
            elemento = link[i];
            novo = elemento.href + search
            elemento.href = novo;
        }
    </script>
@endsection
