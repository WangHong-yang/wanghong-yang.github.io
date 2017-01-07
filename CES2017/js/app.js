(function(){
	var app = angular.module('wejob', ['wejob-jobs']);

	app.controller('JobController', function(){
		this.jobs = jobList;
	});

	var jobList = [
		{
			compLogo: './img/Xiaomi.png',
			compName: 'Xiaomi 小米',
			product: 'New Phone',
			highLight: 'China-only White Color Mi MIX',
			source: 'https://www.cnet.com/news/xiaomi-does-ces-for-the-first-time-but-only-announces-products-for-china/',
			detail: 'Making its debut at the Consumer Electronics Show (CES) in 2017, Xiaomi announced a new Mi MIX variant in White colour option, which will be launched in China later this year. Xiaomi\'s Global Vice President Hugo Barra at the CES 2017 event announced the new Mi MIX variant with pearl white finish, but did not reveal give away the pricing details of the new model. Xiaomi can be expected to reveal the Mi MIX White variant\'s pricing close to its China launch. No other details of the smartphone were offered at the Xiaomi CES 2017 event. The Xiaomi Mi MIX was unveiled as a limited edition concept smartphone, made in collaboration with French designer Philippe Stark, in October last year. Xiaomi Mi MIX was launched in two variants - 4GB RAM/ 128GB storage priced at CNY 3,499 (roughly Rs. 34,500), and 6GB RAM/ 256GB storage priced at CNY 3,999 (roughly Rs. 39,500). It was only available in a Black colour option at the original launch.',
			ifShow: false,
			category: 'Phone'
		},
		{
			compLogo: './img/letv.jpg',
			compName: 'LeEco 乐视',
			product: 'New LeTV',
			highLight: '',
			source: 'https://www.youtube.com/watch?v=OzzVl1cbu8k',
			detail: 'Watch the video above',
			ifShow: false,
			category: 'Smart Home'
		},
		{
			compLogo: './img/letv.jpg',
			compName: 'LeEco 乐视',
			product: 'Faraday FF91',
			highLight: 'Self-driving Car',
			source: 'https://www.youtube.com/watch?v=OzzVl1cbu8k',
			detail: 'Watch the video above',
			ifShow: false,
			category: 'Car'
		},
		{
			compLogo: 'http://www.guaher.com/wp-content/uploads/2015/08/20150827092237956.jpg',
			compName: 'HISCENE 亮风台',
			product: 'HiAR Glasses',
			highLight: 'New AR Product',
			source: 'http://www.prnewswire.com/news-releases/ar-smart-glasses-hiar-glasses-showcased-at-ces-2017-300386970.html',
			detail: 'China\'s first binocular all-in-one AR smart glasses HiAR Glasses will be showcased at CES in Las Vegas from the 5th to the 8th of January. The product was displayed at last year\'s Smart City Expo World Congress in Barcelona in November, during which it garnered the attention of AR/VR professionals worldwide. Visitors to the booth remarked that it is an impressive AR product with a set of features that are not any less than what is available with Microsoft\'s HoloLens.',
			ifShow: false,
			category: 'AR/VR'
		},
		{
			compLogo: 'http://www.guaher.com/wp-content/uploads/2015/08/20150827092237956.jpg',
			compName: 'HISCENE 亮风台',
			product: 'Computer Vision Product',
			highLight: 'New CV Product',
			source: 'http://www.prnewswire.com/news-releases/ar-smart-glasses-hiar-glasses-showcased-at-ces-2017-300386970.html',
			detail: 'The best CV company in China',
			ifShow: false,
			category: 'Machine Learning'
		},
		{
			compLogo: './img/samsung.jpg',
			compName: 'SAMSUNG',
			product: 'Smart Home Device',
			highLight: 'New Smart Home Device',
			source: 'http://www.digitaltrends.com/home/the-smart-home-gets-connected-at-ces-2017/',
			detail: 'Connected appliances have been a part of CES for a while, and while Samsung made a show its latest Family Hub 2.0 smart fridge, manufacturers such as GE and Whirlpool made a bigger deal of their integrations. GE is pairing with the Drop Connected Kitchen Scale, something Bosch announced it was doing last year. Drop leads users through recipes step by step, and it will be able to communicate with smart GE ovens and tell them to preheat to the proper temperature at the appropriate time. Whirlpool announced it’s putting Wi-Fi in a range of appliances across several price points, making connected kitchens more accessible. Voice activation, via Amazon’s Alexa, will be standard.',
			ifShow: false,
			category: 'Smart Home'
		},
		{
			compLogo: './img/dji.jpg',
			compName: 'DJI 大疆',
			product: 'Mavic',
			highLight: 'Drone can be fold',
			source: 'http://mavicpilots.com/threads/expectations-from-dji-at-ces-2017.4109/',
			detail: 'Mavic Forum',
			ifShow: false,
			category: 'Drone'
		},
		{
			compLogo: './img/mobileye.jpg',
			compName: 'Mobileye',
			product: 'Vision system for Tesla',
			highLight: 'Vision system for Tesla',
			source: 'https://www.youtube.com/watch?v=fA3bOJIEOvU',
			detail: 'Talk video on CES 2017',
			ifShow: false,
			category: 'Machine Learning'
		},
		{
			compLogo: './img/lg.jpg',
			compName: 'LG',
			product: 'Nanocell TV',
			highLight: 'The next generation of LCD TV',
			source: 'https://hypebeast.com/2017/1/lg-nano-cell-tv-ces-2017',
			detail: 'The newest generation of SUPER UHD TVs will be on display at LG’s booth in the Las Vegas Convention Center during CES 2017 from January 5-8.',
			ifShow: false,
			category: 'Smart Home'
		}
	];

})();