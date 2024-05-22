@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('/file-upload') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama File Gambar</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
                    @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar Profile</label>
                    <input type="file" class="form-control" id="gambar" name="gambar">
                    @error('gambar')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                @if ($errors->has('upload_error'))
                    <div class="text-danger">{{ $errors->first('upload_error') }}</div>
                @endif
                <button type="submit" class="btn btn-primary btn-block">Upload</button>
            </form>
        </div>
    </div>
@endsection
