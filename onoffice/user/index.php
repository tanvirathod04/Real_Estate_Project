<?php include "../../header.php" ?>

<section class="vbox">

    <!-- /.aside -->
    <section id="content">
      <section class="vbox">
        <section class="scrollable padder">
          
        <div class="m-b-md">
      
    </div>

            <section class="panel panel-default">
            <header class="panel-heading font-bold">Add User 
                   </header>
                   
                <div class="panel-body">
                 <?php 
                 include('../../controllers/companyClass.php');
                 $companyClass = new companyClass();
                 
                 $data=$companyClass->companyDetails($userDetails->company_id);
                 if($data->counter){
                  echo "<a href='signup.php' class='btn btn-primary'>Click here to add</a>";
                 }else{?>
                  <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ban-circle"></i><strong>Oh snap!</strong> <a href="../../#price" class="alert-link">Upgrade your package to add more users.</a>
                </div>
                   
                 <?php } ?>           
                 
                  </div>
              </section>

              <section class="panel panel-default">
                
            <header class="panel-heading font-bold">User Rights
                   </header>
                <div class="panel-body">
               
                  <section class="panel panel-default">
                    <header class="panel-heading">
                      <span class="label bg-danger pull-right">4 left</span>
                      User's
                    </header>
                    <table class="table table-striped m-b-none">
                      <thead>
                        <tr>
                          <th>Progress</th>
                          <th>Name</th>                    
                          <th width="70"></th>
                        </tr>
                      </thead>
                      <tbody>
                                           
                          <?php
                $allUser=$userClass->allUserDetails($userDetails->company_id);
                foreach($allUser as $row): ?>
                <tr> 
                <td>
                   <div class="progress progress-sm progress-striped active m-t-xs m-b-none">
                   <input type="hidden" name="status"  value="<?php  echo $row['status'];?>">
                   
                            <?php if($row['status'] == 'approved'){?> 
                              <div class="progress-bar progress-bar-success" data-toggle="tooltip" data-original-title="Admin" style="width: 100%"></div>
                              <?php }else if($row['status'] == 'pending'){?>
                                <div class="progress-bar progress-bar-warning" data-toggle="tooltip" data-original-title="User" style="width: 50%"></div>
                              <?php }?>
                            </div>
                          </td>
                <td><?=$row['first_name']?></td>
                
                <td class="text-right">
                            <div class="btn-group">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-pencil"></i></a>
                              <ul class="dropdown-menu pull-right">
                                <li><a href="action.php?id=<?php echo $row['user_id']?>">Action</a></li>
                              </ul>
                            </div>
                          </td> 
               
                          </tr>
                 <?php endforeach; 
                ?>
                     

                    
                      </tbody>
                    </table>
                  </section>
                
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
 

  