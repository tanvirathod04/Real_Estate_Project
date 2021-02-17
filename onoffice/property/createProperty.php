<?php include "../../header.php" ?>
   

<section class="vbox">
    
        <!-- /.aside -->
        <section id="content">
          <section class="vbox">
            <section class="scrollable padder">
              
            <div class="m-b-md">
          <h3 class="m-b-none">Immobilien &nbsp;&nbsp;&nbsp;
          <a href="index.php" class="btn btn-s-md btn-info btn-rounded"><i class="fa fa-arrow-left"></i></a>
          
        </h3>
        </div>
<!--start main tabs-->
<section class="panel panel-default">
                
                           <!-- Start basic data Content-->
                           <form name="create_property" action="../../controllers/onoffice_database/onoffice_properties/onoffice_property_add.php" method="POST" enctype="multipart/form-data">
                           <input type="hidden" name="company_id" value="<?php  echo $userDetails->company_id?>">
                           <div role="form">
        <div class="row"><!--row-->
                <div class="col-sm-6"><!--col1-->
                  <section class="panel panel-default">
                    <header class="panel-heading font-bold">Technische-Angaben
                   </header>
                     <div class="panel-body">
                     
                     <div class="form-group">
                  <label>Datensatznr</label>
                  <input type="text" class="form-control"  name="Data_Record_Ref_No"  value="<?php
echo uniqid();
?>">
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <select name="Status" class="form-control m-b" required>
                  <option value="Inaktiv" style="color: #000000;">Inaktiv</option>
                  <option value="Aktiv" selected="selected" style="color: #000000;">Aktiv</option>
                  <option value="Archiviert" style="color: #000000;">Archiviert</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>ImmoNr</label>
                  <input type="text" class="form-control" name="Property_External"  value="<?php
echo uniqid();
?>">
                </div>
                <div class="form-group">
                  <label>Betreuer</label>
                  <input type="text" class="form-control" placeholder="Agent" name="Agent" required>
                </div>
                <div class="form-group">
                  <label>Auftragsart</label>
                  <select name="Type_of_order" class="form-control m-b" required>
                  <option value="Exklusiv" style="color: #000000;">Exklusiv</option>
                  <option value="Normal" style="color: #000000;">Normal</option>
                  <option value="keine Angaben" selected="selected">keine Angaben</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Auftrag bis</label>
                  <input type="date" class="form-control" placeholder="Order Until" name="Order_Until" required>
                </div>
                <div class="form-group">
                  <label>Verkauft am</label>
                  <input type="date" class="form-control" placeholder="Sold On" name="Sold_on" required>
                </div>
                <div class="form-group">
                  <label>Letzte Aktion</label>
                  <input type="date" class="form-control" placeholder="Last Action" name="last_action" required>
                </div>
                <div class="form-group">
                  <label>Status2</label>
                  <select name="status2" class="form-control m-b" required>
                  <option value="Inaktiv" style="color: #000000;">Inaktiv</option>
                  <option value="Aktiv" selected="selected" style="color: #000000;">Aktiv</option>
                  <option value="Archiviert" style="color: #000000;">Archiviert</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Objekttitel</label>
                  <input type="text" class="form-control" placeholder="Property Title" name="property_title" required>
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
                  <input type="text" class="form-control" placeholder="House No." name="house_no" required>
                </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                  <label>PLZ</label>
                  <input type="text" class="form-control" placeholder="Postal Code" name="postal_code" required>
                </div>
                    </div>
                    </div>
                    <div class="form-group">
                  <label>Strase</label>
                  <input type="text" class="form-control" placeholder="Street" name="street" required>
                </div>
               
               
                <div class="form-group">
                  <label>Ort</label>
                  <input type="text" class="form-control" placeholder="Town" name="town" required>
                </div>

                             
                <div class="form-group">
                          <label>Land</label>
                          <select tabindex="12" name="country" id="country" class="form-control m-b" required>
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
                  </section>

                  <section class="panel panel-default">
                    <header class="panel-heading font-bold">Immobilien Bild</header>
                    <div class="panel-body">
                  <div class="form-group">
                      <label class="col-sm-4 control-label">Bild</label>
                      <div class="col-sm-8">
                      
                        <input type="file" name="property_image" id="property_image"  required>
                      </div>
                      </div>
                    </div>
                    </section>

                    <section class="panel panel-default">
                    <header class="panel-heading font-bold">Kategorie</header>
                    <div class="panel-body">
                    <div class="form-group">
                  <label>Objektart</label>
                  <select name="Property_class" class="form-control m-b" required>
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
                  <option value="keine Angaben" selected="selected">keine Angaben</option>
                </select>
                </div>

                <div class="form-group">
                  <label>Objekttyp</label>
                  <select name="Property_type" class="form-control m-b" required>
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
                  <option value="keine Angaben" selected="selected">keine Angaben</option>
                </select>
                </div>

                <div class="form-group">
                  <label>Nutzungsart</label>
                  <select name="type_of_usage" class="form-control m-b" required>
                  <option value="wohnen" style="color: #000000;">Wohnen</option>
                  <option value="gewerbe" style="color: #000000;">Gewerbe</option>
                  <option value="anlage" style="color: #000000;">Anlage</option>
                  <option value="waz" style="color: #000000;">WAZ (Wohnen auf Zeit)</option>
                </select>
                </div>

                <div class="form-group">
                  <label>Vermarktungsart</label>
                  <select name="marketing_method" class="form-control m-b" required>
                  <option value="kauf" style="color: #000000;">Kauf</option>
                  <option value="miete" style="color: #000000;">Miete</option>
                  <option value="pacht" style="color: #000000;">Pacht</option>
                  <option value="erbpacht" style="color: #000000;">Erbpacht</option>
                </select>
                </div>
                    </div>
                  </section>
                  
                  <button type="submit"  name= "property_basic_data" class="btn btn-s-md btn-info btn-rounded"><i class="fa fa-save"></i></button>
                  
                </div><!--col2-->
               
              
              </div><!--row-->
            </div>
                     
        <!-- End basic data Content-->
                     </form>
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