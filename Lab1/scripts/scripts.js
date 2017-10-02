//Variables
var ajaxPath = "http://localhost/hypermedia-lab1/Lab1/";

//Prevent defaults
$("form").submit(function(e){
    e.preventDefault();
});
//Add promotion to all
$(document).on("click","#addPromotionAll",function(){
	var idobj = $(this).attr("idobj");
	var dateDebut = $("#date_debutNew").val();
	var dateFin = $("#date_finNew").val();
	var code = $("#codePromotionNew").val();
	var data = "id="+idobj+"&date_debut="+dateDebut+"&date_fin="+dateFin+"&code="+code;
	$.ajax({
		url : ajaxPath + "AJAX/applyServiceToAll.php",
		data:data,
		type:'POST',
		beforeSend : function() { enableLoader() ;
			console.log("update  started");
		}
	}).done(function(data) {
		console.log("update  success");
		
	}).always(function() { disableLoader();
		console.log(" update  finished");
		getHeader();
		getBody();
		$(".modal-backdrop.fade.in").remove();
		$("body").removeClass("modal-open");
	});
});

$(document).on("click","#addAllPromotions",function(){
	var idobj=$(this).attr("idobj");
	var data ="id="+idobj;
	$.ajax({
		url : ajaxPath + "components/body/modal/addPromotionServiceAll.php",
		data:data,
		type:'POST',
		beforeSend : function() { enableLoader() ;
			console.log("getting promotion modal started");

			 $("#getCodeModal").remove();
		}
	}).done(function(data) {

		console.log(" getting  promotion modal success");
		
		$("#addPromotion").closest("section").append(data);
		  $("#getCodeModal").modal('show');
	}).always(function() { disableLoader();
		console.log(" getting  promotion modalfinished");
	});
});

//Action handler for update and delete
$(document).on("click",".action",function(){
	var action = $(this).attr("action");
	if(action == "remove"){
		var idObject = $(this).attr("idobj");
		var objectType = $(this).attr("objtype");
		var data = "id="+idObject+"&type="+objectType;
		$.ajax({
			url : ajaxPath + "AJAX/remove.php",
			data : data,
			type: 'POST',
			beforeSend : function() { enableLoader() ;
				console.log("delete started");
				// Disable all btns
				$("button").addClass('disabled');
			}
		}).done(function(data) {
			if (data == "success") {
				// AJAX request get new body content
				console.log(" delete success");				
				
				
			} else {
				// error message
				console.log(" delete failed");
			}

		}).always(function() { disableLoader();
			
			//Get new header
			getHeader();
			//Get new body
			getBody();
			// enable all btns
			$("button").removeClass("disabled");
			console.log(" delete finished");
		});
		
	}else if(action == "update"){
		var idObject = $(this).attr("idobj");
		var objectType = $(this).attr("objtype");
		var data = "id="+idObject;
		if(objectType == "Promotion"){
			$.ajax({
				url : ajaxPath + "components/body/modal/updatePromotion.php",
				data:data,
				type:'POST',
				beforeSend : function() { enableLoader() ;
					console.log("getting promotion modal started");

					 $("#getCodeModal").remove();
				}
			}).done(function(data) {

				console.log(" getting  promotion modal success");
				
				$("#addPromotion").closest("section").append(data);
				  $("#getCodeModal").modal('show');
			}).always(function() { disableLoader();
				console.log(" getting  promotion modalfinished");
			});
		}else if(objectType == "TA_Promotion_Service"){
			$.ajax({
				url : ajaxPath + "components/body/modal/updatePromotionService.php",
				data:data,
				type:'POST',
				beforeSend : function() { enableLoader() ;
					console.log("getting promotion modal started");

					 $("#getCodeModal").remove();
				}
			}).done(function(data) {

				console.log(" getting  promotion modal success");
				
				$("body").append(data);
				  $("#getCodeModal").modal('show');
			}).always(function() { disableLoader();
				console.log(" getting  promotion modalfinished");
			});
		}else if(objectType == "Service"){
			$.ajax({
				url : ajaxPath + "components/body/modal/updateService.php",
				data:data,
				type:'POST',
				beforeSend : function() { enableLoader() ;
					console.log("getting promotion modal started");

					 $("#getCodeModal").remove();
				}
			}).done(function(data) {

				console.log(" getting  promotion modal success");
				
				$("body").append(data);
				  $("#getCodeModal").modal('show');
			}).always(function() { disableLoader();
				console.log(" getting  promotion modalfinished");
			});
		}
		
		
	}
	
});
$(document).on("click",".updateObj",function(){
	var idObject = $(this).attr("idobj");
	var objectType = $(this).attr("type");
	var data = "id="+idObject+"&type="+objectType;
	if(objectType == "Promotion"){
		var name=$("#titrePromoNew").val();
		var value=$("#rabaisPromoNew").val();
		data+="&name="+name+"&value="+value;
	}else if(objectType == "TA_Promotion_Service"){
		var dateDebut=$("#date_debutNew").val();
		var dateFin=$("#date_finNew").val();
		var code=$("#codePromotionNew").val();
		data+="&date_debut="+dateDebut+"&date_fin="+dateFin+"&code="+code;
	}
	else if(objectType == "service"){
		var title = $("#titreNew").val();
		var description = $("#descriptionNew").val();
		var tarif = $("#tarifNew").val();
		var duree = $("#dureeNew").val();
		var isActive = $("#actifNew").val();
		var photo  = $("#photoNew").val();
		data+="&title="+title;
		data+="&description="+description;
		data+="&tarif="+tarif;
		data+="&duree="+duree;
		data+="&isActive="+isActive;
		if(files != null){
			data+="&photoName="+files[0].name;
		}else{
			data+="&photoName=";
		}
		
		  $.ajax({
		        url: ajaxPath + 'AJAX/uploadPhoto.php?files',
		        type: 'POST',
		        data: data,
		        cache: false,
		        dataType: 'json',
		        processData: false, // Don't process the files
		        contentType: false, // Set content type to false as jQuery will tell the server its a query string request
		        success: function(data, textStatus, jqXHR)
		        {
		            if(typeof data.error === 'undefined')
		            {
		                // Success so call function to process the form
		                submitForm(event, data);
		            }
		            else
		            {
		                // Handle errors here
		                console.log('ERRORS: ' + data.error);
		            }
		        },
		        error: function(jqXHR, textStatus, errorThrown)
		        {
		            // Handle errors here
		            console.log('ERRORS: ' + textStatus);
		            // STOP LOADING SPINNER
		        }
		    });
	}
	$.ajax({
		url : ajaxPath + "AJAX/update.php",
		data:data,
		type:'POST',
		beforeSend : function() { enableLoader() ;
			console.log("update "+objectType+" started");
		}
	}).done(function(data) {
		if(data == "success"){
			console.log("update "+objectType+" success");
			
		}else{
			console.log("update "+objectType+" failed");
		}
		
	}).always(function() { disableLoader();
		console.log(" update "+objectType+" finished");
		getHeader();
		getBody();
		if(objectType == "TA_Promotion_Service" || objectType == "service"){
			$("#getCodeModal").remove();
		}
		
		$(".modal-backdrop.fade.in").remove();
		$("body").removeClass("modal-open");
	});
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
	  $("#getCodeModal").remove();
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
$(document).on("click",".addObj",function(){
	var newObj = $(this).closest(".newobj");
	var type = newObj.attr("type");
	var data ="type="+type;
	if(type=="Promotion"){
		var name = $("#titrePromoNew").val();
		var promotion = $("#rabaisPromoNew").val();
		data+= "&name="+name+"&value="+promotion;
		
	}else if(type=="service"){
		// Variable to store your files
		
		
		var title = $("#titreNew").val();
		var description = $("#descriptionNew").val();
		var tarif = $("#tarifNew").val();
		var duree = $("#dureeNew").val();
		var isActive = $("#actifNew").val();
		var photo  = $("#photoNew").val();
		data+="&title="+title;
		data+="&description="+description;
		data+="&tarif="+tarif;
		data+="&duree="+duree;
		data+="&isActive="+isActive;
		data+="&photoName="+files[0].name;
		  $.ajax({
		        url: ajaxPath + 'AJAX/uploadPhoto.php?files',
		        type: 'POST',
		        data: data,
		        cache: false,
		        dataType: 'json',
		        processData: false, // Don't process the files
		        contentType: false, // Set content type to false as jQuery will tell the server its a query string request
		        success: function(data, textStatus, jqXHR)
		        {
		            if(typeof data.error === 'undefined')
		            {
		                // Success so call function to process the form
		                submitForm(event, data);
		            }
		            else
		            {
		                // Handle errors here
		                console.log('ERRORS: ' + data.error);
		            }
		        },
		        error: function(jqXHR, textStatus, errorThrown)
		        {
		            // Handle errors here
		            console.log('ERRORS: ' + textStatus);
		            // STOP LOADING SPINNER
		        }
		    });
		
	}

	$.ajax({
		url : ajaxPath + "AJAX/add.php",
		data:data,
		type:'POST',
		beforeSend : function() { enableLoader() ;
			console.log("Adding Promotion started");
		}
	}).done(function(data) {
		console.log("Adding Promotion success");
		
	}).always(function() { disableLoader();
		console.log(" Adding Promotion finished");
		$("#getCodeModal").remove();
		getHeader();
		getBody();
		$(".modal-backdrop.fade.in").remove();
		$("body").removeClass("modal-open");
	});
	
});

//Add promotion event click
$(document).on("click","#updatePromotion",function(){
	
	document.getElementById('titrePromo').disabled = false;
	document.getElementById('rabaisPromo').disabled = false;
	
});
//Delete promotion event click
$(document).on("click","#deletePromotion",function(){
	$("#promo").remove();
	var idObject = $(this).attr("idobject");
	$.ajax({
		url : ajaxPath + "AJAX/deletePromotion.php?idobj="+idObject,
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
//Add promotion event click
$(document).on("click",".addPromotionService",function(){
	$("#getCodeModal").remove();
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

//Add promotion event click
$(document).on("click","#addServiceButton",function(){
	$("#getCodeModal").remove();
	var idObject = $(this).attr("idobject");
	$.ajax({
		url : ajaxPath + "components/body/modal/addService.php?idobj="+idObject,
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
var files;
// Add events
$(document).on('change','input[type=file]', prepareUpload);

// Grab the files and set them to our variable
function prepareUpload(event)
{
  files = event.target.files;
} 
 var data = new FormData();
$.each(files, function(key, value)
{
    data.append(key, value);
});

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
