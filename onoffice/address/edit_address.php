<?php include "../../header.php" ?>

<?php include('../../controllers/addressClass.php');
$addressClass = new addressClass();
$data=$addressClass->addressDetails($_GET['id']);
//print_r($data->Customer_logo);
$files=$addressClass->addressFiles($_GET['id']);
//print_r($files);
?>

<section class="vbox">
    
        <!-- /.aside -->
        <section id="content">
          <section class="vbox">
            <section class="scrollable padder">
              
            <div class="m-b-md">
          <h3 class="m-b-none">Adressen &nbsp;&nbsp;&nbsp;
          <a href="index.php" class="btn btn-s-md btn-info btn-rounded"> <i class="fa fa-arrow-left"></i></a>
        </h3>

        <div class="clearfix m-b" style="float:right;">
                          <a href="#" class="pull-left thumb m-r">
                            <img src=<?php echo "images/".$data->Customer_logo ?> class="img-circle">
                          </a>
                          <div class="clear">
                            <div class="h3 m-t-xs m-b-xs"><?php echo $data->name ?></div>
                            <small class="text-muted"><i class="fa fa-map-marker"></i> <?php echo $data->city ?></small>
                          </div>                
                        </div>
        </div>
<!--start main tabs-->
<section class="panel panel-default">
                    <header class="panel-heading bg-light">
                      <ul class="nav nav-tabs nav-justified">
                        <li class="active"><a href="#basic_data" data-toggle="tab">Grunddaten</a></li>
                        <li><a href="#Files" data-toggle="tab">Dateien</a></li>
                        <li><a href="#Property_Search" data-toggle="tab">Immosuche</a></li>
                        <li><a href="#Selbstauskunft" data-toggle="tab">Selbstauskunft</a></li>           
                      </ul>
                    </header>
                    <div class="panel-body">
                      <div class="tab-content">
                        <div class="tab-pane active" id="basic_data">
                           <!-- Start basic data Content-->

        <form name="address_basic_data" action="../../controllers/onoffice_database/onoffice_address/onoffice_address_edit.php" method="POST" enctype="multipart/form-data">
        <div class="row">
        
                <div class="col-sm-6">
                  <section class="panel panel-default">
                    <header class="panel-heading font-bold">Stammdaten 
                   </header>
                    <div class="panel-body">
                      <form role="form">
                                 
                      <section class="panel panel-default">
                    <header class="panel-heading bg-light">
                      <ul class="nav nav-tabs nav-justified">
                      <li class="active"><a href="#general" data-toggle="tab">Allgemein</a></li>
                      <li><a href="#master" data-toggle="tab">Stammdaten-2</a></li>
                      <li><a href="#profession" data-toggle="tab">Beruf</a></li>
                      </ul>
                    </header>
                    <div class="panel-body">
                      <div class="tab-content">
                       <!--general start--> <div class="tab-pane active" id="general">
                       <input type="hidden" name="id"  value="<?php  echo $_GET['id'];?>">

                        <div class="form-group">
                          <label class="col-sm-2 control-label">EintrDate</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control" name="entry_date" value=<?php echo $data->entry_date; ?>  >
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Anrede Titel</label>
                          <div class="col-sm-10">
                          <select name="salutation" class="form-control m-b" >
                          <option value="<?php echo $data->salutation ?>" selected="selected" ><?php echo $data->salutation ?></option>
                          <option value="keine Angabe" style="color: #000000;">keine Angabe</option>
                          <option value="Herr" style="color: #000000;">Herr</option>
                          <option value="Frau" style="color: #000000;">Frau</option>
                          <option value="Firma" style="color: #000000;">Firma</option>
                          <option value="Familie" style="color: #000000;">Familie</option>
                          <option value="Eheleute" style="color: #000000;">Eheleute</option>
                          </select>
                          </div>
                        </div>
                        
                       <div class="form-group">
                          <label class="col-sm-2 control-label">Vorname</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="first_name" value=<?php echo $data->first_name; ?> >
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-2 control-label">Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value=<?php echo $data->name; ?>>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Firma</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="company" value=<?php echo $data->company; ?>>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">FirmaZusatz</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control"  name="company_additional" value=<?php echo $data->company_additional; ?>>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Strase</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="street" value=<?php echo $data->street; ?>>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Plz</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="zip" value=<?php echo $data->zip; ?>>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Ort</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="city" value=<?php echo $data->city; ?>>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Land</label>
                          <div class="col-sm-10">
                          <select tabindex="12" name="country" id="Country"  class="form-control m-b">
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
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Telefon1</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="telefon1" value=<?php echo $data->telefon1; ?>  >
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Telefon2</label>
                          <div class="col-sm-10">
                          
                            <input type="text" class="form-control" name="telefon2" value=<?php echo $data->telefon2; ?> >
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Mobil</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="mobile" pattern="[0-9]{10}" value=<?php echo $data->mobile; ?>  >
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Telefaxnummern</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="fax_no" value=<?php echo $data->fax_no; ?>>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Geburtsdatum</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control" name="birthdate" value=<?php echo $data->birthdate; ?>>
                          </div>
                        </div>

                        <!--general end--></div>
                      <!--mastrt start-->  <div class="tab-pane" id="master">
                      <div class="form-group">
                          <label class="col-sm-2 control-label">Anrede Titel2</label>
                          <div class="col-sm-10">
                          <select name="salutation2" class="form-control m-b">
                          <option value="<?php echo $data->salutation2 ?>" selected="selected" ><?php echo $data->salutation2 ?></option>
                          <option value="keine Angabe" style="color: #000000;">keine Angabe</option>
                          <option value="Herr" style="color: #000000;">Herr</option>
                          <option value="Frau" style="color: #000000;">Frau</option>
                          <option value="Firma" style="color: #000000;">Firma</option>
                          <option value="Familie" style="color: #000000;">Familie</option>
                          <option value="Eheleute" style="color: #000000;">Eheleute</option>
                          </select>
                          </div>
                        </div>

                       <div class="form-group">
                          <label class="col-sm-2 control-label">Vorname2</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="first_name2" value=<?php echo $data->first_name2; ?>  >
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-2 control-label">Name2</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="last_name2" value=<?php echo $data->last_name2; ?>>
                          </div>
                        </div>  
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Geburtsdatum2</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control" name="birthdate2" value=<?php echo $data->birthdate2; ?>>
                          </div>
                        </div>
                        </div><!--mastrt end-->

                        <!--profession start--><div class="tab-pane" id="profession">
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Arbeitgeber</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="employer" value=<?php echo $data->employer; ?>>
                          </div>
                        </div> 
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Berufsbezeichnung</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="job_title" value=<?php echo $data->job_title; ?>>
                          </div>
                        </div> 
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Position</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="position" value=<?php echo $data->position; ?>>
                          </div>
                        </div> 
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Einkommen</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="salary" value=<?php echo $data->salary; ?>>
                          </div>
                        </div> 
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Arbeitsverhältnis</label>
                          <div class="col-sm-10">
                          <select name="employment" class="form-control m-b" value=<?php echo $data->employment; ?>>
                          <option value="temporary" style="color: #000000;">temporary</option><option value="permanent" style="color: #000000;">permanent</option><option value="" selected="selected">not specified</option>
                          </select>
                          </div>
                        </div>
                        <!--profession end--></div>
                      </div>
                    </div>
                  </section>
    


                      </form>
                    </div>



                    
                  <section class="panel panel-default">
                    <header class="panel-heading font-bold">Hauptkontakte&nbsp;&nbsp;&nbsp;
                      <!--<a href="#main_contact" class="btn btn-s-md btn-info btn-rounded"  data-toggle="modal"><i class="fa fa-plus-circle"></i> Assign</a>-->
                  </header>

                  <div class="form-group">
                          <label  class="col-sm-2 control-label">Hauptkontakte Name</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control"  name="main_contact" value=<?php echo $data->main_contact; ?>  >
                          </div>
                        </div>
                        
                  </section>


                  <section class="panel panel-default">
                    <header class="panel-heading font-bold">Unterkontakte&nbsp;&nbsp;&nbsp;
                      <!--<a href="#main_contact" class="btn btn-s-md btn-info btn-rounded"  data-toggle="modal"><i class="fa fa-plus-circle"></i> Assign</a>-->
                  </header>

                  <div class="form-group">
                          <label  class="col-sm-2 control-label">Unterkontakte Name</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control"  name="second_contact"  value=<?php echo $data->second_contact; ?> >
                          </div>
                        </div>
                        
                  </section>
                  </section>
                </div>
                
                
                <div class="col-sm-6">
                  <section class="panel panel-default">
                    <header class="panel-heading font-bold">Verwaltung</header>
                    <div class="panel-body">
                    <div class="bs-example form-horizontal">
                         <div class="form-group">
                          <label class="col-sm-2 control-label">Status</label>
                          <div class="col-sm-10">
                          <select name="Status" class="form-control m-b">
                          <option value="<?php echo $data->Status ?>" selected="selected" ><?php echo $data->Status ?></option>
                          <option value="status2adr_active" selected="selected" style="color: #000000;">Aktiv</option>
                          <option value="status2adr_archive" style="color: #000000;">Archiviert</option>
                          </select>
                          </div>
                        </div>


                        <div class="form-group">
                          <label class="col-sm-2 control-label">Betreuer</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control"name="Agent"  value=<?php echo $data->Agent; ?> >
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-2 control-label">Kontaktart</label>
                          <div class="col-sm-10">
                          <select name="Type_of_contract" class="form-control m-b">
                          <option value="<?php echo $data->Type_of_contract ?>" selected="selected" ><?php echo $data->Type_of_contract ?></option>
                          <option value="Privatkontakt">Privatkontakt</option>
                          <option value="indMulti673Select249">indMulti673Select249</option>
                          <option value="indMulti673Select250">indMulti673Select250</option>
                          <option value="Kunde">Kunde</option>
                          <option value="Notar">Notar</option>
                          <option value="Eigentümer">Eigentümer</option>
                          <option value="Makler">Makler</option>
                          <option value="Investor">Investor</option>
                          <option value="Tippgeber">Tippgeber</option>
                          <option value="Exposé-Sammler">Exposé-Sammler</option>
                          <option value="Kooperationspartner">Kooperationspartner</option>
                          <option value="Newsletter-Empfänger">Newsletter-Empfänger</option>
                          <option value="Premiumkunde">Premiumkunde</option>
                          </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-2 control-label">Letzte Aktion</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control"  name="Last_action"  value=<?php echo $data->Last_action; ?>  >
                          </div>
                        </div>

