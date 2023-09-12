@extends('layouts.yield')
@section('content')
    
<!-- Begin Page Content -->
       <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Your Bookings/Booked Rooms and their Infos</h1>
@if(count(Auth::user()->manager->hotel->bookers) > 0)
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>User Name</th>
                                <th>User Phone</th>
                                <th>Contact email</th>
                                <th>Special Requirements</th>
                                <th>Duration of Stay</th>
                                <th>Date Booked</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Auth::user()->manager->hotel->bookers as $b)
                                
                            <tr>
                                <th><img src="{{asset($b->photo)}}" width="100" height="100" alt=""></th>
                                <th>{{ $b->user->name }}</th>
                                <th>{{ $b->phone }}</th>
                                <th>
                                    {{ $b->user->email }}
                                </th>
                                <th>
                                    @if(isset($b->requirement))
                                    {{ $b->requirement }}
                                @else
                                none
                                @endif
                                </th>
                                <th>{{ $b->duration }}</th>
                                <th>{{ $b->created_at->toDateTimeString() }}
                                    @if($b->opened == 0)
                                    <form action="{{ route('mark', ['id' => $b->id]) }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="submit" value="Mark As seen" class="btn btn-primary">
                                    </form>
                                    @endif
                                </th>
                                </tr>
                                @endforeach
                            
                            </tbody>
                        
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@else
<div class="alert secondary">
    You don't yet have a booking.
</div>
</div>
@endif
<!-- End of Main Content -->
@endsection