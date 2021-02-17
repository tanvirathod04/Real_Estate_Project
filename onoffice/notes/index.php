<?php include "../../header.php" ?>
  <section class="vbox">
    <section>
      <section class="hbox stretch">
       
        <section id="content">
          <section class="hbox stretch">
              <!-- .aside -->
              <aside class="aside-xl b-l b-r" id="note-list">
                <section class="vbox flex">
                  <header class="header clearfix">
                    
                    <p class="h3">Notebook</p>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
          
                <div class="input-group m-t-sm m-b-sm">
                      <span class="input-group-addon input-sm"><i class="fa fa-search"></i></span>
                      <input name="search" id="search" class="form-control sm" type="search" placeholder="Search">
                    </div>
                </div>

                  </header>
                  <section>
                    <section>
                      <section>
                        <div class="padder">
                          <!-- note list -->
                          <ul id="note-items" class="list-group list-group-sp"></ul>
                            <!-- templates -->
                            <div class="card my-4" id="task-result">
            <div class="card-body">
              <!-- SEARCH -->
            
              <ul id="container"></ul>
            </div>
          </div>

          <table class="table table-bordered table-sm">
            <thead>
              
            </thead>
            <tbody id="tasks"></tbody>
          </table>
        </div>
      </div>
                            <!-- / template  -->
                          <!-- note list -->
                          <p class="text-center">&nbsp;</p>
                        </div>
                      </section>
                    </section>
                  </section>
                </section>
              </aside>
              <!-- /.aside -->
              <form id="task-form">
              <span class="pull-left m-t"><button type="submit" class="btn btn-dark btn-sm btn-icon" id="new-note" data-toggle="tooltip" data-placement="right" title="New"><i class="fa fa-plus"></i></button></span>
              <input type="hidden" name="user_id" id="user_id"  value="<?php echo $session_uid?>">
                    <div class="form-group">
                      <textarea id="name" cols="30" rows="80" class="form-control" placeholder="start typing here .."></textarea>
                    </div>
                    <input type="hidden" id="taskId">
                  
                  </form>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
        <aside class="bg-light lter b-l aside-md hide" id="notes">
          <div class="wrapper">Notification</div>
        </aside>
      </section>
    </section>
  </section>
  <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
    <!-- Frontend Logic -->
    <script src="app.js"></script>
    
  