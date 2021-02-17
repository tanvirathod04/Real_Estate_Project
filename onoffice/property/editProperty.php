<?php include "../../header.php" ?>


<?php include('../../controllers/propertyClass.php');
$propertyClass = new propertyClass();
$data=$propertyClass->propertyDetails($_GET['id']);
$pdata=$propertyClass->propertyBuyer($_GET['id']);
//print_r($data);
//$files=$propertyClass->propertyFiles($_GET['id']);
//print_r($files);
?>


<section class="vbox">
 
     <!-- /.aside -->
     <section id="content">
       <section class="vbox">
         <section class="scrollable padder">
    
         <div class="m-b-md">
       <h3 class="m-b-none">Immobilien &nbsp;&nbsp;&nbsp;
       <a href="index.php" class="btn btn-s-md btn-info btn-rounded"> <i class="fa fa-arrow-left"></i></a>
       <div class="clearfix m-b" style="float:right;">
                       <a href="#" class="pull-left thumb m-r">
                         <img src=<?php echo "images/".$data->property_image ?> class="img-circle">
                       </a>
                       
                       <div class="clear">
                         <div class="h3 m-t-xs m-b-xs"><?php echo $data->property_title ?></div>
                         <small class="text-muted"><i class="fa fa-map-marker"></i> <?php echo $data->town ?></small>
                       </div>                
                     </div>
     </h3>
     </div>
<!--start main tabs-->
<section class="panel panel-default">
                 <header class="panel-heading bg-light">
                   <ul class="nav nav-tabs nav-justified">
                     <li class="active"><a href="#basic_data" data-toggle="tab">Grunddaten</a></li>
                     <li><a href="#prices_surfaces" data-toggle="tab">Preise/Flachen</a></li>
                     <li><a href="#free_texts" data-toggle="tab">Freitexte</a></li>
                     <li><a href="#Files" data-toggle="tab">Dateien</a></li>
                     <li><a href="#relations" data-toggle="tab">Relations</a></li>
                     <li><a href="#details" data-toggle="tab">Details</a></li>
                     <li><a href="#marketing" data-toggle="tab">Vermarktung</a></li>
                     <li><a href="#Property_Search" data-toggle="tab">Interessenten</a></li>
                    
                   </ul>
                 </header>
                 <div class="panel-body">
                   <div class="tab-content">
<!--start relations-->
<div class="tab-pane" id="relations">
<script src="../js/jquery.min.js"></script>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link href="../css/3b-autocomplete.css" rel="stylesheet">
    <script src="../js/3b-autocomplete.js"></script>

<section class="panel panel-default">
                 <header class="panel-heading font-bold">Kaufer and Meiter</header>
                 <div class="panel-body">
                 <script>
      $(function () {
        // NAME AUTO-COMPLETE
        $('#user-name').autocomplete({
          source: function (request, response) {
            $.ajax({
              type: "POST",
              url: "../../controllers/addressassign.php",
              data: {
                term: request.term,extraParams:$('#company_id').val(),
                type: "user"
              },
              success: response,
              dataType: 'json',
              minLength: 2,
              delay: 100
            });
          }
        });

        // EMAIL AUTO-COMPLETE
        $('#user-email').autocomplete({
          source: function (request, response) {
            $.ajax({
              type: "POST",
              url: "../../controllers/addressassign.php",
              data: {
                term: request.term,extraParams:$('#company_id').val(),
                type: "email"
              },
              success: response,
              dataType: 'json',
              minLength: 2,
              delay: 100
            });
          }
        });
      });
    </script>
    <input type="hidden" id="company_id" value="<?php echo $userDetails->company_id?>"/>
     <div class="row">
       <form action="../../controllers/onoffice_database/onoffice_properties/onoffice_property_assign_relation.php" method="POST">
       <input type="hidden" name="property_id" id="property_id" value="<?php  echo $_GET['id'];?>"/>
       <div class="col-md-4"> 
       <label>Please Select Relation Type</label>
       <select name="relation" class="form-control m-b">
                 <option value="owner">Kaufer</option>
                 <option value="contact_person">Meiter</option>
       </select>
       </div>
    <div class="col-md-3"> <label>Name</label><input type="text" name="user-name" id="user-name"></div>
    <div class="col-md-3"><label>Email</label><input type="email" name="user-email" id="user-email"/></div>
    <div class="col-md-2"><button type="submit" class="btn btn-s-md btn-info btn-rounded"><i class="fa fa-link"></i> Assign</button></div>
    </form>
    </div>
                 </div>
               </section>

</div>
<!--end relations-->

<!--start details-->
                   <div class="tab-pane" id="details">
                   <form action="../../controllers/onoffice_database/onoffice_properties/onoffice_property_edit_details.php" method="POST" enctype="multipart/form-data">
                     <div class="row"><!--row-->
             <div class="col-sm-6"><!--col1-->
               <section class="panel panel-default">
                 <header class="panel-heading font-bold">Ausstattung 
                </header>
                  <div class="panel-body">
                  <input type="hidden" name="id"  value="<?php  echo $_GET['id'];?>">

                  <div class="form-group">
                  <label>Befeuerung</label>
                 <select name="Beaconing" class="form-control m-b">
                 <option value="Solar" >Solar</option>
                 <option value="<?php echo $data->Beaconing ?>" selected="selected" ><?php echo $data->Beaconing ?></option>
                 </select>
                 </div>
                 <div class="form-group">
                  <label>Heating</label>
                 <select name="Heating" class="form-control m-b">
                 <option  value="Furnance Heating" >Furnance Heating</option>
                 <option value="not sepcified" >not sepcified</option>
                 <option value="<?php echo $data->Heating ?>" selected="selected" ><?php echo $data->Heating ?></option>
                 </select>
                 </div>
                  <div class="form-group">
                  <label>Number of Floors</label>
                   <input type="text" class="form-control" name="Number_of_Floors" value="<?php echo $data->Number_of_Floors ?>">
                   <a onclick="Calculate('calculator.php')"> <img src="images/calculator.png"/></a>
                 </div>
                 <div class="form-group">
                  <label>Parking</label>
                 <select name="Parking" class="form-control m-b">
                 <option  value="2 Garages" >2 Garages</option>
                 <option value="not sepcified" >not sepcified</option>
                 <option value="<?php echo $data->Parking ?>" selected="selected" ><?php echo $data->Parking ?></option>
                 </select>
                 </div>

<div class="row">
<div class="col-sm-3">
<div class="checkbox">
                     <div class="form-group">
                       <label  class="col-lg-3 control-label">
                         <input type="checkbox" name="cable_satellite_TV" value="yes"  <?php echo ($data->rented=='1')?"checked":"" ;?>>Cable/Satellite TV
                       </label>
                   </div>
                     </div>
</div>
<div class="col-sm-3">
<div class="checkbox">
                     <div class="form-group">
                       <label  class="col-lg-3 control-label">
                         <input type="checkbox" name="Balkon" value="yes"  <?php echo ($data->Balkon=='1')?"checked":"" ;?>>Balkon
                       </label>
                   </div>
                     </div>
