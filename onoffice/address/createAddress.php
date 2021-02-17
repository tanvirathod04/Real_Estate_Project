<?php include "../../header.php" ?>

<section class="vbox">
    
        <!-- /.aside -->
        <section id="content">
          <section class="vbox">
            <section class="scrollable padder">
              
            <div class="m-b-md">
          <h3 class="m-b-none">Adressen &nbsp;&nbsp;&nbsp;
          <a href="index.php" class="btn btn-s-md btn-info btn-rounded"> <i class="fa fa-arrow-left"></i></a>
        </h3>
        </div>
<!--start main tabs-->
<section class="panel panel-default">
                   
                    <div class="panel-body">
                      
                           <!-- Start basic data Content-->

        <form name="address_basic_data" action="../../controllers/onoffice_database/onoffice_address/onoffice_address_add.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="company_id" value="<?php  echo $userDetails->company_id?>">
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
                       <div class="form-group">
                          <label class="col-sm-3 control-label">KdNr</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="client_id"  value="<?php
echo uniqid();
?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">EintrDate</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control" name="entry_date" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Anrede Titel</label>
                          <div class="col-sm-9">
                          <select name="salutation" class="form-control m-b" required>
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
                          <label class="col-sm-3 control-label">Vorname</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="first_name" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Firma</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="company" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">FirmaZusatz</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control"  name="company_additional"  >
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Strase</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="street"  required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Plz</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="zip"  required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Ort</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="city"  required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Land</label>
                          <div class="col-sm-9">
                          <select tabindex="12" name="country" id="Country" class="form-control m-b" required>
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
                          <label class="col-sm-3 control-label">Telefon1</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="telefon1"  >
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Telefon2</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="telefon2"  >
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Mobil</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" pattern="[0-9]{10}" name="mobile"  required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Telefaxnummern</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="fax_no"   >
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Geburtsdatum</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control" name="birthdate"   >
                          </div>
                        </div>

                        <!--general end--></div>
                      <!--mastrt start-->  <div class="tab-pane" id="master">
                      <div class="form-group">
                          <label class="col-sm-3 control-label">Anrede Titel2</label>
                          <div class="col-sm-9">
                          <select name="salutation2" class="form-control m-b">
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
                          <label class="col-sm-3 control-label">Vorname2</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="first_name2"  >
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Name2</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="last_name2"  >
                          </div>
                        </div>  
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Geburtsdatum2</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control" name="birthdate2"  >
                          </div>
                        </div>
                        </div><!--mastrt end-->

                        <!--profession start--><div class="tab-pane" id="profession">
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Arbeitgeber</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="employer" >
                          </div>
                        </div> 
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Berufsbezeichnung</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="job_title">
                          </div>
                        </div> 
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Position</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="position" >
                          </div>
                        </div> 
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Einkommen</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="salary" >
                          </div>
                        </div> 
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Arbeitsverhältnis</label>
                          <div class="col-sm-9">
                          <select name="employment" class="form-control m-b">
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
                          <label  class="col-sm-4 control-label">Hauptkontakte Name</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control"  name="main_contact" required>
                          </div>
                        </div>
                        
                  </section>


                  <section class="panel panel-default">
                    <header class="panel-heading font-bold"> Unterkontakte&nbsp;&nbsp;&nbsp;
                      <!--<a href="#main_contact" class="btn btn-s-md btn-info btn-rounded"  data-toggle="modal"><i class="fa fa-plus-circle"></i> Assign</a>-->
                  </header>

                  <div class="form-group">
                          <label  class="col-sm-4 control-label">Unterkontakte Name</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control"  name="second_contact" required>
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
                          <option value="status2adr_active" selected="selected" style="color: #000000;">Aktiv</option>
                          <option value="status2adr_archive" style="color: #000000;">Archiviert</option>
                           
                          </select>
                          </div>
                        </div>


                        <div class="form-group">
                          <label class="col-sm-2 control-label">Betreuer</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="Agent"  required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-2 control-label">Kontaktart</label>
                          <div class="col-sm-10">
                          <select name="Type_of_contract" class="form-control m-b">
                         
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
                          <label class="col-sm-3 control-label">Letzte Aktion</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control" name="Last_action" required>
                          </div>
                        </div>

<div class="row">
<div class="col-sm-6">

<div class="form-group">
                          <label class="col-sm-4 control-label">Herkunft Kontakt</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control"  name="Contact_source" required>
                          </div>
                        </div>
</div>
<div class="col-sm-6">
<div class="form-group">
                          <label class="col-sm-4 control-label">Tippgeber</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control"  name="Lead" required>
                          </div>
                        </div>
