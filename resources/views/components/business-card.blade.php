<div class="card rounded-md mb-5 shadow-md overflow-hidden hover:shadow-lg" style="width: 100%;">
    <div class="img-wrap overflow-hidden" style="background-size:cover; background-repeat: no-repeat; background-position:center;  background-size: cover">
        <img src="../img/{{$logo}}" class="logoicon p-4" />
    </div>
    <div class="card-body text-center">
        <h5 class="font-bold card-title text-green-600">{{$name}}</h5>
        <p class="card-text text-xs">{{$name}}</p>
        <a href="/viewBusiness/{{$name}}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 w-full">View</a>
    </div>
</div>