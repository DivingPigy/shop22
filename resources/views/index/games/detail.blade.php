<div class="row">
    <div class="col-md-6">
        <ul id="thumbnails" class="col-md-4 list-unstyled">
            <li>
                <a href="javascript: void(0)">
                    <img class="img-responsive img-thumbnail"
                         src="{{ asset($game->cover) }}"
                         alt="{{ $game->name }}" />
                </a>
            </li>
            <li>
                <a href="javascript: void(0)">
                <img class="img-responsive img-thumbnail"
                        src="{{ asset($game->image) }}"
                        alt="{{ $game->name }}" />
                </a>
            </li>
        </ul>
        <figure class="text-center product-cover-wrap col-md-8">
            <img id="main-image" class="product-cover img-responsive"
                    src="{{ asset($game->cover) }}">
        </figure>
    </div>
    <div class="col-md-6">
        <div class="product-description">
            <h1>{{ $game->name }}
                <small>价格： {{ $game->price }}</small>
            </h1>
            <div class="description">{!! $game -> description !!}</div>
            <div class="excerpt">
                <hr>{{$game -> description}}</div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.errors-and-messages')
                    <form action="{{ route('cart.store') }}" class="form-inline" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Quantity" value="{{ old('quantity') }}" />
                            <input type="hidden" name="game_id" value="{{ $game -> id }}" />
                        </div>
                        <button type="submit" class="btn btn-warning"><i class="fa fa-cart-plus"></i> Add to cart
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
