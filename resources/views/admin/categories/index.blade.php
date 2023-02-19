@extends('layouts.master')
@section('title')
    {{ trans('admin/sidebar.categories') }}
@stop
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('admin/sidebar.categories') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('admin/sidebar.all') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('messages_alert')
    <!-- row -->
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0">{{ trans('admin/categories.name') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ trans('admin/categories.description') }}</th>
                                    <th class="wd-20p border-bottom-0">{{ trans('admin/categories.created_at') }}</th>
                                    <th class="wd-20p border-bottom-0">{{ trans('admin/categories.Processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>@if(app()->getLocale() == 'en')
                                            {{ $category->name }}
                                            @else
                                            {{ $category->name_ar }}
                                            @endif
                                        </td>
                                        <td>
                                            @if(app()->getLocale() == 'en')
                                            {{ $category->description }}
                                            @else
                                            {{ $category->description_ar }}
                                            @endif 
                                        </td>
            
                                        <td>{{ $category->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a class="modal-effect btn btn-sm btn-info" 
                                                href="{{ route('categories.edit', $category->id) }}"><i
                                                    class="las la-pen"></i></a>
                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-toggle="modal" href="#delete{{ $category->id }}"><i
                                                    class="las la-trash"></i></a>
                                        </td>
                                    </tr>
                                    @include('admin.categories.delete')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
        <!--/div-->
        <!-- /row -->

    </div>
    <!-- row closed -->

    <!-- Container closed -->

    <!-- main-content closed -->
@endsection
@section('js')


    <!--Internal  Notify js -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>

@endsection
