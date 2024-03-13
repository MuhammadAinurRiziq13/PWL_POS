@extends('layouts.app')

{{-- customize layout section --}}
@section('subtitle','Welcome')
@section('content_header_title','Home')
@section('content_header_subtitle','Welcome')

{{-- content body main page content --}}
@section('content_body')
    <p>Welcome to this beautiful admin panel.</p>
@endsection

{{-- push extra css --}}
@push('css')
    {{-- add here stylesheet --}}
    {{-- link --}}
@endpush

{{-- push extra script --}}
@push('js')
    <script> console.log("Hi, i using admin lte package!"); </script>
@endpush