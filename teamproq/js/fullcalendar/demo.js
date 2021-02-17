!function ($) {

  $(function(){

    // fullcalendar
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();
    var addDragEvent = function($this){
      // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
      // it doesn't need to have a start or end
      var eventObject = {
        title: $.trim($this.text()), // use the element's text as the event title
        className: $this.attr('class').replace('label','')
      };
      // store the Event Object in the DOM element so we can get to it later
      $this.data('eventObject', eventObject);
      
      // make the event draggable using jQuery UI
      $this.draggable({
        zIndex: 999,
        revert: true,      // will cause the event to go back to its
        revertDuration: 0  //  original position after the drag
      });
    };


    $('.calendar').each(function() {
      $(this).fullCalendar({
        header: {
          left: 'prev',
          center: 'title',
          right: 'next'
        },
        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar !!!
        drop: function(date, allDay) { // this function is called when something is dropped
          
            // retrieve the dropped element's stored Event Object
            var originalEventObject = $(this).data('eventObject');
            
            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);
            
            // assign it the date that was reported
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;
            
            // render the event on the calendar
            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
            
            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
              // if so, remove the element from the "Draggable Events" list
              $(this).remove();
            }
            
          }
        ,
        events: '../../controllers/onoffice_database/onoffice_calendar/load.php',
        selectable:true,
        selectHelper:true,
      });
    });
    $('#myEvents').on('change', function(e, item){
      addDragEvent($(item));
    });

    $('#myEvents li').each(function() {
      addDragEvent($(this));
    });

    $(document).on('click', '#dayview', function() {
      $('.calendar').fullCalendar('changeView', 'agendaDay')
    });

    $('#weekview').on('click', function() {
      $('.calendar').fullCalendar('changeView', 'agendaWeek')
    });

    $('#monthview').on('click', function() {
      $('.calendar').fullCalendar('changeView', 'month')
    });



  });
}(window.jQuery);