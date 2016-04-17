(function() {
	var app = angular.module('modules', []);

	app.directive('footerSection', function () {
		return {
			restrict: 'E',
			templateUrl: 'footer.html'
		};
	});

	app.directive('navigatorSection', function(){
		return {
			restrict: 'E',
			templateUrl: 'navigator.html'
		};
	})

}());