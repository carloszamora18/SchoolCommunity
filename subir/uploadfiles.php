
<?php include "header2.php"; ?>

<div class="content">
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Subir Tareas, Trabajos, Practicas y mucho mas.</h1>

                    <br>
                </div>

                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

<?php
include"connect.php";
$rd=rand();
$error = "";
if(isset($_FILES['files']))
{

	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name){
		$file_id = $_FILES['files']['name'][$key];
		$file_name = $key.$rd.$_FILES['files']['name'][$key];
		$file_size =$_FILES['files']['size'][$key];
		$file_tmp =$_FILES['files']['tmp_name'][$key];
		$file_type=$_FILES['files']['type'][$key];
        if($file_size > 9999999097152){
			$error .='File size must be less than 2 MB';
        }
        $query="INSERT into files(`id`,`file_id`,`filename`,`type`,`size`) VALUES('','$file_id','$file_name','$file_type','$file_size'); ";
        $desired_dir="uploadfiles";
        if(empty($error) == true){
            if(is_dir($desired_dir) == false){
                mkdir("$desired_dir", 0700);		// Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false){

                move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
            }else{									// rename the file if another one exist
                $new_dir="$desired_dir/".$file_name.time();
                 rename($file_tmp,$new_dir) ;
            }

		 	mysql_query($query);

        }
		else
		{
                print_r($error);

        }
    }
	if(empty($error))
	{
	echo " <div class='alert alert-success'>Tus aportes se subieron correctamente, Gracias . <a href='viewphotos.php'>View Photos</a> |<a href='addevent.php'> Add new Photos</a></div>";

	}
}


?>
<style>
div#div_file{
  padding: .5px;
  width: 85px;

  background-color: #2499e3;
  position: relative;

  border-radius: 10px;

}

input#upload{
  position: absolute;
  top : 0px;
  left : 0px;
  right: 0px;
  bottom: 0px;
  width: 100%;
  height: 100%;
  opacity: 0;

}

p#texto{
  text-align: center;
  color: #ffffff;
  font-size: 15px;
}

.btn-primary{
    text-decoration: none;
    padding: 10px;
    font-weight: 600;
    font-size: 15px;
    color: #ffffff;
    background-color: #1883ba;
    border-radius: 6px;
    border: 2px solid #0016b0;
  }
  .btn-primary:hover{
    transition: .6s all;
    color: #1883ba;
    background-color: #ffffff;
  }
  .help-block{
    color: #d51d1d;
  }





</style>


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <br>
                        Hola, para subir tus aportes a la comunidad de School Community selecion el boton <a class="subir" id="o">Subir</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="#" method="post" enctype="multipart/form-data" name="upload">


                                        <div class="form-group">
                                            <label>Subir aportes</label>
                                            <br>
                                            <br>
                                            <div id="div_file">
                                            <input type="file" name="files[]" multiple  id="upload" />
                                            <p id="texto">Seleccionar </p>
                                          </div>
                                            <p class="help-block">Si subes contenido que no sea educativo seras eliminado de la plataforma
                                            Atentamente  <a src="https://www.instagram.com/charly7n7/?hl=es"> Carlos Ivan </a>    </p>
                                            <br>
                                        </div>

                                        <button type="submit" class="btn-primary" name="submit">Subir aportes</button>

                                    </form>
                                    <?php echo $error ; ?>

                                <div class="progress">
    <div class="bar">&nbsp;</div >
    <div class="percent">0%</div >
  </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->

                                </div>
                                <!-- /.col-lg-6 (nested) -->

                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
  </div>

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>


<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" src="js/script.js"></script>



</body>

</html>
