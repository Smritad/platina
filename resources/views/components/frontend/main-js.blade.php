 <!-- Plugins -->
    <script src="{{ asset('frontend/assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-3.7.1.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/aos.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/smoothscroll.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery.fancybox.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/slick.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/swiper-bundle.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/menu.js')}}"></script>
    <!-- main-js -->
    <script src="{{ asset('frontend/assets/js/main.js')}}"></script>
     <!-- Plugins -->
  
  
  <!-- main-js -->
  <script src="assets/js/main.js"></script>
  <!-- main-js -->
  <script src="{{ asset('frontend/assets/js/main.js')}}"></script>
    <script>
    const rangeMin = document.getElementById("rangeMin");
    const rangeMax = document.getElementById("rangeMax");
    const minPrice = document.getElementById("minPrice");
    const maxPrice = document.getElementById("maxPrice");
    const progress = document.querySelector(".slider .progress");

    const priceGap = 500;

    function updateSlider() {
      let minVal = parseInt(rangeMin.value);
      let maxVal = parseInt(rangeMax.value);

      if ((maxVal - minVal) < priceGap) {
        if (event.target.id === "rangeMin") {
          rangeMin.value = maxVal - priceGap;
        } else {
          rangeMax.value = minVal + priceGap;
        }
      } else {
        minPrice.value = minVal;
        maxPrice.value = maxVal;
        progress.style.left = (minVal / rangeMin.max) * 100 + "%";
        progress.style.right = 100 - (maxVal / rangeMax.max) * 100 + "%";
      }
    }

    rangeMin.addEventListener("input", updateSlider);
    rangeMax.addEventListener("input", updateSlider);

    minPrice.addEventListener("input", () => {
      let val = parseInt(minPrice.value);
      if (val < parseInt(rangeMax.value) - priceGap) {
        rangeMin.value = val;
        updateSlider();
      }
    });

    maxPrice.addEventListener("input", () => {
      let val = parseInt(maxPrice.value);
      if (val > parseInt(rangeMin.value) + priceGap) {
        rangeMax.value = val;
        updateSlider();
      }
    });

    updateSlider(); // Initial set
  </script>


<!-- Include Notyf CSS & JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notyf/3.10.0/notyf.min.css" type="text/css" media="all">
<script src="https://cdnjs.cloudflare.com/ajax/libs/notyf/3.10.0/notyf.min.js"></script>

<script>
    // Initialize Notyf
    var notyf = new Notyf({
        duration: 3000, // Notification duration
        ripple: true, // Adds a ripple effect
        position: {
            x: 'right',
            y: 'top',
        },
        dismissible: true,
        types: [
            {
                type: 'custom-success',
                background: 'black',  // Black background
                icon: {
                    className: 'fa fa-check-circle', // FontAwesome success icon
                    tagName: 'i',
                    color: 'white'  // White icon color
                }
            }
        ]
    });

    // Display notifications based on session messages
    @if(Session::has('message'))
        notyf.open({
            type: 'custom-success',
            message: " {{ session('message') }}",
        });
    @endif

    @if(Session::has('error'))
        notyf.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
        notyf.open({
            type: 'info',
            message: "<strong>ℹ Info:</strong> {{ session('info') }}"
        });
    @endif

    @if(Session::has('warning'))
        notyf.open({
            type: 'warning',
            message: " {{ session('warning') }}"
        });
    @endif
</script>


