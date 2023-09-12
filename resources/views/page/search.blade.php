@extends('layouts.app')

@section('content')
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Coverage of Hotels In {{ $query }}</h2>
      </div>
    </div>

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Your Search Results</h2>
            
          </div>
        </div>
  
        @if(Session::has('message'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif
        <div class="container" data-aos="fade-up">
            @if (isset($hotels))
                      
            <div class="row">
                @foreach ($hotels as $h)
                    
                
                    <div class="col-md-4">
                        <div class="card tex-center" style="background: #066986">
                            <div class="card-title ms-2">
                                <h3>{{ $h->title }}</h3> 
                            </div>
                            <hr>
                            <div class="card-body">
                                <img src="{{ $h->photo }}" class="img img-fluid img-thumbnail" style="max-width: 100px; height: 90px" alt="">
                            </div>
                            <div class="card-footer">
                                <p>Number of Rooms: {{ $h->room_no }}</p>
                                <p>Full Hotel Address: {{ $h->address }}</p>
                                <p>Minimum amount of Room Price Tag: {{ $h->price_tag }}</p>
                                <a href="{{ route('open.hotel',['title' => $h->title]) }}" class="btn btn-primary">View And Book</a>
                            </div>
                            </div>
                       </div>

                    @endforeach
                </div>
                {{ $hotels->links() }}
        @else
        <div class="alert alert-primary">
            We currently don't have a hotel registered in this city. However, submit an official query at <a href="mailto:info@hs.com">Our official mail and we'd get back to you with some results later.</a> 
        </div>
        <div class="card bg-primary text-center">
          <form action="/search" method="POST" class="form-group">
            <label for="">Do another search</label>
            <div class="form-group d-flex">
              
              <input type="text" placeholder="Search" class="form-control" name="city">
              <input type="submit" value="Search" class="form-control">        
            </div>
          </div>
            </form>
          </div>
        @endif
          </div>
        </section><!-- End Contact Section -->
            
@endsection
