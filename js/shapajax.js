//AJAX Filters

jQuery(function($){
	$('#filter').submit(function(){
		var filter = $('#filter');
		$.ajax({
			url:filter.attr('action'),
			data:filter.serialize(), // form data
			type:filter.attr('method'), // POST
			beforeSend:function(xhr){
				filter.find('button').text('Processing...'); // changing the button label
			},
			success:function(data){
				filter.find('button').text('Apply filter'); // changing the button label back
				$('#response').html(data); // insert data
			}
		});
		return false;
	});
});

// Filter Modal
// Get Modal
var modal = document.getElementById('myModal');

// Get pseudoelement to open Modal
var place = $('a[href="#place"]');

// Get the <span> element to close Modal
var span = document.getElementsByClassName("close")[0];

// When user clicks button, open Modal
place.onclick = function() {
   modal.style.display = "block";
   };

// When user clicks Close (x), close Modal
span.onclick = function() {
   modal.style.display = "none";
   };

// When user clicks anywhere outside of the Modal, close Modal
 window.onclick = function(event) {
    if (event.target == modal) {
       modal.style.display = "none";
       }
    }
