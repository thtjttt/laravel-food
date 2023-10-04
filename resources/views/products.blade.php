@extends('shop')
    
@section('content')
     
<div class="row">
    @foreach($foods as $food)
        <div class="col-md-3 col-6 mb-4">
            <div class="card">
                <img src="{{ asset('images') }}/{{ $food->image }}" class="card-img-top"/>
                <div class="card-body">
                    <h4 class="card-title">{{ $food->name }}</h4>
                    <p class="card-text"><strong>Price: </strong> ${{ $food->price }}</p>
                    <p class="btn-holder"><a href="{{ route('addfood.to.cart', $food->id) }}" class="btn btn-outline-danger">Add to cart</a> </p>
                </div>
            </div>
        </div>
    @endforeach
</div>
     
@endsection