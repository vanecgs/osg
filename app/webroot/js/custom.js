var url = "http://localhost/onlineschool/"

$(document).ready(function() {
	$('.form_button').html('<input type="submit" value="">');
});

function loadSubSubject(subject) {
	$.post(url + 'subjectsubs/search/' + subject, function(data) {
		$('#subjectsSub0Name').empty();
		for(subject in data) {
			$('#subjectsSub0Name').append('<option value="'+subject+'">'+data[subject]+'</option>');
		}
	}, 'json');

}
