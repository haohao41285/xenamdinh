@extends('frontend.layouts.master')
@section('content')
<div class="single">
		<div class="container">
			<div class="single-grid">
				<div class="col-md-8 blog-left">
					<div class="blog-left-grid">
						<div class="blog-leftl">
							<h4>December <span>31</span></h4>
							<a href="#"><i class="glyphicon glyphicon-tags" aria-hidden="true"></i>10</a>
						</div>
						<div class="blog-leftr">
							<img src="images/25.jpg" alt=" " class="img-responsive" />
							<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
							sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
							Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
							nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
							reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla 
							pariatur</p>
							<ul>
								<li><a href="#"><i class="glyphicon glyphicon-calendar" aria-hidden="true"></i>Lịch Trình: </a></li>
								<li><a href="#"><i class="glyphicon glyphicon-phone-alt" aria-hidden="true"></i>Liên Hệ:</a></li>
								<li><a href="#"><i class="glyphicon glyphicon-bed" aria-hidden="true"></i>Số Ghế: </a></li>
							</ul>
						</div>
						<div class="clearfix"> </div>
						
						<div class="response">
							<h4>Responses</h4>
							<div class="media response-info">
								<div class="media-left response-text-left">
									<a href="#">
										<img class="media-object" src="images/icon1.png" alt=""/>
									</a>
									<h5><a href="#">Admin</a></h5>
								</div>
								<div class="media-body response-text-right">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available, 
										sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									<ul>
										<li>October 25, 2016</li>
										<li><a href="single.html">Reply</a></li>
									</ul>
									<div class="media response-info">
										<div class="media-left response-text-left">
											<a href="#">
												<img class="media-object" src="images/icon1.png" alt=""/>
											</a>
											<h5><a href="#">Admin</a></h5>
										</div>
										<div class="media-body response-text-right">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available, 
												sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
											<ul>
												<li>October 25, 2016</li>
												<li><a href="single.html">Reply</a></li>
											</ul>		
										</div>
										<div class="clearfix"> </div>
									</div>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="media response-info">
								<div class="media-left response-text-left">
									<a href="#">
										<img class="media-object" src="images/icon1.png" alt=""/>
									</a>
									<h5><a href="#">Admin</a></h5>
								</div>
								<div class="media-body response-text-right">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available, 
										sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									<ul>
										<li>October 25, 2016</li>
										<li><a href="single.html">Reply</a></li>
									</ul>		
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>	
						<div class="coment-form">
							<h4>Leave your comment</h4>
							<form>
								<input type="text" value="Name " onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
								<input type="email" value="Email (will not be published)*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email (will not be published)*';}" required="">
								<input type="text" value="Website" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Website';}" required="">
								<textarea type="text"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Comment...';}" required="">Your Comment...</textarea>
								<input type="submit" value="Submit Comment" >
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-4 blog-right">
					<h3>Categories</h3>
					<ul>
						<li><a href="#">Aliquam erat volutpat</a></li>
						<li><a href="#">Integer rutrum ante eu lacus</a></li>
						<li><a href="#">Cum sociis natoque penatibus</a></li>
						<li><a href="#">Mauris fermentum dictum magna</a></li>
						<li><a href="#">Sed laoreet aliquam leo</a></li>
						<li><a href="#">Cum sociis natoque penatibus</a></li>
					</ul>
					
					<div class="poll" style="border: 1px solid red">
						<h3>Quảng cáo google</h3>
							
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
@endsection