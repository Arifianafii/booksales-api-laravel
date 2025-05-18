@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Buku</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Buku</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($books as $book)
                            <tr>
                                <td>{{ $book['id'] }}</td>
                                <td>{{ $book['title'] }}</td>
                                <td>{{ $book['description'] }}</td>
                                <td>{{ $book['price'] }}</td>
                                <td>{{ $book['stock'] }}</td>
                                <td>
                                    <a href="{{ route('books.show', $book['id']) }}" class="btn btn-sm btn-info">Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection