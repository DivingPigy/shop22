<div class="row">
    <div class="col-md-6">
        <ul id="thumbnails" class="col-md-4 list-unstyled">
            <li>
                <a href="javascript: void(0)">
                    @if(isset($game->cover))
                    <img class="img-responsive img-thumbnail"
                         src="{{ asset($game->cover) }}"
                         alt="{{ $game->name }}" />
                    @else
                    <img class="img-responsive img-thumbnail"
                         src="{{ asset("https://placehold.it/180x180") }}"
                         alt="{{ $game->name }}" />
                    @endif
                </a>
            </li>
            @if(isset($game->image))
                <li>
                    <a href="javascript: void(0)">
                    <img class="img-responsive img-thumbnail"
                         src="{{ asset($game->image) }}"
                         alt="{{ $game->name }}" />
                    </a>
                </li>
            @endif
        </ul>
        <figure class="text-center game-cover-wrap col-md-8">
            @if(isset($game->cover))
                <img id="main-image" class="game-cover img-responsive"
                     src="{{ asset($game->cover) }}"
                     data-zoom="{{ asset($game->cover) }}">
            @else
                <img id="main-image" class="game-cover" src="https://placehold.it/300x300"
                     data-zoom="{{ asset($game->cover) }}" alt="{{ $game->name }}">
            @endif
        </figure>
    </div>
    <div class="col-md-6">
        <div class="game-description">
            <h1>{{ $game->name }}
                <small>Price: {{ $game->price }}</small>
            </h1>
            <div class="description">{!! $game->description !!}</div>
            <div class="excerpt">
                {{-- <hr>{!!  str_limit($game->description, 100, ' ...') !!}</div> --}}
            <hr>
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.errors-and-messages')
                    <form action="" class="form-inline" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text"
                                   class="form-control"
                                   name="quantity"
                                   id="quantity"
                                   placeholder="Quantity"
                                   value="{{ old('quantity') }}" />
                            <input type="hidden" name="game" value="{{ $game->id }}" />
                        </div>
                        <button type="submit" class="btn btn-warning"><i class="fa fa-cart-plus"></i> Add to cart
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>