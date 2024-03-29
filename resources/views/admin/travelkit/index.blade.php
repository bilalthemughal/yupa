@extends('admin.layouts.master')

@section('pageTitle') Travelkit @endsection

@section('page-header')

  <div class="page-header page-header-default">

    <div class="breadcrumb-line">

        <ul class="breadcrumb">

            <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>

            <li class="active">Travel Kit</li>

        </ul>

    </div>

</div>

@endsection

@section('content')

     <div class="panel panel-flat">

              <div class="panel-heading">

                    <h5 class="panel-title">Travel Kit

                     <a href="{{ route('admin.travelkit.create') }}" class="btn btn-info"><i class="icon-stack-plus mr-2"></i>Create</a>

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

                                            <th>Kit Type</th>

                                            <th>Kit Name</th>

                                            <th>Price (RM)</th>

                                            <th>Quantity</th>

                                            <th>Action</th>

                                          

                                    </tr>

                                </thead>

                               <tbody id="product_list">

                                @foreach ($kits as $element)

                                   <tr>

                                   <td>{{$loop->index+1}}</td>

                                       <td>{{$element->type}}</td>

                                       <td>{{$element->name}}</td>

                                       <td>{{$element->price}}</td>

                                       <td>{{$element->quantity}}</td>

                                       <td>

                                       <a href="{{ route('admin.travelkit.edit',$element->id) }}" class="btn btn-success">

                                         <i class=" icon-pencil5"></i>Edit

                                       </a>

                                            <a href="#" id="delete_item" data-id="{{$element->id}}" data-url="{{ route('admin.travelkit.delete',$element->id) }}" class="btn btn-danger"><i class="  icon-trash"></i>Delete</a>

                                       </td>



                                   </tr>

                                @endforeach



                            </tbody>

               

                    </table>

                    </div>

                </div>

        </div>



  {{--  --}}



@endsection

@push('js')

 <script src="{{asset('backend/global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>

 <script src="{{asset('backend/global_assets/js/plugins/tables/datatables/extensions/buttons.min.js')}}"></script>

 <script src="{{asset('backend/global_assets/js/demo_pages/datatables_extension_buttons_init.js')}}"></script>



 <script src="{{asset('backend/global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>

    <script src="{{asset('backend/global_assets/js/demo_pages/form_checkboxes_radios.js')}}"></script>

    <script src="{{asset('backend/global_assets/js/plugins/notifications/sweet_alert.min.js')}}"></script>

    <script src="{{asset('backend/assets/js/travelkit.js')}}"></script>

@endpush