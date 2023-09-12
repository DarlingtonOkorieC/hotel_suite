@extends('layouts.yield')

@section('content')
    
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Add new gallery!</h1>
                                </div>
                                <form class="user" action="{{ route('gall.save') }}" method="POST"
                                 enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    upload photos
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="photo">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Upload
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

    </div>
</div>

@endsection