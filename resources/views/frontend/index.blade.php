@extends('layouts.app')
@section('title', 'Beranda')
@section('content')
	<!--BEGIN CONTENT-->
		<div id="content">
			<div class="content">
				<div class="wrapper_1">
					<div class="slider_wrapper">
						<div class="home_slider">
							<div class="slider slider_1">
								<div class="slide">
									<img src="images/placeholders/620x425.gif" alt=""/>
									<div class="description">
										<h2 class="title">2012 Mercedes-Benz CLS 320</h2>
										<p class="desc"><span><strong>Miles: </strong>25,000</span><span><strong>Engine: </strong>2.6</span></p>
										<div class="price">$ 32 200</div>
									</div>
								</div>
								<div class="slide">
									<img src="images/placeholders/620x425.gif" alt=""/>
									<div class="description">
										<h2 class="title">2010 Mercedes-Benz Sport</h2>
										<p class="desc"><span><strong>Miles: </strong>25,000</span><span><strong>Engine: </strong>2.6</span></p>
										<div class="price">$ 32 200</div>
									</div>
								</div>
								<div class="slide">
									<img src="images/placeholders/620x425.gif" alt=""/>
									<div class="description">
										<h2 class="title">2002 Subaru Impreza</h2>
										<p class="desc"><span><strong>Miles: </strong>25,000</span><span><strong>Engine: </strong>2.6</span></p>
										<div class="price">$ 32 200</div>
									</div>
								</div>
								<div class="slide">
									<img src="images/placeholders/620x425.gif" alt=""/>
									<div class="description">
										<h2 class="title">2012 Cadillac LaBaron</h2>
										<p class="desc"><span><strong>Miles: </strong>25,000</span><span><strong>Engine: </strong>2.6</span></p>
										<div class="price">$ 32 200</div>
									</div>
								</div>
								<div class="slide">
									<img src="images/placeholders/620x425.gif" alt=""/>
									<div class="description">
										<h2 class="title">2012 Ferrari Maranello 320</h2>
										<p class="desc"><span><strong>Miles: </strong>25,000</span><span><strong>Engine: </strong>2.6</span></p>
										<div class="price">$ 32 200</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="search_auto_wrapper">
						<div class="search_auto">
							<h3><strong>Search</strong> auto</h3>
							<div class="categories">
								<input type="radio" id="search_radio_1" checked="checked" name="category"/>
								<label for="search_radio_1" class="search_radio_1"></label>
								<input type="radio" id="search_radio_2" name="category"/>
								<label for="search_radio_2" class="search_radio_2"></label>
								<input type="radio" id="search_radio_3" name="category"/>
								<label for="search_radio_3" class="search_radio_3"></label>
								<input type="radio" id="search_radio_4" name="category"/>
								<label for="search_radio_4" class="search_radio_4"></label>
							</div>
							<div class="clear"></div>
							<label><strong>Manufacturer:</strong></label>
							<div class="select_box_1">
								<select class="select_1">
									<option value="0">Any</option>
									<option value="1">Audi</option>
									<option value="2">Mercedes-Benz</option>
									<option value="3">BMW</option>
									<option value="4">Lexus</option>
									<option value="5">Lincoln</option>
									<option value="6">Ford</option>
									<option value="7">Fiat</option>
									<option value="8">Dodge</option>
								</select>
							</div>
							<label><strong>Model:</strong></label>
							<div class="select_box_1">
								<select class="select_1">
									<option value="0">Any</option>
									<option value="1">R8</option>
									<option value="2">S500</option>
									<option value="3">540i</option>
									<option value="4">RX300</option>
									<option value="5">Navigator</option>
									<option value="6">Taurus</option>
									<option value="7">Doblo</option>
									<option value="8">Viper</option>
								</select>
							</div>
							<label><strong>Year:</strong></label>
							<div class="select_box_2">
								<select class="select_2">
									<option value="0">From</option>
									<option value="1">2013</option>
									<option value="2">2012</option>
									<option value="3">2011</option>
									<option value="4">2010</option>
									<option value="5">2009</option>
									<option value="6">2008</option>
									<option value="7">2007</option>
									<option value="8">2006</option>
								</select>
								<select class="select_2">
									<option value="0">To</option>
									<option value="1">2013</option>
									<option value="2">2012</option>
									<option value="3">2011</option>
									<option value="4">2010</option>
									<option value="5">2009</option>
									<option value="6">2008</option>
									<option value="7">2007</option>
									<option value="8">2006</option>
								</select>
								<div class="clear"></div>
							</div>
							<label><strong>Price:</strong></label>
							<div class="select_box_2">
								<select class="select_2">
									<option value="0">From</option>
									<option value="1">1000</option>
									<option value="2">2000</option>
									<option value="3">3000</option>
									<option value="4">4000</option>
									<option value="5">5000</option>
									<option value="6">6000</option>
									<option value="7">7000</option>
									<option value="8">8000</option>
								</select>
								<select class="select_2">
									<option value="0">To</option>
									<option value="1">1000</option>
									<option value="2">2000</option>
									<option value="3">3000</option>
									<option value="4">4000</option>
									<option value="5">5000</option>
									<option value="6">6000</option>
									<option value="7">7000</option>
									<option value="8">8000</option>
								</select>
								<div class="clear"></div>
							</div>
							<label><strong>Mileage:</strong></label>
							<div class="select_box_2">
								<select class="select_2">
									<option value="0">From</option>
									<option value="1">1000</option>
									<option value="2">2000</option>
									<option value="3">3000</option>
									<option value="4">4000</option>
									<option value="5">5000</option>
									<option value="6">6000</option>
									<option value="7">7000</option>
									<option value="8">8000</option>
								</select>
								<select class="select_2">
									<option value="0">To</option>
									<option value="1">1000</option>
									<option value="2">2000</option>
									<option value="3">3000</option>
									<option value="4">4000</option>
									<option value="5">5000</option>
									<option value="6">6000</option>
									<option value="7">7000</option>
									<option value="8">8000</option>
								</select>
								<div class="clear"></div>
							</div>
							<div class="chb_wrapper">
								<input type="checkbox"/>
								<label class="check_label">Only new cars</label>
							</div>
							<input type="submit" value="Search" class="btn_search"/>
							<div class="clear"></div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="recent">
					<h2><strong>Recent</strong> listings</h2>
					<div class="recent_carousel">
						<div class="slide">
							<a href="#">
								<img src="images/placeholders/220x164.gif" alt=""/>
								<div class="description">Registration 2010<br/>3.0 Diesel<br/>230 HP<br/>Body Coupe<br/>80 000 Miles</div>
								<div class="title">Mercedes-Benz <span class="price">$ 115 265</span></div>
							</a>
						</div>
						<div class="slide">
							<a href="#">
								<img src="images/placeholders/220x164.gif" alt=""/>
								<div class="description">Registration 2010<br/>3.0 Diesel<br/>230 HP<br/>Body Coupe<br/>80 000 Miles</div>
								<div class="title">Mercedes-Benz <span class="price">$ 115 265</span></div>
							</a>
						</div>
						<div class="slide">
							<a href="#">
								<img src="images/placeholders/220x164.gif" alt=""/>
								<div class="description">Registration 2010<br/>3.0 Diesel<br/>230 HP<br/>Body Coupe<br/>80 000 Miles</div>
								<div class="title">Mercedes-Benz <span class="price">$ 115 265</span></div>
							</a>
						</div>
						<div class="slide">
							<a href="#">
								<img src="images/placeholders/220x164.gif" alt=""/>
								<div class="description">Registration 2010<br/>3.0 Diesel<br/>230 HP<br/>Body Coupe<br/>80 000 Miles</div>
								<div class="title">Mercedes-Benz <span class="price">$ 115 265</span></div>
							</a>
						</div>
						<div class="slide">
							<a href="#">
								<img src="images/placeholders/220x164.gif" alt=""/>
								<div class="description">Registration 2010<br/>3.0 Diesel<br/>230 HP<br/>Body Coupe<br/>80 000 Miles</div>
								<div class="title">Mercedes-Benz <span class="price">$ 115 265</span></div>
							</a>
						</div>
						<div class="slide">
							<a href="#">
								<img src="images/placeholders/220x164.gif" alt=""/>
								<div class="description">Registration 2010<br/>3.0 Diesel<br/>230 HP<br/>Body Coupe<br/>80 000 Miles</div>
								<div class="title">Mercedes-Benz <span class="price">$ 115 265</span></div>
							</a>
						</div>
						<div class="slide">
							<a href="#">
								<img src="images/placeholders/220x164.gif" alt=""/>
								<div class="description">Registration 2010<br/>3.0 Diesel<br/>230 HP<br/>Body Coupe<br/>80 000 Miles</div>
								<div class="title">Mercedes-Benz <span class="price">$ 115 265</span></div>
							</a>
						</div>
						<div class="slide">
							<a href="#">
								<img src="images/placeholders/220x164.gif" alt=""/>
								<div class="description">Registration 2010<br/>3.0 Diesel<br/>230 HP<br/>Body Coupe<br/>80 000 Miles</div>
								<div class="title">Mercedes-Benz <span class="price">$ 115 265</span></div>
							</a>
						</div>
						<div class="slide">
							<a href="#">
								<img src="images/placeholders/220x164.gif" alt=""/>
								<div class="description">Registration 2010<br/>3.0 Diesel<br/>230 HP<br/>Body Coupe<br/>80 000 Miles</div>
								<div class="title">Mercedes-Benz <span class="price">$ 115 265</span></div>
							</a>
						</div>
						<div class="slide">
							<a href="#">
								<img src="images/placeholders/220x164.gif" alt=""/>
								<div class="description">Registration 2010<br/>3.0 Diesel<br/>230 HP<br/>Body Coupe<br/>80 000 Miles</div>
								<div class="title">Mercedes-Benz <span class="price">$ 115 265</span></div>
							</a>
						</div>
						<div class="slide">
							<a href="#">
								<img src="images/placeholders/220x164.gif" alt=""/>
								<div class="description">Registration 2010<br/>3.0 Diesel<br/>230 HP<br/>Body Coupe<br/>80 000 Miles</div>
								<div class="title">Mercedes-Benz <span class="price">$ 115 265</span></div>
							</a>
						</div>
						<div class="slide">
							<a href="#">
								<img src="images/placeholders/220x164.gif" alt=""/>
								<div class="description">Registration 2010<br/>3.0 Diesel<br/>230 HP<br/>Body Coupe<br/>80 000 Miles</div>
								<div class="title">Mercedes-Benz <span class="price">$ 115 265</span></div>
							</a>
						</div>
					</div>
				</div>
				<div class="banners">
					<div class="banner_1 main_banner">
						<div class="text_wrapper">
							<p class="title"><strong>Looking</strong> for a car?</p>
							<p class="desc">1.000 new offers every day. 35.000 offers on site</p>
						</div>
						<a href="#">Search</a>
					</div>
					<div class="banner_2 main_banner">
						<div class="text_wrapper">
							<p class="title"><strong>Want</strong> to sell a car?</p>
							<p class="desc">200.000 visitors every day. Add your offer now!</p>
						</div>
						<a href="#">Sell</a>
					</div>
				</div>
				<div class="wrapper_2">
					<div class="left">
						<div class="recent_blog">
							<h2><strong>Recent</strong> from the blog</h2>
							<div class="post_block">
								<a href="#" class="thumb"><img src="images/placeholders/180x135.gif" alt=""/></a>
								<h5><a href="#">THE IMPORTANCE OF LUXURY SUV SALES EXPLAINED</a></h5>
								<div class="date">November 1, 2012 </div>
								<div class="post"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit... Aliquam hendrerit sagittis urna,</p></div>
							</div>
							<div class="post_block">
								<a href="#" class="thumb"><img src="images/placeholders/180x135.gif" alt=""/></a>
								<h5><a href="#">THE IMPORTANCE OF LUXURY SUV SALES EXPLAINED</a></h5>
								<div class="date">November 1, 2012 </div>
								<div class="post"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit... Aliquam hendrerit sagittis urna,</p></div>
							</div>
							<div class="post_block last">
								<a href="#" class="thumb"><img src="images/placeholders/180x135.gif" alt=""/></a>
								<h5><a href="#">THE IMPORTANCE OF LUXURY SUV SALES EXPLAINED</a></h5>
								<div class="date">November 1, 2012 </div>
								<div class="post"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit... Aliquam hendrerit sagittis urna,</p></div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="tabs_wrapper home_tabs section">
						  	<ul class="tabs">
						    	<li class="current">Dealers</li>
						    	<li>Service Stations</li>
						    	<li>Insurance</li>
						 	</ul>
						 	<div class="box visible">
						 		<a href="#" class="all">Show all...</a>
						   		<div class="results">Found 433 dealers</div>
						   		<div class="clear"></div>
						   		<div class="tabs_carousel">
						   			<div class="slide">
										<a href="#" class="img"><img src="images/placeholders/150x110.gif" alt=""/></a>
										<a href="#" class="title">St. Louis Auto Dealers</a>
									</div>
									<div class="slide">
										<a href="#" class="img"><img src="images/placeholders/150x110.gif" alt=""/></a>
										<a href="#" class="title">Executive Cars Group</a>
									</div>
									<div class="slide">
										<a href="#" class="img"><img src="images/placeholders/150x110.gif" alt=""/></a>
										<a href="#" class="title">Rim Wear</a>
									</div>
									<div class="slide">
										<a href="#" class="img"><img src="images/placeholders/150x110.gif" alt=""/></a>
										<a href="#" class="title">Dj Cruz’s Auto Sales</a>
									</div>
									<div class="slide">
										<a href="#" class="img"><img src="images/placeholders/150x110.gif" alt=""/></a>
										<a href="#" class="title">St. Louis Auto Dealers</a>
									</div>
									<div class="slide">
										<a href="#" class="img"><img src="images/placeholders/150x110.gif" alt=""/></a>
										<a href="#" class="title">Executive Cars Group</a>
									</div>
									<div class="slide">
										<a href="#" class="img"><img src="images/placeholders/150x110.gif" alt=""/></a>
										<a href="#" class="title">Rim Wear</a>
									</div>
									<div class="slide">
										<a href="#" class="img"><img src="images/placeholders/150x110.gif" alt=""/></a>
										<a href="#" class="title">Dj Cruz’s Auto Sales</a>
									</div>
									<div class="slide">
										<a href="#" class="img"><img src="images/placeholders/150x110.gif" alt=""/></a>
										<a href="#" class="title">St. Louis Auto Dealers</a>
									</div>
									<div class="slide">
										<a href="#" class="img"><img src="images/placeholders/150x110.gif" alt=""/></a>
										<a href="#" class="title">Executive Cars Group</a>
									</div>
									<div class="slide">
										<a href="#" class="img"><img src="images/placeholders/150x110.gif" alt=""/></a>
										<a href="#" class="title">Rim Wear</a>
									</div>
									<div class="slide">
										<a href="#" class="img"><img src="images/placeholders/150x110.gif" alt=""/></a>
										<a href="#" class="title">Dj Cruz’s Auto Sales</a>
									</div>
								</div>
						  	</div>
						  	<div class="box">
						    	<a href="#" class="all">Show all...</a>
						   		<div class="results">Found 50 stations</div>
						   		<div class="clear"></div>
						   		<div class="tabs_carousel">
						   			<div class="slide">
										<a href="#" class="img"><img src="images/placeholders/150x110.gif" alt=""/></a>
										<a href="#" class="title">St. Louis Auto Dealers</a>
									</div>
									<div class="slide">
										<a href="#" class="img"><img src="images/placeholders/150x110.gif" alt=""/></a>
										<a href="#" class="title">Executive Cars Group</a>
									</div>
									<div class="slide">
										<a href="#" class="img"><img src="images/placeholders/150x110.gif" alt=""/></a>
										<a href="#" class="title">Rim Wear</a>
									</div>
									<div class="slide">
										<a href="#" class="img"><img src="images/placeholders/150x110.gif" alt=""/></a>
										<a href="#" class="title">Dj Cruz’s Auto Sales</a>
									</div>
									<div class="slide">
										<a href="#" class="img"><img src="images/placeholders/150x110.gif" alt=""/></a>
										<a href="#" class="title">St. Louis Auto Dealers</a>
									</div>
									<div class="slide">
										<a href="#" class="img"><img src="images/placeholders/150x110.gif" alt=""/></a>
										<a href="#" class="title">Executive Cars Group</a>
									</div>
									<div class="slide">
										<a href="#" class="img"><img src="images/placeholders/150x110.gif" alt=""/></a>
										<a href="#" class="title">Rim Wear</a>
									</div>
									<div class="slide">
										<a href="#" class="img"><img src="images/placeholders/150x110.gif" alt=""/></a>
										<a href="#" class="title">Dj Cruz’s Auto Sales</a>
									</div>
									<div class="slide">
										<a href="#" class="img"><img src="images/placeholders/150x110.gif" alt=""/></a>
										<a href="#" class="title">St. Louis Auto Dealers</a>
									</div>
									<div class="slide">
										<a href="#" class="img"><img src="images/placeholders/150x110.gif" alt=""/></a>
										<a href="#" class="title">Executive Cars Group</a>
									</div>
									<div class="slide">
										<a href="#" class="img"><img src="images/placeholders/150x110.gif" alt=""/></a>
										<a href="#" class="title">Rim Wear</a>
									</div>
									<div class="slide">
										<a href="#" class="img"><img src="images/placeholders/150x110.gif" alt=""/></a>
										<a href="#" class="title">Dj Cruz’s Auto Sales</a>
									</div>
								</div>
						  	</div>
						  	<div class="box">
						    	<a href="#" class="all">Show all...</a>
						   		<div class="results">Found 10 incurances</div>
						   		<div class="clear"></div>
						   		<div class="tabs_carousel">
						   			<div class="slide">
										<a href="#" class="img"><img src="images/placeholders/150x110.gif" alt=""/></a>
										<a href="#" class="title">St. Louis Auto Dealers</a>
									</div>
									<div class="slide">
										<a href="#" class="img"><img src="images/placeholders/150x110.gif" alt=""/></a>
										<a href="#" class="title">Executive Cars Group</a>
									</div>
									<div class="slide">
										<a href="#" class="img"><img src="images/placeholders/150x110.gif" alt=""/></a>
										<a href="#" class="title">Rim Wear</a>
									</div>
									<div class="slide">
										<a href="#" class="img"><img src="images/placeholders/150x110.gif" alt=""/></a>
										<a href="#" class="title">Dj Cruz’s Auto Sales</a>
									</div>
									<div class="slide">
										<a href="#" class="img"><img src="images/placeholders/150x110.gif" alt=""/></a>
										<a href="#" class="title">St. Louis Auto Dealers</a>
									</div>
									<div class="slide">
										<a href="#" class="img"><img src="images/placeholders/150x110.gif" alt=""/></a>
										<a href="#" class="title">Executive Cars Group</a>
									</div>
									<div class="slide">
										<a href="#" class="img"><img src="images/placeholders/150x110.gif" alt=""/></a>
										<a href="#" class="title">Rim Wear</a>
									</div>
									<div class="slide">
										<a href="#" class="img"><img src="images/placeholders/150x110.gif" alt=""/></a>
										<a href="#" class="title">Dj Cruz’s Auto Sales</a>
									</div>
									<div class="slide">
										<a href="#" class="img"><img src="images/placeholders/150x110.gif" alt=""/></a>
										<a href="#" class="title">St. Louis Auto Dealers</a>
									</div>
									<div class="slide">
										<a href="#" class="img"><img src="images/placeholders/150x110.gif" alt=""/></a>
										<a href="#" class="title">Executive Cars Group</a>
									</div>
									<div class="slide">
										<a href="#" class="img"><img src="images/placeholders/150x110.gif" alt=""/></a>
										<a href="#" class="title">Rim Wear</a>
									</div>
									<div class="slide">
										<a href="#" class="img"><img src="images/placeholders/150x110.gif" alt=""/></a>
										<a href="#" class="title">Dj Cruz’s Auto Sales</a>
									</div>
								</div>
						  	</div>
						</div>
						<div class="video_box">
							<h2><strong>Video</strong> reviews</h2>
							<div class="post_block">
								<div class="preview">
									<a href="http://player.vimeo.com/video/54510052">
										<img src="images/placeholders/180x115.gif" alt=""/>
										<span class="hover"></span>
										<img src="images/video_play.png" alt="" class="video_play"/>
									</a>
								</div>
								<h5><a href="#">THE IMPORTANCE OF LUXURY SUV SALES EXPLAINED</a></h5>
								<div class="post"><p>10 min 31 sec (12,4 Mb)</p></div>
							</div>
							<div class="post_block">
								<div class="preview">
									<a href="http://player.vimeo.com/video/13412780">
										<img src="images/placeholders/180x115.gif" alt=""/>
										<span class="hover"></span>
										<img src="images/video_play.png" alt="" class="video_play"/>
									</a>
								</div>
								<h5><a href="#">THE IMPORTANCE OF LUXURY SUV SALES EXPLAINED</a></h5>
								<div class="post"><p>10 min 31 sec (12,4 Mb)</p></div>
							</div>
							<div class="post_block last">
								<div class="preview">
									<a href="http://player.vimeo.com/video/22884674">
										<img src="images/placeholders/180x115.gif" alt=""/>
										<span class="hover"></span>
										<img src="images/video_play.png" alt="" class="video_play"/>
									</a>
								</div>
								<h5><a href="#">THE IMPORTANCE OF LUXURY SUV SALES EXPLAINED</a></h5>
								<div class="post"><p>10 min 31 sec (12,4 Mb)</p></div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="right">
						<div class="news_wrapper">
							<div class="news">
								<h2><strong>Auto</strong> news</h2>
								<div class="news_box">
									<a href="#" class="thumb">
										<img src="images/placeholders/180x135.gif" alt=""/>
									</a>
									<h5><a href="#">UNOFFICIAL PORSCHE 918 SPYDER PRICING POPS UP</a></h5>
									<div class="date">November 1, 2012 </div>
									<div class="post">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit... </p>
									</div>
								</div>
								<div class="news_box bottom">
									<a href="#" class="thumb">
										<img src="images/placeholders/180x135.gif" alt=""/>
									</a>
									<h5><a href="#">UNOFFICIAL PORSCHE 918 SPYDER PRICING POPS UP</a></h5>
									<div class="date">November 1, 2012 </div>
									<div class="post">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit... </p>
									</div>
								</div>
								<div class="all_wrapper"><a href="#" class="all_news">All news</a></div>
							</div>
						</div>
						<div class="banners_wrapper">
							<div class="get_news_box">
								<h3><strong>Get</strong> daily news</h3>
								<form method="get" action="#">
									<input type="text" onblur="if(this.value=='') this.value='Enter your email';" onfocus="if(this.value=='Enter your email') this.value='';" value="Enter your email" class="txb"/>
									<input type="submit" value="subscribe" class="btn_subscribe"/>
								</form>
							</div>
							<div class="side_banners">
								<a href="#"><img src="images/banners/banner.jpg" alt=""/></a>
							</div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	<!--EOF CONTENT-->
@endsection
