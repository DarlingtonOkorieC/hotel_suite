@extends('layouts.yield')

@section('content')
<div class="container">
    @if (count(Auth::user()->manager->hotel->galleries) > 0)
    
        
    <div class="row justify-content-start">
      @foreach ($galleries as $g)         
      <div class="col-4">
        <div class="card">
            <div class="card-body text-center">
                <img src="{{ asset($g->photo)}}" width="150" height="150" alt="">
            </div>
            <div class="text-center">
                 <a href="{{ route('room.add') }}" class="btn btn-primary">Add A Room As Well?</a>
            </div>
        </div>
      </div>
    
      @endforeach
    </div>
    
    @else
    <div class="alert alert-warning">
        You don't have image in your hotel gallery. <a href="{{ route('gall.add') }}" class="btn btn-secondary">Add One?</a> 
    </div>
    @endif
  </div>
@endsection