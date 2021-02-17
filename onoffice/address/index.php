<?php include "../../header.php" ?>

<section id="content">
          <section class="vbox">
          <section class="scrollable padder">
          <h3 class="m-b-none">Adressen &nbsp;&nbsp;&nbsp;
          <a href="createAddress.php" class="btn btn-s-md btn-info btn-rounded"><i class="fa fa-plus-circle"></i></a>
        </h3>
    <head>
        
        <!-- Datatable CSS -->
        <link href='../DataTables/datatables.min.css' rel='stylesheet' type='text/css'>
      

        <!-- jQuery Library -->
        <script src="../js/jquery-3.3.1.min.js"></script>
        
        <!-- Datatable JS -->
        <script src="../DataTables/datatables.min.js"></script>
        
    </head>
    <body >
    <section class="panel panel-default">
                   
                    <div class="panel-body">
        <div>
            <!-- Table -->
            <table id='empTable' class='display dataTable'>
                <thead>
                <tr>
                <th data-property="toponymName" class="sortable"><i class="fa fa-trash-o"></i></th>
                <th data-property="toponymName" class="sortable"><i class="fa fa-edit"></i></th>
                <th data-property="toponymName" class="sortable">KdNr</th>
                <th data-property="toponymName" class="sortable">AnredeTitel</th>
                <th data-property="toponymName" class="sortable">EintrDate</th>
                <th data-property="toponymName" class="sortable">Vorname</th>
                <th data-property="toponymName" class="sortable">Name</th>
                
                <th data-property="toponymName" class="sortable">Mobil</th>
                <th data-property="countrycode" class="sortable">Hauptkontakte</th>
                <th data-property="toponymName" class="sortable">Firma</th>
                <th data-property="countrycode" class="sortable">Ort</th>
                <th data-property="countrycode" class="sortable">Plz</th>
                <th data-property="countrycode" class="sortable">Land</th>
                </tr>
                </thead>
                
            </table>
        </div>
        
        <!-- Script -->
        <script>
        $(document).ready(function(){
        
       
            $('#empTable').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'ajax': {
                    'url':'../../controllers/address_ajaxfile.php',
                   
                   
                },
                "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
            $('td:eq(0)', nRow).html('<a href="../../controllers/onoffice_database/onoffice_address/onoffice_address_delete.php?id=' +aData['id']+ '"><i class="fa fa-trash-o"></i></a>');

                $('td:eq(1)', nRow).html('<a href="edit_address.php?id=' +aData['id']+ '"><i class="fa fa-edit"></i></a>');
            return nRow;
        },
                'columns': [
                    { data: 'id' },
                    { data: 'id' },
                    { data: 'client_no' },
                    { data: 'salutation' },
                    { data: 'entry_date' },
                    { data: 'first_name' },
                    { data: 'name' },
                   
                    { data: 'mobile' },
                    { data: 'main_contact' },
                    { data: 'company' },
                    { data: 'city' },
                    { data: 'zip' },
                    { data: 'country' },
                  
               
                ],
            });
        });
        </script>
  </div>
      </section>

      </section>
</section>
</section>

  <!-- Bootstrap -->
  <script src="../js/bootstrap.js"></script>
  <!-- App -->
  <script src="../js/app.js"></script>
  <script src="../js/app.plugin.js"></script>
  <script src="../js/slimscroll/jquery.slimscroll.min.js"></script>
  </body>
  </html>

  