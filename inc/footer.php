</div>
<footer>
        <div class="container">
            <div class="footer-1 line" data-aos="fade-right" data-aos-duration="1050">
                <h2>About Us</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</p>
                <ul class="social">
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                </ul>
            </div>
            <div class="footer-2 line" data-aos="fade-right" data-aos-duration="1030">
                <h2>Quick Links</h2>
                <ul>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Product</a></li>
                    <li><a href="#">Gallery</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="footer-2 line" data-aos="fade-right" data-aos-duration="1010">
                <h2>Product Links</h2>
                <ul>
                    <li><a href="#">Clothing</a></li>
                    <li><a href="#">Household</a></li>
                    <li><a href="#">Kids</a></li>
                    <li><a href="#">Stationery</a></li>
                    <li><a href="#">Electronics</a></li>
                </ul>
            </div>
            <div class="footer-3 line" data-aos="fade-right" data-aos-duration="990">
                <h2>Contact Info</h2>
                <li>
                    <span><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                    <span>132, New East Lane <br>London, United Kindom</span>
                </li>
                <li>
                    <span><i class="fa fa-volume-control-phone" aria-hidden="true"></i></span>
                    <span><a href="#">+1 2234 56789</a></span>
                </li>
                <li>
                    <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
                    <span><a href="#">contactus@email.com</a></span>
                </li>
            </div>
        </div>
    </footer>
    <div class="copyright">
        <p>Copyright &copy; 2022. All Right Reserved.</p>
    </div>
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
<a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
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
</body>

</html>