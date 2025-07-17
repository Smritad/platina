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
document.addEventListener("DOMContentLoaded", function () {
    const rangeMin = document.getElementById("rangeMin");
    const rangeMax = document.getElementById("rangeMax");
    const minPrice = document.getElementById("minPrice");
    const maxPrice = document.getElementById("maxPrice");
    const progress = document.querySelector(".slider .progress");

    const priceGap = 500;

    function setValues(minVal, maxVal) {
        rangeMin.value = minVal;
        rangeMax.value = maxVal;
        minPrice.value = minVal;
        maxPrice.value = maxVal;

        progress.style.left = (minVal / parseInt(rangeMin.max)) * 100 + "%";
        progress.style.right = 100 - (maxVal / parseInt(rangeMax.max)) * 100 + "%";
    }

    function handleRangeChange() {
        let minVal = parseInt(rangeMin.value);
        let maxVal = parseInt(rangeMax.value);

        if (maxVal - minVal < priceGap) {
            if (this.id === "rangeMin") {
                minVal = maxVal - priceGap;
            } else {
                maxVal = minVal + priceGap;
            }
        }
        setValues(minVal, maxVal);
    }

    function handleNumberChange() {
        let minVal = parseInt(minPrice.value);
        let maxVal = parseInt(maxPrice.value);

        if (maxVal - minVal >= priceGap && minVal >= 0 && maxVal <= 100000) {
            setValues(minVal, maxVal);
        }
    }

    rangeMin.addEventListener("input", handleRangeChange);
    rangeMax.addEventListener("input", handleRangeChange);
    minPrice.addEventListener("input", handleNumberChange);
    maxPrice.addEventListener("input", handleNumberChange);

    setValues(0, 30000); // Default initialization
});
</script>


<script>
document.addEventListener("DOMContentLoaded", function () {
    setupPriceRangeSync({
        rangeMin: "rangeMinDesktop",
        rangeMax: "rangeMaxDesktop",
        minPrice: "minPriceDesktop",
        maxPrice: "maxPriceDesktop",
        progress: "progressDesktop",
        defaultMin: 0,
        defaultMax: 30000
    });

    setupPriceRangeSync({
        rangeMin: "rangeMinMobile",
        rangeMax: "rangeMaxMobile",
        minPrice: "minPriceMobile",
        maxPrice: "maxPriceMobile",
        progress: "progressMobile",
        defaultMin: 0,
        defaultMax: 30000
    });

    function setupPriceRangeSync(config) {
        const rangeMin = document.getElementById(config.rangeMin);
        const rangeMax = document.getElementById(config.rangeMax);
        const minPrice = document.getElementById(config.minPrice);
        const maxPrice = document.getElementById(config.maxPrice);
        const progress = document.getElementById(config.progress);

        const priceGap = 500;

        function setValues(minVal, maxVal) {
            rangeMin.value = minVal;
            rangeMax.value = maxVal;
            minPrice.value = minVal;
            maxPrice.value = maxVal;

            progress.style.left = (minVal / parseInt(rangeMin.max)) * 100 + "%";
            progress.style.right = 100 - (maxVal / parseInt(rangeMax.max)) * 100 + "%";
        }

        function handleRangeChange() {
            let minVal = parseInt(rangeMin.value);
            let maxVal = parseInt(rangeMax.value);

            if (maxVal - minVal < priceGap) {
                if (this.id === config.rangeMin) {
                    minVal = maxVal - priceGap;
                } else {
                    maxVal = minVal + priceGap;
                }
            }
            setValues(minVal, maxVal);
        }

        function handleNumberChange() {
            let minVal = parseInt(minPrice.value);
            let maxVal = parseInt(maxPrice.value);

            if (maxVal - minVal >= priceGap && minVal >= 0 && maxVal <= 100000) {
                setValues(minVal, maxVal);
            }
        }

        rangeMin.addEventListener("input", handleRangeChange);
        rangeMax.addEventListener("input", handleRangeChange);
        minPrice.addEventListener("input", handleNumberChange);
        maxPrice.addEventListener("input", handleNumberChange);

        setValues(config.defaultMin, config.defaultMax);
    }
});
</script>

