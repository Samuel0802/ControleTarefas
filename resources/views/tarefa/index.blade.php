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

                <div class="box-search pesquisar-style row">
                    <div class="col-6"><strong>Tipo Exportação</strong></div>
                    <div class="col 6">
                        <a href="{{ route('exportacao', ['extensao' => 'xlsx']) }}" class="btn btn-success mr-3">XLSX</a>
                        <a href="{{ route('exportacao', ['extensao' => 'csv']) }}" class="btn btn-secondary">CSV</a>
                        <a href="{{ route('exportacao', ['extensao' => 'pdf']) }}" class="btn btn-danger">PDF</a>
                    </div>
                </div>

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
