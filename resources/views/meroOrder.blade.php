@extends('main')
@section("content")
<div class="custom-product">
    <div class="col-sm-10">
      <div class="trending-wrapper">
        <h2>My Order details</h2>
    
        @foreach ($orders as $item)
        <div class="row searched-item cart-list-divider">
            <div class="col-sm-3">
                <a href="detail/{{ $item->id }}">
                    <img class="trending-image" src="{{ $item->gallery }}">   
                </a>
            </div>
            <div class="col-sm-4">
                    <div class="">
                        <h3>Name: {{ $item->name }}</h3>
                        <h6>Delivery Status: {{ $item->status }}</h6>
                        <h6>Address: {{ $item->address }}</h6>
                        <h6>Payment Status: {{ $item->payment_status }}</h6>
                        <h6>Payment Method: {{ $item->payment_method }}</h6>
                    </div>
            </div>    
        </div>        
        @endforeach
      </div>
    </div>
</div>
@endsection
