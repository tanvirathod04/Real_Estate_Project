
                  <section class="panel panel-default">
                    <header class="panel-heading font-bold">Assign Address</header>
                    <div class="panel-body">
                    <a href="#assign-address" data-toggle="modal" class="btn btn-s-md btn-info btn-rounded"><i class="fa fa-link"></i> Assign</a>
  
   <div class="modal fade" id="assign-address">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <div class="row">   
              <h3 class="m-t-none m-b">Assign Address</h3>
              <form role="form">
                <div class="form-group">
                  <label>Client No.</label>
                  <input type="text" class="form-control" placeholder="Client No.">
                </div>
                <div class="form-group">
                  <label>Name/Company</label>
                  <input type="text" class="form-control" placeholder="Name/Company">
                </div>
                <div class="form-group">
                  <label>Type of Contact</label>
                  <select name="type_of_contact" class="form-control m-b">
                  <option value="" data-sel-id="" class="" selected="selected">not specified</option>
                  <option value="Systembenutzer" data-sel-id="Systembenutzer">System user (address is linked to user)</option>
                  <option value="Privatkontakt" data-sel-id="Privatkontakt" >Private contact</option>
                  <option value="indMulti673Select249" data-sel-id="indMulti673Select249" >Prospect rent</option>
                  <option value="indMulti673Select250" data-sel-id="indMulti673Select250" >Purchase client</option>
                  <option value="Kunde" data-sel-id="Kunde" >Client</option>
                  <option value="Notar" data-sel-id="Notar" >Notary</option>
                  <option value="Eigentümer" data-sel-id="Eigentümer" >Owner</option>
                  <option value="Makler" data-sel-id="Makler" >Broker</option>
                  \<option value="Investor" data-sel-id="Investor" >Investor</option>
                  <option value="Tippgeber" data-sel-id="Tippgeber">Lead</option>
                  <option value="Exposé-Sammler" data-sel-id="Exposé-Sammler" >Property brochure collector</option>
                  <option value="Kooperationspartner" data-sel-id="Kooperationspartner" >Cooperation Partners</option>
                  <option value="Newsletter-Empfänger" data-sel-id="Newsletter-Empfänger" >Newsletter receiver</option>
                  <option value="Premiumkunde" data-sel-id="Premiumkunde" >Premium customer</option>
                </select>
                </div>
                <button type="submit" class="btn btn-sm btn-success pull-right text-uc m-t-n-xs"><strong>Search</strong></button>          
              </form>
          </div>          
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
                    </div>
                  </section>


                  <section class="panel panel-default">
                    <header class="panel-heading font-bold">Assign Properties</header>
                    <div class="panel-body">
                    <a href="#assign-property" data-toggle="modal"class="btn btn-s-md btn-info btn-rounded"><i class="fa fa-link"></i> Assign</a>
                    
   <div class="modal fade" id="assign-property">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <div class="row">   
              <h3 class="m-t-none m-b">Assign Property</h3>
              <form role="form">
                <div class="form-group">
                  <label>Property External Ref.</label>
                  <input type="text" class="form-control" placeholder="Property External Ref.">
                </div>
                <div class="form-group">
                  <label>Owners</label>
                  <input type="text" class="form-control" placeholder="Owner">
                </div>
                <div class="form-group">
                  <label>Postal Code</label>
                  <input type="text" class="form-control" placeholder="Postal Code">
                </div>
                <button type="submit" class="btn btn-sm btn-success pull-right text-uc m-t-n-xs"><strong>Search</strong></button>          
              </form>
          </div>          
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
                    </div>
                  </section>


                  <section class="panel panel-default">
                    <header class="panel-heading font-bold">Files</header>
                    <div class="panel-body">
                      <form role="form">
                    <div class="form-group">
                    <label class="col-sm-2 control-label">File</label>
                    <div class="col-sm-10">
                      <input type="file" class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline input-s">
                    </div>
                  </div>
                  
                       </form>
                    </div>
                  </section>



















                  <div class="tab-pane" id="Files">
<?php
$conn=new PDO('mysql:host=localhost; dbname=realestate', 'root', '') or die(mysql_error());
if(isset($_POST['submit'])!=""){
  $name=$_FILES['photo']['name'];
  $task_id=$_POST['id'];
  $size=$_FILES['photo']['size'];
  $type=$_FILES['photo']['type'];
  $temp=$_FILES['photo']['tmp_name'];
  //$caption1=$_POST['caption'];
  //$link=$_POST['link'];
  move_uploaded_file($temp,"upload/".$name);
$query=$conn->query("insert into onoffice_task_file(onoffice_task_id,file_)values($task_id,'$name')");
if($query){
//header("location:index.php");
}
else{
die(mysql_error());
}
}
?>

		<!--<link href="file_upload/css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">-->
    <link href='DataTables/datatables.min.css' rel='stylesheet' type='text/css'>
    

      <!-- jQuery Library -->
      <script src="js/jquery-3.3.1.min.js"></script>
      
      <!-- Datatable JS -->
      <script src="DataTables/datatables.min.js"></script>
      
<style>
</style>




			<form enctype="multipart/form-data" action="" name="form" method="post">
     
<input type="hidden" name="id" value="<?php  echo $_GET['id'];?>">
					<input type="file" name="photo" id="photo" required/></td>
        <br/>
					<input type="submit"  class="btn btn-s-md btn-info btn-rounded" name="submit" id="submit" value="Upload" />
         
                    
			</form>
		<br />
		<br />
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
			<thead>
				<tr>
					<th width="90%" align="center">Files</th>
					<th align="center">Action</th>	
				</tr>
			</thead>
			<?php
    	$query=$conn->query("select * from onoffice_task_file where onoffice_task_id=".$_GET['id']." order by id desc");
    //echo("select * from onoffice_address_files where onoffice_address_id=".$_GET['id']." order by id desc");
    //$query=$conn->query("select * from onoffice_address_files order by id desc");
			while($row=$query->fetch()){
        $name=$row['file_'];
        $file_id=$row['id'];
			?>
			<tr>
			
				<td>
					&nbsp;<?php echo $name ;?>
				</td>
				<td>
					<button class="alert-success"><a href="../../controllers/onoffice_database/onoffice_task/onoffice_task_files.php?file_id=<?php echo $file_id;?>">Delete</a></button>
          </td>
          <td>
          <button class="alert-success"><a href="onoffice_task_files_download.php?filename=<?php echo $name;?>">Download</a></button>
				</td>
			</tr>
			<?php }?>
		</table>
   </div>
                  
                        
                      </div>