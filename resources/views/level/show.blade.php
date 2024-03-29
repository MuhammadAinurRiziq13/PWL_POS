@extends('layouts.app')

{{-- Customize layout sections --}}
@section('subtitle', 'Kategori')      
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Show')

{{-- Content body: main page content --}}

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Show User</h5>
                <a class="btn btn-secondary btn-sm" href="{{ route('m_user.index') }}">Kembali</a>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>User ID:</strong>
                        {{ $useri->user_id }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Level ID:</strong>
                        {{ $useri->level_id }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Username:</strong>
                        {{ $useri->username }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Nama:</strong>
                        {{ $useri->nama }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Password:</strong>
                        {{ $useri->password }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection