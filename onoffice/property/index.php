<?php include "../../header.php" ?>
<section id="content">
          <section class="vbox">
          <section class="scrollable padder">
          <h3 class="m-b-none">Immobilien &nbsp;&nbsp;&nbsp;
          <a href="createProperty.php" class="btn btn-s-md btn-info btn-rounded"><i class="fa fa-plus-circle"></i></a>
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
                <th data-property="toponymName" class="sortable">Datensatznr</th>
                <th data-property="toponymName" class="sortable">Status</th>
                <th data-property="toponymName" class="sortable">ImmoNr</th>
                <th data-property="toponymName" class="sortable">Betreuer</th>
                <th data-property="toponymName" class="sortable">Auftragsart</th>
                <th data-property="toponymName" class="sortable">Auftragbis</th>
                <th data-property="toponymName" class="sortable">Verkauftam</th>
                <th data-property="toponymName" class="sortable">Objekttitel</th>
                <th data-property="toponymName" class="sortable">Land</th>
                <th data-property="toponymName" class="sortable">Objekttyp</th>
                
                
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
                    'url':'../../controllers/property_ajaxfile.php',
                   
                   
                },
                "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
            $('td:eq(0)', nRow).html('<a href="../../controllers/onoffice_database/onoffice_properties/onoffice_property_delete.php?id=' +aData['id']+ '"><i class="fa fa-trash-o"></i></a>');

                $('td:eq(1)', nRow).html('<a href="editProperty.php?id=' +aData['id']+ '"><i class="fa fa-edit"></i></a>');
            return nRow;
        },
                'columns': [
                    { data: 'id' },
                    { data: 'id' },
                    { data: 'Data_Record_Ref_No' },
                    { data: 'Status' },
                    { data: 'Property_External' },
                    { data: 'Agent' },
                    { data: 'Type_of_order' },
                    { data: 'Order_Until' },
                    { data: 'Sold_on' },
                    { data: 'property_title' },
                    { data: 'country' },
                    { data: 'Property_type' },                
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

  