(function() {
    var app = angular.module('vimeoCC', ['vimeoModules']);
    
    app.controller('VimeoController', function(){
		this.slides = slideList;
	});

	var slideList = [
		{
            imageURL: './assets/NICHTS.jpg',
            h2: 'Nichts passiert / A Decent Man',
            p: 'A Swiss family takes a ski vacation and runs into trouble when the father, the titular decent man, finds himself in a series of moral quandaries.',
            layerColor: [71, 109, 122], // RGB
            btnColor: '#1fb8e7'
        },
        {
            imageURL: './assets/hunt.jpg',
            h2: 'Hunt for the Wilderpeople',
            p: 'Raised on hip-hop and foster care, defiant city kid Ricky gets a fresh start in the New Zealand countryside. From the Director of What We Do in The Shadows.',
            layerColor: [67, 99, 123], // RGB
            btnColor: '#3598D4'
        },
        {
            imageURL: './assets/vice.jpg',
            h2: 'Vice Versa',
            p: 'Come along with the good company crew as they travel throughout the US, Japan, BC and Quebec to showcase skiing in the best way possible.',
            layerColor: [71, 109, 122], // RGB
            btnColor: '#1fb8e7'
        },
        {
            imageURL: './assets/fullmoon.jpg',
            h2: 'Full Moon',
            p: 'Be inspired by women who push boundaries. Full Moon showcases legends and current icons of this ever evolving lifestyle sport.',
            layerColor: [71, 109, 122], // RGB
            btnColor: '#1fb8e7'
        }
    ];
}())