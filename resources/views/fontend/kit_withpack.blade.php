@extends('fontend.layouts.master')

@section('pageTitle') travelkit @endsection

@push('css')

<link href="{{asset('fontend/css/toastr.min.css')}}" rel="stylesheet">

@endpush

@section('page-header')

		  

<!--         <img src="{{asset('fontend/images/bg8.jpg')}}" class="bg1"/>

        <div class="centered3 titleimg9">

            <h2>Travel Kit</h2>             

        </div> -->
<div class="bg2 overlay" style="background-image: url(https://yupa.asia/public/fontend/images/bg8.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 text-center">
                <h2><strong>Travel Kit</strong></h2>
                <!-- <p>Start your new adventure here</p> -->
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>

@endsection



@section('content')

    <div class="row bg-payment">

            <div id="content12">

                <form action="{{ route('packege-book-checkout') }}" method="post" id="travelkit">
                <input type="hidden" name="userpackege_id" value="{{$userpackege->id}}">

                @csrf

                    <div class="container">

                        <div class="row">

                            <div class="col-md-7 booking-order-details">

                                <div class="container-fluid">


                                    <div class="row">

                                        <div class="col-md-12">

                                            <label>Choose your favourite</label>

                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-3">

                                            <a id="phone-access" class="btn travel-kits-favourite" onclick="chooseCategory('phone-access')">Phone Accessories</a>

                                        </div>

                                        <div class="col-md-3">

                                            <a id="medical" class="btn travel-kits-favourite" onclick="chooseCategory('medical')">Medical</a>

                                        </div>

                                        <div class="col-md-3">

                                            <a id="toiletries" class="btn travel-kits-favourite" onclick="chooseCategory('toiletries')">Toiletries</a>

                                        </div>

                                        <div class="col-md-3">

                                            <a id="others" class="btn travel-kits-favourite" onclick="chooseCategory('others')">Others</a>

                                        </div>

                                    </div>

                                    <div id="container-phone-access" class="row">

                                        <div class="col-md-12">

                                            <table style="width: 100%;">

                                            @foreach ($phones as $p=> $phn)

                                                 

                                                   

                                    <tr>

                                    <td class="col-chk"><input type="checkbox" id="pha{{$p+1}}" class="chk-travel-kits" name="pha[]" value="{{$phn->id}}" /></td>

                                    <td class="col-name"><span id="name-pha{{$p+1}}">{{$phn->name}}</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RM </span><span id="price-pha{{$p+1}}">{{$phn->price}}</span><span>/unit</span>

                                    <input type="hidden" name="price[]" value="{{$phn->price}}">

                                    </td>

                                    <td class="flt-right">

                                        <div class="input-group">

                                            <input type="button" value="-" class="button-minus button-pha{{$p+1}}" data-field="quantity-pha{{$p+1}}" />

                                            <input type="number" id="quantity-pha{{$p+1}}" name="quantity[]" class="quantity-field" step="1" min="1" max="20" value="1" readonly />

                                            <input type="button" value="+" class="button-plus button-pha{{$p+1}}" data-field="quantity-pha{{$p+1}}"/>

                                        </div>

                                    </td>

                                    </tr>

                                     @endforeach

                 

                                    </table>

                                        </div>

                                    </div>

                                    <div id="container-medical" class="row">

                                        <div class="col-md-12">

                                    <table style="width: 100%;">

                                    @foreach ($medicals as $m=> $medi)

                                        {{-- expr --}}

                                   

                                <tr>

                                <td class="col-chk"><input type="checkbox" id="medic{{$m+1}}" class="chk-travel-kits" name="pha[]" value="1" /></td>

                                <td class="col-name"><span id="name-medic{{$m+1}}">{{$medi->name}}</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RM </span><span id="price-medic{{$m+1}}">{{$medi->price}}</span><span>/unit</span>

                                <input type="hidden" name="price[]" value="{{$medi->price}}">

                                </td>

                                <td class="flt-right">

                                    <div class="input-group">

                                        <input type="button" value="-" class="button-minus button-medic{{$m+1}}" data-field="quantity-medic{{$m+1}}" />

                                        <input type="number" id="quantity-medic{{$m+1}}" name="quantity[]" class="quantity-field" step="1" min="1" max="20" value="1" readonly />

                                        <input type="button" value="+" class="button-plus button-medic{{$m+1}}" data-field="quantity-medic{{$m+1}}"/>

                                        </div>

                                    </td>

                                    </tr>

                                 @endforeach

                                     

                                </table>

                            </div>

                            </div>

                              <div id="container-toiletries" class="row">
                                        <div class="col-md-12">
                                            <table style="width: 100%;">
                                                  @foreach ($toiletries as $t=> $tot)
                                                    <tr>
                                                        <td class="col-chk"><input type="checkbox" id="toilet{{$t}}" class="chk-travel-kits" name="toilet[{{$t}}]" value="1" /></td>
                                                        <td class="col-name"><span id="name-toilet{{$t}}">{{$tot->name}}</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RM </span><span id="price-toilet{{$t}}">{{$tot->price}}</span><span>/unit</span></td>
                                                        <td class="flt-right">
                                                            <div class="input-group">
                                                                <input type="button" value="-" class="button-minus button-toilet{{$t}}" data-field="quantity-toilet{{$t}}" />
                                                                <input type="number" id="quantity-toilet{{$t}}" name="quantity-toilet{{$t}}" class="quantity-field" step="1" min="1" max="20" value="1" readonly />
                                                                <input type="button" value="+" class="button-plus button-toilet{{$t}}" data-field="quantity-toilet{{$t}}"/>
                                                            </div>
                                                        </td>
                                                    </tr>
                                              @endforeach
                                            </table>
                                        </div>
                                    </div>

                            <div id="container-others" class="row">

                             <div class="col-md-12">

                              <table style="width: 100%;">

                                 @foreach ($others as $o => $other)   

                                <tr>

                                <td class="col-chk"><input type="checkbox" id="pha{{$o+1}}" class="chk-travel-kits" name="pha[1]" value="1" /></td>

                                <td class="col-name"><span id="name-pha{{$o+1}}">{{$other->name}}</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RM </span><span id="price-pha{{$o+1}}">{{$other->price}}</span><span>/unit</span>

                                <input type="hidden" name="price[]" value="{{$other->price}}">

                                </td>

                                <td class="flt-right">

                                    <div class="input-group">

                                        <input type="button" value="-" class="button-minus button-pha{{$o+1}}" data-field="quantity-pha{{$o+1}}" />

                                        <input type="number" id="quantity-pha{{$o+1}}" name="quantity[]" class="quantity-field" step="1" min="1" max="20" value="1" readonly />

                                        <input type="button" value="+" class="button-plus button-pha{{$o+1}}" data-field="quantity-pha{{$o+1}}"/>

                                    </div>

                                    </td>

                                </tr>

                            @endforeach  

         

                            </table>

                            </div>

                            </div>

                          

                        </div>

                        </div>

                    <div class="col-md-1"></div>

                    <div class="col-md-4">

                        <div class="row">                               

                            <div class="col-md-12 booking-price-container">

                                <div class="col-md-12" style="padding-bottom: 5px;">

                                    <img src="{{asset('fontend/images/question-mark.png')}}" /><label>&nbsp;Order Details</label>

                                </div>

                                <div class="col-md-12">

                                    <p>Order details</p>

                                </div>

                                <div class="col-md-12">

                                    <div class="order-details">
                                     
                            
                                      <input type="hidden" name="pack_price" id="pack_price" value="{{$userpackege->total}}">

                                        <table id="order-listing" style="width: 100%;">
                                        <tr style="color: blue">
                                        <td>
                                         {{$userpackege->packege->name}}   
                                        </td>
                                        <td>
                                        {{$userpackege->price}} 
                                            X{{$userpackege->pack_quantity}}
                                        </td>
                                         <td class='flt-right'>
                                           {{$userpackege->total}} 
                                         </td>
                                        </tr>                                                              

                                        </table>

                                    </div>

                                </div>

                                <div class="col-md-12" style="padding-bottom: 10px;">

                                    <div class="order-total-prices">

                                        <span>Total</span>

                                        <span id="total-price" class="align-right-col flt-right">{{$userpackege->total}}</span><span class="align-right-col flt-right">RM&nbsp;</span>

                                        <input type="hidden" name="total_price" id="hidden_price" value="{{$userpackege->total}}">

                                    </div>

                                </div>

                                <div class="col-md-12" style="padding-bottom: 10px;">

                                    <input type="submit" class="btn btn-info form-control100" name="check-out-btn" value="Checkout" />

                                </div>

                            </div>

                        </div>

                        <br>

                        <div class="row">

                            <div class="col-md-12">

                                <a class="skip-travel-kits flt-right"> Skip, if you are not sure yet</a>

                            </div>

                        </div>

                    </div>                      

                </div>

                <br>

            </div>

         </form>

      </div>

    </div>	

    



@endsection



@push('js')

<script src="{{asset('fontend/js/toastr.min.js')}}"></script>

<script type="text/javascript" src="{{asset('fontend/js/main.js')}}"></script>

<script>

    @if ($errors->any())

            @foreach ($errors->all() as $error)

                toastr.error('{{$error}}');

            @endforeach

    @endif



    @if(session('msg'))

    toastr.warning('{{session('msg')}}');

    @endif



    @if(session('emsg'))

    toastr.warning('{{session('emsg')}}');

    @endif

</script>
 <script>
     $(document).ready(function(){
    $(".button-plus").attr("disabled","disabled");
    $(".button-minus").attr("disabled","disabled");
    $('input[type="checkbox"]').on('change',function(){
        var getId = $(this).attr("id");
        console.log(getId);
        var quantityId = "#quantity-" + getId;
        var buttonId = ".button-" + getId;
        var listRowId = "row-" + getId;
        var inputId = "input[id='" + getId + "']";
        var quantitytxtId = "quantity-" + getId + "-txt";
        var itemNameId = "#name-" + getId;
        var priceId = "#price-" + getId;    
        var current = $(this);
        var curPrice = parseFloat(current.parent().next().find('span').eq(2).text());
        console.log(curPrice);
        var priceItem = curPrice;//$(priceId).text();
        var itemName = current.parent().next().find('span').eq(0).text();//$(itemNameId).text();
        var newPriceItem = "RM " + priceItem;       
        var quantity = $(quantityId).val();
        var pack_price =$("#pack_price").val();
        var newQuantity = "x" +quantity;
        if($(this).is(":checked")) {
            $(quantityId).removeAttr("disabled");
            $(buttonId).removeAttr("disabled");
            var appendedText = "<tr id='" + listRowId + "'>" + 
                                    "<td>" + itemName + "</td>" + 
                                    "<td id='" + quantitytxtId + "'>" + newQuantity + "</td>" +
                                    "<td class='flt-right'>" + newPriceItem + "</td>" +
                                "</tr>";
            $("#order-listing").append(appendedText);
            var currentTotalPrice = $("#total-price").text();
            priceItem = parseFloat(priceItem) * parseFloat(quantity);
            var newTotalPrice = parseFloat(currentTotalPrice) + parseFloat(priceItem);          
            $("#total-price").text(newTotalPrice.toFixed(2));
            $("#hidden_price").val(newTotalPrice.toFixed(2));
        } else {
            $(quantityId).attr("disabled","disabled");
            $(buttonId).attr("disabled","disabled");
            var rowDelete = "#" + listRowId;                    
            $(rowDelete).remove();
            var minusTotalPrice = $("#total-price").text();
            var minusPriceItem = parseFloat(priceItem) * quantity;
            var latestTotalPrice = parseFloat(minusTotalPrice) - parseFloat(minusPriceItem);
            $("#total-price").text(latestTotalPrice.toFixed(2));
            $("#hidden_price").val(latestTotalPrice.toFixed(2));
        }
    });
    $('input[type="button"]').click(function(){
        var getIdTxt = $(this).attr("class");
        var newGetIdTxt = getIdTxt.split(" ");
        var splitIdTxt = newGetIdTxt[1].split("-");
        var IdTxt = splitIdTxt[1];
        
        var inputQuantityId = "#quantity-" + IdTxt;
        var checkQuantity = $(inputQuantityId).val();
        
        var quantity = $(inputQuantityId).val();
        var newQuantityId = "#quantity-" +IdTxt + "-txt" ;      
        var priceId = "#price-" + IdTxt;
        
        var priceItem = $(priceId).text();
        var currentTotalPrice = $("#total-price").text();
        var newTotalPriceItem = currentTotalPrice;
        
        if (newGetIdTxt[0] == "button-plus") {
            quantity = parseInt(quantity) + 1;
            if(quantity < 21 ) {
                newTotalPriceItem = parseFloat(newTotalPriceItem) + parseFloat(priceItem);
            } else {
                quantity = 1;
            }
        } else if (newGetIdTxt[0] == "button-minus") {
            quantity = parseInt(quantity) - 1;
            
            if(quantity > 0 ) {
                newTotalPriceItem = parseFloat(newTotalPriceItem) - parseFloat(priceItem);
            } else {
                quantity = 1;
            }
        }
        
        var newQuantity = "x" + quantity;
        $(newQuantityId).text(newQuantity);
        
        $("#total-price").text(newTotalPriceItem.toFixed(2));
        $("#hidden_price").val(newTotalPriceItem.toFixed(2));

        
    });
});
function chooseCategory(chosenId) {
    if(chosenId == "phone-access") {
        $("#container-phone-access").css("display", "block");
        $("#container-medical").css("display", "none");
        $("#container-toiletries").css("display", "none");
        $("#container-others").css("display", "none");
    } else if (chosenId == "medical") {
        $("#container-phone-access").css("display", "none");
        $("#container-medical").css("display", "block");
        $("#container-toiletries").css("display", "none");
        $("#container-others").css("display", "none");      
    } else if(chosenId == "toiletries") {
        $("#container-phone-access").css("display", "none");
        $("#container-medical").css("display", "none");
        $("#container-toiletries").css("display", "block");
        $("#container-others").css("display", "none");      
    } else if(chosenId == "others") {
        $("#container-phone-access").css("display", "none");
        $("#container-medical").css("display", "none");
        $("#container-toiletries").css("display", "none");
        $("#container-others").css("display", "block");
    }
}
 </script>
@endpush