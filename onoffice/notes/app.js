$(document).ready(function() {
  // Global Settings
  let edit = false;

  // Testing Jquery
  console.log('jquery is working!');
  fetchTasks();
  $('#task-result').hide();


  // search key type event
  $('#search').keyup(function() {
    if($('#search').val()) {
      let search = $('#search').val();
      $.ajax({
        url: 'task-search.php',
        data: {search},
        type: 'POST',
        success: function (response) {
          if(!response.error) {
            let tasks = JSON.parse(response);
            let template = '';
            tasks.forEach(task => {
              template += `
                     <li><a href="#" class="task-item">${task.name}</a></li>
                    ` 
            });
            $('#task-result').show();
            $('#container').html(template);
          }
        } 
      })
    }
  });

  $('#task-form').submit(e => {
    e.preventDefault();
    const postData = {
      name: $('#name').val(),
      user_id: $('#user_id').val(),
      id: $('#taskId').val()
    };
    const url = edit === false ? 'task-add.php' : 'task-edit.php';
    console.log(postData, url);
    $.post(url, postData, (response) => {
      console.log(response);
      $('#task-form').trigger('reset');
      fetchTasks();
    });
  });

  // Fetching Tasks
  function fetchTasks() {
  
    $.ajax({
     
      url: 'tasks-list.php?user_id='+$('#user_id').val(),
      type: 'GET',
      success: function(response) {
        const tasks = JSON.parse(response);
        let template = '';
        tasks.forEach(task => {
          template += `
          <br/>
                  <tr taskId="${task.id}" style="
                    background-color: #65BD74;
                    color:white;
                    border-left: 6px solid #ffeb3b;
                  ">
                 
                  <td class="col-md-5"> 
                  <button class="task-delete  btn-default" style="float: right;"><i class="fa fa-times"></i></button>
                  <a href="#" class="task-item" style="
                  color:white;">
                    ${task.name} 
                  </a>

                  <p>${task.date}</p>
                  
                  </td>                 
                  </tr>
                `
        });
        $('#tasks').html(template);
      }
    });
  }

  // Get a Single Task by Id 
  $(document).on('click', '.task-item', (e) => {
    const element = $(this)[0].activeElement.parentElement.parentElement;
    const id = $(element).attr('taskId');
    $.post('task-single.php?'+$('#user_id').val(), {id}, (response) => {
      const task = JSON.parse(response);
      $('#name').val(task.name);
     
      $('#taskId').val(task.id);
      edit = true;
    });
    e.preventDefault();
  });

  // Delete a Single Task
  $(document).on('click', '.task-delete', (e) => {
    if(confirm('Are you sure you want to delete it?')) {
      const element = $(this)[0].activeElement.parentElement.parentElement;
      const id = $(element).attr('taskId');
      $.post('task-delete.php', {id}, (response) => {
        fetchTasks();
      });
    }
  });
});
