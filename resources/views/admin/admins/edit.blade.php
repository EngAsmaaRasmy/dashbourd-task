@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('admin/sidebar.edit_manger') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto"> {{ trans('admin/sidebar.users') }}</h4><span
                class="text-muted mt-1 tx-13 mr-2 mb-0">/
                {{ trans('admin/sidebar.edit_manger') }}</span>
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
                <form action="{{ route('admin.update', $admin->id) }}" method="post" autocomplete="off"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="pd-30 pd-sm-40 bg-gray-200">

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">
                                    {{ trans('admin/admin.name') }}:</label>
                            </div>
                            <div class="col-md-9 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="name" value="{{ $admin->name }}" type="text" autofocus>
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">
                                    {{ trans('admin/admin.email') }}:</label>
                            </div>
                            <div class="col-md-9 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="email" value="{{ $admin->email }}" type="email">
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">
                                    {{ trans('admin/admin.password') }}:</label>
                            </div>
                            <div class="col-md-9 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="password" type="password">
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">
                                    {{ trans('admin/admin.confirm-password') }}:</label>
                            </div>
                            <div class="col-md-9 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="confirm-password" type="password">
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
