<?php include "../../header.php";
$company_userDetails=$userClass->allUserDetails($userDetails->company_id);?>
  <section class="vbox">
    <section>
      <section class="hbox stretch">
       
        <section id="content">
          <section class="hbox stretch">
              <!-- .aside -->
              <form method='post' action>
              <?php
              foreach($company_userDetails as $row):?>
                <div class="checkbox">
                <div class="form-group">
                    <label  class="col-sm-2 control-label">
                        <input type="checkbox" id="users_cid[]" name="users_cid[]" value="<?php echo $row['user_id'];?>"><?php echo $row['first_name'];?>
                    </label>
                </div>
                </div>
<?php endforeach;?><br/>
<input type="submit" value="Get time slots" class="btn btn-s-md btn-info btn-rounded" name="submit">
</form>


<?php
if(isset($_POST['submit'])){
    if(!empty($_POST['users_cid'])) {
        foreach($_POST['users_cid'] as $value){
            echo "users_cid : ".$value.'<br/>';?>

            
        <?php }
    }
}
?>


<section >
<div id="calendar">
   
   </div>
   </section>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script src="../js/bootstrap.js"></script>
  <!-- App -->
  <script src="../js/app.js"></script>
  <script src="../js/app.plugin.js"></script>
  <script src="../js/slimscroll/jquery.slimscroll.min.js"></script>
  
  <script>
  $(document).ready(function() {
   var calendar = $('#calendar').fullCalendar({
    editable:true,
    header:{
     left:'prev,next today',
     //right:'title',
     center:'agendaWeek,agendaDay,month',
     right:''
    },
    events: '../../controllers/onoffice_database/onoffice_calendar/load.php',
    selectable:true,
    selectHelper:true,
    select: function(start, end, allDay)
    {
  
     var title = prompt("Appointment Subject");  
      
     if(title)
     {
      var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
      var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
      
               // echo "value : ".$value.'<br/>';
               $.ajax({
       url:"../../controllers/onoffice_database/onoffice_calendar/insert.php?meeting_with=",
       type:"POST",
       data:{title:title, start:start, end:end,user_id:<?php echo $session_uid;?>},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Added Successfully");
       }
      })
            
     
     }
    },
    editable:true,
    eventResize:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"../../controllers/onoffice_database/onoffice_calendar/update.php",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function(){
       calendar.fullCalendar('refetchEvents');
       alert('Event Update');
      }
     })
    },

    eventDrop:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"../../controllers/onoffice_database/onoffice_calendar/update.php",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function()
      {
       calendar.fullCalendar('refetchEvents');
       alert("Event Updated");
      }
     });
    },

    eventClick:function(event)
    {
     if(confirm("Are you sure you want to remove it?"))
     {
      var id = event.id;
      $.ajax({
       url:"../../controllers/onoffice_database/onoffice_calendar/delete.php",
       type:"POST",
       data:{id:id},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Event Removed");
       }
      })
     }
    },

   });
  });
   
  </script>

          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
        <aside class="bg-light lter b-l aside-md hide" id="notes">
          <div class="wrapper">Notification</div>
        </aside>
      </section>
    </section>
  </section>
 
    
  