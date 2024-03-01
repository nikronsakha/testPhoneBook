@extends("web.layouts.index")
@section('content')
    <main class="container mt-5">
        <div id="app">
            <h1 class="text-center mb-4">Справочник</h1>

            <div class="mb-3">
                <a href="{{ route('create') }}" class="btn btn-primary btn-sm">Добавить контакт</a>
            </div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-light">
                    <tr>
                        <th>Имя</th>
                        <th>Номер телефона</th>
                        <th>Категория</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $post)
                        <tr>
                            <td>{{ $post->name }}</td>
                            <td>{{ $post->phone }}</td>
                            <td>{{ $post->category->title }}</td>
                            <td>
                                <form action="{{ route('destroy' , $post->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="border-0 bg-transparent">
                                        <a class="btn btn-danger btn-sm">Удалить</a>
                                    </button>
                                </form>
                                <a href="{{ route('edit', $post->id) }}" class="btn btn-primary btn-sm">Редактировать</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <nav aria-label="Pagination">
                <ul class="pagination justify-content-center">
                    <li class="page-item {{ $data->previousPageUrl() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $data->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo; Предыдущая</span>
                        </a>
                    </li>
                    @foreach ($data->getUrlRange(1, $data->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $data->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach
                    <li class="page-item {{ $data->nextPageUrl() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $data->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true">Следующая &raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </main>


@endsection