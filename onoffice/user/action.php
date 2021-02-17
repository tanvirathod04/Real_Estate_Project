<?php
include "../../header.php";
$user_id=$_GET['id'];
$userDetails=$userClass->userDetails($user_id);
$data=$userClass->getPriviledge($user_id,$userDetails->company_id);
?>
<section class="vbox">

    <!-- /.aside -->
    <section id="content">
      <section class="vbox">
        <section class="scrollable padder">
          
        <div class="m-b-md">
      
    </div>

            <section class="panel panel-default">
            <header class="panel-heading font-bold">Priviledges for <?php echo $userDetails->first_name?> 
                   </header>
                   
                <div class="panel-body">
                <div class="alert alert-info">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ban-circle"></i><strong>Oh snap!</strong> <a href="#" class="alert-link">By selecting all checkboxes user will be changed to admin</a>
                </div>
                <table class="table table-striped m-b-none">
                <form action="../../controllers/onoffice_database/priviledges/priviledges_add.php" method="POST">
                
                <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
                <input type="hidden" name="company_id" value="<?php echo $userDetails->company_id;?>">
                <thead>
                        <tr>
                        <th width="60"></th>
                          <th width="30">Read</th>
                          <th width="30">Edit</th>                    
                          <th width="30">Delete</th>
                        </tr>

                        <tr>
                        <th width="60">Addressen</th>
                          <th width="30">
                          <div class="checkbox">                  
                            <input type="checkbox" name="address_read" value="<?php echo ($data->address_read=='1')?"checked":"" ;?>">
                           </div>
                        </th>
                          <th width="30">
                          <div class="checkbox">                  
                            <input type="checkbox" name="address_edit" value=" <?php echo ($data->address_edit=='1')?"checked":"" ;?>">
                           </div>
                           </th>                    
                          <th width="30">
                          <div class="checkbox">                  
                            <input type="checkbox" name="address_delete" value="<?php echo ($data->address_delete=='1')?"checked":"" ;?>">
                           </div>
                           </th>
                        </tr>

                        <tr>
                        <th width="60">Immobilien</th>
                        <th width="30">
                          <div class="checkbox">                  
                            <input type="checkbox" name="property_read" value="<?php echo ($data->property_read=='1')?"checked":"" ;?>">
                           </div>
                        </th>
                          <th width="30">
                          <div class="checkbox">                  
                            <input type="checkbox" name="property_edit" value=" <?php echo ($data->property_edit=='1')?"checked":"" ;?>">
                           </div>
                           </th>                    
                          <th width="30">
                          <div class="checkbox">                  
                            <input type="checkbox" name="property_delete" value=" <?php echo ($data->property_delete=='1')?"checked":"" ;?>">
                           </div>
                           </th>
                        </tr>
      
                        <tr>
                        <th width="60">Aufgaben</th>
                        <th width="30">
                          <div class="checkbox">                  
                            <input type="checkbox" name="task_read" value=" <?php echo ($data->task_read=='1')?"checked":"" ;?>">
                           </div>
                        </th>
                          <th width="30">
                          <div class="checkbox">                  
                            <input type="checkbox" name="task_edit" value="<?php echo ($data->task_edit=='1')?"checked":"" ;?>">
                           </div>
                           </th>                    
                          <th width="30">
                          <div class="checkbox">                  
                            <input type="checkbox" name="task_delete" value="<?php echo ($data->task_delete=='1')?"checked":"" ;?>">
                           </div>
                           </th>
                        </tr> 
                      </thead>
                      <button type="submit"  class="btn btn-s-md btn-info btn-rounded" style="float:right"><i class="fa fa-save"></i></button>
                      </form>
                </table>
                  </div>
              </section>

   
      
      <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
    </section>
    <aside class="bg-light lter b-l aside-md hide" id="notes">
      <div class="wrapper">Notification</div>
    </aside>
  </section>
</section>
</section>
<?php include "../footer.php" ?>