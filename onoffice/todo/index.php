<?php include "../../header.php" ?>
<?php include "../../controllers/todoClass.php"; 
$todoClass=new todoClass();

$company_userDetails=$userClass->allUserDetails($userDetails->company_id);
?>

<section class="vbox">
    <section class="scrollable padder">
        <span style="float:right;" onclick="window.print()"><a href="#"> <i class="fa fa-print">Print</i></a></span>
        <div class="search-box">
            <select id="filter_" onchange="myFunction()">
                <option value="default" selected>Select</option>
                <option value="default">Public and Me</option>
                <option value="user">Assigned Task</option>
            </select>
            <button id="Filter">Search</button>
        </div>

        <header class="panel-heading font-bold">ToDo Management</header>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
        <link rel="stylesheet" href="css/global.css">

        <script>
        function myFunction() {
            var x = document.getElementById("filter_").value;

            if (x == "default") {
                var x = document.getElementById("default");
                if (x.style.display === "none") {
                    console.log("default");
                    <?php
        $todoDetailss=$todoClass->todoDetails($session_uid,$userDetails->company_id,"default");?>
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }


            } else if (x == "user") {
                var x = document.getElementById("users");
                if (x.style.display === "none") {
                    console.log("user");
                    <?php
        $todoDetailss_user=$todoClass->todoDetails($session_uid,$userDetails->company_id,"user");?>
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }
        }
        </script>

        <div class="page-wrapper" id="users">

            <div class="main-container">
                <div class="row container">

                    <div class="to-do-panel col-sm-4 col-lg-4 column">
                        <h2>To Do</h2>
                        <span class="lnr lnr-plus-circle button-toggle plus-sign"></span>



                        <form class="new-item-panel" action="#" method="post">
                            <input name="todo_item" placeholder="Add item" class="input-title form-control">
                            <input type="text" name="todo_type" id="todo_type" placeholder="type todo"
                                class="input-title form-control" />
                            <textarea placeholder="Add content" class="textarea-content form-control"
                                rows="5"></textarea>
                            <button type="button" type="submit"
                                class="btn btn-primary add-item float-right">Add</button>
                        </form>

                        <ul id="sortable1" class="connectedSortable">
                            <?php
          foreach($todoDetailss_user as $row):
	      if($row['task'] == 'todo'){?>
                            <li class="ui-state-default list-item">

                                <div class="item-container">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="color-circle">
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="btn-group">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                                        class="fa fa-bars"></i>move to</a>
                                                <ul class="dropdown-menu pull-right">
                                                    <li><a
                                                            href="../../controllers/onoffice_database/todo/todo_update.php?id=<?php echo $row['id']?>&type_todo=inprogress">move
                                                            to inprogress</a></li>
                                                    <li><a
                                                            href="../../controllers/onoffice_database/todo/todo_update.php?id=<?php echo $row['id']?>&type_todo=complete">move
                                                            to complete</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <h5 style="color:red;"><?php echo $row['assign_user']?></h5>
                                        </div>
                                    </div>
                                    <h3><?php echo $row['item'];?></h3>
                                    <p><?php echo $row['content']; ?></p>
                                    <hr>
                                    <?php $carduserDetails=$userClass->userDetails($row['user_id']);?>
                                    <small><?php echo $carduserDetails->first_name; ?></small>

                                    <?php if($row['user_id']== $session_uid){?>
                                    <button
                                        onclick="pop_up('todoVisible.php?todo_id=<?php echo $row['id']?>&todo_user_id=<?php  echo $row['user_id']?>');"><span
                                            class="lnr lnr-users open-modal"
                                            style=" font-size: 1.5em;vertical-align: middle;float: right;transition: all 0.5s ease-in-out;&:hover{transform:rotate(-360deg);"></span></button>
                                    <script>
                                    function pop_up(url) {
                                        window.open(url, 'win2',
                                            'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=1076,height=768,directories=no,location=no'
                                            )
                                    }
                                    </script>
                                    <a
                                        href="../../controllers/onoffice_database/todo/todo_remove.php?id=<?php echo $row['id']?>"><span
                                            class="lnr lnr-trash"></span></a>
                                    <?php }?>

                                    <button
                                        onclick="file_pop_up('fileUpload.php?todo_id=<?php echo $row['id']?>&todo_user_id=<?php  echo $row['user_id']?>');"><span
                                            class="lnr lnr-file-add open-modal"
                                            style=" font-size: 1.5em;vertical-align: middle;float: right;transition: all 0.5s ease-in-out;&:hover{transform:rotate(-360deg);"></span></button>
                                    <script>
                                    function file_pop_up(url) {
                                        window.open(url, 'win2',
                                            'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=1076,height=768,directories=no,location=no'
                                            )
                                    }
                                    </script>

                                    <a href="../comment/index.php?id=<?php echo $row['id']?>" alt="comments"><span
                                            class="lnr lnr-bubble" style=" font-size: 1.5em;					
      vertical-align: middle;
      float: right;
      transition: all 0.5s ease-in-out;      
      &:hover{transform:rotate(-360deg);"></span></a>

                                </div>

                            </li>
                            <?php
						  }endforeach; 
						?>



                        </ul>
                    </div>

                    <div class="doing-panel col-sm-4 col-lg-4 column">
                        <h2>In Progress</h2>
                        <span class="lnr lnr-plus-circle button-toggle plus-sign"></span>


                        <form class="new-item-panel">
                            <input placeholder="Add item" class="input-title form-control">
                            <input type="text" name="todo_type_inprogress" id="todo_type_inprogress"
                                placeholder="type inprogress" class="input-title form-control" />
                            <textarea placeholder="Add content" class="textarea-content form-control"
                                rows="5"></textarea>
                            <button type="button" class="btn btn-primary add-item float-right">Add</button>
                        </form>

                        <ul id="sortable2" class="connectedSortable">
                            <?php
					foreach($todoDetailss_user as $row):
					if($row['task'] == 'inprogress'){?>
                            <li class="ui-state-default list-item">

                                <div class="item-container">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="color-circle"></div>

                                        </div>

                                        <div class="col-sm-5">
                                            <div class="btn-group">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                                        class="fa fa-bars"></i>move to</a>
                                                <ul class="dropdown-menu pull-right">
                                                    <li><a
                                                            href="../../controllers/onoffice_database/todo/todo_update.php?id=<?php echo $row['id']?>&type_todo=todo">move
                                                            to todo</a></li>
                                                    <li><a
                                                            href="../../controllers/onoffice_database/todo/todo_update.php?id=<?php echo $row['id']?>&type_todo=complete">move
                                                            to complete</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <h5 style="color:red"><?php echo $row['assign_user']?></h5>
                                        </div>
                                    </div>

                                    <h3><?php echo $row['item'];?></h3>
                                    <p><?php echo $row['content'];?></p>
                                    <hr>
                                    <?php $carduserDetails=$userClass->userDetails($row['user_id']);?>


                                    <small><?php echo $carduserDetails->first_name; ?></small>

                                    <?php if($row['user_id'] == $session_uid){?>
                                    <button
                                        onclick="pop_up2('todoVisible.php?todo_id=<?php echo $row['id']?>&todo_user_id=<?php  echo $row['user_id']?>');"><span
                                            class="lnr lnr-users open-modal"
                                            style=" font-size: 1.5em;vertical-align: middle;float: right;transition: all 0.5s ease-in-out;&:hover{transform:rotate(-360deg);"></span></button>
                                    <script>
                                    function pop_up2(url) {
                                        window.open(url, 'win2',
                                            'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=1076,height=768,directories=no,location=no'
                                            )
                                    }
                                    </script>

                                    <a
                                        href="../../controllers/onoffice_database/todo/todo_remove.php?id=<?php echo $row['id']?>"><span
                                            class="lnr lnr-trash"></span></a>
                                    <?php }?>
                                    <button
                                        onclick="file_pop_up2('fileUpload.php?todo_id=<?php echo $row['id']?>&todo_user_id=<?php  echo $row['user_id']?>');"><span
                                            class="lnr lnr-file-add open-modal"
                                            style=" font-size: 1.5em;vertical-align: middle;float: right;transition: all 0.5s ease-in-out;&:hover{transform:rotate(-360deg);"></span></button>
                                    <script>
                                    function file_pop_up2(url) {
                                        window.open(url, 'win2',
                                            'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=1076,height=768,directories=no,location=no'
                                            )
                                    }
                                    </script>

                                    <a href="../comment/index.php?id=<?php echo $row['id']?>" alt="comments"><span
                                            class="lnr lnr-bubble" style=" font-size: 1.5em;
      vertical-align: middle;
      float: right;
      transition: all 0.5s ease-in-out;      
      &:hover{transform:rotate(-360deg);"></span></a>
                                </div>
                            </li><?php }endforeach; ?>
                        </ul>
                    </div>


                    <div class="done-panel col-sm-4 col-lg-4 column">
                        <h2>Complete</h2>
                        <span class="lnr lnr-plus-circle button-toggle plus-sign"></span>


                        <form class="new-item-panel">
                            <input placeholder="Add item" class="input-title form-control">
                            <input type="text" name="todo_type_complete" id="todo_type_complete"
                                placeholder="type complete" class="input-title form-control" />
                            <textarea placeholder="Add content" class="textarea-content form-control"
                                rows="5"></textarea>
                            <button type="button" class="btn btn-primary add-item float-right">Add</button>
                        </form>

                        <ul id="sortable3" class="connectedSortable">
                            <?php
					foreach($todoDetailss_user as $row):
						if($row['task'] == 'complete'){?>
                            <li class="ui-state-default list-item">

                                <div class="item-container">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="color-circle"></div>
                                        </div>

                                        <div class="col-sm-5">
                                            <div class="btn-group">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                                        class="fa fa-bars"></i>move to</a>
                                                <ul class="dropdown-menu pull-right">
                                                    <li><a
                                                            href="../../controllers/onoffice_database/todo/todo_update.php?id=<?php echo $row['id']?>&type_todo=inprogress">move
                                                            to inprogress</a></li>
                                                    <li><a
                                                            href="../../controllers/onoffice_database/todo/todo_update.php?id=<?php echo $row['id']?>&type_todo=todo">move
                                                            to todo</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5 style="color:red"><?php echo $row['assign_user']?></h5>
                                        </div>
                                    </div>

                                    <h3><?php echo $row['item']; ?></h3>
                                    <p><?php echo $row['content']; ?></p>
                                    <hr>
                                    <?php $carduserDetails=$userClass->userDetails($row['user_id']);?>


                                    <small><?php echo $carduserDetails->first_name; ?></small>
                                    <?php if($row['user_id'] == $session_uid){?>
                                    <button
                                        onclick="pop_up3('todoVisible.php?todo_id=<?php echo $row['id']?>&todo_user_id=<?php  echo $row['user_id']?>');"><span
                                            class="lnr lnr-users open-modal"
                                            style=" font-size: 1.5em;vertical-align: middle;float: right;transition: all 0.5s ease-in-out;&:hover{transform:rotate(-360deg);"></span></button>
                                    <script>
                                    function pop_up3(url) {
                                        window.open(url, 'win2',
                                            'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=1076,height=768,directories=no,location=no'
                                            )
                                    }
                                    </script>

                                    <a
                                        href="../../controllers/onoffice_database/todo/todo_remove.php?id=<?php echo $row['id']?>"><span
                                            class="lnr lnr-trash"></span></a>
                                    <?php }?>
                                    <button
                                        onclick="file_pop_up3('fileUpload.php?todo_id=<?php echo $row['id']?>&todo_user_id=<?php  echo $row['user_id']?>');"><span
                                            class="lnr lnr-file-add open-modal"
                                            style=" font-size: 1.5em;vertical-align: middle;float: right;transition: all 0.5s ease-in-out;&:hover{transform:rotate(-360deg);"></span></button>
                                    <script>
                                    function file_pop_up3(url) {
                                        window.open(url, 'win2',
                                            'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=1076,height=768,directories=no,location=no'
                                            )
                                    }
                                    </script>

                                    <a href="../comment/index.php?id=<?php echo $row['id']?>" alt="comments"><span
                                            class="lnr lnr-bubble" style=" font-size: 1.5em;
      vertical-align: middle;
      float: right;
      transition: all 0.5s ease-in-out;      
      &:hover{transform:rotate(-360deg);"></span></a>
                                </div>

                            </li><?php } endforeach; ?>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

		
        <!-- for default -->
        <div class="page-wrapper" id="default">

            <div class="main-container">
                <div class="row container">

                    <div class="to-do-panel col-sm-4 col-lg-4 column">
                        <h2>To Do</h2>
                        <span class="lnr lnr-plus-circle button-toggle plus-sign"></span>



                        <form class="new-item-panel" action="#" method="post">
                            <input name="todo_item" placeholder="Add item" class="input-title form-control">
                            <input type="text" name="todo_type" id="todo_type" placeholder="type todo"
                                class="input-title form-control" />
                            <textarea placeholder="Add content" class="textarea-content form-control"
                                rows="5"></textarea>
                            <button type="button" type="submit"
                                class="btn btn-primary add-item float-right">Add</button>
                        </form>

                        <ul id="sortable1" class="connectedSortable">
                            <?php
foreach($todoDetailss as $row):
	if($row['task'] == 'todo'){?>
                            <li class="ui-state-default list-item">

                                <div class="item-container">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="color-circle">
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="btn-group">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                                        class="fa fa-bars"></i>move to</a>
                                                <ul class="dropdown-menu pull-right">
                                                    <li><a
                                                            href="../../controllers/onoffice_database/todo/todo_update.php?id=<?php echo $row['id']?>&type_todo=inprogress">move
                                                            to inprogress</a></li>
                                                    <li><a
                                                            href="../../controllers/onoffice_database/todo/todo_update.php?id=<?php echo $row['id']?>&type_todo=complete">move
                                                            to complete</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <h5 style="color:red;"><?php echo $row['assign_user']?></h5>
                                        </div>
                                    </div>
                                    <h3><?php echo $row['item'];?></h3>
                                    <p><?php echo $row['content']; ?></p>
                                    <hr>
                                    <?php $carduserDetails=$userClass->userDetails($row['user_id']);?>
                                    <small><?php echo $carduserDetails->first_name; ?></small>

                                    <?php if($row['user_id']== $session_uid){?>
                                    <button
                                        onclick="pop_up('todoVisible.php?todo_id=<?php echo $row['id']?>&todo_user_id=<?php  echo $row['user_id']?>');"><span
                                            class="lnr lnr-users open-modal"
                                            style=" font-size: 1.5em;vertical-align: middle;float: right;transition: all 0.5s ease-in-out;&:hover{transform:rotate(-360deg);"></span></button>
                                    <script>
                                    function pop_up(url) {
                                        window.open(url, 'win2',
                                            'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=1076,height=768,directories=no,location=no'
                                            )
                                    }
                                    </script>
                                    <a
                                        href="../../controllers/onoffice_database/todo/todo_remove.php?id=<?php echo $row['id']?>"><span
                                            class="lnr lnr-trash"></span></a>
                                    <?php }?>

                                    <button
                                        onclick="file_pop_up('fileUpload.php?todo_id=<?php echo $row['id']?>&todo_user_id=<?php  echo $row['user_id']?>');"><span
                                            class="lnr lnr-file-add open-modal"
                                            style=" font-size: 1.5em;vertical-align: middle;float: right;transition: all 0.5s ease-in-out;&:hover{transform:rotate(-360deg);"></span></button>
                                    <script>
                                    function file_pop_up(url) {
                                        window.open(url, 'win2',
                                            'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=1076,height=768,directories=no,location=no'
                                            )
                                    }
                                    </script>

                                    <a href="../comment/index.php?id=<?php echo $row['id']?>" alt="comments"><span
                                            class="lnr lnr-bubble" style=" font-size: 1.5em;					
      vertical-align: middle;
      float: right;
      transition: all 0.5s ease-in-out;      
      &:hover{transform:rotate(-360deg);"></span></a>

                                </div>

                            </li><?php }endforeach; ?>



                        </ul>
                    </div>

                    <div class="doing-panel col-sm-4 col-lg-4 column">
                        <h2>In Progress</h2>
                        <span class="lnr lnr-plus-circle button-toggle plus-sign"></span>


                        <form class="new-item-panel">
                            <input placeholder="Add item" class="input-title form-control">
                            <input type="text" name="todo_type_inprogress" id="todo_type_inprogress"
                                placeholder="type inprogress" class="input-title form-control" />
                            <textarea placeholder="Add content" class="textarea-content form-control"
                                rows="5"></textarea>
                            <button type="button" class="btn btn-primary add-item float-right">Add</button>
                        </form>

                        <ul id="sortable2" class="connectedSortable">
                            <?php
					foreach($todoDetailss as $row):
					if($row['task'] == 'inprogress'){?>
                            <li class="ui-state-default list-item">

                                <div class="item-container">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="color-circle"></div>

                                        </div>

                                        <div class="col-sm-5">
                                            <div class="btn-group">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                                        class="fa fa-bars"></i>move to</a>
                                                <ul class="dropdown-menu pull-right">
                                                    <li><a
                                                            href="../../controllers/onoffice_database/todo/todo_update.php?id=<?php echo $row['id']?>&type_todo=todo">move
                                                            to todo</a></li>
                                                    <li><a
                                                            href="../../controllers/onoffice_database/todo/todo_update.php?id=<?php echo $row['id']?>&type_todo=complete">move
                                                            to complete</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <h5 style="color:red"><?php echo $row['assign_user']?></h5>
                                        </div>
                                    </div>

                                    <h3><?php echo $row['item'];?></h3>
                                    <p><?php echo $row['content'];?></p>
                                    <hr>
                                    <?php $carduserDetails=$userClass->userDetails($row['user_id']);?>


                                    <small><?php echo $carduserDetails->first_name; ?></small>

                                    <?php if($row['user_id'] == $session_uid){?>
                                    <button
                                        onclick="pop_up2('todoVisible.php?todo_id=<?php echo $row['id']?>&todo_user_id=<?php  echo $row['user_id']?>');"><span
                                            class="lnr lnr-users open-modal"
                                            style=" font-size: 1.5em;vertical-align: middle;float: right;transition: all 0.5s ease-in-out;&:hover{transform:rotate(-360deg);"></span></button>
                                    <script>
                                    function pop_up2(url) {
                                        window.open(url, 'win2',
                                            'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=1076,height=768,directories=no,location=no'
                                            )
                                    }
                                    </script>

                                    <a
                                        href="../../controllers/onoffice_database/todo/todo_remove.php?id=<?php echo $row['id']?>"><span
                                            class="lnr lnr-trash"></span></a>
                                    <?php }?>
                                    <button
                                        onclick="file_pop_up2('fileUpload.php?todo_id=<?php echo $row['id']?>&todo_user_id=<?php  echo $row['user_id']?>');"><span
                                            class="lnr lnr-file-add open-modal"
                                            style=" font-size: 1.5em;vertical-align: middle;float: right;transition: all 0.5s ease-in-out;&:hover{transform:rotate(-360deg);"></span></button>
                                    <script>
                                    function file_pop_up2(url) {
                                        window.open(url, 'win2',
                                            'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=1076,height=768,directories=no,location=no'
                                            )
                                    }
                                    </script>

                                    <a href="../comment/index.php?id=<?php echo $row['id']?>" alt="comments"><span
                                            class="lnr lnr-bubble" style=" font-size: 1.5em;
      vertical-align: middle;
      float: right;
      transition: all 0.5s ease-in-out;      
      &:hover{transform:rotate(-360deg);"></span></a>
                                </div>
                            </li><?php }endforeach; ?>
                        </ul>
                    </div>


                    <div class="done-panel col-sm-4 col-lg-4 column">
                        <h2>Complete</h2>
                        <span class="lnr lnr-plus-circle button-toggle plus-sign"></span>


                        <form class="new-item-panel">
                            <input placeholder="Add item" class="input-title form-control">
                            <input type="text" name="todo_type_complete" id="todo_type_complete"
                                placeholder="type complete" class="input-title form-control" />
                            <textarea placeholder="Add content" class="textarea-content form-control"
                                rows="5"></textarea>
                            <button type="button" class="btn btn-primary add-item float-right">Add</button>
                        </form>

                        <ul id="sortable3" class="connectedSortable">
                            <?php
					foreach($todoDetailss as $row):
						if($row['task'] == 'complete'){?>
                            <li class="ui-state-default list-item">

                                <div class="item-container">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="color-circle"></div>
                                        </div>

                                        <div class="col-sm-5">
                                            <div class="btn-group">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                                        class="fa fa-bars"></i>move to</a>
                                                <ul class="dropdown-menu pull-right">
                                                    <li><a
                                                            href="../../controllers/onoffice_database/todo/todo_update.php?id=<?php echo $row['id']?>&type_todo=inprogress">move
                                                            to inprogress</a></li>
                                                    <li><a
                                                            href="../../controllers/onoffice_database/todo/todo_update.php?id=<?php echo $row['id']?>&type_todo=todo">move
                                                            to todo</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5 style="color:red"><?php echo $row['assign_user']?></h5>
                                        </div>
                                    </div>

                                    <h3><?php echo $row['item'];?></h3>
                                    <p><?php echo $row['content']; ?></p>
                                    <hr>
                                    <?php $carduserDetails=$userClass->userDetails($row['user_id']);?>


                                    <small><?php echo $carduserDetails->first_name; ?></small>
                                    <?php if($row['user_id'] == $session_uid){?>
                                    <button
                                        onclick="pop_up3('todoVisible.php?todo_id=<?php echo $row['id']?>&todo_user_id=<?php  echo $row['user_id']?>');"><span
                                            class="lnr lnr-users open-modal"
                                            style=" font-size: 1.5em;vertical-align: middle;float: right;transition: all 0.5s ease-in-out;&:hover{transform:rotate(-360deg);"></span></button>
                                    <script>
                                    function pop_up3(url) {
                                        window.open(url, 'win2',
                                            'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=1076,height=768,directories=no,location=no'
                                            )
                                    }
                                    </script>

                                    <a
                                        href="../../controllers/onoffice_database/todo/todo_remove.php?id=<?php echo $row['id']?>"><span
                                            class="lnr lnr-trash"></span></a>
                                    <?php }?>
                                    <button
                                        onclick="file_pop_up3('fileUpload.php?todo_id=<?php echo $row['id']?>&todo_user_id=<?php  echo $row['user_id']?>');"><span
                                            class="lnr lnr-file-add open-modal"
                                            style=" font-size: 1.5em;vertical-align: middle;float: right;transition: all 0.5s ease-in-out;&:hover{transform:rotate(-360deg);"></span></button>
                                    <script>
                                    function file_pop_up3(url) {
                                        window.open(url, 'win2',
                                            'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=1076,height=768,directories=no,location=no'
                                            )
                                    }
                                    </script>

                                    <a href="../comment/index.php?id=<?php echo $row['id']?>" alt="comments"><span
                                            class="lnr lnr-bubble" style=" font-size: 1.5em;
      vertical-align: middle;
      float: right;
      transition: all 0.5s ease-in-out;      
      &:hover{transform:rotate(-360deg);"></span></a>
                                </div>

                            </li><?php } endforeach; ?>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script src="js/javascript.js"></script>
        <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
    </section>
    <aside class="bg-light lter b-l aside-md hide" id="notes">
        <div class="wrapper">Notification</div>
    </aside>
</section>

<?php include "../footer.php" ?>