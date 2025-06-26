<!DOCTYPE html>
<html lang="en">
<head>
    @include('components.frontend.head')
</head>
<body>
    <!-- Loader -->
    <div class="rx-loader">
        <span class="loader"></span>
    </div>
    
    <!-- Header -->
    <header>
        @include('components.frontend.header')
    </header>

    <!-- Breadcrumb -->
    <section class="section-breadcrumb padding-b-50">
        <div class="rx-breadcrumb-image">
            <div class="rx-breadcrumb-overlay"></div>
            <div class="inner-breadcrumb-contact">
                <div class="main-breadcrumb-contact">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="rx-banner-contact">
                                    <h2>Cart Details</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rx-banner-breadcrumb">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="breadcrumb-contact">
                                    <div class="last-contact">
                                        <ul>
                                            <li><a href="{{ route('frontend.index') }}">Home</a></li>
                                            <li>Cart Details</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cart Section -->
<section class="section-room-details cart-details-one-sec padding-t-50 padding-b-50">
    <div class="container">
        <div class="row mb-minus-24">
            <div class="col-lg-8 col-12 mb-24">
                <div class="cart-details-form-sec">
                    <form>
                        <div class="table-responsive">
                            <table class="cart-det-table-sec">
                                <thead>
                                    <tr class="cart-details-header-sec">
                                        <th>Products</th>
                                         <th>Color</th>
                                        <th>Size</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItems as $item)
                                    @php
                                        $product = \App\Models\ProductDetails::find($item->product_id);
                                        $sabCategory = DB::table('sub_product_category')
                                                        ->where('id', $product->product_sab_category_id)
                                                        ->first();

                                        $sabSlug = $sabCategory ? $sabCategory->slug : 'coming-soon';
                                        $productSlug = $product ? $product->slug : \Illuminate\Support\Str::slug($item->product_name);
                                        $productLink = route('product.categoryproduct', [$sabSlug, $productSlug]);
                                    @endphp
                                    <tr class="cart-det-item" data-id="{{ $item->id }}">
                                        <td class="cart-details-products">
                                            <a href="{{ $productLink }}" class="cart-details-img-box">
                                                <img src="{{ asset('uploads/products/media/' . explode(',', $item->image)[0]) }}" alt="product">
                                            </a>
                                            <div class="cart-details-product-name-sec">
                                                <a href="{{ $productLink }}">{{ $item->product_name }}</a><br>
                                                

                                            </div>
                                        </td>
                                        <td class="color-box">
                                            <div class="color-box">
                                                <select class="rx-from-control form-select">
                                                    <option selected><a >{{ $item->color }}</a></option>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="size-box">
                                            <div class="variant-box">
                                                <select class="rx-from-control form-select">
                                                    <option selected>{{ $item->size }}</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="quantity-box">
                                            <div class="quantity-table-box-sec">
                                                <div class="qty-container-box">
                                                    <button class="qty-btn-minus btn-light" type="button"><i class="fa fa-minus"></i></button>
                                                    <input type="text" name="qty" value="{{ $item->quantity }}" class="table-input-qty" />
                                                    <button class="qty-btn-plus btn-light" type="button"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="table-price-sec">
                                            <div class="table-price-content-sec">
                                                <i class="fa fa-inr" aria-hidden="true"></i> 
                                                <span class="price" data-unit-price="{{ $item->price }}">
                                                    {{ number_format($item->price * $item->quantity) }}
                                                </span>
                                            </div>
                                        </td>
                                        <td class="remove-cart">
                                            <a href="javascript:void(0)" class="remove-cart-btn" data-id="{{ $item->id }}">
                                                <i class="fa fa-times-circle"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-4 col-12 mb-24">
                <div class="order-summary-sec">
                    <div class="order-summary-header-sec">
                        <h5>Order Summary</h5>
                    </div>
                    @php
                        $subtotal = $cartItems->sum(function($item) {
                            return $item->price * $item->quantity;
                        });
                        $discount = 1000;
                        $shipping = 500;
                        $total = $subtotal - $discount + $shipping;
                    @endphp

                    <div class="order-summary-sub-total-sec">
                        <span class="subtotal-para">Subtotal</span>
                        <span class="subtotal-price"><i class="fa fa-inr" aria-hidden="true"></i> <span id="subtotal">{{ number_format($subtotal) }}</span></span>
                    </div>

                    <div class="order-shipping-price-sec">
                        <fieldset class="ship-item">
                            <label>
                                <span>Discount</span>
                                <span class="price"><i class="fa fa-inr" aria-hidden="true"></i> {{ number_format($discount) }}</span>
                            </label>
                        </fieldset>
                        <fieldset class="ship-item">
                            <label>
                                <span>Standard Shipping</span>
                                <span class="price"><i class="fa fa-inr" aria-hidden="true"></i> {{ number_format($shipping) }}</span>
                            </label>
                        </fieldset>
                    </div>

                    <div class="order-summary-total-sec">
                        <span class="total-para">Total</span>
                        <span class="total-price"><i class="fa fa-inr" aria-hidden="true"></i> <span id="total">{{ number_format($total) }}</span></span>
                    </div>

                    <div class="process-to-checkout-sec">
                        <button id="proceed-to-checkout" class="btn btn-primary">Proceed to Checkout</button>

                        <a href="{{ route('show.checkout') }}" class="process-to-checkout-btn">Process To Checkout</a>
                        <p class="text-center">OR</p>
                        <a href="{{ route('product.all') }}" class="continue-shopping-btn">Continue Shopping</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


    @include('components.frontend.footer')

    <!-- Back to Top -->
    <a href="#Top" class="back-to-top result-placeholder">
        <i class="fa fa-angle-up"></i>
        <div class="back-to-top-wrap active-progress">
            <svg viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
            </svg>
        </div>
    </a>

    @include('components.frontend.main-js')

    <script src="assets/js/main.js"></script>
