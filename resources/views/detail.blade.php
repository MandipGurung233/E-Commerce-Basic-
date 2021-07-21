@extends('main')
@section("content")
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <img class="detail-img" src="{{ $producted['gallery'] }}" alt="">
        </div>
        <div class="col-sm-6">
            
            <h3>Name: {{ $producted['price'] }}</h3>
            <h3>Price: {{ $producted['price'] }}</h3>
            <h3>Details: {{ $producted['description'] }}</h3>
            <h3>Category: {{ $producted['category'] }}</h3>
            <br><br>
            <form action="/add_to_cart" method="POST">
                @csrf
                <input type="hidden" name="product_id" value={{ $producted['id'] }}>
                <button class="btn btn-primary">Add to Cart</button>
            </form>
            <br><br>
            <a class="btn btn-primary" href="/">Back</a>
            <br><br>
        
        </div>
    </div>
</div>
    
        
  
@endsection