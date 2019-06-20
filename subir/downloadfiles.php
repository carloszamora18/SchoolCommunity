
<?php include "header2.php"; ?>
<?php include "tabla.css"; ?>
<?php
 $error = ""; //error holder
 if(isset($_POST['createpdf']))
 {
      $post = $_POST;
      $file_folder = "uploadfiles/"; // folder to load files
      if(extension_loaded('zip'))
      {
           // Checking ZIP extension is available
           if(isset($post['files']) and count($post['files']) > 0)
           {
                // Checking files are selected
                $zip = new ZipArchive(); // Load zip library
                $zip_name = "Descargar en " .time().".zip";           // Zip name
                if($zip->open($zip_name, ZIPARCHIVE::CREATE)!==TRUE)
                {
                     // Opening zip file to load files
                     $error .= "UPPS lo sentimos no se logro descargar los archivos";
                }
                foreach($post['files'] as $file)
                {
                     $zip->addFile($file_folder.$file); // Adding files into zip
                }
                $zip->close();
                if(file_exists($zip_name))
                {
                     // push to download the zip
                     header('Content-type: application/zip');
                     header('Content-Disposition: attachment; filename="'.$zip_name.'"');
                     readfile($zip_name);
                     // remove zip file is exists in temp path
                     unlink($zip_name);
                }
           }
           else
           {
                $error .= "Por favor selecione los archivos a descargar, gracias. ";
           }
      }
      else
      {
           $error .= "Ocurrio algun error con la extencion zip,lo sentimos intentalo mas tarde";
      }
 }
 ?>
<style>
@import url(http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
.navigation_item{
		padding: 0px 5px;
		background: #fff;
		text-decoration: none;

		color: #f21313 !important;
		font-size: 12px;
		border: 2px solid #e3e3e3;
		border-radius: 1px;
		-webkit-transition: all 0.2s linear;
		-moz-transition: all 0.2s linear;
		-ms-transition: all 0.2s linear;
		-o-transition: all 0.2s linear;
	}
  body{
    color: #000;
  }
	.navigation_item:hover,.selected_navigation_item{
		border: 2px solid #2A6496;
		border-radius: 2px;
		color: #2A6496 !important;
		background: #fff;
	}

  body{
  	background-color: #632432;
  	font-family: Arial;
  }

  #main-container{
  	margin: 50px auto;
  	width: 300px;
  }

  table{
    text-decoration: none;
    margin: 0 auto;
  	background-color: white;
  	text-align: left;
  	border-collapse: collapse;
  	width: 70%;
  }

  th, td{
  	padding: 10px;
  }

  td a{
    text-decoration: none;
    padding: 8px;
    font-weight: 600;
    font-size: 12px;
    color: #ffffff;
    background-color: #f12727;
    border-radius: 6px;
    border: 2px solid rgb(170, 0, 0);

  }
  td input[type=submit].btn-primary1{
    text-decoration: none;
    padding: 8px;
    font-weight: 600;
    font-size: 12px;
    color: #ffffff;
    background-color: #42d244;
    border-radius: 6px;
    border: 2px solid rgb(30, 122, 18);
  }
td input[type=submit].btn-primary1:hover{
  transition: all .7s;
  text-decoration: none;
  color: #42d244;
 background-color: #ffffff;
}

td input[type=reset].btn:hover{
  transition: all .7s;
  text-decoration: none;
  color: #2784f1;
 background-color: #ffffff;
}






  td input[type=reset].btn{
    text-decoration: none;
    padding: 8px;
    font-weight: 600;
    font-size: 12px;
    color: #ffffff;
    background-color: #2784f1;
    border-radius: 6px;
    border: 2px solid rgb(7, 85, 149);
  }

  td a:hover{
    transition: all .7s;
    text-decoration: none;
    color: #f12727;
   background-color: #ffffff;
  }

  thead{
  	background-color: #246355;
  	border-bottom: solid 5px #0F362D;
  	color: white;
    text-decoration: none;
  }

  tr:nth-child(even){
  	background-color: #ddd;
  }

  tr:hover td{
  	background-color: #369681;
  	color: white;
    text-decoration: none;
  }


<h1>School Community</h1>

	</style>


                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">

                        <div class="panel-body">
                        <form name="zips" method="post">
                     <?php echo $error; ?>
                           <div class="table-responsive table-bordered">

                           <?php
include"connect.php";
if (isset($_GET["page"])) { $page = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * 10;
$sql = "select * from files ORDER BY id DESC LIMIT $start_from, 10";
$rs_result = mysql_query ($sql,$con);
?>
  <table class="table">

<thead>
 <tr>
   <th>*</th>
   <th>Nombre del trabajo</th>

   <th>tipo de trabajo</th>
   <th>Tamaño</th>
   <th>Opciones</th>
 </tr>
</thead>

<?php
while ($row = mysql_fetch_assoc($rs_result)) {
?>

<tbody>
                                        <tr>
                                        <td><input type="checkbox" class="check" name="files[]" value="<?php echo $row["filename"]; ?>" /></td>
<
                                            <td><?php echo $row["file_id"]; ?></td>

                                            <td><?php echo $row["type"]; ?></td>
                                             <td><?php echo $row["size"]; ?></td>

										   <td><a href='deletefile.php?key1=<?php echo $row["id"]; ?>&key2=<?php echo $page ?>'>  ELIMINAR  </a>
                                        </tr>

										</tbody>

<?php
};
?>
<tr>
                               <td colspan="2"><input type="submit" name="createpdf" class="btn-primary1"  value="Descargar todo" />&nbsp;
                               <input type="reset" name="reset"  class="btn" value="Recargar trabajos" /></td>
                          </tr>
</table>
<strong>PAGINAS </strong>
<style>
strong{
  font-size: 20px;
  color: #fff;
}
</style>

<?php
$sql = "SELECT COUNT(filename) FROM files";
$rs_result = mysql_query($sql,$con);
$row = mysql_fetch_row($rs_result);
$total_records = $row[0];
$total_pages = ceil($total_records / 10);
for ($i=1; $i<=$total_pages; $i++) {
echo "<a href='downloadfiles.php?page=".$i."' class='navigation_item selected_navigation_item'>".$i."</a> ";
};
?>


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
<!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>

</form>
</body>

</html>
