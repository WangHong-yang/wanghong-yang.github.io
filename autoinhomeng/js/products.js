(function(){
	var app = angular.module('store', []);

	app.controller('StoreController', function(){
		this.products = smart;
		this.jumpToLink = function(productLink) {
			location.href=productLink;
		};
	});
	
	var smart = [
	{
		name: '比鼠标还小的电脑  RICI Sparo Mini PC详测',
		stars: '★★★★☆',
		starNum: '4',
		author: 'Sam Cho',
		price: '￥1499',
		image: './product/products_img/sparo/IMG_5574.jpg',
		imageH: 270,
		linkTo: './product/sparo.html'
	},
	{
		name: '《星你》同款智能门锁，HOLD住您的各种顾虑！',
		stars: '★★★★★',
		starNum: '5',
		author: 'Sam Cho',
		price: '￥4798',
		image: './product/products_img/samsung_lock/lock.png',
		imageH: 220,
		linkTo: './product/samsunglock.html'
	},
	{
		name: '一把锁，改变生活，更将颠覆你的想象',
		stars: '★★★★☆',
		starNum: '4',
		author: 'Sam Cho',
		price: '￥2288',
		image: './product/products_img/J101/2.jpg',
		imageH: 300,
		linkTo: './product/J101.html'
	},
	{
		name: '拒绝费电，实现智能',
		stars: '★★★★☆',
		starNum: '4',
		author: 'Sam Cho',
		price: '￥179',
		image: './product/products_img/broadlink/2.jpg',
		imageH: 220,
		linkTo: './product/broadlink.html'
	},
	{
		name: 'RICI空气小精灵，敏锐嗅觉且智能',
		stars: '★★★★☆',
		starNum: '4',
		author: 'Sam Cho',
		price: '￥1500',
		image: './product/products_img/rici_air/3.png',
		imageH: 310,
		linkTo: './product/rici_air.html'
	},
	{
		name: 'RICI多媒体终端',
		stars: '★★★★☆',
		starNum: '4',
		author: 'Sam Cho',
		price: '￥2980',
		image: './product/products_img/rici_multimedia/1.jpg',
		imageH: 200,
		linkTo: './product/rici_multimedia.html'
	},
	{
		name: '入墙式人脸识别摄像头',
		stars: '★★★★☆',
		starNum: '4',
		author: 'Sam Cho',
		price: '￥2700',
		image: './product/products_img/rici_camera/2.png',
		imageH: 330,
		linkTo: './product/rici_camera.html'
	},
	{
		name: 'Sonos:漫步在云端的无线HIFI音响',
		stars: '★★★★☆',
		starNum: '4',
		author: 'Sam Cho',
		price: '￥3980',
		image: './product/products_img/sonos/5.jpg',
		imageH: 240,
		linkTo: './product/sonos.html'
	},
	{
		name: 'S1 缔造智能安全新生活 - 智慧微管家',
		stars: '★★★★★',
		starNum: '5',
		author: 'Sam Cho',
		price: '￥219',
		image: './product/products_img/s1/1.jpg',
		imageH: 310,
		linkTo: './product/s11.html'
	},
	{
		name: '一台能分享的神奇车位锁',
		stars: '★★★★☆',
		starNum: '4',
		author: 'Sam Cho',
		price: '￥568',
		image: './product/products_img/carlock/5.jpg',
		imageH: 210,
		linkTo: './product/carlock.html'
	},
	{
		name: '720P家用投影性价比之选：Casio 卡西欧 XJ-M240',
		stars: '★★★★★',
		starNum: '5',
		author: 'Sam Cho',
		price: '￥8799',
		image: './product/products_img/casio/0.png',
		imageH: 210,
		linkTo: './product/casio.html'
	},
	{
		name: '用手机开启门锁管理门锁管理新时代',
		stars: '★★★★★',
		starNum: '5',
		author: 'Sam Cho',
		price: '￥728',
		image: './product/products_img/M201/6.jpg',
		imageH: 250,
		linkTo: './product/M201.html'
	},
	{
		name: '改变从进门开始-科技侠智能门禁',
		stars: '★★★★★',
		starNum: '5',
		author: 'Sam Cho',
		price: '￥668',
		image: './product/products_img/compLock/0.png',
		imageH: 250,
		linkTo: './product/compLock.html'
	},
	{
		name: '卡西欧XJ-UT255超短焦型wifi投影仪',
		stars: '★★★★☆',
		starNum: '4',
		author: 'Sam Cho',
		price: '￥22500',
		image: './product/products_img/casioProjector/0.png',
		imageH: 250,
		linkTo: './product/casioProjector.html'
	},
	];

	app.controller('PanelController', function(){
		this.tab = 1;
		this.selectTab = function(setTab) {
			this.tab = setTab;
		};
		this.isSelected = function(checkTab) {
			return this.tab == checkTab;
		};
	});

	app.controller('ReviewController', function(){
		this.review = {};
		this.addReview = function(product){
			product.reviews.push(this.review);
			this.review = {};
		};
	});
})();