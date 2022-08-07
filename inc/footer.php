</div>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 footer__item">
                    <img src="images/logoMain.png"/>
                </div>
                <div class="col-6 col-lg-6 footer__item">
                    <div class="footer__item-wrap">
                        <h2>About Us</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</p>
                    </div>
                </div>
                <div class="col-6 col-lg-6 footer__item">
                    <div class="footer__item-wrap">
                        <h2>Contact Info</h2>
                        <li>
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span>2225 Phạm Thế Hiển, phường 6, quận 8, thành phố Hồ Chí Minh</span>
                        </li>
                        <li>
                            <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                            <a href="#">+84 789667974</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <a href="#">truongthien2411@email.com</a>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- <div class="copyright">
        <p>Copyright &copy; 2022. All Right Reserved.</p>
    </div> -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
  AOS.init();
</script>
<script type="text/javascript">
$(document).ready(function() {
    /*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/

    $().UItoTop({
        easingType: 'easeOutQuart'
    });

});
</script>
<a href="#" id="toTop" style="display: block;">
    <span id="toTopHover" style="opacity: 1;"></span>
</a>
<link href="css/flexslider.css" rel='stylesheet' type='text/css' />
<script defer src="js/jquery.flexslider.js"></script>
<script type="text/javascript">
$(function() {
    SyntaxHighlighter.all();
});
$(window).load(function() {
    $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider) {
            $('body').removeClass('loading');
        }
    });
});
</script>
<script type="text/javascript">
$("select").click(function() {
  var open = $(this).data("isopen");
  if(open) {
    window.location.href = $(this).val()
  }
  //set isopen to opposite so next time when use clicked select box
  //it wont trigger this event
  $(this).data("isopen", !open);
});
</script>



 </script>
 <!-- <script src="js/style.js"></script> -->
 <script src="js/style1.js"></script>
</body>

</html>