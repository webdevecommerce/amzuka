$( document ).ready( function() {
	// Handle child category
	// --------------------------------------------------
	$( '#isChild' ).on('click',toggleSubCat );
	$( '#isChild_sub' ).on('click',toggleSubCat );
	
	$( '#editBtn' ).on('click',toggleEditGroup );
	
	$( '#editBtnPrd' ).on('click',toggleEditGroupPrd );
});

//
// Handle is Edit Cat Group
// --------------------------------------------------

function toggleEditGroup() {
	$("#edit").toggle();
	if($("#catH").val()==0){
		$("#catH").val(1)
		$( '#editBtn' ).html('Cancel');
	}else{
		$("#catH").val(0)
		$( '#editBtn' ).html('Edit');
	}	
}

function toggleEditGroupPrd() {
	$("#edit").toggle();
	if($("#catH").val()==0){
		$("#catH").val(1)
		$( '#editBtnPrd' ).html('Cancel');
		$( '#parent-0' ).attr('required','required');
	}else{
		$("#catH").val(0)
		$( '#editBtnPrd' ).html('Edit');
		$( '#parent-0' ).attr('required','');
	}	
	$("#catList").toggle();
	$("#catListErr").toggle();
}

//
// Handle is child category
// --------------------------------------------------

function toggleSubCat() {
	$("#catGroup").toggle();	
	$("#filterGroup").toggle();
}

//
// Handle child category
// --------------------------------------------------

function getServices(parent) {
	// Send ajax request and get child category
	var parentpos = $(".cat-ddl").length;
	var cats = $(".cat-ddl").last().val();
	if(cats!=''){		
		$.ajax( {
				url: 'host/categories/get_child_category',
				type: 'post',
				dataType: 'json',
				data: {'category_id':cats,'parentPos':parentpos},
				success: function( msg ) {
					if(msg.status==1){
						$("#parent-"+parent).nextAll("select.cat-ddl").remove();
						$("#catList").append(msg.response);
					}else{
						$("#parent-"+parent).nextAll("select.cat-ddl").remove();
					}
				}
		} );
	}else{
		$("#parent-"+parent).nextAll("select.cat-ddl").remove();
	}
}

//
// Handle child category
// --------------------------------------------------

function getServicesPrd(parent) {
	// Send ajax request and get child category
	var parentpos = $(".cat-ddl").length;
	var cats = $(".cat-ddl").last().val();
	if(cats!=''){		
		$.ajax( {
				url: 'admin/product/get_category',
				type: 'post',
				dataType: 'json',
				data: {'category_id':cats,'parentPos':parentpos},
				success: function( msg ) {
					if(msg.status==1){
						$("#parent-"+parent).nextAll("select.cat-ddl").remove();
						$("#catList").append(msg.response);
					}else{
						$("#parent-"+parent).nextAll("select.cat-ddl").remove();
					}
				}
		} );
	}else{
		$("#parent-"+parent).nextAll("select.cat-ddl").remove();
	}
}

//
// Handle Plan Duration
// --------------------------------------------------

function planduration() {
	var plan_duration_type = $("#plan_duration_type").val();
	if(plan_duration_type=='' || plan_duration_type=='lifetime'){
		$("#plan_duration").hide();
	}else{
		$("#plan_duration").show();
	}
}

$('#validity_from_date').daterangepicker({
	singleDatePicker: true,
	showDropdowns: true,
	minDate: new Date(),
	//maxDate: new Date(),
	singleClasses: "picker_2",
	locale: {
		format: 'YYYY-MM-DD'
	}
}, function(start, end, label) {
	//console.log(start.toISOString(), end.toISOString(), label);
});
$('#validity_to_date').daterangepicker({
	singleDatePicker: true,
	showDropdowns: true,
	minDate: new Date(),
	//maxDate: new Date(),
	singleClasses: "picker_2",
	locale: {
		format: 'YYYY-MM-DD'
	}
}, function(start, end, label) {
	//console.log(start.toISOString(), end.toISOString(), label);
});