</div>
</div>

                      

                        <div class="form-group">
                          <label class="col-sm-2 control-label">Newsletter</label>
                          <div class="col-sm-9">
                          <select name="Newsletter" class="form-control m-b">
                          <option value="1" style="color: #000000;">Yes</option>
                          <option value="0" style="color: #000000;">No</option>
                          <option value="2" style="color: #000000;">Cancellation</option>
                          <option value="3" style="color: #000000;">Double Opt-In pending</option>
                          <option value="4" selected="selected" style="color: #000000;">not specified</option>
                          </select>
                          </div>
                        </div>

                        <div class="row">
                       
                        <div class="col-md-4">
                        <div class="checkbox">
                        <div class="form-group">
                          <label  class="col-sm-2 control-label">
                            <input type="checkbox" name="Terms_accepted" value="yes"> Rückruf akzeptiert
                          </label>
                      </div>
                        </div>
                        </div>
                       
                        <div class="col-md-4">
                        <div class="checkbox">
                        <div class="form-group">
                          <label  class="col-sm-2 control-label">
                            <input type="checkbox" name="Accepted_recall" value="yes"> AGB akzeptiert
                          </label>
                      </div>
                        </div>
                        </div>
                       
                        <div class="col-md-4">
                        <div class="checkbox">
                        <div class="form-group">
                          <label  class="col-sm-2 control-label">
                            <input type="checkbox" name="Vip_contact" value="yes"> VIP-Kontakt
                          </label>
                         </div>
                        </div>
                        </div>

                        </div>

                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Kunde seit</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control" name="Customer_since" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Warnhinweis</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="warning_msg" required>
                          </div>
                        </div>
                   <div class="form-group">
                          <label class="col-sm-2 control-label" >Speichern bis Datu..</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control" name="Save_until_date" required>
                          </div>
                        </div>

<div class="row">
<div class="col-sm-6">
<div class="form-group">
                          <label  class="col-sm-4 control-label">Speichern bis Grun..</label>
                          <div class="col-sm-8">
                          <select name="Save_until_reason" class="form-control m-b">
                          <option value="aufbewahrungsfrist" style="color: #000000;">aufbewahrungsfrist</option>
                          <option value="nachweispflicht" style="color: #000000;">nachweispflicht</option>
                          <option value="vertrag" style="color: #000000;">vertrag</option>
                          <option value="vorvertraglanbahnungsver" style="color: #000000;">vorvertraglanbahnungsver</option>
                          <option value="" selected="selected">not specified</option>
                          </select>
                          </div>
                        </div>
</div>
<div class="col-sm-6">
<div class="form-group">
                          <label  class="col-sm-3 control-label">DSGVO Status</label>
                          <div class="col-sm-9">
                          <select name="GDPR_status" class="form-control m-b">
                        <option value="ignorieren" style="color: #000000;">ignorieren</option>
                          <option value="speicherungwiderrufen" style="color: #000000;">speicherungwiderrufen</option>
                          <option value="speicherungzugestimmt" style="color: #000000;">speicherungzugestimmt</option>
                          <option value="" selected="selected">not specified</option>                        
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
                            <input type="email" class="form-control"  name="Email1" required>
                          </div>
                        </div>
                       </div>
                       <div class="col-sm-6">
                       <div class="form-group">
                          <label class="col-sm-3 control-label">Email2</label>
                          <div class="col-sm-9">
                            <input type="email" class="form-control"  name="Email2" >
                          </div>
                        </div>
                       </div>
                       </div>
                 
                       
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Homepage</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control"  name="Homepage" required>
                          </div>
                        </div>
                        
                        <div class="row">
                        <div class="col-sm-6">

                        <div class="form-group">
                        <label class="col-sm-4 control-label">Briefanrede</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="contact_salutation" required>
                          </div>
                        </div>

                        </div>
                        <div class="col-sm-6">

                        <div class="form-group">
                          <label class="col-sm-4 control-label">Letzter Kontakt</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control"  name="Last_Contact" required>
                          </div>
                        </div>
                        </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-3 control-label">Eintragsdatum</label>
                          <div class="col-sm-8">
                            <input type="date" class="form-control"  name="contact_Entry_Date" required>
                          </div>
                        </div>

                        <div class="form-group">
                      <label class="col-sm-2 control-label">Kundenlogo</label>
                      <div class="col-sm-10">
                      
                        <input type="file" name="Customer_logo" id="Customer_logo"  required>
                      </div>
                    </div>
                   
                      

                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Bevorzugte Kontakt..</label>
                          <div class="col-sm-10">
                          <select name="Preferred_form_of" class="form-control m-b">
                          <option value="Brief" style="color: #000000;">Brief</option>
                          <option value="Email" style="color: #000000;">Email</option>
                          <option value="Telefax" style="color: #000000;">Telefax</option>
                          <option value="Telefon" style="color: #000000;">Telefon</option>
                          <option value="" selected="selected">not specified</option>                        
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