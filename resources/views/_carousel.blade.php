<div class="jumbotron bg-gray-400 bg-gradient position-relative">
    <div class="owl-carousel owl-theme" id="headercara">
        @foreach( $industry as $indust)
        <x-carousel-item pic="../img/banner1.jpg" topTitle="Industries You Can Find" mainTitle="{{ $indust->industry }}"/>
        @endforeach
    </div>
</div>