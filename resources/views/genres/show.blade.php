@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Genre</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Informasi Genre</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <td>{{ $genre['id'] }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>{{ $genre['name'] }}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>{{ $genre['description'] }}</td>
                        </tr>
                    </table>
                    <a href="{{ route('genres.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection