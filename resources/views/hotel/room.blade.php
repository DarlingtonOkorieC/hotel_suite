@extends('layouts.yield')

@section('content')
    
<div class="container">
<div class="alert alert-danger">
    You don't need to Create A Room To Receive Bookings. Just Set A General Pricing In Your Profile Edit
</div>
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="container">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Add new Room!</h1>
                                </div>
                                <form class="user" action="{{ route('room.save') }}" method="POST"
                                 enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="">Room Name</label>
                                        <input type="text" class="form-control" value="{{ old('name') }}" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Room Number</label>
                                        <input type="number" class="form-control" value="{{ old('number') }}" name="number">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="">Room Price</label>
                                        <input type="number" class="form-control" name="pricing" value="{{ old('pricing') }}">
                                    </div>
                                    
                                    <div class="form-group">
                                        
                                        @if(count(Auth::user()->manager->hotel->addresses) > 0)
                                            <label for="category_id">Choose A Branch Address</label>
                                            <select name="address_id" id="category" class="form-control">
                                            @foreach(Auth::user()->manager->hotel->addresses as $category)
                                            <option value="{{ $category->id }}">{{ $category->address }}</option>
                                            @endforeach
                                            </select>
                                            
                                        @else
                                        <p>You have not saved other branches into your dashboard. 
                                            Skip to use your default address 
                                            <a href="{{ route('branch.add') }}" class="btn btn-secondary"> Click To Save One</a> </p>
                                        @endif
                                    </div>
                                    <div class="form-group">
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