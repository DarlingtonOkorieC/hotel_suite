@extends('layouts.app')

@section('content')
@if(isset($hotel))
<section id="hero" 
class="d-flex align-items-center"
style="background: url({{ asset($hotel->banner) }})
 center center !important; height: 70vh; width: 100%; background-size: cover !important;">
<div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
    <div class="row">
      <div class="col-lg-8">
        <h1><span>{{ $hotel->title }}</span></h1>
        <h2>Let's get you booked today</h2>
        @if(Auth::check())
        @if(Auth::user()->isManager)
        @if(Auth::user()->manager->id == $hotel->manager_id)
                <a href="{{ route('profile.edit') }}" class="btn btn-secondary">Edit Your Banner</a>    
                @endif
                @endif
                @endif
 
      </div>
      <div class="col-lg-4">
        <a href="{{ route('hotel.book',['id' => $hotel->id]) }}" class="btn btn-primary">Book A Room</a>
        <h2>Room Price for just a minimum of N{{ $hotel->price_tag }}</h2>
      </div>
    </div>
</section>
<!-- ======= Gallery Section ======= -->
<section id="gallery" class="gallery">
@if(isset($hotel->descr))
  <div class="container" data-aos="fade-up">
    <div class="text-center">
      <h2>About Us</h2>
      <h5>{{ $hotel->descr }}</h5>
      @if(Auth::check())
      @if(Auth::user()->isManager)
      @if($hotel->id == Auth::user()->manager->hotel->id)
      <a href="{{ route('profile.edit',['id' => Auth::user()->manager->id]) }}" class="btn btn-primary">Edit This</a>
    @endif
    @endif
    @endif
    </div>
  </div>
@endif
</section><!-- End Gallery Section -->

<!-- ======= Gallery Section ======= -->
<section id="gallery" class="gallery">

    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Gallery</h2>
        <p>Our Rooms</p>
      </div>
    </div>

    <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

      <div class="row g-0">
        @if(count($hotel->rooms) > 0)
        @foreach ($hotel->rooms as $r)
        <div class="col-lg-3 col-md-4">
          <div class="gallery-item">
                 <a href="{{ asset($r->photo)}}" class="gallery-lightbox" data-gall="gallery-item">
                    <img src="{{ asset($r->banner) }}" alt="" class="img-fluid">
                  </a>
                  <div class="card text-center text-black">
                      @if (isset($r->address_id))
                      <h4 class="text-dark">Room Address: {{ $r->address->address }}</h4>
                        <hr>
                      @else
                      <h4 class="text-dark">Room Address: {{ $hotel->city }}</h4>
                      <hr>
                      @endif
                    <p class="text-primary">Price Tag: {{ $r->pricing }}</p>
                    <p class="text-dark">Room Number: {{ $r->number }}</p>
                    @if(Auth::check())
                    @if(Auth::user()->isManager)
                    @if(Auth::user()->manager->id == $hotel->manager_id)
                    <a href="{{ route('room.edit', ['id' => Auth::user()->manager->hotel->room->id]) }}" class="btn btn-secondary">Edit Room</a>    
                    @endif
                    @endif
                    <a href="{{ route('room.book', ['id' => $r->id]) }}" class="btn btn-secondary">Book Room</a>    
                    
                    @endif
                </div>
          </div>
        </div>
                 @endforeach
                  
                 @else
                 <div class="col-lg-3 col-md-4">
                  <div class="gallery-item">                  
            <a href="{{ asset('app/assets/img/gallery/gallery-1.jpg')}}" class="gallery-lightbox" data-gall="gallery-item">
              <img src="{{ asset('app/assets/img/gallery/gallery-1.jpg')}}" alt="" class="img-fluid">
            </a>
            <div class="card text-center text-dark">
                <h4 class="text-dark">Hotel Name: {{ $hotel->title }}</h4>
                <hr>
                <p class="text-primary">Price Tag: {{ $hotel->price_tag }}</p>
                <p class="text-dark">Room Address: {{ $hotel->address }}</p>
                @if(Auth::check())
                @if(Auth::user()->isManager)
                @if(Auth::user()->manager->id == $hotel->manager_id)
                <a href="{{ route('room.add') }}" class="btn btn-secondary">Add Room</a>    
                @endif
                @endif
                @else
                <a href="{{ route('room.book', ['id' => $hotel->id]) }}" class="btn btn-secondary">Book Room</a>    
                
                @endif
                {{-- <a href="{{ route('book.hotel', ['id' => Auth::user()->manager->hotel->room->id]) }}" class="btn btn-primary">Book Hotel</a>            --}}
            </div>
            
          </div>
        </div>
        @endif
      </div>

    </div>

    
  </section><!-- End Gallery Section -->
  <section id="gallery" class="gallery">

    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Gallery</h2>
        <p>Our Photo Galleries</p>
      </div>
    </div>

    <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

      <div class="row g-0">
        <div class="col-lg-3 col-md-4">
          <div class="gallery-item text-center">
                 @if(count($hotel->galleries) > 0)
                 @foreach ($hotel->galleries as $r)
                 <a href="{{ asset($r->photo)}}" class="gallery-lightbox" data-gall="gallery-item">
                    <img src="{{ asset($r->photo)}}" alt="" class="img-fluid">
                  </a>
        
                 @endforeach
                  
                 @else 
            <a href="{{ asset('app/assets/img/gallery/gallery-2.jpg')}}" class="gallery-lightbox" data-gall="gallery-item">
              <img src="{{ asset('app/assets/img/gallery/gallery-2.jpg')}}" alt="" class="img-fluid">
            </a>
            @if(Auth::check())
            @if(Auth::user()->isManager)
                @if(Auth::user()->manager->id == $hotel->manager_id)
                <a href="{{ route('gall.add') }}" class="btn btn-secondary">Add Your own gallery</a>    
                @endif
                @endif
                @endif
            @endif
          </div>
        </div>

      </div>

    </div>

    
  </section><!-- End Gallery Section -->

  

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>
      </div>

      <div data-aos="fade-up">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container" data-aos="fade-up">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>{{ $hotel->address }}</p>
              </div>

              <div class="open-hours">
                <i class="bi bi-clock"></i>
                <h4>Open Hours:</h4>
                <p>
                  Monday-Saturday:<br>
                  11:00 AM - 2300 PM
                </p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>{{$hotel->manager->user->email}}</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>{{ $hotel->manager->phone }}
                  <br> 
                </p>
              </div>

            </div>

          </div>

          
        </div>

      </div>
    </section><!-- End Contact Section -->
@else

<div class="card mt-4 py-5 bg-dark text-center">
  <div class="alert alert-secondary">

  <h4 class="display-6 text-dark">The hotel does not seem to exist. Kindly check the spelling and try again</h4>
</div>
</div>
@endif
@endsection