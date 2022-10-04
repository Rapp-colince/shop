@extends('main.layouts.app')

@section('title', 'Магазины')
@section('header-main', 'Список магазинов')

@section('content-main')
    @if(!empty($shops))

        <table class="table mt-3">
            <thead>
            <tr>
                <th>id</th>
                <th>Название</th>
                <th>Город</th>
                <th>дата создания</th>
                <th>Дата обновления</th>
            </tr>
            </thead>
            <tbody>
            @foreach($shops as $shop)
                <tr>
                    <td>{{ $shop['id'] }}</td>
                    <td><a href="{{ route('shop.view', ['id'=>$shop['id']]) }}">{{ $shop['name'] }}</a></td>
                    <td><a href="{{ route('city.view', ['id'=>$shop['cityInfo']['id']]) }}">{{ $shop['cityInfo']['name'] }}</a></td>
                    <td> @if(!is_null($shop['created_at'])) {{ (new \Carbon\Carbon($shop['created_at']))->format('d.m.Y H:i:s') }} @endif</td>
                    <td> @if(!is_null($shop['updated_at'])) {{ (new \Carbon\Carbon($shop['updated_at']))->format('d.m.Y H:i:s') }} @endif</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection

