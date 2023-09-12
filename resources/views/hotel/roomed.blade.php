@extends('layouts.yield')

@section('content')
    
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="container">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Edit Room: {{ $r->name }}</h1>
                                </div>
                                <form class="user" action="{{ route('room.update',['id' => $r->id]) }}" method="POST"
                                 enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="">Room Name</label>
                                        <input type="text" class="form-control" value="{{ $r->name }}" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Room Number</label>
                                        <input type="number" class="form-control" value="{{ $r->number }}" name="number">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="">Room Price</label>
                                        <input type="number" class="form-control" name="pricing" value="{{ $r->pricing }}">
                                    </div>
                                    
                                    <div class="form-group">
                                        
                                        @if(Auth::user()->manager->hotel->addresses)
                                        <label for="">Where is the Hotel located</label>
                                        <select name="address_id" id="">
                                            @foreach (Auth::user()->hotel->addresses as $ad)
                                            <option value="{{ $ad_id }}">{{ $ad->name }}</option>                                                
                                            @endforeach
                                        </select>
                                        @else
                                        <p>You have not saved other branches into your dashboard. 
                                            Skip to use your default address 
                                            <a href="{{ route('branches') }}" class="btn btn-secondary"> Click To Save One</a> </p>
                                        @endif
                                        <p class="text text-danger">This will be shown along with room</p>
                                        <input type="file" class="form-control" name="photo">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Save
                                    </button>
                                    <hr>
                                    
                                </form>
                                <hr>
                            </div>
                        </div>
                    </div>

        </div>

    </div>
</div>

@endsection