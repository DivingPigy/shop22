@extends('layout.front.app')

@section('og')
    <meta property="og:type" content="home"/>
    <meta property="og:title" content="{{ config('app.name') }}"/>
    <meta property="og:description" content="{{ config('app.name') }}"/>
@endsection

@section('content')
    @include('layouts.front.home-slider')
    
    @foreach ($plateforms as $plateform)
            <section class="new-product t100 home">
                <div class="container">
                    <div class="section-title b50">
                        <h2>{{ $plateform -> name }}</h2>
                    </div>
                    @include('index.games.list', ['games' => $plateform -> games -> slice(0 , 4)])
                    <div id="browse-all-btn"> <a class="btn btn-default browse-all-btn" href="{{ route('game' , [$plateform -> name]) }}" role="button">browse all items</a></div>
                </div>
            </section>
            <hr>
    @endforeach
    {{-- @include('mailchimp::mailchimp') --}}
@endsection