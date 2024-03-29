@extends('layouts.app')

{{-- custom section --}}
@section('subtitle','kategori')
@section('content_header_title','Home')
@section('content_header_subtitle','User')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
              {{-- <h3 class="card-title">Data User</h3> --}}
                <div class="float-left">
                    <h4>Data User</h4>
                </div>
                <div class="float-right">
                    <a class="btn btn-success" href="{{ route('level.create') }}"> Input Level</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Level Id</th>
                            <th class="text-center">Level Kode</th>
                            <th class="text-center">Level Nama</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $level)
                        <tr>
                            <td>{{ $level->level_id }}</td>
                            <td>{{ $level->level_kode }}</td>
                            <td>{{ $level->level_nama }}</td>
                            <td class="text-center">
                                <form action="{{ route('level.destroy',$level->level_id) }}" method="POST">
                                    <a class="btn btn-info btn-sm" href="{{ route('m_user.show',$level->level_id) }}">Show</a>
                                    <a class="btn btn-primary btn-sm my-2" href="{{ route('m_user.edit',$level->level_id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                </form>
                            </td>        
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
    </div>
@endsection