<script>
$(document).ready(function () {
    let selectedColorsDesktop = [];
    let selectedColorsMobile = [];

    setupPriceSync("Desktop");
    setupPriceSync("Mobile");

    function setupPriceSync(type) {
        const prefix = type === "Desktop" ? "Desktop" : "Mobile";
        const rangeMin = document.getElementById("rangeMin" + prefix);
        const rangeMax = document.getElementById("rangeMax" + prefix);
        const minPrice = document.getElementById("minPrice" + prefix);
        const maxPrice = document.getElementById("maxPrice" + prefix);
        const progress = document.getElementById("progress" + prefix);
        const priceGap = 500;

        function setValues(minVal, maxVal) {
            rangeMin.value = minVal;
            rangeMax.value = maxVal;
            minPrice.value = minVal;
            maxPrice.value = maxVal;
            progress.style.left = (minVal / parseInt(rangeMin.max)) * 100 + "%";
            progress.style.right = 100 - (maxVal / parseInt(rangeMax.max)) * 100 + "%";
        }

        function handleRangeChange() {
            let minVal = parseInt(rangeMin.value);
            let maxVal = parseInt(rangeMax.value);

            if (maxVal - minVal < priceGap) {
                if (this.id === "rangeMin" + prefix) {
                    minVal = maxVal - priceGap;
                } else {
                    maxVal = minVal + priceGap;
                }
            }
            setValues(minVal, maxVal);
        }

        function handleNumberChange() {
            let minVal = parseInt(minPrice.value);
            let maxVal = parseInt(maxPrice.value);

            if (maxVal - minVal >= priceGap && minVal >= 0 && maxVal <= 100000) {
                setValues(minVal, maxVal);
            }
        }

        rangeMin.addEventListener("input", handleRangeChange);
        rangeMax.addEventListener("input", handleRangeChange);
        minPrice.addEventListener("input", handleNumberChange);
        maxPrice.addEventListener("input", handleNumberChange);

        setValues(minPrice.value, maxPrice.value);
    }

    // Color handling for both
    $('.color-option').on('click', function (e) {
        e.preventDefault();
        const color = $(this).data('color');
        if (!selectedColorsDesktop.includes(color)) {
            selectedColorsDesktop.push(color);
            updateColorDisplay('#selectedColorDisplay', selectedColorsDesktop);
        }
    });

    $('.color-option-mobile').on('click', function (e) {
        e.preventDefault();
        const color = $(this).data('color');
        if (!selectedColorsMobile.includes(color)) {
            selectedColorsMobile.push(color);
            updateColorDisplay('#selectedColorDisplayMobile', selectedColorsMobile);
        }
    });

    $(document).on('click', '.remove-color', function (e) {
        e.preventDefault();
        const colorToRemove = $(this).data('color');
        selectedColorsDesktop = selectedColorsDesktop.filter(c => c !== colorToRemove);
        selectedColorsMobile = selectedColorsMobile.filter(c => c !== colorToRemove);
        updateColorDisplay('#selectedColorDisplay', selectedColorsDesktop);
        updateColorDisplay('#selectedColorDisplayMobile', selectedColorsMobile);
    });

    function updateColorDisplay(selector, colorArray) {
        let html = '';
        colorArray.forEach(color => {
            html += `<span class="badge bg-primary me-1 color-badge">
                        ${color}
                        <a href="#" class="text-white ms-1 remove-color" data-color="${color}">&times;</a>
                    </span>`;
        });
        $(selector).html(html);
    }
$(document).on('click', '.size-btn', function (e) {
    e.preventDefault();
    $(this).closest('.sidebar-wrap').find('.size-btn').removeClass('active');
    $(this).addClass('active');
});
    // Unified submit handler:
    $('button[type="submit"]').on('click', function (e) {
        e.preventDefault();

        const form = $(this).closest('.sidebar-wrap');
        const isDesktop = form.attr('id') === 'desktopFilterForm';

        let colors = isDesktop ? selectedColorsDesktop : selectedColorsMobile;
        let minPrice = form.find('[id^=minPrice]').val();
        let maxPrice = form.find('[id^=maxPrice]').val();

        let tc_name = form.find('select[name="tc_name"]').val();
        let age_group = form.find('select[name="age_group"]').val();
        let collection_name = form.find('select[name="collection_name"]').val();

        let fabricTypes = [];
        form.find('.fabric-type-check:checked').each(function () {
            fabricTypes.push($(this).val());
        });

        let size = form.find('.size-btn.active').text().trim();

        let formData = {
            colors: colors,
            size: size,
            min_price: minPrice,
            max_price: maxPrice,
            tc_name: tc_name,
            age_group: age_group,
            collection_name: collection_name,
            fabric_types: fabricTypes,
        };

        $.ajax({
            url: "{{ route('allproducts.filter') }}",
            type: "GET",
            data: formData,
            beforeSend: function () {
                $('#productResults').html('<p>Loading...</p>');
            },
            success: function (response) {
                $('#productResults').html(response);
            },
            error: function () {
                $('#productResults').html('<p class="text-danger">Something went wrong. Please try again.</p>');
            }
        });
    });
});
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


