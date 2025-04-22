/* Validation form */
validateForm('validation-contact');
// validateForm('validation-cart');
// validateForm('validation-user');

/* Load name input file */
NN_FRAMEWORK.loadNameInputFile = function () {
	if (isExist($('.custom-file input[type=file]'))) {
		$('body').on('change', '.custom-file input[type=file]', function () {
			var fileName = $(this).val();
			fileName = fileName.substr(fileName.lastIndexOf('\\') + 1, fileName.length);
			$(this).siblings('label').html(fileName);
		});
	}
};

/* Back to top */
NN_FRAMEWORK.GoTop = function () {
	$(window).scroll(function () {
		if (!$('.scrollToTop').length)
			$('body').append('<div class="scrollToTop"><img src="' + GOTOP + '" alt="Go Top"/></div>');
		if ($(this).scrollTop() > 100) $('.scrollToTop').fadeIn();
		else $('.scrollToTop').fadeOut();
	});

	$('body').on('click', '.scrollToTop', function () {
		$('html, body').animate({ scrollTop: 0 }, 800);
		return false;
	});
};

/* Menu */
NN_FRAMEWORK.Menu = function () {
	if (isExist($('.menu-mobile'))) {
		$('.menu-mobile  ul  li  span').click(function (e) {
			// Prevent the click event from affecting nested <li> elements
			e.stopPropagation();

			// Toggle the active class for the clicked item
			// $(this).toggleClass('active');

			// Get the first <i> element within the clicked <li>
			var icon = $(this).find('i');

			// Check if the <li> is active
			if ($(this).hasClass('active')) {
				$(this).removeClass('active');
				// If active, change the icon to 'fa-angle-down'
				icon.css('transform', 'rotate(0deg)'); // Rotate the icon when active
			} else {
				$(this).addClass('active');
				// If not active, change the icon back to 'fa-angle-right'
				icon.css('transform', 'rotate(90deg)'); // Reset rotation
				
			}
		});
	}
	/* Menu fixed */
	if (isExist($('.menu-wrapper'))) {
		$(window).scroll(function() {
			var catch_top = $(window).scrollTop();
			var menu_height = $('.menu-wrapper').height() + 100;
	
			if (catch_top >= menu_height) {
				if (!$('.menu-wrapper').hasClass('fix_menu animate__animated animate__fadeIn')) {
					$('.menu-wrapper').addClass('fix_menu animate__animated animate__fadeIn');
				}
			} else {
				$('.menu-wrapper').removeClass('fix_menu animate__animated animate__fadeIn');
			}
		});
	}
};

/* Tools */
NN_FRAMEWORK.Tools = function () {
	if (isExist($('.toolbar'))) {
		$('.footer').css({ marginBottom: $('.toolbar').innerHeight() });
	}
};

/* Popup */
NN_FRAMEWORK.Popup = function () {
	if (isExist($('#popup'))) {
		validateForm('validation-popup');
		$('#popup').modal('show');
	}
};

/* Wow */
NN_FRAMEWORK.Wows = function () {
	new WOW().init();
};

/* Search */
NN_FRAMEWORK.Search = function () {

	if (isExist($(".search-icon"))) {
		$(".search-icon").click(function() {
			$('.search2').toggleClass('active');
		});
	}
	
	if (isExist($('.icon-search'))) {
		$('.icon-search').click(function () {
			if ($(this).hasClass('active')) {
				$(this).removeClass('active');
				$('.search-grid').stop(true, true).animate({ opacity: '0', width: '0px' }, 200);
			} else {
				$(this).addClass('active');
				$('.search-grid').stop(true, true).animate({ opacity: '1', width: '230px' }, 200);
			}
			document.getElementById($(this).next().find('input').attr('id')).focus();
			$('.icon-search i').toggleClass('bi bi-x-lg');
		});
	}

	if (isExist($('.search-auto'))) {
		$('.show-search').hide();
		$('.search-auto').keyup(function () {
			$keyword = $(this).val();
			if ($keyword.length >= 2) {
				$.get('tim-kiem-goi-y?keyword=' + $keyword, function (data) {
					if (data) {
						$('.show-search').show();
						$('.show-search').html(data);
					}
				});
			}
		});
	}
};

/* Videos */
NN_FRAMEWORK.Videos = function () {
	Fancybox.bind('[data-fancybox]', {});
};

