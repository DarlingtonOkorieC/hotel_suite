@extends('layouts.yield')

@section('content')
@if($usehotels->count() > 0)

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Your Rooms</h1>
                    </div>
                    
                    <div class="row">
                        @foreach ($usehotels as $r)
                            

                        <div class="col-lg-6">
                            <!-- Dropdown Card Example -->
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center
                                     justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">{{ $r->name }}</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Take Action:</div>
                                            
                                            <a class="dropdown-item" href="{{ route('room.add') }}">Add New Room</a>
                                            <a class="dropdown-item" href="{{ route('room.edit', ['id' => $r->id]) }}">Edit Room</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{ route('room.delete', ['id'=>$r->id]) }}">Delete Room</a>
                                        
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body text-center">
                                    <img src="{{ asset($r->photo) }}" style="height: 80px; width: 80px; border-radius: 100%; border: 4px solid rgb(29, 126, 216);">
                                    <br>
                                    <p>Room Number: {{ $r->number }}</p>
                                    <p>Room Price: N{{ $r->pricing }}</p>
                                    <hr>
                                    @if(isset($r->address_id))
                                    <p>Hotel Room Location: {{ $r->address->name }}</p>
                                    @else
                                    Hotel Location: {{ $r->hotel->address }}
                                    @endif
                                </div>
                            </div>

               
                        </div>

                        @endforeach
                    </div>


     </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
                
            @else
 <div class="alert alert-primary">
You don't have a room <a href="{{ route('room.add') }}">Add Room?</a>     
</div>               
            @endif
 
@endsection