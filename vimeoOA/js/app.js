(function() {
    var app = angular.module('vimeoCC', ['vimeoModules']);
    
    app.controller('VimeoCarouselController', function(){
		this.slides = slideList;
	});
    app.controller('VimeoTextImageController', function(){
        this.textImages = textImageList;
    });
    // app.controller('VimeoMonsoonController', function(){
    //     this.monsoon = textImageList[0];
    // });
    // app.controller('VimeoBeamsController', function(){
    //     this.beams = textImageList[1];
    // });
    // app.controller('VimeoMoveController', function(){
    //     this.move = textImageList[2];
    // });

	var slideList = [
        {
            imageURL: './img/hunt.jpg',
            h2: 'Hunt for the Wilderpeople',
            p: 'Raised on hip-hop and foster care, defiant city kid Ricky gets a fresh start in the New Zealand countryside. From the Director of What We Do in The Shadows.',
            layerColor: [67, 99, 123], // RGB
            btnColor: '#3598D4'
        },
        {
            imageURL: './img/vice.jpg',
            h2: 'Vice Versa',
            p: 'Come along with the good company crew as they travel throughout the US, Japan, BC and Quebec to showcase skiing in the best way possible.',
            layerColor: [95, 93, 70], // RGB
            btnColor: '#acab58'
        },
        {
            imageURL: './img/NICHTS.jpg',
            h2: 'Nichts passiert / A Decent Man',
            p: 'A Swiss family takes a ski vacation and runs into trouble when the father, the titular decent man, finds himself in a series of moral quandaries.',
            layerColor: [71, 109, 122], // RGB
            btnColor: '#1fb8e7'
        },
        {
            imageURL: './img/fullmoon.jpg',
            h2: 'Full Moon',
            p: 'Be inspired by women who push boundaries. Full Moon showcases legends and current icons of this ever evolving lifestyle sport.',
            layerColor: [80, 80, 80], // RGB
            btnColor: '#9a989a'
        }
    ];
    var textImageList = [
        {
            imageURL: 'https://i.vimeocdn.com/video/595198868_505x160.jpg',
            h2: 'MONSOON III',
            p: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta dolor varius felis vehicula iaculis. Integer consequat bibendum ex nec pulvinar. In eu bibendum dui. Nulla sed felis convallis, convallis dui ornare, vestibulum arcu. Pellentesque sollicitudin ac ligula eu blandit. Maecenas id tellus nulla.',
            ifColumnReverse: true,
            ifRowReverse: false
        }, 
        {
            imageURL: 'https://i.vimeocdn.com/video/589972810_530x315.jpg',
            h2: 'BEAMS',
            p: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta dolor varius felis vehicula iaculis. Integer consequat bibendum ex nec pulvinar. In eu bibendum dui. Nulla sed felis convallis, convallis dui ornare, vestibulum arcu. Pellentesque sollicitudin ac ligula eu blandit. Maecenas id tellus nulla.',
            ifColumnReverse: true,
            ifRowReverse: true
        }, 
        {
            imageURL: 'https://i.vimeocdn.com/video/590587169_530x315.jpg',
            h2: 'MOVE 2',
            p: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta dolor varius felis vehicula iaculis. Integer consequat bibendum ex nec pulvinar. In eu bibendum dui. Nulla sed felis convallis, convallis dui ornare, vestibulum arcu. Pellentesque sollicitudin ac ligula eu blandit. Maecenas id tellus nulla.',
            ifColumnReverse: true,
            ifRowReverse: false
        }
    ]
}())