/* Dom Change */
NN_FRAMEWORK.DomChange = function () {
	/* Video Fotorama */
	if (isExist($('#fotorama-videos'))) {
		$('#fotorama-videos').fotorama();
	}
	/* Video Select */
	if (isExist($('.list-video'))) {
		$('.list-video').change(function () {
			var id = $(this).val();
			$.ajax({
				url: 'load-video',
				type: 'GET',
				dataType: 'html',
				data: {
					id: id
				},
				beforeSend: function () {
					holdonOpen();
				},
				success: function (result) {
					$('.video-main').html(result);
					holdonClose();
				}
			});
		});
	}

	/* Chat Facebook */
	$('#messages-facebook').one('DOMSubtreeModified', function () {
		$('.js-facebook-messenger-box').on('click', function () {
			$('.js-facebook-messenger-box, .js-facebook-messenger-container').toggleClass('open'),
				$('.js-facebook-messenger-tooltip').length && $('.js-facebook-messenger-tooltip').toggle();
		}),
			$('.js-facebook-messenger-box').hasClass('cfm') &&
				setTimeout(function () {
					$('.js-facebook-messenger-box').addClass('rubberBand animated');
				}, 3500),
			$('.js-facebook-messenger-tooltip').length &&
				($('.js-facebook-messenger-tooltip').hasClass('fixed')
					? $('.js-facebook-messenger-tooltip').show()
					: $('.js-facebook-messenger-box').on('hover', function () {
							$('.js-facebook-messenger-tooltip').show();
					  }),
				$('.js-facebook-messenger-close-tooltip').on('click', function () {
					$('.js-facebook-messenger-tooltip').addClass('closed');
				}));
		$('.search_open').click(function () {
			$('.search_box_hide').toggleClass('opening');
		});
	});
};

NN_FRAMEWORK.SwiperData = function (obj) {
	if (!isExist(obj)) return false;
	var name = obj.attr('data-swiper-name') || 'swiper';
	var thumbs = obj.attr('data-swiper-thumbs');
	var more = obj.attr('data-swiper');

	if (more && more.search('|') >= 0) {
		more = more.split('|');
		var on = more.reduce((a, b) => {
			if (b.search('{') < 0) {
				var c = {
					[b.split(':')[0]]: useStrict(b.split(':')[1])
				};
			} else {
				const b1 = String(b.split(':', 1));
				const b2 = useStrict(b.slice(String(b.split(':', 1)).length + 1).trim());
				var c = {
					[b1]: b2
				};
			}
			return Object.assign({}, a, c);
		}, {});
	} else {
		on = '';
	}
	if (thumbs) {
		on.thumbs = { swiper: window[thumbs] };
	}

	window[name] = new Swiper(obj[0], on);

	if (window[name].passedParams.breakpoints) {
		if (window[name].params.direction == 'vertical') {
			const entries = Object.entries(window[name].passedParams.breakpoints);
			function setHeight() {
				var height = obj.find('.item').outerHeight();
				var countItem = obj.find('.item').length;
				entries.forEach((v) => {
					var Breakpoint = v[0] > 0 ? v[0] : 0;
					if (Breakpoint > 0 && Breakpoint == window[name].currentBreakpoint) {
						var items = v[1].slidesPerView != undefined ? v[1].slidesPerView : 0;
						var margin = v[1].spaceBetween != undefined ? v[1].spaceBetween : 0;
					} else if (window[name].currentBreakpoint == 'max') {
						var items = window[name].passedParams.slidesPerView;
						var margin = window[name].passedParams.spaceBetween;
					}
					if (window[name].params.direction == 'vertical') {
						if (countItem < items) {
							obj.css({
								height: height * countItem + (countItem - 1) * margin
							});
							obj.find('.swiper-slide').addClass('h-auto');
						} else {
							obj.css({
								height: height * items + (items - 1) * margin
							});
						}
						window[name].update();
					} else {
						obj.css({ height: '' });
						window[name].update();
					}
				});
			}
			setHeight();
			$(window).resize(setHeight());
		}
	} else {
		if (window[name].params.direction == 'vertical') {
			function setHeight() {
				var height = obj.find('.item').outerHeight();
				var countItem = obj.find('.item').length;
				var items = window[name].passedParams.slidesPerView;
				var margin = window[name].passedParams.spaceBetween;
				if (countItem < items) {
					obj.css({
						height: height * countItem + (countItem - 1) * margin
					});
					obj.find('.swiper-slide').addClass('h-auto');
				} else {
					obj.css({ height: height * items + (items - 1) * margin });
				}
				window[name].update();
			}
			setHeight();
			$(window).resize(setHeight());
		}
	}
	return window[name];
};

/* Swiper */
NN_FRAMEWORK.Swiper = function () {
	if (isExist($('.swiper-auto'))) {
		$('.swiper-auto[data-swiper-name]').each(function () {
			NN_FRAMEWORK.SwiperData($(this));
		});
		$('.swiper-auto:not([data-swiper-name])').each(function () {
			NN_FRAMEWORK.SwiperData($(this));
		});
	}
};

NN_FRAMEWORK.Api = function () {
	if (isExist($('.load-product'))) {
		$('.load-product').each(function () {
			var thisClass = $(this);
			var url = thisClass.data('url');
			var type = thisClass.data('type');
			var list = thisClass.data('list');
			var id = thisClass.find('.title-cat-main .active').data('id');
			var show = 'paging-product-' + list;
			loadPaging(url + '?type=' + type + '&num=8' + '&list=' + list + '&id=' + id, show);
		});

		$('.title-cat-main span').click(function (e) {
			$(this).parents('.title-cat-main').find('span').removeClass('active');
			$(this).addClass('active');
			var thisClass = $(this).parents('.load-product');
			var url = thisClass.data('url');
			var type = thisClass.data('type');
			var list = thisClass.data('list');
			var id = thisClass.find('.title-cat-main .active').data('id');
			var show = 'paging-product-' + list;
			loadPaging(url + '?type=' + type + '&num=8' + '&list=' + list + '&id=' + id, show);
		});
	}

	if (isExist($('.item-search'))) {
		$('.item-search input').click(function () {
			Filter();
		});
	}

	if (isExist($('.sort-select-main'))) {
		$('.sort-select-main p a').click(function () {
			$('.sort-select-main p a').removeClass('check');
			$(this).addClass('check');
			Filter();
		});
	}

	$('.filter').click(function (e) {
		$('.left-product').toggleClass('show');
	});
	TextSort();
};

NN_FRAMEWORK.Properties = function () {
	if (isExist($('.grid-properties'))) {
		$('.properties').click(function (e) {
			$(this).parents('.grid-properties').find('.properties').removeClass('active');
			// $('.properties').removeClass('outstock');
			$(this).addClass('active');
		});
	}
};

NN_FRAMEWORK.Main = function () {
	// Lấy tất cả các thẻ <img> trên trang
	var imgElements = document.querySelectorAll('img');
	// Lặp qua từng phần tử và thêm thuộc tính alt nếu chưa có
	imgElements.forEach(function (img) {
		if (!img.hasAttribute('alt')) {
			// Kiểm tra xem thẻ img có thuộc tính alt không
			img.alt = WEBSITE_NAME; // Thêm thuộc tính alt
		}
	});
	// Lấy tất cả các thẻ <a> trên trang
	var anchorElements = document.querySelectorAll('a');
	// Lặp qua từng phần tử và thêm thuộc tính aria-label nếu chưa có
	anchorElements.forEach(function (anchor) {
		if (!anchor.hasAttribute('aria-label')) {
			// Kiểm tra xem thẻ <a> có thuộc tính aria-label không
			anchor.setAttribute('aria-label', WEBSITE_NAME); // Thêm thuộc tính aria-label
		}
	});

	$('.tt-toc').click(function (e) { 
		$('.box-readmore ul').slideToggle();
	});
};

NN_FRAMEWORK.Img = function () {
	// Lấy tất cả các thẻ <img> trên trang
	const images = document.querySelectorAll('img');
	// Duyệt qua từng thẻ <img>
	images.forEach((img) => {
		// Hàm xử lý sau khi ảnh đã tải xong
		const handleImageLoad = () => {
			// Lấy kích thước hiển thị hiện tại của hình ảnh
			const width = img.clientWidth;
			const height = img.clientHeight;
			const hw = img.getAttribute('width');
			// Chỉ xử lý nếu kích thước width và height lớn hơn 0
			if (width > 0 && height > 0 && !hw) {
				// Đặt lại thuộc tính width và height của thẻ <img>
				img.setAttribute('width', width);
				img.setAttribute('height', height);
			}
		};

		// Gắn sự kiện 'load' vào ảnh để xử lý sau khi ảnh tải xong
		img.addEventListener('load', handleImageLoad);

		// Nếu ảnh đã tải trước khi gắn sự kiện 'load', xử lý ngay lập tức
		if (img.complete) {
			handleImageLoad();
		}
	});
};


