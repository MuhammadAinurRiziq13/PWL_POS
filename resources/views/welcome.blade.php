@extends('layouts.template')

@section('content')
    <div class="card">
      <div class="card-header">
        <div class="card-title">Halo, Apa kabar!!</div>
        <div class="card-tools"></div>
      </div>
      <div class="card-body">
        Selamat Datang Semua, Ini adalah halaman utama dari aplikasi ini
      </div>
    </div>
@endsection


























{{-- @extends('layouts.app')

customize layout section
@section('subtitle','Welcome')
@section('content_header_title','Home')
@section('content_header_subtitle','Welcome')

content body main page content
@section('content_body')
    <p>Welcome to this beautiful admin panel.</p>
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Tambah Level</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form>
          <div class="row">
            <div class="col-sm-12">
              <!-- text input -->
              <div class="form-group">
                <label>Level Kode</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Enter ..."
                />
              </div>
              <div class="form-group">
                <label>Level Nama</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Enter ..."
                />
              </div>
              {{-- <div class="form-group">
                <label>Password</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Enter ..."
                />
              </div>
              <div class="form-group">
                <label>Level</label>
                <select class="form-control">
                  <option>Administrator</option>
                  <option>Manager</option>
                  <option>Staff/Kasir</option>
                  <option>Customer</option>
                </select>
              </div> --}}
            {{-- </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-warning">Submit</button>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
@endsection

push extra css
@push('css')
    add here stylesheet
    link
@endpush

push extra script
@push('js')
    <script> console.log("Hi, i using admin lte package!"); </script>
@endpush  --}}

