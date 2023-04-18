<div class="card rounded-md mb-5 shadow-md overflow-hidden hover:shadow-lg" style="width: 100%;">
    <div class="img-wrap overflow-hidden" style="background-size:cover; background-repeat: no-repeat; background-position:center;  background-size: cover">
        @if(empty($logo))
        <img src="../img/placeholder/placeholder.jpeg" class="logoicon p-4"/>
    @else
        <img src="../img/{{$logo}}" class="logoicon p-4"/>
    @endif    </div>
    <div class="card-body text-center">
        <h5 class="font-bold card-title text-green-600">{{$business->business_name}}</h5>
        <h5 class="font-bold card-title text-green-600">{{$business->industry}}</h5>
    </div>                                                  
</div>