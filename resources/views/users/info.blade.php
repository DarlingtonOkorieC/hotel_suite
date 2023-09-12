@extends('layouts.yield')
@section('content')
    
<!-- Begin Page Content -->
       <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Hotels you booked and their rooms</h1>
@if(count(Auth::user()->bookers) > 0)
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Hotel Name</th>
                                <th>Hotel Address</th>
                                <th>Contact Manager</th>
                                <th>Number of Rooms</th>
                                <th>Duration of Stay</th>
                                <th>Date Booked</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Auth::user()->bookers as $b)
                            <tr>
                                    
                                <th>{{ $b->hotel->title }}</th>
                                <th>{{ $b->hotel->address }}</th>
                                <th>{{$b->hotel->manager->phone}}
                                <br>
                                {{ $b->hotel->manager->user->email }}
                                </th>
                                <th>
                                    {{ $b->hotel->room_no }}
                                </th>
                                <th>{{ $b->duration }}</th>
                                <th>{{ $b->created_at->toDateTimeString() }}</th>
                                
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
    You've not booked a hotel yet
</div>
</div>
@endif
<!-- End of Main Content -->
@endsection