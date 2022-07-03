<?php
include_once "layout/header.php";
include_once "layout/navbar.php";
?>
        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-image-3 ptb-150">
            <div class="container">
                <div class="breadcrumb-content text-center">
					<h3>CONTACT US</h3>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Contact us </li>
                    </ul>
                </div>
            </div>
        </div>
		<!-- Breadcrumb Area End -->
		<!-- Contact Area Start -->
        <div class="contact-us ptb-95">
            <div class="container">
                <div class="row">
					<!-- Contact Form Area Start -->
					<div class="col-lg-6">
						<div class="small-title mb-30">
							<h2>Contact Form</h2>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority Lorem Ipsum available.</p>
						</div>
						<form id="contact-form" action="https://d29u17ylf1ylz9.cloudfront.net/sabujcha/assets/mail.php" method="post">
							<div class="row">
								<div class="col-lg-6">
									<div class="contact-form-style mb-20">
										<input name="name" placeholder="Full Name" type="text">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="contact-form-style mb-20">
										<input name="email" placeholder="Email Address" type="email">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="contact-form-style mb-20">
										<input name="subject" placeholder="Subject" type="text">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="contact-form-style">
										<textarea name="message" placeholder="Message"></textarea>
										<button class="submit" type="submit">SEND MESSAGE</button>
									</div>
								</div>
							</div>
						</form>
						<p class="form-messege"></p>
					</div>
					<!-- Contact Form Area End -->
					<!-- Contact Address Strat -->
					<div class="col-lg-6">
						<div class="small-title mb-30">
							<h2>Contact Address</h2>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority Lorem Ipsum available.</p>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12">
								<div class="contact-information mb-30">
									<h4>Our Address</h4>
									<p>House. 9, Road. 12, Widgets. Orled. Sydney. Milaro.</p>
								</div>
							</div>
							<div class="col-lg-12 col-md-12">
								<div class="contact-information contact-mrg mb-30">
									<h4>Phone Number</h4>
									<p>
										<a href="tel:01234567890">01234 567 890</a>
										<a href="tel:01234567891">01234 567 891</a>
									</p>
								</div>
							</div>
							<div class="col-lg-12 col-md-12">
								<div class="contact-information contact-mrg mb-30">
									<h4>Web Address</h4>
									<p>
										<a href="mailto:info@example.com">info@example.com</a>
										<a href="#">www.example.com</a>
									</p>
								</div>
							</div>
						</div>
                    </div>
					<!-- Contact Address Strat -->
					<!-- Google Map Start -->
					<div class="col-md-12">
						<div id="store-location">
							<div class="contact-map pt-80">
								<div id="map"></div>
							</div>
						</div>
					</div>
					<!-- Google Map Start -->
                </div>
            </div>
        </div>
		<!-- Contact Area Start -->
        <?php
include_once "layout/footer.php";
?>