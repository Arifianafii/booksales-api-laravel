@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Penulis</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Informasi Penulis</div>
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
                            <th>Email</th>
                            <td>{{ $author['email'] }}</td>
                        </tr>
                        <tr>
                            <th>Biografi</th>
                            <td>{{ $author['bio'] }}</td>
                        </tr>
                    </table>
                    <a href="{{ route('authors.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection