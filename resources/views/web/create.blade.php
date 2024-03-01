@extends("web.layouts.index")
@section('content')
    <main class="container mt-5">
        <div>
            <h2>Добавить</h2>
            <form action="{{ route('store') }}" method="post">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="name">ФИО:</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="form-group">
                    <label for="phone">Номер:</label>
                    <input type="text" class="form-control" name="phone" id="phone">
                </div>
                <div class="form-group">
                    <label for="category">Категория:</label>
                    <input type="text" class="form-control" name="category_id" id="category">
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </main>
@endsection