</div>
<div class="col-sm-3">
<div class="checkbox">
                     <div class="form-group">
                       <label  class="col-lg-3 control-label">
                         <input type="checkbox" name="Terrasse" value="yes"  <?php echo ($data->Terrasse=='1')?"checked":"" ;?>>Terrasse
                       </label>
                   </div>
                     </div>
</div>
<div class="col-sm-3">
<div class="checkbox">
                     <div class="form-group">
                       <label  class="col-lg-3 control-label">
                         <input type="checkbox" name="Wintergarten" value="yes"  <?php echo ($data->Wintergarten=='1')?"checked":"" ;?>>Wintergarten
                       </label>
                   </div>
                     </div>
</div>
</div>
                 
                     
                 </div>
               </section>

               <section class="panel panel-default">
                 <header class="panel-heading font-bold">Zustand
                </header>
                  <div class="panel-body">
                  <div class="form-group">
                  <label>Year of construction</label>
                   <input type="text" class="form-control" name="Year_of_construction" value="<?php echo $data->year_of_construction ?>">
                   <a onclick="Calculate('calculator.php')"> <img src="images/calculator.png"/></a>
                 </div>
                 <div class="form-group">
               <label>Condition</label>
               <select name="conditions" class="form-control m-b">
               <option value="<?php echo $data->conditions ?>" selected="selected" ><?php echo $data->conditions ?></option>
               <option value="Emptied" style="color: #000000;">Emptied</option>
               <option value="Dilapidated" style="color: #000000;">Dilapidated</option>
               <option value="Planned" style="color: #000000;">Planned</option>
               <option value="Demolition property" style="color: #000000;">Demolition property</option>
               <option value="In good condition" style="color: #000000;">In good condition</option>
               <option value="Completely renovated" style="color: #000000;">Completely renovated</option>
               <option value="Renovation required" style="color: #000000;">Renovation required</option>
               <option value="Modernized" style="color: #000000;">Modernized</option>
               <option value="Shell" style="color: rgb(102,153,204);">Shell</option>
               <option value="First time use" style="color: #000000;">First time use</option>
               <option value="Well maintained" style="color: #000000;">Well maintained</option>
               <option value="Refurbished" selected="selected" style="color: #000000;">Refurbished</option>
               <option value="Subject to agreement" style="color: #000000;">Subject to agreement</option>
               <option value="First use after renovation" style="color: rgb(255,102,0);">First use after renovation</option>
               <option value="not sepcified" >not sepcified</option>
               </select>
             </div>
             <div class="form-group">
               <label>Energy Performance</label>
               <select name="energy_performance" class="form-control m-b">
               <option value="<?php echo $data->energy_performance ?>" selected="selected" ><?php echo $data->energy_performance ?></option>
               <option value="According to construction" style="color: #000000;">According to construction</option>
               <option value="according to consumption" style="color: #000000;">according to consumption</option>
               <option value="Demand certificate business" style="color: #000000;">Demand certificate business</option>
               <option value="Commercial consumption pass" style="color: #000000;">Commercial consumption pass</option>
               <option value="According to the law unnecessary" style="color: #000000;">According to the law unnecessary</option>
               <option value="without Energy Performance Certificates" style="color: #000000;">without Energy Performance Certificates</option>
               <option value="not sepcified" >not sepcified</option>
               </select>
             </div>
             <div class="form-group">
                  <label>Energy pass valid until</label>
                   <input type="date" class="form-control" name="energy_pass_valid" value="<?php echo $data->energy_pass_valid ?>">
                 </div>
                 <div class="form-group">
               <label>Energy Certificate</label>
               <select name="energy_cerrificate" class="form-control m-b">
               <option value="<?php echo $data->energy_cerrificate ?>" selected="selected" ><?php echo $data->energy_cerrificate ?></option>
               <option value="A" style="color: #000000;">A</option>
               <option value="A+" style="color: #000000;">A+</option>
               <option value="B" style="color: #000000;">B</option><option value="C" style="color: #000000;">C</option>
               <option value="D" style="color: #000000;">D</option><option value="E" style="color: #000000;">E</option>
               <option value="F" style="color: #000000;">F</option>
               <option value="G" style="color: #000000;">G</option><option value="H" style="color: #000000;">H</option>
               <option value="not sepcified" >not sepcified</option>
               </select>
             </div>
             <div class="checkbox">
                     <div class="form-group">
                       <label  class="col-lg-4 control-label">
                         <input type="checkbox" name="hot_water_included" value="yes" <?php echo ($data->hot_water_included=='1')?"checked":"" ;?>>Warmwasser enthalt..
                       </label>
                   </div>
                     </div>
                     
                 <div class="form-group">
               <label>Main fuel type</label>
               <select name="main_fuel_type" class="form-control m-b">
               <option value="<?php echo $data->main_fuel_type ?>" selected="selected" ><?php echo $data->main_fuel_type ?></option>
               <option value="Alternative" style="color: #000000;">Alternative</option>
               <option value="Block-type thermal power station" style="color: #000000;">Block-type thermal power station</option>
               <option value="Electrical" style="color: #000000;">Electrical</option><option value="Geothermal" style="color: #000000;">Geothermal</option>
               <option value="Complementary decentralized hot water" style="color: #000000;">Complementary decentralized hot water</option>
               <option value="district heating" style="color: #000000;">district heating</option><option value="Gas" style="color: #000000;">Gas</option><option value="Coal" style="color: #000000;">Coal</option>
               <option value=">Wind / Water heat pump" style="color: #000000;">Wind / Water heat pump</option>
               <option value="Oil" style="color: #000000;">Oil</option>
               <option value="Pellet" style="color: #000000;">Pellet</option><option value="Pellet heating system" style="color: #000000;">Pellet heating system</option>
               <option value="Solar" style="color: #000000;">Solar</option>
               <option value="not sepcified" >not sepcified</option>
               </select>
             </div>

                 </div>
               </section>
             </div><!--col1-->
             <div class="col-sm-6"><!--col2-->
               <section class="panel panel-default">
                 <header class="panel-heading font-bold">Infrastruktur 
                </header>
                  <div class="panel-body">
                  <div class="form-group">
                  <label>Dist.Kindergarten(km)</label>
                   <input type="text" class="form-control" name="dist_kindergarten" value="<?php echo $data->dist_kindergarten ?>">
                   <a onclick="Calculate('calculator.php')"> <img src="images/calculator.png"/></a>
                 </div>
                 <div class="form-group">
                  <label>Dist.to primary schools(km)</label>
                   <input type="text" class="form-control" name="dist_to_primary_schools" value="<?php echo $data->dist_to_primary_schools ?>">
                   <a onclick="Calculate('calculator.php')"> <img src="images/calculator.png"/></a>
                 </div>
                 <div class="form-group">
                  <label>Dist.secondary schools(km)</label>
                   <input type="text" class="form-control" name="dist_high_school" value="<?php echo $data->dist_high_school ?>">
                   <a onclick="Calculate('calculator.php')"> <img src="images/calculator.png"/></a>
                 </div>
                 <div class="form-group">
                  <label>Dist.High school(km)</label>
                   <input type="text" class="form-control" name="dist_highway" value="<?php echo $data->dist_highway ?>">
                   <a onclick="Calculate('calculator.php')"> <img src="images/calculator.png"/></a>
                 </div>
                 <div class="form-group">
                  <label>Dist.to downtown(km)</label>
                   <input type="text" class="form-control" name="dist_to_downtown" value="<?php echo $data->dist_to_downtown ?>">
                   <a onclick="Calculate('calculator.php')"> <img src="images/calculator.png"/></a>
                 </div>
                 </div>
               </section>

               <section class="panel panel-default">
                 <header class="panel-heading font-bold">Verwaltung 
                </header>
                  <div class="panel-body">
                  <div class="form-group">
                  <label>Verfugbar ab(text)</label>
                   <input type="text" class="form-control" name="avail_from" value="<?php echo $data->avail_from ?>">
                 </div>
                 <div class="form-group">
               <label>Haustiere</label>
               <select name="Pets" class="form-control m-b">
               <option value="<?php echo $data->Pets ?>" selected="selected" ><?php echo $data->Pets ?></option>
               <option value="Ja" style="color: #000000;">Ja</option>
               <option value="Nein" style="color: #000000;">Nein</option>
               <option value="nach Vereinbarung" >nach Vereinbarung</option>
               <option value="Keine Angaben" style="color: #000000;">Keine Angaben</option>
               </select>
             </div>
             <div class="checkbox">
                     <div class="form-group">
                       <label  class="col-lg-3 control-label">
                         <input type="checkbox" name="rented" value="yes" <?php echo ($data->rented=='1')?"checked":"" ;?>>Vermietet
                       </label>
                  
                     </div>
                    
                     <div class="form-group">
                       <label  class="col-lg-4 control-label">
                         <input type="checkbox" name="commercial_use" value="yes" <?php echo ($data->commercial_use=='1')?"checked":"" ;?>>Gewerbliche Nutzun
                       </label>
                   </div>
                   
                     <div class="form-group">
                       <label  class="col-lg-4 control-label">
                         <input type="checkbox" name="listed_building" value="yes" <?php echo ($data->listed_building=='1')?"checked":"" ;?>>Denkmalgeschutzt
                       </label>
                   </div>
             </div>

                 </div>
               </section>
             </div><!--col2-->
             <button type="submit" class="btn btn-s-md btn-info btn-rounded"><strong> <i class="fa fa-save"></i> </strong></button>
             </div><!--row-->

               </form>
                     </div>
                   <!--end details-->

                    <!--start free texts-->
                    <div class="tab-pane" id="free_texts">
                    <form action="../../controllers/onoffice_database/onoffice_properties/onoffice_property_edit_free_text.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id"  value="<?php  echo $_GET['id'];?>">
                     <div class="form-group">
                     <label class="col-sm-2 control-label">Beschreibung</label>
                     <textarea type="text" class="form-control scrollable" name="description"><?php echo $data->location?></textarea>
                   </div>

                   <div class="form-group">
                     <label class="col-sm-2 control-label">Lage</label>
                     <textarea type="text" class="form-control scrollable" name="location"><?php echo $data->location?></textarea>
                   </div>

                   <div class="form-group">
                     <label class="col-sm-2 control-label">Ausstattung</label>
                     <textarea type="text" class="form-control scrollable" name="equipment_description"><?php echo $data->equipment_description?></textarea>
                   </div>

                   <div class="form-group">
                     <label class="col-sm-2 control-label">Sonstige Angaben</label>
                     <textarea type="text" class="form-control scrollable" name="miscellaneous"><?php echo $data->miscellaneous?></textarea>
                   </div>
                   <button type="submit" class="btn btn-s-md btn-info btn-rounded"><strong><i class="fa fa-save"></i>  </strong></button>
                   </form >
                     </div>
                   <!--end free texts-->

                      <!--start marketing-->
                      <div class="tab-pane" id="marketing">
                     
                      <form action="../../controllers/onoffice_database/onoffice_properties/onoffice_property_edit_marketing.php" method="POST" enctype="multipart/form-data">
                     <div class="row"><!--row-->
                     <div class="col-sm-6"><!--col1-->
                     <section class="panel panel-default">
                 <header class="panel-heading font-bold">Immobilienportale</header>
                 <div class="panel-body">

                 <input type="hidden" name="id"  value="<?php  echo $_GET['id'];?>">
                 
                 <div class="checkbox">
                     <div class="form-group">
                       <label  class="col-lg-10 control-label">
                         <input type="checkbox" name="archive_property" value="yes" <?php echo ($data->archive_property=='1')?"checked":"" ;?>>Immobilie archivieren, wenn sie in allen Portalen und im Schaufenster-TV gelöscht ist
                       </label>
                   </div>
                     </div>

                     <div class="form-group">
                       <label class="col-lg-8 control-label">Status nach dem Archivieren</label>
                       <div class="col-lg-4">
                       <select name="status2_nach_dem" class="form-control m-b">
                       <option value="Keine Angabe" >Keine Angabe</option>
                       <option value="<?php echo $data->status2_nach_dem ?>" selected="selected" ><?php echo $data->status2_nach_dem ?></option>
                       <option value="Archiviert">Archiviert</option>
                       </select>
                       </div>
                     </div>
                 </div>
               </section>

               <section class="panel panel-default">
                 <header class="panel-heading font-bold">weitere Portaleinstellungen</header>
                 <div class="panel-body">
                 <div class="form-group">
                 <label class="col-sm-5 control-label">fest in der Immobilienrotation</label>
                 <div class="col-sm-5">
                   <div class="radio">
                     <label>
                       <input type="radio" name="permanantly_in_rotation" id="permanantly_in_rotation" value="yes" <?php echo ($data->permanantly_in_rotation=='yes')?"checked":"" ;?>>
                       ja
                     </label>
                   </div>
                   <div class="radio">
                     <label>
                       <input type="radio" name="permanantly_in_rotation" id="permanantly_in_rotation" value="no" <?php echo ($data->permanantly_in_rotation=='no')?"checked":"" ;?>>
                      nein
                     </label>
                   </div>
                 </div>
               </div>

               <div class="row">
                     <div class="col-md-5">
                     <div class="checkbox">
                     <div class="form-group">
                       <label  class="col-lg-2 control-label">
                         <input type="checkbox" name="fictional_address_active" value="yes" <?php echo ($data->fictional_address_active=='1')?"checked":"" ;?>>fiktive Adresse aktiv
                       </label>
                   </div>
                     </div>
                     </div>
                    
                     <div class="col-md-5">
                     <div class="checkbox">
                     <div class="form-group">
                       <label  class="col-lg-2 control-label">
                         <input type="checkbox" name="fictional_price_active" value="yes" <?php echo ($data->fictional_price_active=='1')?"checked":"" ;?>> fiktiver Preis aktiv
                       </label>
                   </div>
                     </div>
                     </div>
                  </div>
                  <div class="form-group">
                       <label  class="col-lg-2 control-label">fiktiver Preis  </label>
                         <input type="text" name="fictitional_price" value="<?php echo $data->fictitional_price;?>"> 
                   </div>
                  

                    
                 </div>
               </section>   

               <section class="panel panel-default">
                 <header class="panel-heading font-bold">Eigene Internetseite</header>
                 <div class="panel-body">
                 <div class="form-group">
                 <label class="col-sm-5 control-label">Veröffentlichen </label>
                 <div class="col-sm-5">
                   <div class="radio">
                     <label>
                       <input type="radio" name="public" id="public" value="yes" <?php echo ($data->public=='yes')?"checked":"" ;?>>
                       ja
                     </label>
                   </div>
                   <div class="radio">
                     <label>
                       <input type="radio" name="public" id="public" value="no" <?php echo ($data->public=='no')?"checked":"" ;?>>
                      nein
                     </label>
                   </div>
                 </div>
               </div>       
                 </div>
                 <div class="checkbox">
                     <div class="form-group">
                       <label  class="col-lg-2 control-label">
                         <input type="checkbox" name="exclusive" value="yes" <?php echo ($data->exclusive=='1')?"checked":"" ;?>> Exklusiv
                       </label>
                   </div>
                     </div>

                     <div class="checkbox">
                     <div class="form-group">
                       <div class="row">
                       <div class="col-md-4">
                       <label  class="col-lg-4 control-label">
                         <input type="checkbox" name="top_offer" value="yes" <?php echo ($data->top_offer=='1')?"checked":"" ;?>> Top Angebot </label>
                       </div>

                       <div class="col-md-4">
                       <label  class="col-lg-4 control-label">
                       <input type="checkbox"  name="google_maps" value="yes" <?php echo ($data->google_maps=='1')?"checked":"" ;?>> Google Maps</label>
                       </div>

                       <div class="col-md-4">
                       <label  class="col-lg-4 control-label">
                       <input type="checkbox" name="new" value="yes" <?php echo ($data->new=='1')?"checked":"" ;?>> Neu</label>
                       </div>
                       </div>

                       <div class="row">
                       <div class="col-md-4">
                       <label  class="col-lg-4 control-label">
                       <input type="checkbox" name="pricereduction" value="yes" <?php echo ($data->pricereduction=='1')?"checked":"" ;?>> Preisreduktion</label>
                       </div>

                       <div class="col-md-4">
                       <label  class="col-lg-4 control-label">
                       <input type="checkbox" name="reference" value="yes" <?php echo ($data->reference=='1')?"checked":"" ;?>>Referenz</label>
                       </div>
                       </div>
                      
                       <div class="row">
                       <div class="col-md-4">
                       <label  class="col-lg-10 control-label">
                       <input type="checkbox" name="free_of_commission" value="yes" <?php echo ($data->free_of_commission=='1')?"checked":"" ;?>> Courtagefrei</label>
                       </div>

                       <div class="col-md-4">
                       <label  class="col-lg-10 control-label">
                       <input type="checkbox" name="property_of_the_day" value="yes" <?php echo ($data->property_of_the_day=='1')?"checked":"" ;?>> Objekt des Tages</label>
                       </div>
                     </div>
                   </div>
                     </div>

               </section>  

                     </div><!--col1-->
                     <div class="col-sm-6"><!--col2-->
                    
             <section class="panel panel-default">
                 <header class="panel-heading font-bold">Adressfreigabe</header>
                 <div class="panel-body">
                 <div class="form-group">
                 <label class="col-sm-5 control-label">Portale / Webseite / API</label>
                 <div class="col-sm-5">
                   <div class="radio">
                     <label>
                       <input type="radio" name="portals_website_api" id="portals_website_api" value="yes" <?php echo ($data->portals_website_api=='yes')?"checked":"" ;?>>
                       ja
                     </label>
                   </div>
                   <div class="radio">
                     <label>
                       <input type="radio" name="portals_website_api" id="portals_website_api" value="no" <?php echo ($data->portals_website_api=='no')?"checked":"" ;?>>
                      nein
                     </label>
                   </div>
                 </div>
               </div>
               <div class="form-group">
                 <label class="col-sm-5 control-label">Word-Exposé/E-Mail</label>
                 <div class="col-sm-5">
                   <div class="radio">
                     <label>
                       <input type="radio" name="word_brochure_email" id="word_brochure_email" value="yes" <?php echo ($data->word_brochure_email=='yes')?"checked":"" ;?>>
                       ja
                     </label>
                   </div>
                   <div class="radio">
                     <label>
                       <input type="radio" name="word_brochure_email" id="word_brochure_email" value="no" <?php echo ($data->word_brochure_email=='no')?"checked":"" ;?>>
                      nein
                     </label>
                   </div>
                 </div>
               </div>
               <div class="form-group">
                 <label class="col-sm-5 control-label">PDF-Exposé/Briefe/Formulare</label>
                 <div class="col-sm-5">
                   <div class="radio">
                     <label>
                       <input type="radio" name="pdf_brochure" id="pdf_brochure" value="yes" <?php echo ($data->pdf_brochure=='yes')?"checked":"" ;?>>
                       ja
                     </label>
                   </div>
                   <div class="radio">
                     <label>
                       <input type="radio" name="pdf_brochure" id="pdf_brochure" value="no" <?php echo ($data->pdf_brochure=='no')?"checked":"" ;?>>
                      nein
                     </label>
                   </div>
                 </div>
               </div>
               <div class="form-group">
                 <label class="col-sm-5 control-label">Eigentümer-Adr. in PDF</label>
                 <div class="col-sm-5">
                   <div class="radio">
                     <label>
                       <input type="radio" name="owner_addr_in_pdf" id="owner_addr_in_pdf" value="yes" <?php echo ($data->owner_addr_in_pdf=='yes')?"checked":"" ;?>>
                       ja
                     </label>
                   </div>
                   <div class="radio">
                     <label>
                       <input type="radio" name="owner_addr_in_pdf" id="owner_addr_in_pdf" value="no" <?php echo ($data->owner_addr_in_pdf=='no')?"checked":"" ;?>>
                      nein
                     </label>
                   </div>
                 </div>
               </div>
           
                 </div>
               </section>
            

               <section class="panel panel-default">
                 <header class="panel-heading font-bold">Vermarktungsstatus</header>
                 <div class="panel-body">

                 <div class="form-group">                 
                       <div class="col-lg-4">
                       <select name="marketing_status" class="form-control m-b">
                       <option value="offen">offen</option>
                       <option value="<?php echo $data->marketing_status ?>" selected="selected" ><?php echo $data->marketing_status ?></option>
                       <option value="Reserviert">Reserviert</option>
                       <option value="Verkauft">Verkauft</option>
                       </select>
                       </div>
                     </div>
                 </div>
               </section>          

               <section class="panel panel-default">
                 <header class="panel-heading font-bold">Schaufenster-TV</header>
                 <div class="panel-body">
                        <div class="form-group">
                 <label class="col-sm-5 control-label">veröffentlichen</label>
                 <div class="col-sm-5">
                   <div class="radio">
                     <label>
                       <input type="radio" name="publish" id="publish" value="yes" <?php echo ($data->publish=='yes')?"checked":"" ;?>>
                       ja
                     </label>
                   </div>
                   <div class="radio">
                     <label>
                       <input type="radio" name="publish" id="publish" value="no" <?php echo ($data->publish=='no')?"checked":"" ;?>>
                      nein
                     </label>
                   </div>
                 </div>
               </div>       
               


                 </div>
               </section>
               <button type="submit" class="btn btn-s-md btn-info btn-rounded"><strong> <i class="fa fa-save"></i> </strong></button>
               
                     </div><!--col2-->
                     </div>
                     </form>
                     </div>
                   <!--end marketing-->

                   
                     <div class="tab-pane active" id="basic_data">
                        <!-- Start basic data Content-->

                        <form name="address_basic_data" action="../../controllers/onoffice_database/onoffice_properties/onoffice_property_edit.php" method="POST" enctype="multipart/form-data">
     <div class="row"><!--row-->
             <div class="col-sm-6"><!--col1-->
               <section class="panel panel-default">
                 <header class="panel-heading font-bold">Technische-Angaben 
                </header>
                  <div class="panel-body">

                  <input type="hidden" name="id"  value="<?php  echo $_GET['id'];?>">
                  
                  <div class="form-group">
               <label>Datensatznr</label>
               <input type="text" class="form-control" name="Data_Record_Ref_No" value="<?php echo $data->Data_Record_Ref_No ?>">
             </div>
             <div class="form-group">
               <label>Status</label>
               <select name="Status" class="form-control m-b">
               <option value="<?php echo $data->Status ?>" selected="selected" ><?php echo $data->Status ?></option>
               <option value="Inaktiv" style="color: #000000;">Inaktiv</option>
               <option value="Aktiv" style="color: #000000;">Aktiv</option>
               <option value="Archiviert" style="color: #000000;">Archiviert</option>
               </select>
             </div>
             <div class="form-group">
               <label>ImmoNr</label>
               <input type="text" class="form-control" name="Property_External"  value="<?php echo $data->Property_External ?>">
             </div>
             <div class="form-group">
               <label>Betreuer</label>
               <input type="text" class="form-control" name="Agent" value="<?php echo $data->Agent ?>">
             </div>
             <div class="form-group">
               <label>Auftragsart</label>
               <select name="Type_of_order" class="form-control m-b">
               <option value="<?php echo $data->Type_of_order ?>" selected="selected" ><?php echo $data->Type_of_order ?></option>
               <option value="Exklusiv" style="color: #000000;">Exklusiv</option>
               <option value="Normal" style="color: #000000;">Normal</option>
               <option value="keine Angaben">keine Angaben</option>
               </select>
             </div>
             <div class="form-group">
               <label>Auftrag bis</label>
               <input type="date" class="form-control" name="Order_Until" value="<?php echo $data->Order_Until ?>">
             </div>
             <div class="form-group">
               <label>Verkauft am</label>
               <input type="date" class="form-control" name="Sold_on" value="<?php echo $data->Sold_on ?>">
             </div>
             <div class="form-group">
               <label>Letzte Aktion</label>
               <input type="date" class="form-control" name="last_action" value="<?php echo $data->last_action ?>">
             </div>
             <div class="form-group">
               <label>Status2</label>
               <select name="status2" class="form-control m-b">
               <option value="<?php echo $data->status2 ?>" selected="selected" ><?php echo $data->status2 ?></option>
               <option value="Inaktiv" style="color: #000000;">Inaktiv</option>
               <option value="Aktiv" style="color: #000000;">Aktiv</option>
               <option value="Archiviert" style="color: #000000;">Archiviert</option>
               </select>
             </div>
             <div class="form-group">
               <label>Objekttitel</label>
               <input type="text" class="form-control" name="property_title" value="<?php echo $data->property_title ?>">
             </div>
            
                 </div>
               </section>

              
             </div><!--col1-->
             
             
            
             <div class="col-sm-6"><!--col2-->
             <section class="panel panel-default">
                 <header class="panel-heading font-bold">Geografische-Angaben</header>
                 <div class="panel-body">

                 <div class="row">
                 <div class="col-sm-6">
                 <div class="form-group">
               <label>Hausnummer</label>
               <input type="text" class="form-control"  name="house_no" value="<?php echo $data->house_no ?>">
             </div>
                 </div>
                 <div class="col-sm-6">
                 <div class="form-group">
               <label>PLZ</label>
               <input type="text" class="form-control"  name="postal_code" value="<?php echo $data->postal_code ?>">
             </div>
                 </div>
                 </div>
                 <div class="form-group">
               <label>Strase</label>
               <input type="text" class="form-control"  name="street" value="<?php echo $data->street ?>">
             </div>
            
             <div class="row">
             <div class="col-sm-6">
             <div class="form-group">
               <label>Ort</label>
               <input type="text" class="form-control"  name="town" value="<?php echo $data->town ?>">
             </div>
             </div>
             <div class="col-sm-6">
             <div class="form-group">
               <label>Land</label>
               <select name="country" id="country" class="form-control m-b">
               <option value="<?php echo $data->country ?>" selected="selected" ><?php echo $data->country ?></option>
               <option value="Afganistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antigua & Barbuda">Antigua & Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bonaire">Bonaire</option>
