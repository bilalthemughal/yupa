@extends('admin.layouts.master')

@section('pageTitle') Travelar @endsection

@section('page-header')

  <div class="page-header page-header-default">

    <div class="breadcrumb-line">

        <ul class="breadcrumb">

            <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>

            <li class="active">Traveler</li>

        </ul>

    </div>

</div>

@endsection

@section('content')

     <div class="panel panel-flat">

              <div class="panel-heading">

                    <h5 class="panel-title">Traveler

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

                                            <th>Name</th>

                                            <th>Email</th>

                                            <th>Phone</th>

                                            <th>Live In</th>

                                            <th>Status</th>

                                            <th>Admin Note</th>

                                            <th>Actions</th>

                         

                                          

                                    </tr>

                                </thead>

                               <tbody id="product_list">

                                @foreach ($travelars as $element)

                                   <tr>

                                   <td>{{$loop->index+1}}</td>

                                       <td>{{$element->first_name }} {{$element->last_name}}</td>

                                       <td>{{$element->email}}</td>

                                       <td>{{$element->phn_number}}</td>

                                       <td>{{$element->state}} <br>{{$element->country}}</td>

                                       <td>
                                           @if($element->status == 1)
                                               <span class="label label-success">Active</span>
                                           @elseif($element->status == 0)
                                               <span class="label label-danger">In Active</span>
                                               @endif
                                       </td>

                                       <td>{{$element->adminNote ? str_limit($element->adminNote,30) : ''}}</td>

                                       <td>
                                           <a href="{{route('admin.changeStatus', $element->id)}}" data-toggle="tooltip" data-placement="top" title="Alter Status" class="btn btn-warning btn-sm"><i class="fa fa-anchor"></i></a>
{{--                                           <a href="#" data-toggle="tooltip" data-placement="top" title="{{$element->adminNote ? 'Edit Note' : 'Add Note'}}"  class="btn btn-success btn-sm"><i class="fa fa-sticky-note"></i></a>--}}
                                           @if(!$element->adminNote)
                                           <span data-toggle="tooltip" data-placement="top" title="Add Note">
                                               <button onclick="initializa({{$element->id}})" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" >
                                               <i class="fa fa-sticky-note"></i>
                                               </button>
                                           </span>
                                           @else
                                           <span data-toggle="tooltip" data-placement="top" title="Edit Note">
                                               <button onClick="initializb( '{{$element->id}}'  , '{{$element->adminNote}}' )" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal1" >
                                               <i class="fa fa-sticky-note"></i>
                                               </button>
                                           </span>
                                           @endif
                                       </td>

                                     

                                   </tr>

                                @endforeach



                            </tbody>

               

                    </table>

                    </div>

                </div>

        </div>

     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Add Note</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                         <div class="row">
                             <div class="form-group col-md-12">
                                 <form action="{{route('admin.addNote')}}" method="post">
                                     {{csrf_field()}}
                                 <input type="hidden" value="" id="idValue" name="id">
                                 <input type="text" class="form-control" name="note">
                                 <input class="btn btn-primary mt-5" type="submit">
                                 </form>
                             </div>
                         </div>
                 </div>
             </div>
         </div>
     </div>

     <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Edit Note</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                         <div class="row">
                             <div class="form-group col-md-12">
                                 <form action="{{route('admin.editNote')}}" method="post">
                                     {{csrf_field()}}
                                 <input type="hidden" value="" id="idValue2" name="id">
                                 <input type="text" class="form-control" name="note" id="noteValue">
                                 <input class="btn btn-primary mt-5" type="submit">
                                 </form>
                             </div>
                         </div>
                 </div>
             </div>
         </div>
     </div>


@endsection

@section('extra-js')


    <script>
        function initializa(e)
        {
            document.getElementById("idValue").value = e;
        }

        function initializb(e, f){
            document.getElementById("idValue2").value = e;
            document.getElementById("noteValue").value = f;
        }

    </script>


    @endsection

@push('js')

 <script src="{{asset('backend/global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>

 <script src="{{asset('backend/global_assets/js/plugins/tables/datatables/extensions/buttons.min.js')}}"></script>

 <script src="{{asset('backend/global_assets/js/demo_pages/datatables_extension_buttons_init.js')}}"></script>



 <script src="{{asset('backend/global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>

    <script src="{{asset('backend/global_assets/js/demo_pages/form_checkboxes_radios.js')}}"></script>

    <script src="{{asset('backend/global_assets/js/plugins/notifications/sweet_alert.min.js')}}"></script>

    {{-- <script src="{{asset('backend/assets/js/packege.js')}}"></script> --}}

@endpush