<!doctype html>
<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
		<title>School Community | Chat</title>
	</head>
	<body>
<style>
body{
	background: url(fotos/studin.jpg);
}

#c{
  margin: 10% 90px;
  padding: 20px;
  color: #ffffff;
  border: 2.6px solid #fff;
  border-radius: 15px;
  background: rgba(0, 0, 0, .7);

}

#send{
text-decoration: none;
padding: 10px;
font-weight: 600;
font-size: 20px;
color: #ffffff;
background-color: #1883ba;
border-radius: 6px;
border: 2px solid #0016b0;
}

</style>





		<div  class="container-fluid" id="c">
			<section  style="padding: 15%;">
				<div class="row">
					<h1 class="text-center">PROGRAMACION LO MEJOR : <small>cuentame algo, no seas timido. </small></h1>
					<hr>
				</div>


				<div class="row">
					<form id="formChat" role="form">
						<div class="form-group">
							<label for="user">¿Como te llamas?</label>
							<input type="text" class="form-control" id="user" name="user" placeholder="Ingresa tu nombre, por favor.">
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-12" >
									<div id="conversation" style="height:200px; border: 1px solid #CCCCCC; padding: 12px;  border-radius: 5px; overflow-x: hidden;">

									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="message">¿Cuentanos algo</label>
							<textarea id="message" name="message" placeholder="¿Tienes algo interesante para nosotros"  class="form-control" rows="3"></textarea>
						</div>
						<button id="send" class="btn btn-primary" >Vale</button>
					</form>
				</div>
			</section>
		</div>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script>

			$(document).on("ready", function(){
        registerMessages();
        $.ajaxSetup({"cache":false});
        setInterval("loadOldMessages()", 500);
			});

      var registerMessages = function(){
          $("#send").on("click", function(e){
            e.preventDefault();
            var frm = $("#formChat").serialize();
               $.ajax({
                  type: "POST",
                  url: "register.php",
                  data: frm
               }).done(function(info){
                    $("#message").val(""); /* Limpiando el TextArea*/
                 var altura = $("#conversation").prop("scrollHeight");
                   $("#conversation").scrollTop(altura);
                 console.log ( info );
               })
          })
      }

      var loadOldMessages = function () {
        $.ajax({
          type: "POST",
          url: "conversation.php"
        }).done(function  (  info ) {
            $("#conversation").html(  info );
             $("#conversation p:last-child").css({"background-color": "lightgreen",
                                                            "padding-botton":"30px"  });
              var altura = $("#conversation").prop("scrollHeight");
                $("#conversation").scrollTop(altura);

        });
    }

		</script>
	</body>
</html>
