<?php 
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/client.php');
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/utilisateur.php');
require_once ('serviceList.php');
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

//if admin
if(array_key_exists ( "currentUser" , $_SESSION)){
	if ($_SESSION ["currentUser"]->getAdministrateur()) {
		$admin = "<div style='max-width:1000px;margin:auto;'><section class='content'>
		<div class='row'>
			<div class='col-md-12'>
				<div class='box'>
					<div class='box-header with-border'>
						<h3 class='box-title'>Excel debutant</h3>
				
						<div class='box-tools pull-right'>
							<button type='button' class='btn btn-box-tool'
								data-widget='collapse'>
								<i class='fa fa-minus'></i>
							</button>
							<button type='button' class='btn btn-box-tool'
								data-widget='remove'>
								<i class='fa fa-times'></i>
							</button>
						</div>
					</div>
				
					<div class='box-body'>
						<div class='row'>
						<div class='col-md-2'><img src='images/services/coursexcel.png'></div>
							<div class='col-md-10'>Ce cours a pour objectif de vous (...)
				
    							<div class='row'>
            						<div class='col-md-6'><span class='text-blue'>Tarif:200</span></div>
            						<div class='col-md-6'><span class='text-orange'>Durée:25h</span></div>
            					</div>
							</div>
						</div>
				
					</div>
				
					<!-- ./box-body -->
				
					<!-- /.box-footer -->
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
		<div class='row'>
			<div class='col-md-12'>
				<div class='box'>
					<div class='box-header with-border'>
						<h3 class='box-title'>Excel intermediare</h3>
				
						<div class='box-tools pull-right'>
							<button type='button' class='btn btn-box-tool'
								data-widget='collapse'>
								<i class='fa fa-minus'></i>
							</button>
							<button type='button' class='btn btn-box-tool'
								data-widget='remove'>
								<i class='fa fa-times'></i>
							</button>
						</div>
					</div>
				
					<div class='box-body'>
						<div class='row'>
						<div class='col-md-2'><img src='images/services/coursexcel.png'></div>
							<div class='col-md-10'>Ce cours a pour objectif de vous (...)
				
    							<div class='row'>
            						<div class='col-md-6'><span class='text-blue'>Tarif:200</span></div>
            						<div class='col-md-6'><span class='text-orange'>Durée:25h</span></div>
            					</div>
							</div>
						</div>
				
				
					</div>
				
					<!-- ./box-body -->
				
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
	</section></div>";
		echo $admin;
	}
	else{
		printUserOrViewer();
	}
}
//else if regular user or viewer
else{
	printUserOrViewer();
}

function printUserOrViewer(){
	
	$content ="<section class='content'>";
	printServiceList();
	
	$content .= "<section>";
	echo $content;
}
?>