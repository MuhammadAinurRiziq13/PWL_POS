@extends('layouts.app')

{{-- Customize layout sections --}}
@section('subtitle', 'Kategori')      
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Create')

{{-- Content body: main page content --}}

@section('content')
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ops</strong> Input gagal<br><br>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
        @endif
        <div class="card card-primary">
            <div class="card-header">
                <div class="float-left py-1">
                    <h5>Membuat Daftar User</h5>
                </div>
                <div class="float-right">
                    <a class="btn btn-secondary" href="{{ route('m_user.index') }}">Kembali</a>
                </div>
            </div>

            <form method="post" action="{{ route('m_user.store') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <strong>Username:</strong>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" 
                        id="username" name="username" placeholder="Masukkan username">
                        @error('username')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>                    
                    <div class="form-group">
                        <strong>Nama:</strong>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                        id="nama" name="nama" placeholder="Masukkan nama">
                        @error('nama')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <strong>Level</strong>
                        <select name="level_id" class="form-select">
                            <option value="">Masukkan level</option>
                            @foreach($levels as $level)
                                <option value="{{ $level->level_id }}">{{ $level->level_nama }}</option>
                            @endforeach
                        </select>                        
                    </div>
                    <div class="form-group">
                        <strong>Password:</strong>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" 
                        id="password" name="password" placeholder="Masukkan password">
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>

    </div>
@endsection


{{-- @extends('m_user/template')
@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Membuat Daftar User</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{ route('m_user.index') }}">Kembali</a>
        </div>
    </div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Ops</strong> Input gagal<br><br>
    <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
</div>
@endif

<form action="{{ route('m_user.store') }}" method="POST">
    @csrf
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Username:</strong>
            <input type="text" name="username" class="form-control" placeholder="Masukkan username">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nama:</strong>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Password:</strong>
            <input type="password" name="password" class="form-control" placeholder="Masukkan password">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection --}}
