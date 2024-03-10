<footer class="footer-48201">  
      <div class="container">
        <div class="row">
          <div class="col-md-4 pr-md-5">
            <a href="#" class="footer-site-logo d-block mb-4">XÌ GÀ CHÍNH HÃNG </a>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi quasi perferendis ratione perspiciatis accusantium.</p>
          </div>
          <div class="col-md">
            <ul class="list-unstyled nav-links">
              <li><a href="#">Trang chủ</a></li>
              <li><a href="#">Giới thiệu</a></li>
              <li><a href="#">Sản phẩm</a></li>
              <li><a href="#">Liên hệ</a></li>
            </ul>
          </div>
          <div class="col-md">
            <ul class="list-unstyled nav-links">
              <li><a href="#">Clients</a></li>
              <li><a href="#">Team</a></li>
              <li><a href="#">Career</a></li>
              <li><a href="#">Testimonials</a></li>
              <li><a href="#">Journal</a></li>
            </ul>
          </div>
          <div class="col-md">
            <ul class="list-unstyled nav-links">
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Terms &amp; Conditions</a></li>
              <li><a href="#">Partners</a></li>
            </ul>
          </div>
          <div class="col-md text-md-center">
            <ul class="social list-unstyled">
              <li><a href="#"><span class="icon-instagram"></span></a></li>
              <li><a href="#"><span class="icon-twitter"></span></a></li>
              <li><a href="#"><span class="icon-facebook"></span></a></li>
              <li><a href="#"><span class="icon-pinterest"></span></a></li>
              <li><a href="#"><span class="icon-dribbble"></span></a></li>
            </ul>
            <p class=""><a href="#" class="btn btn-tertiary">Phản hồi</a></p>
          </div>
        </div> 

        <div class="row ">
          <div class="col-12 text-center">
            <div class="copyright mt-5 pt-5">
              <p><small>&copy; by Nhóm 4 no copyright.</small></p>
            </div>
          </div>
        </div> 
      </div>
    </footer>
    <script src="view/js/sticky.js"></script>
    <script src="view/js/app.js"></script>
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
    <script src="view/js/modal.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="aos-master/aos-master/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        function increaseCount(a, b) {
            var input = b.previousElementSibling;
            var value = parseInt(input.value, 10);
            value = isNaN(value) ? 0 : value;
            value++;
            input.value = value;
            }

            function decreaseCount(a, b) {
            var input = b.nextElementSibling;
            var value = parseInt(input.value, 10);
            if (value > 1) {
                value = isNaN(value) ? 0 : value;
                value--;
                input.value = value;
                }
            }
    </script>
</body>

</html>