@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Author</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Informasi Author</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <td>{{ $author['id'] }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>{{ $author['name'] }}</td>
                        </tr>
                        <tr>
                            <th>Title</th>
                            <td>{{ $author['title'] }}</td>
                        </tr>
                        <tr>
                            <th>Genre</th>
                            <td>{{ $author['genres'] }}</td>
                        </tr>
                    </table>
                    <a href="{{ route('authors.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection