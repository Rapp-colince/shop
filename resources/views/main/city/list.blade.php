@extends('main.layouts.app')

@section('title', 'Города')
@section('header-main', 'Список городов')

@section('content-main')

    @if(!empty($cities))

        @include('main.city.search-form')

        <table class="table mt-3">
            <thead>
            <tr>
                <th>id</th>
                <th>Название</th>
                <th>дата создания</th>
                <th>Дата обновления</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cities as $city)
                <tr>
                    <td>{{ $city['id'] }}</td>
                    <td><a href="{{ route('city.view', ['id'=>$city['id']]) }}">{{ $city['name'] }}</a></td>
                    <td> @if(!is_null($city['created_at'])) {{ (new \Carbon\Carbon($city['created_at']))->format('d.m.Y H:i:s') }} @endif</td>
                    <td> @if(!is_null($city['updated_at'])) {{ (new \Carbon\Carbon($city['updated_at']))->format('d.m.Y H:i:s') }} @endif</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection

