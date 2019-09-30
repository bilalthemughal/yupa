$(document).ready(function(){
	$("button").click(function(){
		var getId = $(this).attr("id");
		var displayBtn1 = $("#add-itinerary-btn1");
		var displayBtn2 = $("#add-itinerary-btn2");

		if (getId == "edit-itinerary-btn1") {
			$(".itinerary-form1").addClass("itinerary-none1");
			$(".itinerary-none1").removeClass("itinerary-form1");
			$(".itinerary-none1").attr("readonly", false);
			$(this).attr("id", "done-edit1");
			$(this).text("Done");
			displayBtn1.css('display', 'block');			
			//change to display, block and display, none;

		} else if (getId == "done-edit1") {
			$(".itinerary-none1").addClass("itinerary-form1");
			$(".itinerary-form1").removeClass("itinerary-none1");
			$(".itinerary-form1").attr("readonly", true);
			$(this).attr("id", "edit-itinerary-btn1");
			$(this).text("Edit");
			displayBtn1.css('display', 'none');

		} else if (getId == "edit-itinerary-btn2") {
			$(".itinerary-form2").addClass("itinerary-none2");
			$(".itinerary-none2").removeClass("itinerary-form2");
			$(".itinerary-none2").attr("readonly", false);
			$(this).attr("id", "done-edit2");
			$(this).text("Done");
			displayBtn2.css('display', 'block');
			
		} else if (getId == "done-edit2") {
			$(".itinerary-none2").addClass("itinerary-form2");
			$(".itinerary-form2").removeClass("itinerary-none2");
			$(".itinerary-form2").attr("readonly", true);
			$(this).attr("id", "edit-itinerary-btn2");
			$(this).text("Edit");
			displayBtn2.css('display', 'none');

		} else if (getId == "add-itinerary-btn1") {
			
			var i;
			var a = 1;
			var time;
			var activity;
			for(i = 0; i < a; i++) {
				var activityId = "#activity1-" + i ;
				if($(activityId).length == 0) {
					//it doesn't exist
					time = "time1-" + i;
					activity = "activity1-" + i;

					var appendRow = "<div class='col-md-3'>" +
									"<input type='time' id='" + time + "' class='form-control form-control100 itinerary-none1' name='time1[]' />" +
									"</div>" +
									"<div class='col-md-9'>" +
									"<input type='text' id='" + activity + "' class='form-control form-control100 itinerary-none1' name='itinary_name1[]' />" +
									"</div>";
					$("#itinerary-container1").append(appendRow);
				}
				else {
					a += 1;

				}
			}
		} else if (getId == "add-itinerary-btn2") {
			
			var i;
			var a = 1;
			var time;
			var activity;
			for(i = 0; i < a; i++) {
				var activityId = "#activity2-" + i ;
				if($(activityId).length == 0) {
					//it doesn't exist
					timeid = "time2-" + i;
					timename = "time2[" + i + "]";
					activity = "activity2-" + i;
					activityname = "activity2[" + i + "]";

					var appendRow = "<div class='col-md-3'>" +
									"<input type='time' id='" + timeid + "' class='form-control form-control100 itinerary-none2' name='time2[]' />" +
									"</div>" +
									"<div class='col-md-9'>" +
									"<input type='text' id='" + activity + "' class='form-control form-control100 itinerary-none2' name='itinary_name2[]' />" +
									"</div>";
					$("#itinerary-container2").append(appendRow);
				}
				else {
					a += 1;

				}
			}
		}
	});
});

//show hidden div
function showDiv(divId) {
	// Get the checkbox
	var checkBox = document.getElementById(divId);
	if(divId == "two-way-pack") {
		// Get the output text
		var show = $("#package-details-container-two");
		var hide = $("#package-details-container-one");
		var hide1 = $("#package-details-container-three");
		$("#depart-date-txt").text("");
		$("#pack-quantity-txt").text("");
		$("#price-txt").text("");
		$("#total-price-txt").text("");
		$("#option-package-selected").text("");
		$("#package-op").text("");
		
	} else if(divId == "one-way-pack"){
		// Get the output text
		var show = $("#package-details-container-one");		
		var hide = $("#package-details-container-two");
		var hide1 = $("#package-details-container-three");
		$("#depart-date-txt").text("");
		$("#pack-quantity-txt").text("");
		$("#price-txt").text("");
		$("#total-price-txt").text("");
		$("#option-package-selected").text("");
		$("#package-op").text("");
	}

	else if(divId == "three-way-pack"){
		// Get the output text
		var show = $("#package-details-container-three");
		var hide = $("#package-details-container-two");
		var hide1 = $("#package-details-container-one");
		$("#depart-date-txt").text("");
		$("#pack-quantity-txt").text("");
		$("#price-txt").text("");
		$("#total-price-txt").text("");
		$("#option-package-selected").text("");
		$("#package-op").text("");
	}

	else if(divId == "four-way-pack"){
		// Get the output text
		var show = $("#package-details-container-four");
		var hide = $("#package-details-container-five");
		var hide1 = $("#package-details-container-six");
		$("#depart-date-txt").text("");
		$("#pack-quantity-txt").text("");
		$("#price-txt").text("");
		$("#total-price-txt").text("");
		$("#option-package-selected").text("");
		$("#package-op").text("");
	}
	else if(divId == "five-way-pack"){
		// Get the output text
		var show = $("#package-details-container-five");
		var hide = $("#package-details-container-four");
		var hide1 = $("#package-details-container-six");
		$("#depart-date-txt").text("");
		$("#pack-quantity-txt").text("");
		$("#price-txt").text("");
		$("#total-price-txt").text("");
		$("#option-package-selected").text("");
		$("#package-op").text("");
	}
	else if(divId == "six-way-pack"){
		// Get the output text
		var show = $("#package-details-container-six");
		var hide = $("#package-details-container-four");
		var hide1 = $("#package-details-container-five");
		$("#depart-date-txt").text("");
		$("#pack-quantity-txt").text("");
		$("#price-txt").text("");
		$("#total-price-txt").text("");
		$("#option-package-selected").text("");
		$("#package-op").text("");
	}
	else if(divId == "seven-way-pack"){
		// Get the output text
		var show = $("#package-details-container-seven");
		var hide = $("#package-details-container-eight");
		var hide1 = $("#package-details-container-nine");
		$("#depart-date-txt").text("");
		$("#pack-quantity-txt").text("");
		$("#price-txt").text("");
		$("#total-price-txt").text("");
		$("#option-package-selected").text("");
		$("#package-op").text("");
	}
	else if(divId == "eight-way-pack"){
		// Get the output text
		var show = $("#package-details-container-eight");
		var hide = $("#package-details-container-seven");
		var hide1 = $("#package-details-container-nine");
		$("#depart-date-txt").text("");
		$("#pack-quantity-txt").text("");
		$("#price-txt").text("");
		$("#total-price-txt").text("");
		$("#option-package-selected").text("");
		$("#package-op").text("");
	}
	else if(divId == "nine-way-pack"){
		// Get the output text
		var show = $("#package-details-container-nine");
		var hide = $("#package-details-container-seven");
		var hide1 = $("#package-details-container-eight");
		$("#depart-date-txt").text("");
		$("#pack-quantity-txt").text("");
		$("#price-txt").text("");
		$("#total-price-txt").text("");
		$("#option-package-selected").text("");
		$("#package-op").text("");
	}
	
	// If the checkbox is checked, display the output text
	if (checkBox.checked == true){
		show.css('display', 'block');
		hide.css('display', 'none');
		hide1.css('display', 'none');
		if(divId == "one-way-pack") {
			$("#two-way-pack"). prop("checked", false);
			$("#three-way-pack"). prop("checked", false);
			$("#option-package-selected").text("(Basic Day 1)");
		} else if(divId == "two-way-pack") {
			$("#one-way-pack"). prop("checked", false);
			$("#three-way-pack"). prop("checked", false);
			$("#option-package-selected").text("(Basic Day 2)");
		}
		else if(divId == "three-way-pack") {
			$("#one-way-pack"). prop("checked", false);
			$("#two-way-pack"). prop("checked", false);
			$("#option-package-selected").text("(Basic Day 3)");
		}
		else if(divId == "four-way-pack") {
			$("#five-way-pack"). prop("checked", false);
			$("#six-way-pack"). prop("checked", false);
			$("#option-package-selected").text("(Premium Day 1)");
		}
		else if(divId == "five-way-pack") {
			$("#four-way-pack"). prop("checked", false);
			$("#six-way-pack"). prop("checked", false);
			$("#option-package-selected").text("(Premium Day 2)");
		}
		else if(divId == "six-way-pack") {
			$("#four-way-pack"). prop("checked", false);
			$("#five-way-pack"). prop("checked", false);
			$("#option-package-selected").text("(Premium Day 3)");
		}
		else if(divId == "seven-way-pack") {
			$("#eight-way-pack"). prop("checked", false);
			$("#nine-way-pack"). prop("checked", false);
			$("#option-package-selected").text("(Gold Day 1)");
		}
		else if(divId == "eight-way-pack") {
			$("#seven-way-pack"). prop("checked", false);
			$("#nine-way-pack"). prop("checked", false);
			$("#option-package-selected").text("(Gold Day 2)");
		}
		else if(divId == "nine-way-pack") {
			$("#seven-way-pack"). prop("checked", false);
			$("#eight-way-pack"). prop("checked", false);
			$("#option-package-selected").text("(Gold Day 3)");
		}
	} else {
		show.css('display', 'none');
	}
}

//get element value and paste at div (order)
function getPackageDetail(getId) {
	var newgetId = "#";
	newgetId += getId;
	
	var val = $(newgetId).val();
	
	if(getId == "depart-date") {
		$("#depart-date-txt").text(val);
	} else if (getId == "pack-quantity") {
		var newq = "x";
		newq += val;
		
		var price = $("#price-package-select").val();
		var newprice = "RM ";
		newprice += price;
		
		var totalprice = parseInt(val) * parseInt(price);
		var newtotalprice = "RM ";
		newtotalprice += totalprice;
		
		var op = "One way package"
		
		$("#package-op").text(op);
		$("#pack-quantity-txt").text(newq);
		$("#price-txt").text(newprice);
		$("#total-price-txt").text(newtotalprice);
	}
}
function getPackageDetail2(getId) {
	var newgetId = "#";
	newgetId += getId;
	
	var val = $(newgetId).val();
	
	if(getId == "depart-date2") {
		$("#depart-date-txt").text(val);
	} else if (getId == "pack-quantity2") {
		var newq = "x";
		newq += val;
		
		var price = $("#price-package-select2").val();
		var newprice = "RM ";
		newprice += price;
		
		var totalprice = parseInt(val) * parseInt(price);
		var newtotalprice = "RM ";
		newtotalprice += totalprice;

		var op = "Two ways package"
		
		$("#package-op").text(op);
		$("#pack-quantity-txt").text(newq);
		$("#price-txt").text(newprice);
		$("#total-price-txt").text(newtotalprice);
	}
}
function getPackageDetail3(getId) {
	var newgetId = "#";
	newgetId += getId;

	var val = $(newgetId).val();

	if(getId == "depart-date3") {
		$("#depart-date-txt").text(val);
	} else if (getId == "pack-quantity3") {
		var newq = "x";
		newq += val;

		var price = $("#price-package-select3").val();
		var newprice = "RM ";
		newprice += price;

		var totalprice = parseInt(val) * parseInt(price);
		var newtotalprice = "RM ";
		newtotalprice += totalprice;

		var op = "Two ways package"

		$("#package-op").text(op);
		$("#pack-quantity-txt").text(newq);
		$("#price-txt").text(newprice);
		$("#total-price-txt").text(newtotalprice);
	}
}

function getPackageDetail4(getId) {
	var newgetId = "#";
	newgetId += getId;

	var val = $(newgetId).val();

	if(getId == "depart-date4") {
		$("#depart-date-txt").text(val);
	} else if (getId == "pack-quantity4") {
		var newq = "x";
		newq += val;

		var price = $("#price-package-select4").val();
		var newprice = "RM ";
		newprice += price;

		var totalprice = parseInt(val) * parseInt(price);
		var newtotalprice = "RM ";
		newtotalprice += totalprice;

		var op = "Two ways package"

		$("#package-op").text(op);
		$("#pack-quantity-txt").text(newq);
		$("#price-txt").text(newprice);
		$("#total-price-txt").text(newtotalprice);
	}
}
function getPackageDetail5(getId) {
	var newgetId = "#";
	newgetId += getId;

	var val = $(newgetId).val();

	if(getId == "depart-date5") {
		$("#depart-date-txt").text(val);
	} else if (getId == "pack-quantity5") {
		var newq = "x";
		newq += val;

		var price = $("#price-package-select5").val();
		var newprice = "RM ";
		newprice += price;

		var totalprice = parseInt(val) * parseInt(price);
		var newtotalprice = "RM ";
		newtotalprice += totalprice;

		var op = "Two ways package"

		$("#package-op").text(op);
		$("#pack-quantity-txt").text(newq);
		$("#price-txt").text(newprice);
		$("#total-price-txt").text(newtotalprice);
	}
}
function getPackageDetail6(getId) {
	var newgetId = "#";
	newgetId += getId;

	var val = $(newgetId).val();

	if(getId == "depart-date6") {
		$("#depart-date-txt").text(val);
	} else if (getId == "pack-quantity6") {
		var newq = "x";
		newq += val;

		var price = $("#price-package-select6").val();
		var newprice = "RM ";
		newprice += price;

		var totalprice = parseInt(val) * parseInt(price);
		var newtotalprice = "RM ";
		newtotalprice += totalprice;

		var op = "Two ways package"

		$("#package-op").text(op);
		$("#pack-quantity-txt").text(newq);
		$("#price-txt").text(newprice);
		$("#total-price-txt").text(newtotalprice);
	}
}
function getPackageDetail7(getId) {
	var newgetId = "#";
	newgetId += getId;

	var val = $(newgetId).val();

	if(getId == "depart-date7") {
		$("#depart-date-txt").text(val);
	} else if (getId == "pack-quantity7") {
		var newq = "x";
		newq += val;

		var price = $("#price-package-select7").val();
		var newprice = "RM ";
		newprice += price;

		var totalprice = parseInt(val) * parseInt(price);
		var newtotalprice = "RM ";
		newtotalprice += totalprice;

		var op = "Two ways package"

		$("#package-op").text(op);
		$("#pack-quantity-txt").text(newq);
		$("#price-txt").text(newprice);
		$("#total-price-txt").text(newtotalprice);
	}
}
function getPackageDetail8(getId) {
	var newgetId = "#";
	newgetId += getId;

	var val = $(newgetId).val();

	if(getId == "depart-date8") {
		$("#depart-date-txt").text(val);
	} else if (getId == "pack-quantity8") {
		var newq = "x";
		newq += val;

		var price = $("#price-package-select8").val();
		var newprice = "RM ";
		newprice += price;

		var totalprice = parseInt(val) * parseInt(price);
		var newtotalprice = "RM ";
		newtotalprice += totalprice;

		var op = "Two ways package"

		$("#package-op").text(op);
		$("#pack-quantity-txt").text(newq);
		$("#price-txt").text(newprice);
		$("#total-price-txt").text(newtotalprice);
	}
}
function getPackageDetail9(getId) {
	var newgetId = "#";
	newgetId += getId;

	var val = $(newgetId).val();

	if(getId == "depart-date9") {
		$("#depart-date-txt").text(val);
	} else if (getId == "pack-quantity9") {
		var newq = "x";
		newq += val;

		var price = $("#price-package-select9").val();
		var newprice = "RM ";
		newprice += price;

		var totalprice = parseInt(val) * parseInt(price);
		var newtotalprice = "RM ";
		newtotalprice += totalprice;

		var op = "Two ways package"

		$("#package-op").text(op);
		$("#pack-quantity-txt").text(newq);
		$("#price-txt").text(newprice);
		$("#total-price-txt").text(newtotalprice);
	}
}

$(document).on('click','#one-way-pack',function(){
  $("#depart-date2").removeAttr('required');
  $("#pack-quantity2").removeAttr('required');
	$("#depart-date3").removeAttr('required');
	$("#pack-quantity3").removeAttr('required');

});

$(document).on('click','#two-way-pack',function(){
  $("#depart-date").removeAttr('required');
  $("#pack-quantity").removeAttr('required');
	$("#depart-date3").removeAttr('required');
	$("#pack-quantity3").removeAttr('required');

});

$(document).on('click','#three-way-pack',function(){
	$("#depart-date").removeAttr('required');
	$("#pack-quantity").removeAttr('required');
	$("#depart-date2").removeAttr('required');
	$("#pack-quantity2").removeAttr('required');

});
$(document).on('click','#four-way-pack',function(){
	$("#depart-date5").removeAttr('required');
	$("#pack-quantity5").removeAttr('required');
	$("#depart-date6").removeAttr('required');
	$("#pack-quantity6").removeAttr('required');

});
$(document).on('click','#five-way-pack',function(){
	$("#depart-date4").removeAttr('required');
	$("#pack-quantity4").removeAttr('required');
	$("#depart-date6").removeAttr('required');
	$("#pack-quantity6").removeAttr('required');

});
$(document).on('click','#six-way-pack',function(){
	$("#depart-date4").removeAttr('required');
	$("#pack-quantity4").removeAttr('required');
	$("#depart-date5").removeAttr('required');
	$("#pack-quantity5").removeAttr('required');

});
			//Insert data

$(document).on('submit','#itinaryForm', function(e){
   e.preventDefault();
   $(".ajax_error").remove();
   var form = $(this).serialize();
   var url = $(this).attr('action');
              $.ajax({
              method:'POST',
              url: url,
              data :form,
              dateType: 'json',
              success: function(data){
                     if (data.success) {
                        toastr.success(data.message);
                        setTimeout(function(){

                      window.location.href=data.goto;
                      },2500);

                    }

                     else { 
                            const errors = data.message
                                // console.log(errors)
                            var i = 0;
                            $.each(errors, function(key, value) {
                                const first_item = Object.keys(errors)[i]
                                const message = errors[first_item][0]
                                $('#' + first_item).after('<div class="ajax_error" style="color:red">' + value + '</div');
                                 toastr.error(value);
                                i++;
                            });
                        }
               },
                error: function(data) {
                        var jsonValue = $.parseJSON(data.responseText);
                      toastr.error(jsonValue.message);
                      
                    }

            });
  });
//wishlist
$(document).on('click','.wishlist-btn',function(){
	var id =$(this).data('id');
	var url = $(this).data('url');
              $.ajax({
              method:'GET',
              url: url,
              data :{id:id},
              dateType: 'json',
              success: function(data){
                     if (data.status=='warning') {
                     	console.log(data.message);
                        toastr.warning(data.message);

                    }
                     if (data.status=='success') {
                     	console.log(data.message);
                        toastr.success(data.message);

                    }
                }
            });
});