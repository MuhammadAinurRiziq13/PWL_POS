@extends('layouts.app')

{{-- Customize layout sections --}}
@section('subtitle', 'Kategori')      
@section('content_header_title', 'User')
@section('content_header_subtitle', 'Edit')

{{-- Content body: main page content --}}

@section('content')
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ops!</strong> Error <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card card-primary">
            <div class="card-header">
                <div class="float-left">
                    <h5 class="my-1">Edit User</h5>
                </div>
                <div class="float-right">
                    <a class="btn btn-secondary" href="{{ route('m_user.index') }}">Kembali</a>
                </div>
            </div>

            <form method="post" action="{{ route('m_user.update', $useri->user_id) }}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <strong>Username:</strong>
                        <input type="text" name="userid" value="{{ $useri->user_id }}" class="form-control" placeholder="Masukkan user id">
                    </div>                    
                    <div class="form-group">
                        <strong>Nama:</strong>
                        <input type="text" name="levelid" value="{{ $useri->level_id }}" class="form-control" placeholder="Masukkan level">
                    </div>
                    <div class="form-group">
                        <strong>Password:</strong>
                        <input type="password" value="{{ $useri->password }}" name="password" class="form-control" placeholder="Masukkan password">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>

    </div>
@endsection