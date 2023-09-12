
@extends('layouts.app')

@section('content')
<section id="contact" class="contact">
  
  <div class="container" data-aos="fade-up">
      
      
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Book {{ $hotel->title }}</h2>
            
          </div>
        </div>
  
        @if(Session::has('message'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif
        <div class="container" data-aos="fade-up">
            
<form action="{{ route('book', ['id' => $hotel->id]) }}" method="post" role="form" class="php-email" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input type="number"  class="form-control
                       @error('phone') is-invalid @enderror" name="phone"
                        value="" autocomplete="phone"
                         autofocus id="phone" placeholder="Your Phone" required>
                    
                  @error('phone')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                      <label for="">Your Photo</label>
                      <input type="file" class="form-control
                       @error('photo') is-invalid @enderror" name="photo" 
                       value="" name="photo" id="email">
                      @error('photo')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                          @if(Session::has('message'))
                <p class="alert alert-info">{{ Session::get('message') }}</p>
                @endif
                      </span>
                  @enderror

                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <label for="">Duration of stay</label>
                      <input type="number"  class="form-control @error('duration') is-invalid @enderror" 
                      name="duration" value="" autocomplete="duration" autofocus id="duration" 
                      placeholder="How long do you intend to stay" required>
                      <small class="text text-danger">Hotel title must be unique and of a single word</small>
                  @error('duration')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>
                    <div class="form-group mt-3">
                      <label for="">Any Special Requirement</label>
                      <input type="text" class="form-control 
                      @error('requirement') is-invalid @enderror" value="{{ old('requirement') }}" name="price_tag" 
                      autocomplete="requirement" placeholder="Special Requirements: bar, etc.">
                      @error('requirement')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>
   
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                      <label for="">Your Personal Location</label>
                      <input type="text" class="form-control @error('location') is-invalid @enderror" name="location"
                       value=""
                        id="email" placeholder="Your Personal Location">
                      @error('location')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>
                  
                  </div>
                  
                                   
                  <div class="text-center">
                    <button type="submit">Book Room</button></div>
                </form>
        
        
            </div>
          </div>
        </section><!-- End Contact Section -->
            

        @endsection
 