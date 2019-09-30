@extends('admin.layouts.master')

@section('pageTitle') Booking Package @endsection

@section('page-header')

<div class="page-header page-header-default">

  <div class="breadcrumb-line">

    <ul class="breadcrumb">

      <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>

      <li class="active">Package booking</li>

    </ul>

  </div>

</div>

@endsection

@section('content')

<div class="panel panel-flat">

  <div class="panel-heading">

    <h5 class="panel-title">Package Booking

    </h5>

  </div>

  <div class="panel-body">

    <div class="table-responsive">

      <table class="table datatable-button-init-basic">

        <thead>

          <tr>



            <th>SL</th>

            <th>Traveler name</th>

            <th>Package Name</th>

            <th>Destination Name</th>

            <th>Payment Status</th>

            <th>Booking Date</th>

            <th>Action</th>



          </tr>

        </thead>

        <tbody id="product_list">

          @foreach ($userpackege as $element)

          <tr>

            <td>{{$loop->index+1}}</td>

            <td>{{$element->user->name}}</td>

            <td>{{$element->packege->name}}</td>

            <td>{{$element->packege->destination->name}}</td>

            <td>

              @if ($element->status==0)

               <span class="label label-danger">Pending</span>

               @else

               <span class="label label-success">Complete</span>

              @endif

            </td>

            <td>{{$element->date}}</td>

            <td>

              <a href="{{ route('admin.packege.booking.details',['book'=>$element->id,'packege'=>$element->packege->id]) }}" class="btn btn-success"  ><i class=" icon-eye8"></i>View</a>

         

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

<script src="{{asset('backend/assets/js/packege.js')}}"></script>

@endpush