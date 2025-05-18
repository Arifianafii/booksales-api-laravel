@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Buku</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Informasi Buku</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <td>{{ $book['id'] }}</td>
                        </tr>
                        <tr>
                            <th>Title</th>
                            <td>{{ $book['title'] }}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{ $book['description'] }}</td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>{{ $book['price'] }}</td>
                        </tr>
                        <tr>
                            <th>Stock</th>
                            <td>{{ $book['stock'] }}</td>
                        </tr>
                    </table>
                    <a href="{{ route('books.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection