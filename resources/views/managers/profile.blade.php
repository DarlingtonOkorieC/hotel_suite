
@extends('layouts.app')

@section('content')
<section id="contact" class="contact">
  @if(!isset(Auth::user()->email_verified_at))  
  
  <div class="container" data-aos="fade-up">
      
      <p class="alert alert-info">
        You have not verified your account. Check if you got a mail. Or
         <a href="{{ route('verification.notice') }}" btn btn-primary btn-sm>Verify Here</a>
      </p>
      @endif
      <div class="section-title">
        <h2>Step 2</h2>
      </div>
    </div>

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Set Up your Hotel</h2>
            
          </div>
        </div>
  
        @if(Session::has('message'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif
        <div class="container" data-aos="fade-up">
<form action="{{ route('hotel.complete',['id' => Auth::user()->id]) }}" method="post" role="form" class="php-email" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input type="text"  class="form-control @error('title') is-invalid @enderror" 
                      name="title" value="{{ old('title') }}" required autocomplete="title" autofocus id="title" 
                      placeholder="Hotel Name" required>
                      <small class="text text-danger">Hotel title must be unique and of a single word</small>
                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                      <label for="">Your Hotel's Best Picture</label>
                      <input type="file" class="form-control @error('banner') is-invalid 
                      @enderror" name="banner"
                       value="{{ old('banner') }}"
                        id="email" placeholder="Your Hotel Banner" required>
                        <small>To be shown boldly when users visit you</small>
                      @error('banner')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror

                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                      <input type="text" class="form-control @error('location') is-invalid @enderror" name="location"
                       value="{{ old('location') }}" id="email" placeholder="Your Personal Location" required>
                      @error('location')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror

                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                      <label for="">City: Used for Searching</label>
                      <input type="text" class="form-control @error('city') is-invalid @enderror" name="city"
                       value="{{ old('city') }}" id="email" placeholder="Hotel City" required>
                      @error('location')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror

                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                      <input type="text" class="form-control @error('location') is-invalid @enderror" name="address"
                       value="{{ old('address') }}" id="address" placeholder="Your Hotel Location" required>
                      @error('address')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>

                  </div>
                  <div class="form-group mt-3">
                    <input type="number" class="form-control 
                    @error('business_ex') is-invalid @enderror" value="{{ old('business_ex') }}" name="business_ex" 
                    required autocomplete="business_ex" placeholder="Your Hotel's Age">
                    @error('business_ex')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                  
                  <div class="form-group mt-3">
                    <input type="phone" class="form-control 
                    @error('phone') is-invalid @enderror" name="phone" 
                    required autocomplete="phone" value="{{ old('phone') }}" placeholder="Your Hotel's Phone Number">
                    <small class="text text-danger">Might be verified</small>
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                  <div class="form-group mt-3">
                    <input type="number" class="form-control 
                    @error('staff') is-invalid @enderror" value="{{ old('staff') }}" name="staff" 
                    required autocomplete="staff" placeholder="Your Staff Strength">
                    @error('staff')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
 
                  <div class="form-group mt-3">
                    <input type="number" class="form-control 
                    @error('price_tag') is-invalid @enderror" value="{{ old('price_tag') }}" name="price_tag" 
                    required autocomplete="price_tag" placeholder="Price Tag">
                    @error('price_tag')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
 
                  
                  <div class="form-group mt-3">
                    <input type="number" class="form-control 
                    @error('room_no') is-invalid @enderror" name="room_no" 
                    required autocomplete="room_no" placeholder="How many rooms Do you have?">
                    @error('room_no')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                  <div class="form-group mt-3">
                    <label for="">Your Hotel's logo</label>
                    <input type="file" class="form-control 
                    @error('photo') is-invalid @enderror" name="photo" 
                    required autocomplete="rooms">
                    <small>Upload your Hotel's Photo</small>
                    @error('photo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                  <div class="form-group mt-3">
                    <small>Restaurant?</small>
                    <select class="form-control 
                    @error('restaurant') is-invalid @enderror" name="restaurant" 
                    required autocomplete="restaurant">
                  <option value="1">Yes</option>
                  <option value="0">No</option>
                  </select>
                    
                    @error('restaurant')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                  
                  <div class="text-center">
                    <button type="submit">Set Up your Dashboard!</button></div>
                </form>
        
        
            </div>
          </div>
        </section><!-- End Contact Section -->
            

        @endsection
 