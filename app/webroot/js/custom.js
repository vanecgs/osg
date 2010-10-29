var url = "http://localhost/onlineschool/"

$(document).ready(function() {
	$('.form_button').html('<input type="submit" value="">');
	
	$('#ProgramsSubjects').change(function() {
		loadDegree($('#ProgramsSubjects').val());
	});
});

function loadDegree(subject) {
	$.post(url + 'programs/degreebysubjects/' + subject, function(data) {
		$('#ProgramsDegrees').empty();
		for(subject in data) {
			$('#ProgramsDegrees').append('<option value="'+subject+'">'+data[subject]+'</option>');
		}
	}, 'json');

}