// Toolbar2
NN_FRAMEWORK.Toolbar2 = function () {
	// $(window).scroll(function () {
	// 	if (!$('.scrollToTopMobile').length)
	// 		$('body').append('<div class="scrollToTopMobile"><img src="' + GOTOP + '" alt="Go Top"/></div>');
	// 	if ($(this).scrollTop() > 100) $('.scrollToTopMobile').fadeIn();
	// });

	$('body').on('click', '.scrollToTopMobile', function () {
		$('html, body').animate({ scrollTop: 0 }, 800);
		return false;
	});

	if (isExist($('.toolbar2'))) {
		$('.footer-wrapper').css({ marginBottom: $('.toolbar2').innerHeight() });
	}

	$('.toolbar2 .phone').click(function (e) {
		e.stopPropagation();
		$('.toolbar2').toggleClass('is-active');
	});
	$(document).click(function () {
		$('.toolbar2').removeClass('is-active');
	});
	$(window).scroll(function () {
		var ex6Exists = $('.ex6').length > 0;
		if ($(this).scrollTop() > 100) {
			if (!ex6Exists) {
				$('.toolbar2 .scrollToTopMobile').addClass('ex6');
			}
		} else {
			$('.toolbar2 .scrollToTopMobile').removeClass('ex6');
		}
	});
};


/* Ready */
$(document).ready(function () {
	NN_FRAMEWORK.Api();
	NN_FRAMEWORK.Popup();
	NN_FRAMEWORK.Swiper();
	NN_FRAMEWORK.GoTop();
	NN_FRAMEWORK.Toolbar2();
	NN_FRAMEWORK.Menu();
	NN_FRAMEWORK.Videos();
	NN_FRAMEWORK.Search();
	NN_FRAMEWORK.DomChange();
	NN_FRAMEWORK.loadNameInputFile();
	NN_FRAMEWORK.Properties();
	NN_FRAMEWORK.Main();
	if (isExist($('.comment-page'))) {
		new Comments('.comment-page', BASE);
	}
	new Cart(BASE);

	if (isExist($(".intro-slick"))) {
		$('.intro-slick').slick({
			slidesToShow: 3,
			slidesToScroll: 1,
			dots: true,
			vertical: false,
			arrows: true,
			focusOnSelect: true,
			autoplay: true,
			autoplaySpeed: 3000,
			prevArrow: $('.intro-prev'),
			nextArrow: $('.intro-next'),
			customPaging : function(slider, i) {
				let number = ((i+1)<10) ? (`0`+(i+1)) : i;
				return `<span> ${number} <b class="deco"> <b> </sapn>`;
			},
			responsive: [
				{
					breakpoint: 1025,
					settings: {
						slidesToShow: 3,
					}
				}, 
				{
					breakpoint: 850,
					settings: {
						slidesToShow: 2,
					}
				},
				{
					breakpoint: 500,
					settings: {
						slidesToShow: 1,
						centerMode: false,
						variableWidth:false,
						arrows: false,
					}
				}, 
			]
		});
  	}

	if(isExist($(".douongHot-slick"))) {
		var $slider = $('.douongHot-slick');

		// Initialize Slick
		$slider.slick({
			slidesToShow: 3,
			slidesToScroll: 1,
			dots: false,
			vertical: false,
			arrows: true,
			focusOnSelect: true,
			autoplay: true,
			autoplaySpeed: 3000,
			prevArrow: $('.douongHot-prev'),
			nextArrow: $('.douongHot-next'),
			responsive: [
				{
					breakpoint: 701,
					settings: {
						slidesToShow: 2,
					}
				}, 
			]
		});
  
		// Event listener for updating the slide counter
		$slider.on('init reInit afterChange', function(event, slick, currentSlide){
			var i = (currentSlide ? currentSlide : 0) + 1;
			$text = i > 9 ? i : '0'+i;
			$('#current-slide').text($text);
			$('#total-slides').text(slick.slideCount);
		});
  
		// Trigger init event manually for correct initial counter value
		$slider.trigger('init', [$slider.slick('getSlick')]);
  	}
  

	  if (isExist($(".feedback-slick"))) {
		$('.feedback-slick').slick({
			slidesToShow: 3,
			slidesToScroll: 1,
			dots: true,
			vertical: false,
			arrows: true,
			focusOnSelect: true,
			autoplay: true,
			autoplaySpeed: 3000,
			variableWidth: false,
			prevArrow: $('.feedback-prev'),
			nextArrow: $('.feedback-next'),
			customPaging : function(slider, i) {
				let number = ((i+1)<10) ? (`0`+(i+1)) : i;
				return `<span> ${number} <b class="deco"> <b> </sapn>`;
			},
			responsive: [
				{
					breakpoint: 1025,
					settings: {
						slidesToShow: 3,
					}
				}, 
				{
					breakpoint: 641,
					settings: {
						slidesToShow: 2,
						centerMode: false,
						variableWidth:false,
						arrows: false,
					}
				},
				{
					breakpoint: 501,
					settings: {
						slidesToShow: 1,
						centerMode: false,
						variableWidth:false,
						arrows: false,
					}
				}, 
			]
		});
  	}

});

window.addEventListener('load', () => {
	NN_FRAMEWORK.Img();
});
