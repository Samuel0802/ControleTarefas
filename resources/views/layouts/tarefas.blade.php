
<li class="menu-item sub-menu">
    <a href="#">
        <span class="menu-icon">

            <i class="ri-bar-chart-2-fill"></i>
        </span>
        <span class="menu-title">Tarefas Pessoais</span>

        {{-- <span class="menu-suffix">
            <span class="badge secondary">Justificativa</span>
        </span> --}}
    </a>
    <div class="sub-menu-list">
        <ul>

            <li class="menu-item">
                <a href="{{ route('tarefa.create') }}" id="justificativaLink" class="menu-link">
                    <span class="menu-title">Criar Tarefa</span>
                </a>
            </li>


            <li class="menu-item sub-menu">
                <a href="#">
                    <span class="menu-title">Listagem de tarefas</span>
                </a>
                <div class="sub-menu-list">
                    <ul>
                        <li class="menu-item">
                            <a id="relatorioLink" class="menu-link"
                                href="{{ route('tarefa.index') }}">
                                <span class="menu-title">Minha Tarefa</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
        </ul>
    </div>
</li>
