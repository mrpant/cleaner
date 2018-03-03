
               <?php $param = array();
                $param['conditionParam']['param']['id'] = 1;
                $config =$System->get_configuration_details($param)['data'];
               ?>	


	<!-- Footer -->
	<footer>
		<div class="container">
			<hr />
			<p class="text-center"><?=$config->copyrightMessage?></p>
		</div>
	</footer>

	<!-- Jquery and Bootstrap Script files -->
	<script src="<?=$_PATH['assets']?>/blog/lib/jquery-2.0.3.min.js"></script>
	<script src="<?=$_PATH['assets']?>/blog/lib/bootstrap-3.0.3/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
	<script type="text/javascript" src="<?=$_PATH['assets']?>/blog/jquery.jscroll.js"></script>


	<script>
        $(".share").jsSocials({
			shareIn: "popup",
			shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp"],
			url: "http://url.to.share",
			text: "text to share",
		});

		$('.jscroll').jscroll();
    </script>
</body>
</html>