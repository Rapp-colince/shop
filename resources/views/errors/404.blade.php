@extends('.main.layouts.app')

@section('title', $exception->getMessage() ?: 'Страница не найдена')

@section('content-main')
    <h2>{{ $exception->getStatusCode() }}</h2>
    <p>{{ $exception->getMessage() ?: 'Страница не найдена' }}</p>
@endsection


