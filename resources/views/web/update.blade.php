@extends("web.layouts.index")
@section('content')
    <main class="container mt-5">
        <div>
            <h2>Редактировать</h2>
            <form action="{{ route('update' , $post->id)  }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name">ФИО:</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="phone">Номер:</label>
                    <input type="text" class="form-control" name="phone" id="phone">
                </div>
                @error('phone')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="category">Категория:</label>
                    <input type="text" class="form-control" name="category_id" id="category">
                </div>
                @error('category_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary">Редактировать</button>
            </form>
        </div>
    </main>
@endsection