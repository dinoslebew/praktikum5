@extends('layouts.app')

@section('title','home')
@section('page_title','selamat datang di berita batam')

@section('content')
    <h1 class="text-2xl font-bold mb-4">selamat pagi</h1>
    <p class="mb-4">Berikut adalah berita update di hari ini</p>

@include('components.card', [
    'imgsrc' => 'images/wisuda1.jpg',
    'title' => 'gonggong lemak nian',
    'desc' => 'baju wisuda dengan model terbaru bisa jadi pilihan terbaik.'
    ])
@endsection