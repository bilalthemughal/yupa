@extends('admin.layouts.master')
@section('pageTitle') Package @endsection
@section('page-header')
    <div class="page-header page-header-default">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">Package</li>
            </ul>
        </div>
    </div>
    <script
            src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous"></script>
@endsection
@section('content')


    <div class="container">
        <h1>Create Trip</h1>
        <form role="form" action="{{ route('admin.createTrip') }}" method="post" enctype="multipart/form-data" id="addForm">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" name="name" id="duration" class="form-control" placeholder="Name">

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Price:</label>
                        <input type="text" name="price" id="duration" class="form-control" placeholder="Price">

                    </div>
                </div>
            </div>

        <input type="hidden" id="hiddenDays" name="hiddenDays" value="1">

        <input type="hidden" name="package_id" value="{{$package->id}}">

        <div class="row col-md-12">
            <div id="days">
                <div class="row">
                    <legend class="text-bold">
                        <button type="button" class="btn btn-primary" id="add_option1" onclick="appendFunction(1)" data-action="add">Add Itinary(+)</button>
                    </legend>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Day Number:</label>
                                <input type="text" name="number[]" id="name" class="form-control" placeholder="Number">

                            </div>
                        </div>
                    </div>


                    <table class="table table-bordered">
                        <tbody id="1_way_body">
                        <tr>
                            <td>
                                <input type="time" name="time1[]" id="time1" class="form-control" placeholder="Itinary Time">
                            </td>
                            <td >
                                <input type="text" name="itinary_name1[]" id="itinary_name1" class="form-control" placeholder="Itinary Name">
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-xs " >-</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>




            <div class="text-right">
                <button type="submit" class="btn btn-primary" style="margin-top: 5rem;"  id="submit">Add Another Trip<i class="icon-arrow-right14 position-right"></i></button>
                <button type="button" class="btn btn-primary" style="margin-top: 5rem;" id="addDayNow" onclick="addDayNow()" data-action="add">Add Day</button>
                <a href="{{route('admin.packege')}}" class=" btn btn-primary " style="margin-top: 5rem;">Done</a>
{{--                <button type="button" class="btn btn-link" id="submiting" style="display: none;">Processing <img src="{{ asset('ajaxloader.gif') }}" width="80px"></button>--}}
            </div>
        </form>

    </div>



@endsection
@push('js')

    <script src="{{asset('fontend/js/create.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/plugins/editors/summernote/summernote.min.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/demo_pages/editor_summernote.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/demo_pages/form_checkboxes_radios.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/plugins/notifications/sweet_alert.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/packege.js')}}"></script>
@endpush