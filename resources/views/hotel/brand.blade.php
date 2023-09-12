@extends('layouts.yield')

@section('content')
    
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="container">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Add new Branch</h1>
                                </div>
                                <form class="user" action="{{ route('branch.save') }}" method="POST"
                                 enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <small>eg. 23b Chukwudi Street, Abuja</small>
                                        <label for="">Branch Address</label>
                                        <input type="text" class="form-control" value="{{ old('address') }}" name="address">
                                    </div>

                                    
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Save
                                    </button>
                                    <hr>
                                    
                                </form>
                                <hr>
                            </div>
                        </div>
                    </div>

        </div>

    </div>
</div>

@endsection
