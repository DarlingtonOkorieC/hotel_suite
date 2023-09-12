@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('app/assets/css/sty.css')}}">
@section('content')
    

<section class="pricing py-5">
    <div class="container">
       <div class="alert alert-primary">
      No Initial Credit Required   
      </div>     

      <div class="row text-center">
        <!-- Free Tier -->
        @foreach ($pricings as $price)
        <!-- Pro Tier -->
        <div class="col">
          <div class="card" style="width: 25rem">
            <div class="card-body">
              <h5 class="card-title text-secondary text-uppercase text-center">{{ $price->name }}</h5>
              <h6 class="card-price text-secondary text-center">N{{ $price->amount*12 }}<span class="period">/year</span></h6>
              <hr>
              <ul class="fa-ul">
                <li class="text-dark"><span class="fa-li"><i class="fas fa-check"></i></span><strong>Unlimited Number of Bookings</strong></li>
                <li class="text-dark"><span class="fa-li"><i class="fas fa-check"></i></span>{{ $price->rooms }} Rooms</li>
                <li class="text-dark"><span class="fa-li"><i class="fas fa-check"></i></span>{{ $price->support }} Support</li>
                <li class="text-dark"><span class="fa-li"><i class="fas fa-check"></i></span>{{ $price->gallery_up }} Gallery Uploads</li>
                <li class="text-dark"><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Messages sent to users</li>
                <li class="text-dark"><span class="fa-li"><i class="fas fa-check"></i></span>Dedicated Phone Support</li>
                <li class="text-dark"><span class="fa-li"><i class="fas fa-check"></i></span>Monthly Status Reports</li>
              </ul>
              <div class="text-center">
                  <form action="{{ route('prisave', ['id' => Auth::user()->manager->hotel->id]) }}" method="post">
                    {{ csrf_field() }}
                   <input type="text" name="pricing_id" hidden value="{{ $price->id }}">
                   <button type="submit" class="btn btn-block btn-primary text-uppercase">Select</button>   
                  </form>
                  
              </div>
              
            </div>
            <div class="card-footer">
              <small class="text-dark">Please note that the limit of receiving bookings is determined by the pricing you choose, not the number of rooms</small>
            </div>
          </div>
        </div>
    
        @endforeach  
    </div>
    </div>
  </section>

  @endsection