$(document).ready(function() {
		    $('#Carousel').carousel({
		        interval: 5000
		    })
		});

		$(document).ready(function() {
		    $('#Carousel2').carousel({
		        interval: 5000
		    })
		});


function launch_toast() {
    var x = document.getElementById("toast")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
}