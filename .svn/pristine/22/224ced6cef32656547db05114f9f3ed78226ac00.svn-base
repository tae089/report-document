$(document).ready(function(){
	//Enable Ajax loading animation
	ajaxloader('show');
	//Check All checkbox
	$("input.check-all").on("click", function(){
		if($(this).prop("checked") == true)
		{
			$("input[name='checked[]']").prop("checked", true);
		}else{
			$("input[name='checked[]']").prop("checked", false);
		}
	});
	
});
// ajaxloader
function ajaxloader(param){
	if(param == 'show'){
		$(document).ajaxStart(function () {
	        $(".ajax_loader").show();
	    }).ajaxStop(function () {
	        $(".ajax_loader").hide();
	    });
	}else{
		$(document).ajaxStart(function () {
	        $(".ajax_loader").hide();
	    }).ajaxStop(function () {
	        $(".ajax_loader").hide();
	    });
	}
}