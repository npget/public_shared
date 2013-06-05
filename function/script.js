

// Speed of the automatic slideshow
var slideshowSpeed = 6000;

// Variable to store the images we need to set as background
// which also includes some text and url's.
var photos = [ {
		"title" : "Alla novaproget ci occupiamo di realizzare  applicazioni mirate  per aziende e uffici ,gestiamo e consolidiamo le strutture dati per migliorare il flusso delle informazioni aziendali : applicativi , gestionali ,portali ,archivi digitali  ",
		"image" : "navona.jpg",
		"url" : "http://novaproget.com/app",
		"firstline" : "Applicazioni , Controllo Accessi , Networking . ",
		"secondline" : "Digital Working ! "
	}, {
		"title" : "Contribuire in modo attivo ad un futuro migliore per la terra e per i nostri figli in quanto siamo convinti che ognuno di noi sia chiamato a decidere se essere parte del problema o della soluzione. tu da che parte vuoi essere?",
		"image" : "tramare.jpg",
		"url" : "http://www.novaproget.com/richiestaformrifiuti.php",
		"firstline" : "RECUPERO e SMALTIMENTO SCARTI NOCIVI  ",
		"secondline" : "ricicla fino al 100% i tuoi rifiuti di stampa !  "
	}
	, {
		"title" : "Assistenza  in sede e a domicilio - Installazioni a domicilio - Configurazioni  periferiche input-output ,net working , wifi , controllo accessi, vendita ,ricambi , noleggio ..",
		"image" : "wom.jpg",
		"url" : "http://novaproget.com",
		"firstline" : "Postazioni di lavoro",
		"secondline" : "Input-Output."
	}
	
	, {
		"title" : "VideoSorveglianza , Impianti ibridi , analogici , digitali , consulenza , impiantistica e cablaggio , server Video , matrici , Streaming ...",
		"image" : "open.jpg",
		"url" : "http://novaproget.com",
		"firstline" : "Monitoraggio  di ambienti   ",
		"secondline" : "TVCC-Video-Audio"
	},{
		"title" : "Strumenti e Accessori per Cancelleria , Arredo ,archivio , consumo ,carta ,etichette , toner, strumenti di precisione,  belle arti ...",
		"image" : "work.jpg",
		"url" : "http://novaproget.com",
		"firstline" : "Ambienti di lavoro ",
		"secondline" : "Open Office"
	}
	
];



$(document).ready(function() {
		
	// Backwards navigation
	$("#back").click(function() {
		stopAnimation();
		navigate("back");
	});
	
	// Forward navigation
	$("#next").click(function() {
		stopAnimation();
		navigate("next");
	});
	
	var interval;
	$("#control").toggle(function(){
		stopAnimation();
	}, function() {
		// Change the background image to "pause"
		$(this).css({ "background-image" : "url(./images/btn_pause.png)" });
		
		// Show the next image
		navigate("next");
		
		// Start playing the animation
		interval = setInterval(function() {
			navigate("next");
		}, slideshowSpeed);
	});
	
	
	var activeContainer = 1;	
	var currentImg = 0;
	var animating = false;
	var navigate = function(direction) {
		// Check if no animation is running. If it is, prevent the action
		if(animating) {
			return;
		}
		
		// Check which current image we need to show
		if(direction == "next") {
			currentImg++;
			if(currentImg == photos.length + 1) {
				currentImg = 1;
			}
		} else {
			currentImg--;
			if(currentImg == 0) {
				currentImg = photos.length;
			}
		}
		
		// Check which container we need to use
		var currentContainer = activeContainer;
		if(activeContainer == 1) {
			activeContainer = 2;
		} else {
			activeContainer = 1;
		}
		
		showImage(photos[currentImg - 1], currentContainer, activeContainer);
		
	};
	
	var currentZindex = -1;
	var showImage = function(photoObject, currentContainer, activeContainer) {
		animating = true;
		
		// Make sure the new container is always on the background
		currentZindex--;
		
		// Set the background image of the new active container
		$("#headerimg" + activeContainer).css({
			"background-image" : "url(./images/" + photoObject.image + ")",
			"display" : "block",
			"z-index" : currentZindex
		});
		
		// Hide the header text
		$("#headertxt").css({"display" : "none"});
		
		// Set the new header text
		$("#firstline").html(photoObject.firstline);
		$("#secondline")
			.attr("href", photoObject.url)
			.html(photoObject.secondline);
		$("#pictureduri")
			.attr("href", photoObject.url)
			.html(photoObject.title);
		
		
		// Fade out the current container
		// and display the header text when animation is complete
		$("#headerimg" + currentContainer).fadeOut(function() {
			setTimeout(function() {
				$("#headertxt").css({"display" : "block"});
				animating = false;
			}, 500);
		});
	};
	
	var stopAnimation = function() {
		// Change the background image to "play"
		$("#control").css({ "background-image" : "url(./images/btn_play.png)" });
		
		// Clear the interval
		clearInterval(interval);
	};
	
	// We should statically set the first image
	navigate("next");
	
	// Start playing the animation
	interval = setInterval(function() {
		navigate("next");
	}, slideshowSpeed);
	
});