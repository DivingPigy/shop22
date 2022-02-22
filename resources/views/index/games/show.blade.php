@extends('layout.front.app')

@section('og')
    <meta property="og:type" content="product"/>
    <meta property="og:title" content="{{ $game->name }}"/>
@endsection

@section('content')
    <div class="container product">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
                    {{-- @if(isset($category))
                    <li><a href="{{ route('front.category.slug', $category->slug) }}">{{ $category->name }}</a></li>
                    @endif --}}
                    <li class="active">Game</li>
                </ol>
            </div>
        </div>
        @include('index.games.detail')
    </div>
@endsection