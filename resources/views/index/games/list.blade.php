@if(!empty($games))
    <ul class="row text-center list-unstyled">
        @foreach($games as $game)
            <li class="col-md-3 col-sm-6 col-xs-12 product-list">
                <div class="single-product">
                    <div class="product">
                        <div class="product-overlay">
                            <div class="vcenter">
                                <div class="centrize">
                                    <ul class="list-unstyled list-group">
                                        <li>
                                            <form action="{{ route('cart.store') }}" class="form-inline" method="post">
                                                {{ csrf_field() }}
                                                @method('post')
                                                <input type="hidden" name="quantity" value="1" />
                                                <input type="hidden" name="game_id" value="{{ $game->id }}">
                                                <button id="add-to-cart-btn" type="submit" class="btn btn-warning"> <i class="fa fa-cart-plus"></i> Add to cart</button>
                                            </form>
                                        </li>
                                        <li>  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal_{{ $game->id }}"> <i class="fa fa-eye"></i> Quick View</button>
                                        <li>  <a class="btn btn-default product-btn" href="{{ route('show' , [$game -> id]) }}"> <i class="fa fa-link"></i> Go to product</a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                            <img src="{{ asset($game->cover) }}" alt="{{ $game->name }}" class="img-bordered img-responsive">
                    </div>

                    <div class="product-text">
                        <h4>{{ $game->name }}</h4>
                        <p>
                            美元
                            <br>
                            {{ $game->description }}
                        </p>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal_{{ $game->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                @include('index.games.window')
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
@else
    <p class="alert alert-warning">No games yet.</p>
@endif