<div class="row">
<div class="col-sm-6">

<div class="form-group">
                          <label class="col-sm-4 control-label">Herkunft Kontakt</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="Contact_source"  value=<?php echo $data->Contact_source; ?> >
                          </div>
                        </div>
</div>
<div class="col-sm-6">
<div class="form-group">
                          <label class="col-sm-2 control-label">Tippgeber</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="Lead" value=<?php echo $data->Lead; ?> >
                          </div>
                        </div>
</div>
</div>

                      

                        <div class="form-group">
                          <label class="col-sm-2 control-label">Newsletter</label>
                          <div class="col-sm-10">
                          <select name="Newsletter" class="form-control m-b" >
                          <option value="<?php echo $data->Newsletter ?>" selected="selected" ><?php echo $data->Newsletter ?></option>
                          <option value="1" style="color: #000000;">Yes</option>
                          <option value="0" style="color: #000000;">No</option>
                          <option value="2" style="color: #000000;">Cancellation</option>
                          <option value="3" style="color: #000000;">Double Opt-In pending</option>
                          <option value="4" style="color: #000000;">not specified</option>
                          </select>
                          </div>
                        </div>

                        <div class="row">
                       
                        <div class="col-md-4">
                        <div class="checkbox">
                        <div class="form-group">
                          <label  class="col-sm-2 control-label">
                            <input type="checkbox" name="Accepted_recall" value="yes" <?php echo ($data->Accepted_recall=='1')?"checked":"" ;?>> AGB akzeptiert
                          </label>
                      </div>
                        </div>
                        </div>
                       
                        <div class="col-md-4">
                        <div class="checkbox">
                        <div class="form-group">
                          <label  class="col-sm-2 control-label">
                            <input type="checkbox" name="Terms_accepted" value="yes" <?php echo ($data->Terms_accepted=='1')?"checked":"" ;?>>Rückruf akzeptiert
                          </label>
                      </div>
                        </div>
                        </div>
                       
                        <div class="col-md-4">
                        <div class="checkbox">
                        <div class="form-group">
                          <label  class="col-sm-2 control-label">
                            <input type="checkbox" name="Vip_contact" value="yes" <?php echo ($data->Vip_contact=='1')?"checked":"" ;?>> VIP-Kontakt
                          </label>
                         </div>
                        </div>
                        </div>

                        </div>

                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Kunde seit</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control" name="Customer_since"  value=<?php echo $data->Customer_since; ?> >
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Warnhinweis</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="warning_msg"  value=<?php echo $data->warning_msg; ?>  >
                          </div>
                        </div>
                   <div class="form-group">
                          <label class="col-sm-2 control-label" >Speichern bis Datu..</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control" name="Save_until_date"  value=<?php echo $data->Save_until_date; ?>  >
                          </div>
                        </div>

