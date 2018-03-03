<?php 
			 $tags = array();
 			 $param = array();
			 $param['conditionParam']['param']['1'] = 1 ;
			 $post_list = $Post->get_post_list($param)['data'];


?>

<style>
.img{
	    width: 900px;
    height: 400px;
}

.read_more{
     display: block;
    text-overflow: ellipsis;
    word-wrap: break-word;
    overflow: hidden;
    max-height: 16.6em;
    line-height: 1.8em;
}

.top_banner{
	background: #f5f5f5;
    width: 100%;
    height: 97px;
}
.panel-default>.panel-heading{
	    color: #fff!important;
	        background-image: linear-gradient(to bottom,#000000 0,#000000 100%)!important;
}

/*a{
	color: #000!important;
}*/

.navbar-inverse .navbar-nav>.active>a{
	background-image: linear-gradient(to bottom,#eeebeb 0,#f5f5f5 100%)!important;
}
.navbar-inverse{
	    background-image: linear-gradient(to bottom,#373737 0,#373737 100%)!important;
}
</style>


<!-- Body -->
<br><br>
	<div class="container">
		<div class="row">
			<div class="col-md-8 ">

					<div class="top_banner"></div>	


				<?php if(count($post_list) > 0){  

						foreach ($post_list as $key => $value) { 

								//get all post tags 
								array_push($tags, $value['tags']);

							 $param = array();
							 $param['conditionParam']['param']['id'] = $value['post_category_id'] ;
							 $category_details = $Category->get_category_details($param)['data'];

							 $TAGS = explode(",", $value['tags']);


							?>
							
					
					
				<article >
					<h2><a href="singlepost.html"><?=$value['post_title']?></a></h2>

			        <div class="row">
			          	<div class="col-sm-6 col-md-6">
			          		<span class="glyphicon glyphicon-folder-open"></span> &nbsp;<a href="#"><?=$category_details->category_name?></a>
			          		&nbsp;&nbsp;<span class="glyphicon glyphicon-bookmark"></span> <a href="#"><?=isset($TAGS[0])?$TAGS[0]:''?></a>, <a href="#"><?=isset($TAGS[1])?$TAGS[1]:''?></a>, <a href="#"><?=isset($TAGS[2])?$TAGS[2]:''?></a>
			          	</div>
			          	<div class="col-sm-6 col-md-6">
			          		<span class="glyphicon glyphicon-pencil"></span> <a href="singlepost.html#comments">20 Comments</a>			          		
			          		&nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span> <?= date('dS F Y', strtotime($value['post_createdOn'])); ?>			          		
			          	</div>
			          </div>

			          <hr>

			          <img src="<?= $_PATH['websiteRoot'].'/'.$value['post_image'] ?>" class="img-responsive img">

			          <br />
			          	<div class="read_more">
			          <p class="lead"><?=$value['post_description']?></p>

			          <p><?=$value['post_short_description']?></p>
			      	 	</div>
			      	 	 <p class="text-right">
				          <a href="<?=$value['post_rewrite_url']?>.html">
				          	continue reading...
				          </a>
				      </p>
					  <div id="share" class="share"></div>
					 

			          <hr>
				</article>

				<?php } // end of loop

					} //end of if
						 ?>




					
				<ul class="pager">
					<li class="previous"><a href="#">&larr; Previous</a></li>
					<li class="next"><a href="#">Next &rarr;</a></li>
				</ul>

			</div>

			<div class="col-md-4">

			<!-- 	<div class="well text-center">
					<p class="lead">
						Don't want to miss updates? Please click the below button!
					</p>
					<button class="btn btn-primary btn-lg">Subscribe to my feed</button>
				</div> -->

				<!-- Latest Posts -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>Banner</h4>
					</div>
					<!-- <ul class="list-group">
						<li class="list-group-item"><a href="singlepost.html">1. Aries Sun Sign March 21 - April 19</a></li>
						<li class="list-group-item"><a href="singlepost.html">2. Taurus Sun Sign April 20 - May 20</a></li>
						<li class="list-group-item"><a href="singlepost.html">3. Gemini Sun Sign May 21 - June 21</a></li>
						<li class="list-group-item"><a href="singlepost.html">4. Cancer Sun Sign June 22 - July 22</a></li>
						<li class="list-group-item"><a href="singlepost.html">5. Leo Sun Sign July 23 - August 22 </a></li>
					</ul> -->
				</div>

				<!-- Categories -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>Categories</h4>
					</div>
					<ul class="list-group">

						<?php 
							 $param = array();
							 $param['conditionParam']['param']['1'] = 1;
							 $categorylist = $Category->get_category_list($param)['data'];



							foreach ($categorylist as $key => $value) { ?>
					
									<li class="list-group-item"><a href="#"><?=$value['category_name']?></a></li>
							<?php } ?>


					</ul>
				</div>

				<!-- Tags -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>Tags</h4>
					</div>
					<div class="panel-body">
						<ul class="list-inline">

						<?php
								if(count($tags) > 0 ){
								foreach ($tags as $key => $value) { ?>
									
									<li><a href="#" style="text-decoration:none"><?= str_replace(",", "", $value)    ?></a></li>

						<?php }

						} ?> 	

							
							
						</ul>
					</div>
				</div>

				<!-- Recent Comments -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>Banner</h4>
					</div>
					<!-- <ul class="list-group">
						<li class="list-group-item"><a href="#">I don't believe in astrology but still your writing style is really great! - <em>john</em></a></li>
						<li class="list-group-item"><a href="#">Wow.. what you said is really true! I'm an aries though - <em>Anto</em></a></li>
						<li class="list-group-item"><a href="#">Does capricorn and aries is compatibile? - <em>Sarah</em></a></li>
						<li class="list-group-item"><a href="#">I'm a cancer woman been in love with Leo. Will this work? - <em>Mary</em></a></li>
					</ul> -->
				</div>

			</div>
		</div>
	</div>
	<!-- for left -->
	<aside id="sticky-social">
    <ul>
        <li><a href="#" class="entypo-facebook" target="_blank"><span>Facebook</span></a></li>
        <li><a href="#" class="entypo-twitter" target="_blank"><span>Twitter</span></a></li>
        <li><a href="#" class="entypo-gplus" target="_blank"><span>Google+</span></a></li>
        <li><a href="#" class="entypo-linkedin" target="_blank"><span>LinkedIn</span></a></li>
        <li><a href="#" class="entypo-instagrem" target="_blank"><span>Instagram</span></a></li>
        <li><a href="#" class="entypo-stumbleupon" target="_blank"><span>StumbleUpon</span></a></li>
        <li><a href="#" class="entypo-pinterest" target="_blank"><span>Pinterest</span></a></li>
        <li><a href="#" class="entypo-flickr" target="_blank"><span>Flickr</span></a></li>
        <li><a href="#" class="entypo-tumblr" target="_blank"><span>Tumblr</span></a></li>
    </ul>
	</aside>
	<!-- end for left -->
	<!-- start for right -->
	<aside id="sticky-social-right">
    <ul>
        <li><a href="#" class="entypo-facebook" target="_blank"><span>Facebook</span></a></li>
        <li><a href="#" class="entypo-twitter" target="_blank"><span>Twitter</span></a></li>
        <li><a href="#" class="entypo-gplus" target="_blank"><span>Google+</span></a></li>
        <li><a href="#" class="entypo-linkedin" target="_blank"><span>LinkedIn</span></a></li>
        <li><a href="#" class="entypo-instagrem" target="_blank"><span>Instagram</span></a></li>
        <li><a href="#" class="entypo-stumbleupon" target="_blank"><span>StumbleUpon</span></a></li>
        <li><a href="#" class="entypo-pinterest" target="_blank"><span>Pinterest</span></a></li>
        <li><a href="#" class="entypo-flickr" target="_blank"><span>Flickr</span></a></li>
        <li><a href="#" class="entypo-tumblr" target="_blank"><span>Tumblr</span></a></li>
    </ul>
	</aside>
	<!-- end for right -->