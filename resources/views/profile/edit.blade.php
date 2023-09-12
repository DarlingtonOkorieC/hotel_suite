
@extends('layouts.app')

@section('content')
<section id="contact" class="contact">
  
  <div class="container" data-aos="fade-up">
      
      
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Edit Any Aspect Of Your Profile Here</h2>
            
          </div>
        </div>
  
        @if(Session::has('message'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif
        <div class="container" data-aos="fade-up">
<form action="{{ route('profile.update') }}" method="post" role="form" class="php-email" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <label for="">Full Name</label>
                      <input type="text"  class="form-control
                       @error('name') is-invalid @enderror" name="name"
                        value="{{ Auth::user()->name}}" autocomplete="name"
                         autofocus id="name" placeholder="Your Name" required>
                    
                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                      <label for="">Your email address</label>
                      <input type="email" class="form-control
                       @error('email') is-invalid @enderror" name="email" 
                       value="{{ Auth::user()->email }}" name="email" id="email" 
                       placeholder="Your Email">
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                          @if(Session::has('message'))
                <p class="alert alert-info">{{ Session::get('message') }}</p>
                @endif
                      </span>
                  @enderror

                    </div>
                  </div>
                  @if(Auth::user()->isManager)
                  <div class="text-center">Hotel Section</div>
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <label for="">Your Hotel Title(Can only be changed once)</label>
                      <input type="text"  class="form-control @error('title') is-invalid @enderror" 
                      name="title" value="{{ Auth::user()->manager->hotel->title }}" autocomplete="title" autofocus id="title" 
                      placeholder="Hotel Name">
                      <small class="text text-danger">Hotel title must be unique and of a single word</small>
                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>
                    <div class="form-group mt-3">
                      <label for="">Hotel Least Amount</label>
                      <input type="number" class="form-control 
                      @error('price_tag') is-invalid @enderror" value="{{ Auth::user()->manager->hotel->price_tag }}" name="price_tag" 
                      autocomplete="price_tag" placeholder="Your mimimum room amount">
                      @error('price_tag')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>
   
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                      <label for="">Your personal location</label>
                      <input type="text" class="form-control @error('location') is-invalid @enderror" name="location"
                       value="{{ Auth::user()->manager->location }}"
                        id="email" placeholder="Your Personal Location">
                      @error('location')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                      <label for="">Your Hotel Banner</label>
                      <input type="file" class="form-control @error('banner') is-invalid 
                      @enderror" name="banner"
                       value="{{ old('banner') }}"
                        id="email" placeholder="Your Hotel Banner">
                        <small>To be shown boldly when users visit you</small>
                      @error('banner')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>

                    <div class="col-md-6 form-group mt-3 mt-md-0">
                      <label for="">City: Used for Searching</label>
                      <input type="text" class="form-control @error('city') is-invalid @enderror" name="city"
                       value="{{ Auth::user()->manager->hotel->city }}"
                        id="email" placeholder="Hotel City">
                      @error('location')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror

                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                      <label for="">Hotel Address</label>
                      <input type="text" class="form-control 
                      @error('address') is-invalid @enderror" name="address"
                       value="{{ Auth::user()->manager->hotel->address }}" 
                       id="address" placeholder="Your Hotel Location">
                      @error('address')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>

                  </div>
                  <div class="form-group mt-3">
                    <label for="">Your personal business experience(In years)</label>
                    <input type="number" class="form-control 
                    @error('business_ex') is-invalid @enderror" 
                    value="{{ Auth::user()->manager->business_ex }}" name="business_ex" 
                    autocomplete="business_ex" placeholder="Your Hotel's Age">
                    @error('business_ex')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                  
                  <div class="form-group mt-3">
                    <label for="">Your hotel phone number</label>
                    <input type="phone" class="form-control 
                    @error('phone') is-invalid @enderror" name="phone" 
                    autocomplete="phone" value="{{ Auth::user()->manager->phone }}" placeholder="Your Hotel's Phone Number">
                    <small class="text text-danger">Might be verified</small>
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                  <div class="form-group mt-3">
                    <label for="">Your staff strength</label>
                    <input type="number" class="form-control 
                    @error('staff') is-invalid @enderror" value="{{ Auth::user()->manager->hotel->staff }}" name="staff" 
                    autocomplete="staff" placeholder="Your Staff Strength">
                    @error('staff')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                  
                  <div class="form-group mt-3">
                    <label for="">Number of rooms</label>
                    <input type="number" class="form-control 
                    @error('room_no') is-invalid @enderror" name="room_no" value="{{ Auth::user()->manager->hotel->room_no }}"
                    autocomplete="room_no" placeholder="How many rooms Do you have?">
                    @error('room_no')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                  <div class="form-group mt-3">
                    <p for="">Your Hotel Logo</p>
                    <input type="file" class="form-control 
                    @error('photo') is-invalid @enderror" name="photo" >
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
                    autocomplete="restaurant">
                  <option value="1">Yes</option>
                  <option value="0">No</option>
                  </select>
                    
                    @error('restaurant')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                  
                  <div class="col-md-6 form-group mt-3 mt-md-0">
                    <label for="">Add A Description For Your Hotel(Will be shown to users)</label>
                    <textarea type="text" class="form-control
                     @error('descr') is-invalid
                     @enderror" name="descr"
                     style="color: fff"
                      id="email" placeholder="Add a description to your Hotel">
                      {{ Auth::user()->manager->hotel->descr }}
                    </textarea>
                    @error('descr')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                  @endif
                  <div class="text-center">
                    <button type="submit">Update Profile!</button></div>
                </form>
        
        
            </div>
          </div>
        </section><!-- End Contact Section -->
            

        @endsection
 