var PAGES = ['home', 'new', 'active'];

$(document).ready(function() {
	$('#save-btn').bind('click', onSaveButtonClick);
});

function onSaveButtonClick(event) {
	var minute = $('.add-minute').val();
	var hour = $('.add-hour').val();
	var dayweek = $('.add-dayweek').val();
	var daymonth = $('.add-daymonth').val();
	var month = $('.add-month').val();
	var name = $('.add-name').val();
	var command = $('.add-command').val();

	$.post("lib/add.php", { "minute":minute, "hour":hour, "dayweek":dayweek, "daymonth":daymonth, "month":month, "name":name, "command":command },
	  	function(data){
	    	console.log(data);
	    	changePage('active');
		}
	);
}

function changePage(page) {
	getActiveCronjobs();

	// Hide all pages
	for (var i = 0; i < PAGES.length; i++) {
		$('#' + PAGES[i]).hide();
	}
	$('.nav li').removeClass('active');

	// Show the specified page.
	$('#' + page).show();
	$('.nav-' + page).addClass('active');
}

function getActiveCronjobs() {
	$.getJSON('lib/active.php', function(data) {
		var items = '';
	 
	  	$.each(data, function(key, val) {
	  		var n = val.split(' ');

	  		items += '<tr>';

	  		$.each(n, function(x, y) {
	  			items += '<td>' + y + '</td>';
	  		});
	  		items += '<td><a class="btn btn-warning remove_' + key + '">Remove</a></td>';
	  		items += '</tr>';
	  	});

		$('.active-job-list').html(items);
	});
}