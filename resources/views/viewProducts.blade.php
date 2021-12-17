@extends('layout')
@section('content')

<style>
.card img {
   max-width: 50%;
   max-height: 50%;
   min-height: 170px;
   margin-left: auto;
   margin-right: auto;
   margin-top: 30px;
   margin-bottom: 10px;
}

.container{
    margin-top: 50px;
}

.btn{
    margin: 10px;
}

.card-title{
    font-size: 18px;
    padding-bottom: 10px;
}

.card {
  /* Add shadows to create the "card" effect */
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
}

/* On mouse-over, add a deeper shadow */
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.price{
    color: grey;
}

.available{
    color:#00cc66;
}

.title{
    text-align: center;
    padding:30px;
    font-size: 45px;
    margin-top: 30px;
}

</style>

<div class="title">
    <h1>All Products</h1>
</div>

<div class="container features">
    <div class="row">
        @foreach($products as $product)
        <div class="col-lg-3 col-md-3 col-sm-12 text-center">
            <div class = "card h-100">
                <img src="{{asset('images/')}}/{{$product->image}}" class="card-img-top" alt="Product"> 
                <div class="card-body">
                    <h6 class="card-title">{{$product->name}}</h6>
                    <p class="card-text price">RM{{$product->price}}</p>
                    <p class="card-text">{{$product->description}}</p>
                    <h6 class="available">Available: {{$product->quantity}}<h6>
                    <button class="btn btn-outline-info waves-effect" type="submit">Add to Cart <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg></button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection