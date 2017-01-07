(function(){
	var app = angular.module('wejob-jobs', []);
	app.directive('jobIntro', function(){
		return {
			restrict: 'E',
			templateUrl: 'job-intro.html'
		};
	});
	app.directive('jobSearch', function(){
		return {
			restrict: 'E',
			templateUrl: 'job-search.html'
		};
	});
})();
