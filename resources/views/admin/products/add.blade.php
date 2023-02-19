@extends('layouts.master')
@section('css')
 <!--Internal Sumoselect css-->
 <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
 <link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>

 <!-- Internal Select2 css -->
 <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@section('title')
    {{ trans('admin/sidebar.add_product') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto"> {{ trans('admin/sidebar.products') }}</h4><span
                class="text-muted mt-1 tx-13 mr-2 mb-0">/
                {{ trans('admin/sidebar.add_product') }}</span>
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
                <form action="{{ route('products.store') }}" method="post" autocomplete="off"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="pd-30 pd-sm-40 bg-gray-200">

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">
                                    {{ trans('admin/products.car_models') }}:</label>
                            </div>
                            <div class="col-md-9 mg-t-5 mg-md-t-0">
                                <select name="category_id" required class="form-control @error("category_id") is-invalid @enderror">
                                    <option value="" selected disabled>---Select Categoy ---</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">
                                            @if(app()->getLocale() == 'en')
                                            {{ $category->name }}
                                            @else
                                            {{ $category->name_ar }}
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">
                                    {{ trans('admin/categories.name_en') }}:</label>
                            </div>
                            <div class="col-md-9 mg-t-5 mg-md-t-0">
                                <input class="form-control @error("name") is-invalid @enderror" required name="name" type="text"
                                    autofocus>
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
                                    {{ trans('admin/categories.name_ar') }}:</label>
                            </div>
                            <div class="col-md-9 mg-t-5 mg-md-t-0">
                                <input class="form-control @error("name_ar") is-invalid @enderror" required name="name_ar" type="text">
                                @error('name_ar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">
                                    {{ trans('admin/categories.description_en') }}:</label>
                            </div>
                            <div class="col-md-9 mg-t-5 mg-md-t-0">
                                <textarea class="form-control @error("description") is-invalid @enderror" required name="description" rows="4" cols="60"></textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">
                                    {{ trans('admin/categories.description_ar') }}:</label>
                            </div>
                            <div class="col-md-9 mg-t-5 mg-md-t-0">
                                <textarea class="form-control @error("description_ar") is-invalid @enderror" required name="description_ar" rows="4" cols="60"></textarea>
                                @error('description_ar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">
                                    {{ trans('admin/products.image') }}:</label>
                            </div>
                            <div class="col-md-9 mg-t-5 mg-md-t-0">
                                <input type="file" class="form-control @error("image") is-invalid @enderror" required accept="image/*" name="image" required onchange="loadFile(event)">
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <br>
                                <img width="60%" height="200px" id="output" />
                            </div>
                        </div>

                        <div class="form-actions">
                            <a  href="{{route("products.index")}}" type="button"  class="btn btn-danger pd-x-30 mg-r-5 mg-t-5" >
                                <i class="ft-x"></i>{{ trans('admin/products.Close') }}
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
@section('js')

<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
    $(document).ready(function() {

        $(".btn-success").click(function() {
            var html = $(".clone").html();
            $(".increment").after(html);
        });

        $("body").on("click", ".btn-danger", function() {
            $(this).parents(".control-group").remove();
        });

    });
</script>

 <!--Internal  Form-elements js-->
 <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
 <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>

 <!--Internal  Notify js -->
 <script src="{{URL::asset('assets/plugins/notify/js/notifIt.js')}}"></script>
 <script src="{{URL::asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>

@endsection
