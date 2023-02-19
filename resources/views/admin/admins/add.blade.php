@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('admin/sidebar.add_manger') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto"> {{ trans('admin/sidebar.users') }}</h4><span
                class="text-muted mt-1 tx-13 mr-2 mb-0">/
                {{ trans('admin/sidebar.add_manger') }}</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')

@include('messages_alert')

<!-- row -->
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.save') }}" method="post" autocomplete="off"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="pd-30 pd-sm-40 bg-gray-200">

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">
                                    {{ trans('admin/admin.name') }}:</label>
                            </div>
                            <div class="col-md-9 mg-t-5 mg-md-t-0">
                                <input class="form-control @error("name") is-invalid @enderror" required name="name" type="text" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">
                                    {{ trans('admin/admin.email') }}:</label>
                            </div>
                            <div class="col-md-9 mg-t-5 mg-md-t-0">
                                <input class="form-control @error("email") is-invalid @enderror" required name="email" type="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">
                                    {{ trans('admin/admin.password') }}:</label>
                            </div>
                            <div class="col-md-9 mg-t-5 mg-md-t-0">
                                <input class="form-control @error("password") is-invalid @enderror" required name="password" type="password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">
                                    {{ trans('admin/admin.confirm-password') }}:</label>
                            </div>
                            <div class="col-md-9 mg-t-5 mg-md-t-0">
                                <input class="form-control @error("confirm-password") is-invalid @enderror" required name="confirm-password" type="password">
                                @error('confirm-password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-actions">
                            <a  href="{{route("admins.index")}}" type="button"  class="btn btn-danger pd-x-30 mg-r-5 mg-t-5" >
                                <i class="ft-x"></i>{{ trans('admin/admin.Close') }}
                            </a>
                            <button type="submit"
                                class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5">{{ trans('admin/login.submit') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /row -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
