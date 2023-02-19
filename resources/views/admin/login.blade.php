@extends('layouts.master2')
@section('title')
{{trans('admin/sidebar.product')}}
@stop
@section('css')

<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('Dashboard/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}"
    rel="stylesheet">
@endsection
@section('content')
<div class="container-fluid">
    <div class="row no-gutter">
        <!-- The content half -->
        <div class="col-md-6 col-lg-6 col-xl-5 m-auto">
            <div class="login d-flex align-items-center py-2">
                <!-- Demo content-->
                <div class="container badge-light p-5">
                    <div class="row ">
                        <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                            <div class="card-sigin">
                                <div class="card-sigin">
                                    <div class="main-signup-header">
                                        <h2>{{trans('admin/login.welcome')}}</h2>
                                        @error("error")
                                        <div class="alert bg-danger alert-dismissible mb-2  " role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <strong>{{$message}}
                                        </div>
                                        @enderror


                                        {{--form admin--}}
                                        <div class="panel " id="admin">
                                            <form method="POST" action="{{ route('admin.login') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label>{{trans('admin/login.email')}}</label> <input
                                                        class="form-control"
                                                        placeholder="{{trans('admin/login.enter_email')}}" type="email"
                                                        name="email" :value="old('email')" required autofocus>
                                                </div>
                                                <div class="form-group">
                                                    <label>{{trans('admin/login.password')}}</label> <input
                                                        class="form-control"
                                                        placeholder="{{trans('admin/login.enter_password')}}"
                                                        type="password" name="password" required
                                                        autocomplete="current-password">
                                                </div><button type="submit"
                                                    class="btn btn-main-primary btn-block">{{trans('admin/login.logIn')}}</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End -->
            </div>
        </div><!-- End -->
    </div>
</div>
@endsection