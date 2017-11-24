@section('admin_menu')
<li><a href="{{ route('adminbookings') }}">Reservas</a></li>
                            <li><a href="{{ route('register') }}">Empréstimos</a></li>
                            <li><a href="{{ route('book') }}">Livros</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Elementos</a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('author') }}">Autor</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('publisher') }}">Editora</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('subject') }}">Disciplina</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('knowledge_area') }}">Área de Conhecimento</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('location') }}">Localização</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('asset/create') }}">Componentes</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Utilizadores</a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('signup_su') }}">Criar</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user') }}">Editar</a>
                                    </li>
                                </ul>
                            </li>
@endsection