<script>
document.getElementById('proceed-to-checkout').addEventListener('click', function(e) {
    e.preventDefault();

    const cartData = [];
    document.querySelectorAll('.cart-det-item').forEach(row => {
        cartData.push({
            id: row.dataset.id,
            product_name: row.querySelector('.cart-details-product-name-sec a').innerText.trim(),
            size: row.querySelector('.size-box select').value.trim(),
            color: row.querySelector('.color-box select').value.trim(),
            quantity: parseInt(row.querySelector('.table-input-qty').value),
            price: parseInt(row.querySelector('.price').dataset.unitPrice),
            image: row.querySelector('.cart-details-img-box img').getAttribute('src')
        });
    });

    fetch('{{ route('cart.storeCheckoutData') }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ cart: cartData })
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            window.location.href = "{{ route('show.checkout') }}";
        } else {
            alert('There was an error processing your request.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Something went wrong. Please try again.');
    });
});
</script>


   <script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.qty-btn-plus').forEach(button => {
        button.addEventListener('click', function () {
            const row = this.closest('.cart-det-item');
            const input = row.querySelector('.table-input-qty');
            let qty = parseInt(input.value) || 1;
            qty++;
            input.value = qty;
            updateItemPrice(row, qty);
        });
    });

    document.querySelectorAll('.qty-btn-minus').forEach(button => {
        button.addEventListener('click', function () {
            const row = this.closest('.cart-det-item');
            const input = row.querySelector('.table-input-qty');
            let qty = parseInt(input.value) || 1;
            if (qty > 1) {
                qty--;
                input.value = qty;
                updateItemPrice(row, qty);
            }
        });
    });
});

function updateItemPrice(row, qty) {
    const priceElem = row.querySelector('.price');
    const unitPrice = parseInt(priceElem.dataset.unitPrice);
    const totalPrice = unitPrice * qty;
    priceElem.innerText = totalPrice.toLocaleString();
    updateCartSummary();
}

function updateCartSummary() {
    let subtotal = 0;
    document.querySelectorAll('.cart-det-item').forEach(row => {
        const priceElem = row.querySelector('.price');
        const unitPrice = parseInt(priceElem.dataset.unitPrice);
        const qty = parseInt(row.querySelector('.table-input-qty').value) || 1;
        subtotal += unitPrice * qty;
    });

    const discount = 1000;
    const shipping = 500;
    const total = subtotal - discount + shipping;

    document.getElementById('subtotal').innerText = subtotal.toLocaleString();
    document.getElementById('total').innerText = total.toLocaleString();
}
</script>

<script>
$(document).ready(function() {
    $('.remove-cart-btn').on('click', function() {
        let itemId = $(this).data('id');
        let row = $('.cart-det-item[data-id="' + itemId + '"]');

        if (confirm('Are you sure you want to remove this item from cart?')) {
            $.ajax({
                url: '{{ url("remove-from-cart") }}/' + itemId,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        row.remove();
                        updateCartSummary();
                        alert(response.message);
                    } else {
                        alert(response.message);
                    }
                },
                error: function() {
                    alert('Something went wrong. Please try again.');
                }
            });
        }
    });

    function updateCartSummary() {
        let subtotal = 0;

        $('.cart-det-item').each(function() {
            let price = parseFloat($(this).find('.price').data('price'));
            let qty = parseInt($(this).find('.table-input-qty').val());
            subtotal += price * qty;
        });

        let discount = 1000;  // Same as in your PHP code
        let shipping = 500;

        let total = subtotal - discount + shipping;

        $('#subtotal').text(subtotal.toLocaleString());
        $('#total').text(total.toLocaleString());
    }
});
</script>

</body>
</html>
