@extends('frontend.layouts.master')
@section('content')
<!-- single -->
	<div class="single">
		<div class="container">
			<div class="recent google-ads">
						quảng cáo google
					</div>
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
							
						</div>
						<div class="clearfix"> </div>
						<div class="admin-text">
								<div class="admin-text-right">
									<span>Đăng bởi:<a href="#"> Admin </a></span>
								</div>
								<div class="clearfix"> </div>
						</div>
						<div class="recent google-ads">
						    quảng cáo google
					    </div>
						<div class="response">
							<h4>Bình luận</h4>
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
						<div class="recent google-ads">
						quảng cáo google
					</div>
						<div class="coment-form">
							<h4>Bình luận của bạn</h4>
							<form>
								
								<textarea type="text" class="form-control form-control-sm"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Viết bình luận...';}" required="">Viết bình luận...</textarea>
								<input class="btn" type="submit" value="Gửi bình luận" >
							</form>
						</div>

					</div>
				</div>
				<div class="col-md-4 blog-right">
					<h3>Tin gần đây</h3>
					<ul>
						<li><a href="#">Aliquam erat volutpat</a></li>
						<li><a href="#">Integer rutrum ante eu lacus</a></li>
						<li><a href="#">Cum sociis natoque penatibus</a></li>
						<li><a href="#">Mauris fermentum dictum magna</a></li>
						<li><a href="#">Sed laoreet aliquam leo</a></li>
						<li><a href="#">Cum sociis natoque penatibus</a></li>
					</ul>
					<div class="recent google-ads">
						quảng cáo google
					</div>
					<div class="footer-top-grid1">
						<h3>Tags</h3>
						<ul class="tag2" style="list-style-type: none;">
							<li><a href="#">awesome</a></li>
							<li><a href="#">strategy</a></li>
							<li><a href="#">development</a></li>
							<li><a href="#">css</a></li>
							<li><a href="#">photoshop</a></li>
							<li><a href="#">photography</a></li>
							<li><a href="#">html</a></li>
							<li><a href="#">awesome</a></li>
							<li><a href="#">strategy</a></li>
							<li><a href="#">development</a></li>
							<li><a href="#">css</a></li>
							<li><a href="#">photoshop</a></li>
							<li><a href="#">photography</a></li>
							<li><a href="#">html</a></li>
							<li><a href="#">awesome</a></li>
							<li><a href="#">strategy</a></li>
							<li><a href="#">development</a></li>
						</ul>
					</div>
					<div class="recent google-ads">
						quảng cáo google
					</div>
					
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //single -->
@endsection