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
@endsection
@section('content')
    @include('includes.tiny')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Package
                <a href="{{ route('admin.packege') }}" class="btn btn-info"><i class="icon-stack-plus mr-2"></i> View</a>
            </h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>
        <div class="panel-body">
            <form role="form" action="{{ route('admin.packege.store') }}" method="post" enctype="multipart/form-data" id="addForm">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Package Name:</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Packege Name">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Duration (Hours):</label>
                            <input type="text" name="duration" id="duration" class="form-control" placeholder="Duration">

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Destination:</label>
                            <select name="destination_id" id="destination_id" class="form-control select">
                                @foreach ($destination as $element)
                                    <option value="{{$element->id}}">{{$element->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Photo *</label>
                            <input type="file" name="photo" id="photo" >

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Banner *</label>
                            <input type="file" name="banner" id="banner" >

                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <img height="250px" width="250px" src="" id="img1" alt="">
                    </div>
                    <div class="col-md-6">
                        <img height="250px" width="250px" src="" id="img2" alt="">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label>Short Description:</label>
                            <textarea rows="5" cols="5" class="form-control Tiny" name="description" id="description" placeholder="Short Description" style="resize: none;"></textarea>
                        </div>
                    </div>

                    <div class="col-md-12">

                        <div class="form-group">
                            <label>Inclusive Of:</label>
                            <textarea rows="5" cols="5" class="form-control Tiny" name="inclusive_of" id="inclusive_of" style="resize: none;"></textarea>
                        </div>
                    </div>

                    <div class="col-md-12">

                        <div class="form-group">
                            <label>Not Inclusive Of:</label>
                            <textarea rows="5" cols="5" class="form-control Tiny" name="not_inclusive_of" id="not_inclusive_of"  style="resize: none;"></textarea>
                        </div>
                    </div>

                    <div class="col-md-12">

                        <div class="form-group">
                            <label>Booking Info:</label>
                            <textarea rows="5" cols="5" class="form-control Tiny" name="booking_info" id="booking_info"  style="resize: none;"></textarea>
                        </div>
                    </div>

                    <div class="col-md-12">

                        <div class="form-group">
                            <label>location(IFrame):</label>
                            <textarea rows="5" cols="5" class="form-control " name="location" id="location" style="resize: none;"></textarea>
                            <small style="color:red"><a href="https://www.embedgooglemap.net/"target="_blank">click here </a> copy iframe code and paste it</small>
                        </div>
                    </div>

                    <div class="col-md-12">

                        <div class="form-group">
                            <label>Policy:</label>
                            <textarea rows="5" cols="5" class="form-control Tiny" name="policy" id="policy"  style="resize: none;"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h4>SEO Information</h4>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Meta Title:</label>
                            <input type="text" name="meta_title" id="meta_title" class="form-control" placeholder="Meta Title">

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Meta Keywords:</label>
                            <input type="text" name="meta_keywords" id="meta_keywords" class="form-control">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Meta Description:</label>
                            <textarea rows="5" cols="5" class="form-control " name="meta_description" id="meta_description" style="resize: none;"></textarea>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary"  id="submit">Create Package<i class="icon-arrow-right14 position-right"></i></button>
                    <button type="button" class="btn btn-link" id="submiting" style="display: none;">Processing <img src="{{ asset('ajaxloader.gif') }}" width="80px"></button>
                </div>
            </form>
        </div>
    </div>
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








