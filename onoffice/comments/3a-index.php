<?php include "../../header.php" ?>
<?php echo "card id : ".$_GET['id'];?>
<section class="vbox">

    <!-- /.aside -->
   
        <section class="scrollable padder">
        <header class="panel-heading font-bold">
        <a href="../todo/index.php" class="btn btn-s-md btn-info btn-rounded"> <i class="fa fa-arrow-left"></i></a>
                   </header>
    <script src="public/3b-comments.js"></script>
    <link href="public/3c-comments.css" rel="stylesheet">
  

    <!-- GIVE YOUR PAGE OR PRODUCT A POST ID -->
    <input type="hidden" id="post_id" value="999"/>
    <input type="hidden" id="card_id" value=<?php echo $_GET['id']?>/>

    <!-- CREATE A CONTAINER TO LOAD COMMENTS -->
    <div id="comments"></div>

    <!-- CREATE A CONTAINER TO LOAD REPLY DOCKET -->
    <div id="reply-main"></div>
    <!--<a href="#" class="btn btn-sm btn-icon btn-info"><i class="fa fa-twitter"></i></a>-->
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- local javascript -->
<script src="js/javascript.js"></script>
                
        
   
      
      <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
    </section>
    <aside class="bg-light lter b-l aside-md hide" id="notes">
      <div class="wrapper">Notification</div>
    </aside>
  </section>



<?php include "../footer.php" ?>