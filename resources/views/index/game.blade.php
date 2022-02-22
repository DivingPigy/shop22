@extends('layout.front.app')

@section('og')
    <meta property="og:type" content="plateform"/>
    <meta property="og:title" content="{{ $plateform -> name }}"/>
    <meta property="og:description" content="{{ $plateform -> name }}"/>
@endsection

@section('content')
    <div class="container">
        <hr>
        <div class="row">
            <div class="plateform-top col-md-12">
                <h2>{{ $plateform -> name }}</h2>
            </div>
        </div>
        <hr>
        <div class="col-md-3">
            <ul class="nav sidebar-menu">
                @foreach($Plateforms as $item)        
                    <li><a href="{{ route('game', $item -> name) }}">{{ $item -> name }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-9">
            <hr>
            <div class="row">     
                @include('index.games.index', ['games' => $plateform -> games])       
            </div>
        </div>
    </div>
@endsection
