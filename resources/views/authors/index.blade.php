@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Author</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Penulis</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Title</th>
                                <th>Genre</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($authors as $author)
                            <tr>
                                <td>{{ $author['id'] }}</td>
                                <td>{{ $author['name'] }}</td>
                                <td>{{ $author['title'] }}</td>
                                <td>{{ $author['genres'] }}</td>
                                <td>
                                    <a href="{{ route('authors.show', $author['id']) }}" class="btn btn-sm btn-info">Detail</a>
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