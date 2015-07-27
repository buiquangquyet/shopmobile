<div class="wrap">
    <div class="content">
        <div class="section group">
            <div class="col span_1_of_3">
                <div class="contact_info">
                    <h2>Find Us Here</h2>
                    <div class="map">
                        <iframe width="435" height="360" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.no/maps?f=q&amp;source=s_q&amp;hl=no&amp;geocode=&amp;q=Hafstadvegen+35,+F%C3%B8rde&amp;aq=0&amp;oq=hafstadvegen+35&amp;sll=61.143235,9.09668&amp;sspn=17.454113,57.084961&amp;ie=UTF8&amp;hq=&amp;hnear=Hafstadvegen+35,+6800+F%C3%B8rde,+Sogn+og+Fjordane&amp;t=m&amp;z=14&amp;iwloc=A&amp;ll=61.450253,5.859145&amp;output=embed"></iframe><br><small><a href="http://maps.google.no/maps?f=q&amp;source=embed&amp;hl=no&amp;geocode=&amp;q=Hafstadvegen+35,+F%C3%B8rde&amp;aq=0&amp;oq=hafstadvegen+35&amp;sll=61.143235,9.09668&amp;sspn=17.454113,57.084961&amp;ie=UTF8&amp;hq=&amp;hnear=Hafstadvegen+35,+6800+F%C3%B8rde,+Sogn+og+Fjordane&amp;t=m&amp;z=14&amp;iwloc=A&amp;ll=61.450253,5.859145" style="color:#0000FF;text-align:left">Enlarge Map</a></small>
                    </div>
                </div>
                <div class="company_address">
                    <h2>Company Information :</h2>
                    <p><?php echo $contact_content['address']?></p>
                    <p>USA</p>
                    <p>Phone:<?php echo $contact_content['telephone']?></p>
                    <p>auth:<?php echo $contact_content['authorship']?></p>
                    <p>Fax: <?php echo $contact_content['telephone']?></p>
                    <p>Email: <span><?php echo $contact_content['authorship']?></span></p>
                    <p>Follow on: <span>Facebook</span>, <span>Twitter</span></p>
                </div>
            </div>
            <div class="col span_2_of_3">
                <div class="contact-form">
                    <h2>Contact Us</h2>
                    <form>
                        <div>
                            <span><label>NAME</label></span>
                            <span><input name="name" type="text" value=""></span>
                        </div>
                        <div>
                            <span><label>E-MAIL</label></span>
                            <span><input name="email"type="text" value=""></span>
                        </div>
                        <div>
                            <span><label>MOBILE.NO</label></span>
                            <span><input name="telephone" type="text" value=""></span>
                        </div>
                        <div>
                            <span><label>SUBJECT</label></span>
                            <span><textarea name="contact"> </textarea></span>
                        </div>
                        <?php echo form_error('recaptcha_response_field', '<font color="red">', '</font>'); ?>
                        <div id="field5-container" class="field f_50">
                            <label for="field5"><?php echo $this->recaptcha->getHtml(); ?></label>
                            <input type="submit" name="ok" value="Test Recaptcha" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="clear"> </div>
    </div>
    <div class="clear"> </div>