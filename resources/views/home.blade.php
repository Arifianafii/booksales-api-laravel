@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Selamat Datang di Aplikasi Perpustakaan</h1>
        <p class="lead">Selamat meminjan buku.</p>
        <hr class="my-4">
        <p>Silakan pilih menu di bawah untuk melihat data:</p>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Buku</h5>
                        <p class="card-text">Lihat daftar buku yang tersedia</p>
                        <a href="{{ route('books.index') }}" class="btn btn-primary">Lihat Buku</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Genre</h5>
                        <p class="card-text">Lihat daftar genre buku yang tersedia</p>
                        <a href="{{ route('genres.index') }}" class="btn btn-primary">Lihat Genre</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Authors</h5>
                        <p class="card-text">Lihat daftar author buku yang tersedia</p>
                        <a href="{{ route('authors.index') }}" class="btn btn-primary">Lihat Author</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection