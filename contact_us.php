<?php
	//Include file php function vs connect DB
	include('includes/backend/mysqli_connect.php'); 
	include('includes/functions.php');
 	include('includes/frontend/header.php');
    
?>
    <div class="contact">
			
			<div class="container">
				<h2>Contact</h2>
			<div class="contact-form">				
				<div class="col-md-8 contact-grid">
					<form>	
						<input type="text" value="Name" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Name';}">
					
						<input type="text" value="Email" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Email';}">
						<input type="text" value="Subject" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Subject';}">
						
						<textarea cols="77" rows="6" value=" " onfocus="this.value='';" onblur="if (this.value == '') {this.value = 'Message';}">Message</textarea>
						<div class="send">
							<input type="submit" value="Send" >
						</div>
					</form>
				</div>
				<div class="col-md-4 contact-in">

						<div class="address-more">
						<h4>Address</h4>
							<p>The company name,</p>
							<p>Lorem ipsum dolor,</p>
							<p>Glasglow Dr 40 Fe 72. </p>
						</div>
						<div class="address-more">
						<h4>Address1</h4>
							<p>Tel:1115550001</p>
							<p>Fax:190-4509-494</p>
							<p>Email:<a href="mailto:contact@example.com"> contact@example.com</a></p>
						</div>		
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="map">
            <iframe src="https://www.google.com/maps/d/embed?mid=zWzk9_XzVYpk.kfh3vY2i3qf0" width="640" height="480"></iframe>
        </div>
    </div>
<!---->
<?php include('includes/frontend/footer.php'); ?>	

