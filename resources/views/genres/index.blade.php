@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Genre</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Genre</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($genres as $genre)
                            <tr>
                                <td>{{ $genre['id'] }}</td>
                                <td>{{ $genre['name'] }}</td>
                                <td>{{ $genre['description'] }}</td>
                                <td>
                                    <a href="{{ route('genres.show', $genre['id']) }}" class="btn btn-sm btn-info">Detail</a>
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