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
		beforeSend : function() {
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
			console.log(" login login failed");
		}

	}).always(function() {
		// enable all btns
		$("button").removeClass("disabled");
		console.log(" login finished");
	});

});

//Get new header
function getHeader(){
	$.ajax({
		url : ajaxPath + "components/header/header.php",
		beforeSend : function() {
			console.log("getting new header started");
		}
	}).done(function(data) {
		console.log(" getting new header success");
		$("header").html(data);
		
	}).always(function() {
		console.log(" getting new header finished");
	});
}


//Get new body
function getBody(){
	
}