<div class="row">
<div class="col-sm-6">
<div class="form-group">
                          <label  class="col-sm-4 control-label">Speichern bis Grun..</label>
                          <div class="col-sm-8">
                          <select name="Save_until_reason" class="form-control m-b">
                          <option value="<?php echo $data->Save_until_reason ?>" selected="selected" ><?php echo $data->Save_until_reason ?></option>
                          <option value="aufbewahrungsfrist" style="color: #000000;">aufbewahrungsfrist</option>
                          <option value="nachweispflicht" style="color: #000000;">nachweispflicht</option>
                          <option value="vertrag" style="color: #000000;">vertrag</option>
                          <option value="vorvertraglanbahnungsver" style="color: #000000;">vorvertraglanbahnungsver</option>
                          
                          </select>
                          </div>
                        </div>
</div>
<div class="col-sm-6">
<div class="form-group">
                          <label  class="col-sm-4 control-label">DSGVO Status</label>
                          <div class="col-sm-8">
                          <select name="GDPR_status" class="form-control m-b">
                          <option value="ignorieren" style="color: #000000;">ignorieren</option>
                          <option value="speicherungwiderrufen" style="color: #000000;">speicherungwiderrufen</option>
                          <option value="speicherungzugestimmt" style="color: #000000;">speicherungzugestimmt</option>
                          
                          <option value="<?php echo $data->GDPR_status ?>" selected="selected" ><?php echo $data->GDPR_status ?></option>                      
                          </select>
                          </div>
                        </div>
