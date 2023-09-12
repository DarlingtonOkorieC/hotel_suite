@extends('layouts.yield')

@section('content')
@if ($branches)
    
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Your Branches</h1>
                    </div>

                    
                    <div class="row">

                        @foreach ($branches as $b)
                            
                        
                        <div class="col-lg-6">

                         
                            <!-- Collapsable Card Example -->
                            <div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                    <h6 class="m-0 font-weight-bold text-primary">{{ $b->address }}</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="collapseCardExample">
                                    <div class="card-body">
                                        <p>Your Hotel name: {{ $b->hotel->title }}</p>
                                        V.functional. <strong><a href="{{ route('branch.delete', ['id' => $b->id]) }}" class="btn btn-danger">Delete Branch</a></strong>
                                        <strong><a href="{{ route('branch.add') }}" class="btn btn-primary">Add Branch</a></strong>
                                    </div>
                                </div>
                            </div>

                        </div>

                        @endforeach

                    </div>
                    @else
    
            <div class="card">
                <p>Your Only Branch is {{ Auth::user()->manager->hotel->address }}</p>
            </div>
                    @endif


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
 
@endsection