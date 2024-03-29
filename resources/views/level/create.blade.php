@extends('layouts.app')

{{-- Customize layout sections --}}
@section('subtitle', 'Level')      
@section('content_header_title', 'Level')
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
                    <h5>Membuat Daftar Level</h5>
                </div>
                <div class="float-right">
                    <a class="btn btn-secondary" href="{{ route('level.index') }}">Kembali</a>
                </div>
            </div>

            <form method="post" action="{{ route('level.store') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <strong>Level Kode:</strong>
                        <input type="text" class="form-control @error('level_kode') is-invalid @enderror" 
                        id="level_kode" name="level_kode" placeholder="Masukkan level kode">
                        @error('level_kode')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>                    
                    <div class="form-group">
                        <strong>Level Nama:</strong>
                        <input type="text" class="form-control @error('level_nama') is-invalid @enderror" 
                        id="level_nama" name="level_nama" placeholder="Masukkan level nama">
                        @error('level_nama')
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
