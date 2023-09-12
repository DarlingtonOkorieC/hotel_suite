@extends('layouts.app')

@section('content')
<section id="hero1" 
class="d-flex align-items-center"
style="background: url({{ Auth::user()->manager->hotel->banner }})
 center center !important; height: 70vh; width: 100%; background-size: cover !important;">
<div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
    <div class="row">
      <div class="col-lg-8">
        <h1><span>{{ Auth::user()->manager->hotel->title }}</span></h1>
        <h2>Let's get you booked today</h2>
        @if(Auth::user()->manager->id == Auth::user()->manager->hotel->manager_id)
                <a href="{{ route('profile.edit') }}" class="btn btn-secondary">Edit Your Banner</a>    
                @endif
 
      </div>
      <div class="col-lg-4">
        <a href="" class="btn btn-primary">Book A Room</a>
        <h2>Room Price for just a minimum of N{{ Auth::user()->manager->hotel->price_tag }}</h2>
      </div>
    </div>
</section>

<!-- ======= Gallery Section ======= -->
<section id="gallery" class="gallery">
  @if(Auth::user()->manager->hotel->descr)
    <div class="container" data-aos="fade-up">
      <div class="text-center">
        <h2>About Us</h2>
        <h5>{{ Auth::user()->manager->hotel->descr }}</h5>
        <a href="{{ route('profile.edit',['id' => Auth::user()->manager->id]) }}" class="btn btn-primary">Edit This</a>
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
        @if(count(Auth::user()->manager->hotel->rooms) > 0)
        @foreach (Auth::user()->manager->hotel->rooms as $r)
   
        <div class="col-lg-3 col-md-4">
          <div class="gallery-item">
                 <a href="{{ asset($r->photo)}}" class="gallery-lightbox" data-gall="gallery-item">
                    <img src="{{ asset($r->photo)}}" alt="" class="img-fluid">
                  </a>
                  <div class="card text-center text-black">
                      @if (isset($r->address_id))
                      <h4 class="text-dark">Room Address: {{ $r->address->address }}</h4>
                        <hr>
                      @else
                      <h4 class="text-dark">Room Address: {{ Auth::user()->manager->hotel->city }}</h4>
                      <hr>
                      @endif
                    <p class="text-primary">Price Tag: {{ $r->pricing }}</p>
                    <p class="text-dark">Room Number: {{ $r->number }}</p>
                    @if(Auth::user()->manager->id == Auth::user()->manager->hotel->manager_id)
                    <a href="{{ route('room.edit', ['id' => $r->id]) }}" class="btn btn-secondary">Edit Room</a>    
                    @else
                    <a href="{{ route('room.book', ['id' => Auth::user()->manager->hotel->room->id]) }}" class="btn btn-secondary">Book Room</a>    
                    
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
                <h4 class="text-dark">Hotel Name: {{ Auth::user()->manager->hotel->title }}</h4>
                <hr>
                <p class="text-primary">Price Tag: {{ Auth::user()->manager->hotel->price_tag }}</p>
                <p class="text-dark">Room Address: {{ Auth::user()->manager->hotel->address }}</p>
                @if(Auth::user()->manager->id == Auth::user()->manager->hotel->manager_id)
                <a href="{{ route('room.add') }}" class="btn btn-secondary">Add Room</a>    
                @else
                <a href="{{ route('room.book', ['id' => Auth::user()->manager->hotel->room->id]) }}" class="btn btn-secondary">Book Room</a>    
                
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
          <div class="gallery-item">
                 @if(count(Auth::user()->manager->hotel->galleries) > 0)
                 @foreach (Auth::user()->manager->hotel->galleries as $r)
                 <a href="{{ asset($r->photo)}}" class="gallery-lightbox" data-gall="gallery-item">
                    <img src="{{ asset($r->photo)}}" alt="" class="img-fluid">
                  </a>
        
                 @endforeach
                  
                 @else 
            <a href="{{ asset('app/assets/img/gallery/gallery-2.jpg')}}" class="gallery-lightbox" data-gall="gallery-item">
              <img src="{{ asset('app/assets/img/gallery/gallery-2.jpg')}}" alt="" class="img-fluid">
            </a>
            @endif
          </div>
        </div>

      </div>

    </div>

    
  </section><!-- End Gallery Section -->


@endsection