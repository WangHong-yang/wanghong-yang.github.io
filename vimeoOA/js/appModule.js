(function(){
	var app = angular.module('vimeoModules', []);
	app.directive('vimeoSlides', function(){
		return {
			restrict: 'E',
			replace: true,
			templateUrl: 'vimeo-slides.html'
		};
	});
	app.directive('vimeoCarousel', function(){
		return {
			restrict: 'E',
			replace: true,
			templateUrl: 'vimeo-carousel.html'
		};
	});
	app.directive('vimeoMonsoon', function(){
		return {
			restrict: 'E',
			replace: true,
			templateUrl: 'vimeo-monsoon.html'
		};
	});
	app.directive('vimeoBeamsMove', function(){
		return {
			restrict: 'E',
			replace: true,
			templateUrl: 'vimeo-beams-move.html'
		};
	});
	app.directive('vimeoTextImage', function(){
		return {
			restrict: 'E',
			replace: true,
			templateUrl: 'vimeo-text-image.html'
		};
	});

	// detect Carousel ready and initialize swiper
	app.directive('slidesReady', function(){
		return {
			priority: -1000, // a low number so this directive loads after all other directives have loaded. 
            restrict: "A", // attribute only
            link: function($scope, $element, $attributes) {
                
				$element.ready(function(){
					var swiper = new Swiper('.swiper-container', {
						nextButton: '.swiper-button-next',
						prevButton: '.swiper-button-prev',
						slidesPerView: 1,
						speed: 400,
						spaceBetween: 0,
						simulateTouch: false,
						loop: true,
						autoplay: 2500,
        				autoplayDisableOnInteraction: true
					});
				})
                
            }
		}
	});
})();