</div>
</div>
                       

                       
                      </div>
                    </div>
                  </section>


                  <section class="panel panel-default">
                    <header class="panel-heading font-bold">Kontakt</header>
                    <div class="panel-body">
                    <div class="bs-example form-horizontal">
                       <div class="row">
                       <div class="col-sm-6">
                       <div class="form-group">
                          <label class="col-sm-3 control-label">Email1</label>
                          <div class="col-sm-9">
                            <input type="email" name="Email1" class="form-control"  value=<?php echo $data->Email1; ?>  >
                          </div>
                        </div>
                       </div>
                       <div class="col-sm-6">
                       <div class="form-group">
                          <label class="col-sm-3 control-label">Email2</label>
                          <div class="col-sm-9">
                            <input type="email" class="form-control" name="Email2"  value=<?php echo $data->Email2; ?>  >
                          </div>
                        </div>
                       </div>
                       </div>
                 
                       
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Homepage</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="Homepage"   value=<?php echo $data->Homepage; ?>  >
                          </div>
                        </div>
                        
                        <div class="row">
                        <div class="col-sm-6">

                        <div class="form-group">
                        <label class="col-sm-4 control-label">Briefanrede</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="contact_salutation"  value=<?php echo $data->contact_salutation; ?> >
                          </div>
                        </div>

                        </div>
                        <div class="col-sm-6">

                        <div class="form-group">
                          <label class="col-sm-4 control-label">Letzter Kontakt</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="Last_Contact"  value=<?php echo $data->Last_Contact; ?>  >
                          </div>
                        </div>
                        </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Eintragsdatum</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control" name="contact_Entry_Date"  value=<?php echo $data->contact_Entry_Date; ?>  >
                          </div>
                        </div>

                       

                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Bevorzugte Kontakt..</label>
                          <div class="col-sm-9">
                          <select name="Preferred_form_of" class="form-control m-b">
                          <option value="<?php echo $data->Preferred_form_of ?>" selected="selected" ><?php echo $data->Preferred_form_of ?></option>                      
                          <option value="Brief" style="color: #000000;">Brief</option>
                          <option value="Email" style="color: #000000;">Email</option>
                          <option value="Telefax" style="color: #000000;">Telefax</option>
                          <option value="Telefon" style="color: #000000;">Telefon</option>
                          <option value="" >not specified</option>                        
                          </select>
                          </div>
                        </div>

                       
                      </div>
                    </div>
                  </section>
                  <button type="submit"  name= "address_basic_data" class="btn btn-s-md btn-info btn-rounded"><i class="fa fa-save"></i></button>
                </div>
               
              
              </div>
