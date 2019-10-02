function getBanner(){
    var req = $.ajax({
        type: "GET",
        url: "data.php",
		timeout: 0,
    });
	
	req.done(function(msg){
		$("#msg").html("<img src = 'img/banner.png' class='img-thumbnail rounded float-left' alt = 'banner'/>");
		//alert("done!");
	});
	
	req.fail(function(result){
		//$("#msg").html('<p>Please, wait!</p>');
		alert("fail!");
		//setTimeout("getBanner()", 60000);
	});
}

$(document).ready(getBanner());