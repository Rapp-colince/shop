@extends('layouts.main')

@section('title-block')Страница городов@endsection

@section('content')
    <h1>Страница городов</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('contact-form-submit') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Введите имя</label>
            <input id="name" class="form-control" type="text" name="name" value="" placeholder="Введите имя" />
        </div>

        <div class="form-group">
            <label for="email">Введите email</label>
            <input id="email" class="form-control" type="text" name="email" value="" placeholder="Введите email" />
        </div>

        <div class="form-group">
            <label for="subject">Тема</label>
            <input id="subject" class="form-control" type="text" name="subject" value="" placeholder="Введите тему" />
        </div>

        <div class="form-group">
            <label for="message">Сообщение</label>
            <textarea id="message" class="form-control" name="message" value="" placeholder="Текст сообщения"></textarea>
        </div>


        <button type="submit" class="btn btn-success">Отправить</button>
    </form>




@endsection
