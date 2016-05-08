(function(){
	var app = angular.module('wejob', ['wejob-jobs']);

	app.controller('JobController', function(){
		this.jobs = jobList;
	});

	var jobList = [
		{
			compLogo: './img/image-1.jpg',
			compName: 'Google Inc.',
			jobTitle: 'IT Engineer',
			jobPosit: 'Dulin, CA',
			postTime: 'December 15 2015'
		},
		{
			compLogo: './img/image-2.jpg',
			compName: 'Apple Inc.',
			jobTitle: 'IT Engineer',
			jobPosit: 'Dulin, CA',
			postTime: 'December 15 2015'
		},
		{
			compLogo: './img/image-3.jpg',
			compName: 'WE Job Inc.',
			jobTitle: 'IT Engineer',
			jobPosit: 'Dulin, CA',
			postTime: 'December 15 2015'
		},
		{
			compLogo: './img/image-4.jpg',
			compName: 'WE Job Inc.',
			jobTitle: 'IT Engineer',
			jobPosit: 'Dulin, CA',
			postTime: 'December 15 2015'
		},
		{
			compLogo: './img/image-1.jpg',
			compName: 'Google Inc.',
			jobTitle: 'IT Engineer',
			jobPosit: 'Dulin, CA',
			postTime: 'December 15 2015'
		},
		{
			compLogo: './img/image-2.jpg',
			compName: 'Apple Inc.',
			jobTitle: 'IT Engineer',
			jobPosit: 'Dulin, CA',
			postTime: 'December 15 2015'
		}
	];

})();