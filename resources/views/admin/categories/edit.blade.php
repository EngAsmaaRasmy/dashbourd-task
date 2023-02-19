@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('admin/sidebar.edit_category') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto"> {{ trans('admin/sidebar.categories') }}</h4><span
                class="text-muted mt-1 tx-13 mr-2 mb-0">/
                {{ trans('admin/sidebar.edit_category') }}</span>
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
                <form action="{{ route('categories.update', $category->id) }}" method="post" autocomplete="off"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="pd-30 pd-sm-40 bg-gray-200">

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">
                                    {{ trans('admin/categories.name_en') }}:</label>
                            </div>
                            <div class="col-md-9 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="name" type="text"
                                    value="{{ $category->name }}" autofocus>
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">
                                    {{ trans('admin/categories.name_ar') }}:</label>
                            </div>
                            <div class="col-md-9 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="name_ar" value="{{ $category->name_ar }}"
                                    type="text">
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">
                                    {{ trans('admin/categories.description_en') }}:</label>
                            </div>
                            <div class="col-md-9 mg-t-5 mg-md-t-0">
                                <textarea class="form-control" name="description" rows="4" cols="60">{{ $category->description }}</textarea>
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">
                                    {{ trans('admin/categories.description_en') }}:</label>
                            </div>
                            <div class="col-md-9 mg-t-5 mg-md-t-0">
                                <textarea class="form-control" name="description_ar" rows="4" cols="60">{{ $category->description_ar }}</textarea>
                            </div>
                        </div>

                        <div class="form-actions">
                            <a href="{{ route('categories.index') }}" type="button"
                                class="btn btn-danger pd-x-30 mg-r-5 mg-t-5">
                                <i class="ft-x"></i>{{ trans('admin/categories.Close') }}
                            </a>
                            <button type="submit"
                                class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5">{{ trans('admin/login.submit') }}</button>
                        </div>
                    </form>
                    </div>
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
@section('js')

@endsection
