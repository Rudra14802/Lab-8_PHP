@extends('layout.app')

@section('content')
    <h2>Welcome to Laravel Blade Lab</h2>
    <p>This is the home page using a blade template</p>
    @if(isset($products) && count($products) > 0)
        <p>Available products are losted below</p>
    <h3>Product List</h3>
    <ul>
        @forelse($products as $product)
            <li>{{ $product['name'] }} - {{ $product['price'] }}</li>
        
        @empty
        
    <x-alert type="danger" message="No Products Found."/>
       
        @endforelse
    </ul>
    @else 
    
    <x-alert type="danger" message="No Products Available."/>

    @endif
@endsection