<option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
<option value="Brunei">Brunei</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Canary Islands">Canary Islands</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Channel Islands">Channel Islands</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos Island">Cocos Island</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote DIvoire">Cote DIvoire</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Curaco">Curacao</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands">Falkland Islands</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Ter">French Southern Ter</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Great Britain">Great Britain</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Hawaii">Hawaii</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="Indonesia">Indonesia</option>
<option value="India">India</option>
<option value="Iran">Iran</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Isle of Man">Isle of Man</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea North">Korea North</option>
<option value="Korea Sout">Korea South</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Laos">Laos</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libya">Libya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Macedonia">Macedonia</option>
<option value="Madagascar">Madagascar</option>
<option value="Malaysia">Malaysia</option>
<option value="Malawi">Malawi</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Midway Islands">Midway Islands</option>
<option value="Moldova">Moldova</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Nambia">Nambia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherland Antilles">Netherland Antilles</option>
<option value="Netherlands">Netherlands (Holland, Europe)</option>
<option value="Nevis">Nevis</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau Island">Palau Island</option>
<option value="Palestine">Palestine</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Phillipines">Philippines</option>
<option value="Pitcairn Island">Pitcairn Island</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Republic of Montenegro">Republic of Montenegro</option>
<option value="Republic of Serbia">Republic of Serbia</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russia">Russia</option>
<option value="Rwanda">Rwanda</option>
<option value="St Barthelemy">St Barthelemy</option>
<option value="St Eustatius">St Eustatius</option>
<option value="St Helena">St Helena</option>
<option value="St Kitts-Nevis">St Kitts-Nevis</option>
<option value="St Lucia">St Lucia</option>
<option value="St Maarten">St Maarten</option>
<option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
<option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
<option value="Saipan">Saipan</option>
<option value="Samoa">Samoa</option>
<option value="Samoa American">Samoa American</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome & Principe">Sao Tome & Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syria</option>
<option value="Tahiti">Tahiti</option>
<option value="Taiwan">Taiwan</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania">Tanzania</option>
<option value="Thailand">Thailand</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad & Tobago">Trinidad & Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks & Caicos Is">Turks & Caicos Is</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="United Kingdom">United Kingdom</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Erimates">United Arab Emirates</option>
<option value="United States of America">United States of America</option>
<option value="Uraguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Vatican City State">Vatican City State</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Vietnam</option>
<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
<option value="Wake Island">Wake Island</option>
<option value="Wallis & Futana Is">Wallis & Futana Is</option>
<option value="Yemen">Yemen</option>
<option value="Zaire">Zaire</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
               </select>
             </div>
             </div>
             </div>
            
                 </div>
               </section>
            
               
                 
                 <section class="panel panel-default">
                 <header class="panel-heading font-bold">Kategorie</header>
                 <div class="panel-body">
                 <div class="form-group">
               <label>Objektart</label>
               <select name="Property_class" class="form-control m-b">
               <option value="<?php echo $data->Property_class ?>" selected="selected" ><?php echo $data->Property_class ?></option>
               <option value="zimmer" style="color: #000000;">Zimmer</option>
               <option value="haus" style="color: #000000;">Haus</option>
               <option value="wohnung" style="color: #000000;">Wohnung</option>
               <option value="grundstueck" style="color: #000000;">Grundstück</option>
               <option value="buero_praxen" style="color: #000000;">Büro/Praxen</option>
               <option value="einzelhandel" style="color: #000000;">Laden/Einzelhandel</option>
               <option value="gastgewerbe" style="color: #000000;">Gastgewerbe</option>
               <option value="hallen_lager_prod" style="color: #000000;">Hallen/Lager/Produktion</option>
               <option value="land_und_forstwirtschaft" style="color: #000000;">Land/Forstwirtschaft</option>
               <option value="freizeitimmbilien_gewerblich" style="color: rgb(102,153,204);">Freizeitimmobilie (gewerblich)</option>
               <option value="sonstige" style="color: #000000;">Sonstige</option>
               <option value="keine Angaben">keine Angaben</option>
             </select>
             </div>

             <div class="form-group">
               <label>Objekttyp</label>
               <select name="Property_type" class="form-control m-b">
               <option value="<?php echo $data->Property_type ?>" selected="selected" ><?php echo $data->Property_type ?></option>
               <option value="bungalow" style="color: #000000;">Bungalow</option>
               <option value="reihenhaus" style="color: #000000;">Reihenhaus</option>
               <option value="reihenend" style="color: rgb(102,153,204);">Reihenend</option>
               <option value="reihenmittel" style="color: #000000;">Reihenmittel</option>
               <option value="reiheneck" style="color: #000000;">Reiheneck</option>
               <option value="doppelhaushaelfte" style="color: #000000;">Doppelhaushälfte</option>
               <option value="einfamilienhaus" style="color: #000000;">Einfamilienhaus</option>
               <option value="stadthaus" style="color: rgb(102,153,204);">Stadthaus</option>
               <option value="villa" style="color: #000000;">Villa</option>
               <option value="resthof" style="color: rgb(102,153,204);">Resthof</option>
               <option value="bauernhaus" style="color: #000000;">Bauernhaus</option>
               <option value="landhaus" style="color: rgb(102,153,204);">Landhaus</option>
               <option value="schloss" style="color: #000000;">Schloss</option>
               <option value="zweifamilienhaus" style="color: #000000;">Zweifamilienhaus</option>
               <option value="mehrfamilienhaus" style="color: #000000;">Mehrfamilienhaus</option>
               <option value="ferienhaus" style="color: rgb(102,153,204);">Ferienhaus</option>
               <option value="berghuette" style="color: rgb(102,153,204);">Berghütte</option>
               <option value="chalet" style="color: rgb(102,153,204);">Chalet</option>
               <option value="strandhaus" style="color: rgb(102,153,204);">Strandhaus</option>
               <option value="wohn_und_geschaeftshaus" style="color: rgb(255,102,0);">Wohn- und Geschäftshaus</option>
               <option value="geschaeftshaus" style="color: rgb(255,102,0);">Geschäftshaus</option>
               <option value="wohnanlage" style="color: rgb(255,102,0);">Wohnanlage</option>
               <option value="keine Angaben">keine Angaben</option>
             </select>
             </div>

             <div class="form-group">
               <label>Nutzungsart</label>
               <select name="type_of_usage" class="form-control m-b">
               <option value="<?php echo $data->type_of_usage ?>" selected="selected" ><?php echo $data->type_of_usage ?></option>
               <option value="wohnen" style="color: #000000;">Wohnen</option>
               <option value="gewerbe" style="color: #000000;">Gewerbe</option>
               <option value="anlage" style="color: #000000;">Anlage</option>
               <option value="waz" style="color: #000000;">WAZ (Wohnen auf Zeit)</option>
             </select>
             </div>

             <div class="form-group">
               <label>Vermarktungsart</label>
               <select name="marketing_method" class="form-control m-b">
               <option value="<?php echo $data->marketing_method ?>" selected="selected" ><?php echo $data->marketing_method ?></option>
               <option value="kauf" style="color: #000000;">Kauf</option>
               <option value="miete" style="color: #000000;">Miete</option>
               <option value="pacht" style="color: #000000;">Pacht</option>
               <option value="erbpacht" style="color: #000000;">Erbpacht</option>
             </select>
             </div>
                 </div>
               </section>
               <button type="submit"  name= "edit_property_basic_data" class="btn btn-s-md btn-info btn-rounded"><i class="fa fa-save"></i></button>
                                 
             </div><!--col2-->
            
            
           
           </div><!--row-->
         </form>
                  
     <!-- End basic data Content-->
                     </div>
                     <div class="tab-pane" id="prices_surfaces">
                       <!--prices_surfaces start data-->
                       <form action="../../controllers/onoffice_database/onoffice_properties/onoffice_property_edit_prices_surfaces.php" method="POST" enctype="multipart/form-data">
                       <div class="row"><!--row-->
             <div class="col-sm-6"><!--col1-->
             <section class="panel panel-default">
                 <header class="panel-heading font-bold">Preise</header>
                 <div class="panel-body">

                 <input type="hidden" name="id" value="<?php  echo $_GET['id'];?>">

                <div class="form-group">
               <label>Wahrung</label>
               <select name="currency" class="form-control m-b">
               <option value="<?php echo $data->currency ?>" selected="selected" ><?php echo $data->currency ?></option>
               <option value="€" style="color: #000000;">€</option>
               <option value="$" style="color: #000000;">$</option>
               </select>
             </div>

             <div class="form-group">
               <label>Kaufpreis</label>
               <input type="text" class="form-control" name="purchase_price" value="<?php echo $data->purchase_price ?>">
               <a onclick="Calculate('calculator.php')"> <img src="images/calculator.png"/></a>
             </div>
            
             <script>
             function Calculate(url){
             window.open(url,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=400,height=400,directories=no,location=no') 
             }
           </script>

            <div class="form-group">
               <label>AuBen-Provision</label>
               <input type="text" class="form-control" name="external_commission" value="<?php echo $data->external_commission ?>">
             </div>
             <div class="form-group">
               <label>Innen-Provision</label>
               <input type="text" class="form-control" name="internal_commission" value="<?php echo $data->internal_commission ?>">
             </div>
             <div class="form-group">
               <label>zzgl.MwSt.auf Pr..</label>
               <select name="plus_VAT_to_provision" class="form-control m-b">
               <option value="Ja" style="color: #000000;">Ja</option>
               <option value="Nein"  style="color: #000000;">Nein</option>
               <option value="Keine Angaben"  style="color: #000000;">Keine Angaben</option>
               <option value="<?php echo $data->plus_VAT_to_provision ?>" selected="selected" ><?php echo $data->plus_VAT_to_provision ?></option>
               </select>
             </div>
                 </div>
               </section>
             </div>
             <div class="col-sm-6"><!--col1-->
             <section class="panel panel-default">
                 <header class="panel-heading font-bold">Flachen</header>
                 <div class="panel-body">
             
                 <div class="form-group">
               <label>Wohnfläche</label>
               <input type="text" class="form-control" name="living_area" value="<?php echo $data->living_area ?>">
               <a onclick="Calculate('calculator.php')"> <img src="images/calculator.png"/></a>
             </div>
             <div class="form-group">
               <label>Nutzfläche</label>
               <input type="text" class="form-control" name="usable_area" value="<?php echo $data->usable_area ?>">
               <a onclick="Calculate('calculator.php')"> <img src="images/calculator.png"/></a>
             </div>
             <div class="form-group">
               <label>Grundstücksgröße</label>
               <input type="text" class="form-control" name="number_of_rooms" value="<?php echo $data->number_of_rooms ?>">
               <a onclick="Calculate('calculator.php')"> <img src="images/calculator.png"/></a>
             </div>
             <div class="form-group">
               <label>Vermietbare Fläche</label>
               <input type="text" class="form-control" name="number_of_bedrooms" value="<?php echo $data->number_of_bedrooms ?>">
               <a onclick="Calculate('calculator.php')"> <img src="images/calculator.png"/></a>
             </div>
             <div class="form-group">
               <label>Anzahl Wohneinheit.</label>
               <input type="text" class="form-control" name="number_of_bathrooms" value="<?php echo $data->number_of_bathrooms ?>">
               <a onclick="Calculate('calculator.php')"> <img src="images/calculator.png"/></a>
             </div>
             <div class="form-group">
               <label>Anzahl Balkone</label>
               <input type="text" class="form-control" name="plot_surface" value="<?php echo $data->plot_surface ?>">
               <a onclick="Calculate('calculator.php')"> <img src="images/calculator.png"/></a>
             </div>
             <div class="form-group">
               <label>Anzahl Terrassen</label>
               <input type="text" class="form-control" name="number_of_toilets" value="<?php echo $data->number_of_toilets ?>">
               <a onclick="Calculate('calculator.php')"> <img src="images/calculator.png"/></a>
             </div>
           
                 </div>
               </section>
             </div>
                     </div>
                     <button type="submit" class="btn btn-s-md btn-info btn-rounded"><strong><i class="fa fa-save"></i></strong></button>
                     </form>
                       <!--prices_surfaces end data-->
                     </div>

                   

                     <div class="tab-pane" id="Files">

                     <?php
//$conn=new PDO('mysql:host=localhost; dbname=realestate', 'root', '') or die(mysql_error());
$conn = getDB();
if(isset($_POST['submit'])!=""){
$name=$_FILES['photo']['name'];
$property_id=$_POST['id'];
$size=$_FILES['photo']['size'];
$type=$_FILES['photo']['type'];
$temp=$_FILES['photo']['tmp_name'];
//$caption1=$_POST['caption'];
//$link=$_POST['link'];
move_uploaded_file($temp,"upload/".$name);
$query=$conn->query("insert into onoffice_property_files(onoffice_property_basic_data_id,file_)values($property_id,'$name')");
if($query){
//header("location:index.php");
}
else{
die(mysql_error());
}
}
?>

 <!--<link href="file_upload/css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">-->
 <link href='DataTables/datatables.min.css' rel='stylesheet' type='text/css'>
 

   <!-- jQuery Library -->
   <script src="../js/jquery-3.3.1.min.js"></script>
   
   <!-- Datatable JS -->
   <script src="../DataTables/datatables.min.js"></script>
   
<style>
</style>

<form enctype="multipart/form-data" action="" name="form" method="post">

<input type="hidden" name="id" value="<?php  echo $_GET['id'];?>">
  <input type="file" name="photo" id="photo" required/></td>
<br/>
  <input type="submit"  class="btn btn-s-md btn-info btn-rounded" name="submit" id="submit" value="Upload" />
 
            
</form>
<br />
<br />
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
<thead>
<tr>
  <th width="90%" align="center">Files</th>
  <th align="center">Action</th>	
</tr>
</thead>
<?php
$query=$conn->query("select * from onoffice_property_files where onoffice_property_basic_data_id=".$_GET['id']." order by id desc");
//echo("select * from onoffice_address_files where onoffice_address_id=".$_GET['id']." order by id desc");
//$query=$conn->query("select * from onoffice_address_files order by id desc");
while($row=$query->fetch()){
$name=$row['file_'];
$file_id=$row['id'];
?>
<tr>

<td>
  &nbsp;<?php echo $name ;?>
</td>
<td>
  <button class="alert-success"><a href="../../controllers/onoffice_database/onoffice_properties/onoffice_property_files.php?file_id=<?php echo $file_id;?>">Delete</a></button>
  </td>
  <td>
  <button class="alert-success"><a href="onoffice_property_files_download.php?filename=<?php echo $name;?>">Download</a></button>
</td>
</tr>
<?php }?>
</table>
</div>
                   
                   
                     <div class="tab-pane" id="Property_Search">

                     <!--Property start data-->
                     Immobilien &nbsp;&nbsp;&nbsp;<a href="#modal-form" class="btn btn-s-md btn-info btn-rounded"  data-toggle="modal"><i class="fa fa-plus-circle"></i></a>
                      <div class="modal fade" id="modal-form">
 <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-body">
       <div class="row">
        
           <h4 class="m-t-none m-b">Interessenten</h4>
           
           <form action="../../controllers/onoffice_database/onoffice_properties/onoffice_property_add_property_buyer.php" method="POST" enctype="multipart/form-data">

           <input type="hidden" name="id"  value="<?php  echo $_GET['id'];?>">
             <div class="form-group">
               <label>Name</label>
               <input type="text" class="form-control" name="name">
             </div>
             <div class="form-group">
               <label>Modus</label>
               <select name="mode" class="form-control m-b">
               <option value="automaticAssign" data-sel-id="automaticAssign" class="" selected="selected">Automatische Zuordnung</option>
               <option value="manuallyAssign" data-sel-id="manuallyAssign" class="">Manuelle Zuordnung</option>
               <option value="offered" data-sel-id="offered" class="">Bisher angeboten</option>
             </select>
             </div>
             <div class="form-group">
               <label>Filter</label>
               <select name="filter" class="form-control m-b">
               <option value="Bitte wählen" data-sel-id="" class="" selected="selected">Bitte wählen:</option>
                  <option value="100.000 € - 300.000 €" data-sel-id="1" class="">100.000 € - 300.000 €</option>
                  <option value="aktive Objekte" data-sel-id="6" class="">aktive Objekte</option>
                  <option value="aktive Objekte ohne Aktivitäten" data-sel-id="21" class="">aktive Objekte ohne Aktivitäten</option>
                  <option value="Archivierte Immobilien" data-sel-id="7" class="">Archivierte Immobilien</option>
                  <option value="Favoriten Objekte" data-sel-id="12" class="">Favoriten Objekte</option>
                  <option value="Immobilien ohne Eigentümer" data-sel-id="105" class="">Immobilien ohne Eigentümer</option>
                  <option value="Inaktive Immobilien" data-sel-id="29" class="">Inaktive Immobilien</option>
                  <option value="Meine Immobilien" data-sel-id="14" class="">Meine Immobilien</option>
                  <option value="Nicht-veröffentlichte Objekte" data-sel-id="23" class="">Nicht-veröffentlichte Objekte</option>
             </select>
             </div>
             <div class="form-group">
               <label>Systemstatus</label>
               <select name="status" class="form-control m-b">
               <option value="Aktiv" data-sel-id="1" class="" selected="selected">Aktiv</option>
               <option value="Archiviert" data-sel-id="0" class="">Archiviert</option>
               <option value="Inaktiv" data-sel-id="2" class="">Inaktiv</option>
             </select>
             </div>
             <div class="form-group">
               <label>Status</label>
               <select name="status2" class="form-control m-b">
               <option value="Alle" data-sel-id="all" class="" selected="selected">Alle</option>
               <option value="Aktiv" data-sel-id="status2obj_aktiv" class="">Aktiv</option>
               <option value="Aktive Vermarktung" data-sel-id="aktive_vermarktung" class="">Aktive Vermarktung</option>
               <option value="Passive Vermarktung" data-sel-id="passive_vermarktung" class="">Passive Vermarktung</option>
               <option value="Reserviert" data-sel-id="reserviert" class="">Reserviert</option>
             </select>
             </div>
             <div class="form-group">
               <label>Anzahl Datensatze</label>
               <select name="no_of_datasets" class="form-control m-b">
               <option value="50" data-sel-id="50" class="">50</option>
               <option value="100" data-sel-id="100" class="">100</option>
               <option value="250" data-sel-id="250" class="">250</option>
               <option value="500" data-sel-id="500" class="" selected="selected">500</option>
             </select>
             </div>
             <div class="form-group">
               <label>Anzeigen uber</label>
               <input type="text" class="form-control" name="display_above">
             </div>

             <div class="row">
                     <div class="col-md-4">
                     <div class="checkbox">
                     <div class="form-group">
                       <label  class="col-lg-2 control-label">
                         <input type="checkbox" name="hide_contacted_interested_parties"  value="yes"> Kontaktierte Interssenten ausblenden
                       </label>
                   </div>
                     </div>
                     </div>
                            <div class="col-md-4">
                     <div class="checkbox">
                     <div class="form-group">
                       <label  class="col-lg-2 control-label">
                         <input type="checkbox" name="only_show_int_par"  value="yes"> Nur eigene Interessenten darstellen
                       </label>
                      </div>
                     </div>
                     </div>

                     </div>

                     <div class="row">
                     <div class="col-md-4">
                     <div class="checkbox">
                     <div class="form-group">
                       <label  class="col-lg-2 control-label">
                         <input type="checkbox" name="hide_rejections"  value="yes"> Verknupfungen ausblenden
                       </label>
                   </div>
                     </div>
                     </div>
                            <div class="col-md-4">
                     <div class="checkbox">
                     <div class="form-group">
                       <label  class="col-lg-2 control-label">
                         <input type="checkbox" name="hide_links"  value="yes">Absagen ausblenden
                       </label>
                      </div>
                     </div>
                     </div>

                     </div>

             <button type="submit" class="btn btn-sm btn-success pull-right text-uc m-t-n-xs"><strong><i class="fa fa-save"></i></strong></button>
                           
           </form>
         
        
       </div>          
     </div>
   </div><!-- /.modal-content -->
 </div><!-- /.modal-dialog -->
</div>

<div class="container">
  <h3>Interessenten</h3>
<?php
echo "<table class='table' style='display: block;
overflow-x: auto;
white-space: nowrap;'>";
echo "<tr class='info'><th>Name</th><th>Modus</th>
<th>Filter</th><th>Systemstatus</th><th>Status2</th><th>Anzahl Datensätze</th><th>Anzeigen über</th>
 <th>Kontaktierte Interssenten ausblenden</th><th>Nur eigene Interessenten darstellen</th><th>Verknupfungen ausblenden</th>
 <th>Absagen ausblenden</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr class='success'>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "realestate";

try {
    //$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn = getDB();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT `name`, `mode`, `filter`, `status`, `status2`, `no_of_datasets`, `display_above`, `hide_contacted_interested_parties`, `only_show_int_par`, `hide_rejections`, `hide_links`  FROM onoffice_property_propective_buyer WHERE onoffice_property_basic_data_id=:property_id");
    $stmt->bindParam("property_id",$_GET['id'],PDO::PARAM_INT) ;
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>
</div>

                     <!--Property end data-->
                     </div>



                     
                   </div>
                 </div>
               </section>
<!--end main tabs-->
    
       
       <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
     </section>
     <aside class="bg-light lter b-l aside-md hide" id="notes">
       <div class="wrapper">Notification</div>
     </aside>
   </section>
 </section>
</section>
<?php include "../footer.php"?>