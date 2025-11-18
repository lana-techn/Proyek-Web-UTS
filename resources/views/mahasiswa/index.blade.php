@extends('app')

@section('title', 'Daftar Mahasiswa')

@section('content')
<!-- Redirect to card view -->
@php
    header("Location: " . route('mahasiswa.index.card'), true, 301);
    exit();
@endphp
@endsection