</form>
        <!-- End basic data Content-->
                        </div>
                        
                        <div class="tab-pane" id="Files">
<?php
//$conn=new PDO('mysql:host=localhost; dbname=realestate', 'root', '') or die(mysql_error());
$db = getDB();
if(isset($_POST['submit'])!=""){
  $name=$_FILES['photo']['name'];
  $address_id=$_POST['id'];
  $size=$_FILES['photo']['size'];
  $type=$_FILES['photo']['type'];
  $temp=$_FILES['photo']['tmp_name'];
  //$caption1=$_POST['caption'];
  //$link=$_POST['link'];
  move_uploaded_file($temp,"upload/".$name);
$query=$db->query("insert into onoffice_address_files(onoffice_address_id,file_)values($address_id,'$name')");
if($query){
//header("location:index.php");
}
else{
die(mysql_error());
}
}
?>

		<!--<link href="file_upload/css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">-->
    <link href='../DataTables/datatables.min.css' rel='stylesheet' type='text/css'>
    

      <!-- jQuery Library -->
      <script src="../js/jquery-3.3.1.min.js"></script>
      
      <!-- Datatable JS -->
      <script src="../DataTables/datatables.min.js"></script>
      


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
    	$query=$db->query("select * from onoffice_address_files where onoffice_address_id=".$_GET['id']." order by id desc");
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
					<button class="alert-success"><a href="../../controllers/onoffice_database/onoffice_address/onoffice_address_files.php?file_id=<?php echo $file_id;?>">Delete</a></button>
          </td>
          <td>
          <button class="alert-success"><a href="onoffice_address_files_download.php?filename=<?php echo $name;?>">Download</a></button>
				</td>
			</tr>
			<?php }?>
		</table>
   </div>

   <div class="tab-pane" id="Selbstauskunft">
   <section class="panel panel-default"> 
                   
                      
      </section>
   </div>       
                      
                        <div class="tab-pane" id="Property_Search">

                        <!--Property start data-->
                        Immobilien &nbsp;&nbsp;&nbsp;<a href="#modal-form" class="btn btn-s-md btn-info btn-rounded"  data-toggle="modal"><i class="fa fa-plus-circle"></i></a>
                         <div class="modal fade" id="modal-form">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <div class="row">
          <h3 class="m-t-none m-b">Immosuche</h3>
          <form action="../../controllers/onoffice_database/onoffice_address/onoffice_address_add_property_buyer.php" method="POST" enctype="multipart/form-data">
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
                  <select  name="status" class="form-control m-b">
                  <option value="Aktiv" data-sel-id="1" class="" selected="selected">Aktiv</option>
                  <option value="Archiviert" data-sel-id="0" class="">Archiviert</option>
                  <option value="Inaktiv" data-sel-id="2" class="">Inaktiv</option>
                </select>
                </div>
                <div class="form-group">
                  <label>Status2</label>
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
                  <input type="text" class="form-control" placeholder="%" name="display_above">
                </div>

                <div class="row">
                       
                        <div class="col-md-4">
                        <div class="checkbox">
                        <div class="form-group">
                          <label  class="col-sm-2 control-label">
                            <input type="checkbox" name="Bereits"  value="yes"> Bereits angebotene ausblenden
                          </label>
                      </div>
                        </div>
                        </div>
                       
                       
                       
                        <div class="col-md-4">
                        <div class="checkbox">
                        <div class="form-group">
                          <label  class="col-sm-2 control-label">
                            <input type="checkbox" name="Nur"  value="yes"> Nur eigene darstellen
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
 <th>Bereits angebotene ausblenden</th><th>Nur eigene darstellen</th></tr>";

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
    $stmt = $conn->prepare("SELECT `name`, `mode`, `filter`, `status`, `status2`, `no_of_datasets`, `display_above`, `hide_already_offered`, `only_show_own`  FROM onoffice_address_property_serach WHERE onoffice_address_id=:address_id");
    $stmt->bindParam("address_id",$_GET['id'],PDO::PARAM_INT) ;
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