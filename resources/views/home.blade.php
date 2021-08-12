@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>


          

                @foreach($locations as $c)

                <div class="card-body border">
                    <h1>Customer Id:{{$c->id}}</h1>
                    <h1>Full Name:{{$c->full_name}}</h1>
                    <h1>Mobile No:{{$c->mobile_no}}</h1>
                    <h1>Country Name:{{$c->country_name}}</h1>
                    <h1>City Name:{{$c->city_name}}</h1>
                    <h1>Latitude:{{$c->latitude}}</h1>
                    <h1>Longitude:{{$c->longitude}}</h1>
                    
               

            </div>
             @endforeach
        </div>
    </div>
</div>
@endsection
