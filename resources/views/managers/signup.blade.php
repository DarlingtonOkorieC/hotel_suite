@extends('layouts.app')

@section('content')
<section id="contact" class="contact">
  @if(Session::has('message'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Step 1: Register To Get Your Hotel Set Up</h2>
      </div>
    </div>

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Credentials</h2>
            
          </div>
        </div>
  
        @if(Session::has('message'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif
        <div class="container" data-aos="fade-up">


                <form action="{{ route('manager.create') }}" method="post" role="form" class="php-email">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input type="text"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus id="name" placeholder="Your Name" required>
                    
                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                      <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" name="email" id="email" placeholder="Your Email" required>
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
                  <div class="form-group mt-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                  </div>
                  <div class="form-group mt-3">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                     @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                  </div>
                  <div class="text-center">
                    <button type="submit"> let's Do This!</button>
                    <a class="btn btn-secondary text-white" href="{{ route('login') }}"> login!</a>
                  </div>
                  <div class="text-center">
                  </div>
                </form>
        
        
            </div>
        
          </div>
        </section><!-- End Contact Section -->
            
@endsection
