<section id="hero" class="hero-section top-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="hero-content">
                    <h1 class="hero-title"> ST&Games <br> CHEAP</h1>
                    <p class="hero-text">Get your games on ST&Games for <strong class="text-success">CHEAP!</strong></p>
                    @guest
                        <a class="btn btn-success" href="{{ route('login') }}" role="button">Sign up <i class="fa "></i></a>
                        <a class="btn btn-success" href="{{ route('login') }}" role="button">Sign in <i class="fa "></i></a>
                    @endguest                  
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</section>