(function(){
	var app = angular.module('vimeoModules', []);
	app.directive('vimeoSlides', function(){
		return {
			restrict: 'E',
			replace: true,
			templateUrl: 'vimeo-slides.html'
		};
	});
	app.directive('slidesReady', function(){
		return {
			priority: -1000, // a low number so this directive loads after all other directives have loaded. 
            restrict: "A", // attribute only
            link: function($scope, $element, $attributes) {
                
				$element.ready(function(){
					console.log(" -- Element ready!");
					var swiper = new Swiper('.swiper-container', {
						pagination: '.swiper-pagination',
						nextButton: '.swiper-button-next',
						prevButton: '.swiper-button-prev',
						slidesPerView: 1,
						paginationClickable: true,
						spaceBetween: 0,
						loop: true
					});
				})
                
            }
		}
	});
	// app.directive('jobSearch', function(){
	// 	return {
	// 		restrict: 'E',
	// 		templateUrl: 'job-search.html'
	// 	};
	// });
})();
