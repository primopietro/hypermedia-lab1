//Variables
var ajaxPath = "http://localhost/hypermedia-lab1/Lab1/";

//Prevent defaults
$("form").submit(function(e){
    e.preventDefault();
});

// Login
$(document).on("click", "#signIn", function() {
	var email = $("#email").val();
	var password = $("#password").val();
	var data = "email=" + email + "&password=" + password;
  
	$.ajax({
		url : ajaxPath + "AJAX/login.php",
		data : data,
		type: 'POST',
		beforeSend : function() { enableLoader() ;
			console.log("login started");
			// Disable all btns
			$("button").addClass('disabled');
		}
	}).done(function(data) {
		if (data == "success") {
			// AJAX request get new body content and header
			console.log(" login success");
			
			
			//Get new body
			getBody();
			//Get new header
			getHeader();
			
		} else {
			// error message
			console.log(" login failed");
		}

	}).always(function() { disableLoader();
		// enable all btns
		$("button").removeClass("disabled");
		console.log(" login finished");
	});

});


//Click on signUp button
$(document).on("click", "#signUp", function() {

	$.ajax({
		url : ajaxPath + "components/body/register/register.php",
		beforeSend : function() { enableLoader() ;
			console.log("getting new body started");
		}
	}).done(function(data) {
		console.log(" getting new body success");
		$("#mainContent").html(data);
		
	}).always(function() { disableLoader();
		console.log(" getting new body finished");
	});
});


//logout
$(document).on("click", "#logout", function() {
	
  
	$.ajax({
		url : ajaxPath + "AJAX/logout.php",
		beforeSend : function() { enableLoader() ;
			console.log("logout started");
			// Disable all btns
			$("button").addClass('disabled');
		}
	}).done(function(data) {
		if (data == "1") {
			// AJAX request get new body content and header
			console.log(" logout success");
			
			
			//Get new body
			getBody();
			//Get new header
			getHeader();
			
		} else {
			// error message
			console.log(" logout failed");
		}

	}).always(function() { disableLoader();
		// enable all btns
		$("button").removeClass("disabled");
		console.log(" logout finished");
	});

});


//Menu links
$(document).on("click",".dropdown.user.user-menu",function(){
	if(!$(this).hasClass("active") && !$(this).hasClass('logout')){
		$(".dropdown.user.user-menu").removeClass("active");
		$(this).addClass("active");
		var link = $(this).attr("shopLink");
		$.ajax({
			url : ajaxPath + "components/body/"+link+".php",
			beforeSend : function() { enableLoader() ;
				console.log("getting new body started");
			}
		}).done(function(data) {
			console.log(" getting new body success");
			$("#mainContent").html(data);
			
		}).always(function() { disableLoader();
			console.log(" getting new body finished");
		});
	}
});

//Add promotion event click
$(document).on("click","#addPromotion",function(){
	$.ajax({
		url : ajaxPath + "components/body/modal/addPromotion.php",
		beforeSend : function() { enableLoader() ;
			console.log("getting promotion modal started");
		}
	}).done(function(data) {
		console.log(" getting  promotion modal success");
		  $("#addPromotion").closest("section").append(data);
		  $("#getCodeModal").modal('show');
	}).always(function() { disableLoader();
		console.log(" getting  promotion modalfinished");
	});
	
	
});

//Add promotion event click
$(document).on("click",".addPromotionService",function(){
	var idObject = $(this).attr("idobject");
	$.ajax({
		url : ajaxPath + "components/body/modal/addPromotionService.php?idobj="+idObject,
		beforeSend : function() { enableLoader() ;
			console.log("getting promotion modal started");
		}
	}).done(function(data) {
		console.log(" getting  promotion modal success");
		  $("body").append(data);
		  $("#getCodeModal").modal('show');
	}).always(function() { disableLoader();
		console.log(" getting  promotion modalfinished");
	});
	
});

$(document).on("change","#aPromotion",function(e){
var newIndex = $("#aPromotion")[0].selectedIndex +1;
var selected = $("#aPromotion option:nth-child("+newIndex+")");
	$("#promoValue").html(selected.attr("valuePromo")+"%");
});
//Add promotion
$(document).on("click","#addPromotionBD",function(){
	var selectedIndex=$("#aPromotion")[0].selectedIndex +1;
	var promoID = $("#aPromotion option:nth-child("+selectedIndex+")").attr("idobj");
	var data="idService="+$(this).attr("idobj")+"&code="+$("#codePromotion").val()+"&idPromotion="+promoID+"&date_debut="+$("#date_debut").val()+"&date_fin="+$("#date_fin").val();

	
	$.ajax({
		url : ajaxPath + "AJAX/addPromotionService.php",
		data:data,
		beforeSend : function() { enableLoader() ;
		
		}
	}).done(function(data) {
		console.log(" getting response add promotion to service success");
		if(data=="success"){
			
			getBody();
			$("#getCodeModal").modal('hide');
		}
		
	}).always(function() { disableLoader();
	
		console.log(" getting response add promotion to service finished");
	});
});



//Get new header
function getHeader(){
	$.ajax({
		url : ajaxPath + "components/header/header.php",
		beforeSend : function() { enableLoader() ;
			console.log("getting new header started");
		}
	}).done(function(data) {
		console.log(" getting new header success");
		$("header").html(data);
		
	}).always(function() { disableLoader();
		console.log(" getting new header finished");
	});
}



//Get new body
function getBody(){
	$.ajax({
		url : ajaxPath + "components/body/body.php",
		beforeSend : function() { enableLoader() ;
			console.log("getting new body started");
		}
	}).done(function(data) {
		console.log(" getting new body success");
		$("#mainContent").html(data);
		
	}).always(function() { disableLoader();
		console.log(" getting new body finished");
	});
}

// Enable loader
function enableLoader() {
	$("#loader-3").css("display", "table");
}

// Disable loader
function disableLoader() {
	$("#loader-3").css("display", "none");
} 
