@extends('admin.layouts.master')
@section('pageTitle') Host @endsection
@section('page-header')
<div class="page-header page-header-default">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">Host</li>
        </ul>
    </div>
</div>
@endsection
@section('content')
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Host
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
        <div class="table-responsive">
            <table class="table datatable-button-init-basic">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Document</th>
                        <th>Applicant Name </th>
                        <th>Eamil</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="product_list">
                    @foreach ($host as $element)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td><img class="img-responsive img-thumbnail" src="{{asset('/storage/host/file/'.$element->file)}}" alt="" width="120px"></td>
                        <td>{{$element->user->name}}</td>
                        <td>
                            {{$element->email}}
                        </td>

                         <td>
                            {{$element->phone}}
                        </td>
                         <td>
                            {{$element->address}}
                        </td>
                          <td>
                           @if ($element->status =='pending')
                           <span class="label label-danger">Pending</span>
                           @else
                           <span class="label label-success">Approved</span>
                           @endif
                        </td>
                        <td>
                            <button data-url ="{{ route('admin.host.approve',$element->id) }}" class="btn btn-info" id="approve"><i class=" icon-pencil5"></i>Approve</button>
                            <a href="#" id="delete_item" data-id="{{$element->id}}" data-url="{{ route('admin.host.reject',$element->id) }}" class="btn btn-danger"><i class="  icon-trash"></i>Reject</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
@push('js')
<script src="{{asset('backend/global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('backend/global_assets/js/plugins/tables/datatables/extensions/buttons.min.js')}}"></script>
<script src="{{asset('backend/global_assets/js/demo_pages/datatables_extension_buttons_init.js')}}"></script>
<script src="{{asset('backend/global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
<script src="{{asset('backend/global_assets/js/demo_pages/form_checkboxes_radios.js')}}"></script>
<script src="{{asset('backend/global_assets/js/plugins/notifications/sweet_alert.min.js')}}"></script>
<script src="{{asset('backend/assets/js/host.js')}}"></script>
@endpush