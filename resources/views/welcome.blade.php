@extends('layouts.app')

@section('body')
    <div class="min-h-screen flex items-center justify-center">
        <h1 class="text-5xl text-purple font-sans">Formation Laravel.</h1>
    <a href="{{ route('blog',str_slug('How to work with laravel','_')) }}">link</a>
    </div>
@endsection
