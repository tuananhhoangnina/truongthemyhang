<script>
    var NN_FRAMEWORK = NN_FRAMEWORK || {};
    var ASSET = '{{ assets('assets/') }}';
    var BASE = '{{ assets() }}';
    var CSRF_TOKEN = '{{ csrf_token() }}';
    var WEBSITE_NAME = '{{ !empty($setting['name' . $lang]) ? addslashes($setting['name' . $lang]) : '' }}';
    var RECAPTCHA_ACTIVE = {{ !empty(config('app.recaptcha.active')) ? 'true' : 'false' }};
    var RECAPTCHA_SITEKEY = '{{ config('app.recaptcha.sitekey') }}';
    var GOTOP = ASSET + 'images/top.png';
    var CART_URL = {
        'ADD_CART' : '{{ url('cart', ['action' => 'add-to-cart']) }}',
        'UPDATE_CART' : '{{ url('cart', ['action' => 'update-cart']) }}',
        'DELETE_CART' : '{{ url('cart', ['action' => 'delete-cart']) }}',
        'DELETE_ALL_CART' : '{{ url('cart', ['action' => 'delete-all-cart']) }}',
        'PAGE_CART':'{{ url('giohang') }}',
    };
</script>

@php
    jsminify()->set('js/jquery.min.js');
    jsminify()->set('bootstrap/bootstrap.js');
    jsminify()->set('holdon/HoldOn.js');
    jsminify()->set('simplenotify/simple-notify.js');
    jsminify()->set('fancybox5/fancybox.umd.js');
    jsminify()->set('fotorama/fotorama.js');
    jsminify()->set('swiper/swiper-bundle.min.js');
    jsminify()->set('slick/slick.js');
    jsminify()->set('js/functions.js');
    jsminify()->set('js/cart.js');
    jsminify()->set('js/apps.js');
    echo jsminify()->get();
@endphp
@stack('scripts')

@if (!empty(config('app.recaptcha.active'))) 
   
        <script>
            if (isExist($("#form-newsletter")) || isExist($("#form-contact"))) {
                $('<script>').attr({
                    'src': "https://www.google.com/recaptcha/api.js?render={{ config('app.recaptcha.sitekey') }}",
                    'async': ''
                }).insertBefore($('script:first'))
                /* Newsletter */
                document.getElementById('form-newsletter')?.addEventListener("submit", function(event) {
                    event.preventDefault();
                    grecaptcha.ready(async function() {
                        await generateCaptcha('newsletter', 'recaptchaResponseNewsletter', 'form-newsletter');
                    });
                }, false);
                /* Contact */
                document.getElementById('form-contact')?.addEventListener("submit", function(event) {
                    event.preventDefault();
                    grecaptcha.ready(async function() {
                        await generateCaptcha('contact', 'recaptchaResponseContact', 'form-contact');
                    });
                }, false);
            }
        </script>

@endif

@if (!Func::isGoogleSpeed())
    <script src="@asset('assets/js/alpinejs.js')" defer></script>
    <div id="fb-root"></div>
    <script>
        window.addEventListener('load', function () {
        (function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s);
                    js.id = id;
                    js.async = true;
                    js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v15.0";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
        });
    </script>
@endif
{!! Func::decodeHtmlChars($setting['bodyjs']) !!}