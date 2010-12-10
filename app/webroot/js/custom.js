var url = 'http://'+window.location.hostname+'/onlineschool/';

var is_click = false;

$(document).ready(function() {	
	$('.form_button').html('<input type="submit" value="">');
	
	$('#ProgramsSubjects').change(function() {
		loadDegree($('#ProgramsSubjects').val());
	});
	
	$('#post-lead').click(function() {
		var currentTime = new Date();						   
		$.post(url+'schools/lead', {lead_id: $('#LEADID').val(),
									zip: $('#ZIP').val(),
									bid_state: $('#BID_STATE').val(),
									pri_phone: $('#PRI_PHONE').val(),
									sid: $('#SID').val(),
									cid: $('#CID').val(),
									mid: $('#MID').val(),
									tid: $('#TID').val(),
									program_type: $('#PROGRAM_TYPE').val(),
									sec_phone: $('#SEC_PHONE').val(),
									online_physical: $('#ONLINE_PHYSICAL').val(),
									capture_time: currentTime.getMonth()+'/'+currentTime.getDay()+'/'+currentTime.getFullYear()+' '+currentTime.getHours()+':'+currentTime.getMinutes(),
			   						fname: $('#FNAME').val(),
									address: $('#ADDRESS').val(),
									lname: $('#LNAME').val(),
									hs_grad_year: $('#HS_GRAD_YEAR').val(),
									country_residence: $('#COUNTRY_RESIDENCE').val(),
									work_xp: $('#WORK_XP').val(),
									highest_level: $('#HIGHEST_LEVEL').val(),
									city: $('#CITY').val(),
									current_age: $('#CURRENT_AGE').val(),
									email: $('#EMAIL').val(),
									master_brand: $('#MASTER_BRAND').val(),
									school_id: $('#SCHOOL_ID').val()
									}, 
		function(data) {
			if(data) {
				switch (data['Response']['sm']) {
					case 'OK':
						$('.col_b').html('<p>Your request has been accepted. You&rsquo;ll be getting more information shortly.</p><div id="randomschools"></div>');
						$.post(url+'schools/random','',function(data) {
							$('#randomschools').append('<h1>More Schools</h1>');
							for(var i=0;i<data.length;i++) {
								$('#randomschools').append('<div class="ind-random"><img src="'+data[i]['School']['logo']+'"><a href="'+url+'schools/info/'+data[i]['School']['sid']+'"><h2>'+data[i]['School']['name']+'</h2></a></div>');
							}
						},'json');
						
						break;
					case 'QUEUED':
						$('#dialog-content').html('<p>System processor is temporarily down, you information will be processed when system is online.</p>');
						$('#dialog').dialog('option', 'buttons', [
							{
								text: 'Close',
								click: function() { $(this).dialog('close'); }
							}
						] );
						$('#dialog').dialog('open');
						break;
					case 'UNMATCHED':
						$('#dialog-content').html('<p>An error occurred with your submission, it seems there is no information for this school.</p>');
						$('#dialog').dialog('option', 'buttons', [
							{
								text: 'Close',
								click: function() { $(this).dialog('close'); }
							}
						] );
						$('#dialog').dialog('open');
						break;
					case 'PENDING_MATCH':
						$('#dialog-content').html('<p>An error occurred with your submission, it seems there is no information for this school.</p>');
						$('#dialog').dialog('option', 'buttons', [
							{
								text: 'Close',
								click: function() { $(this).dialog('close'); }
							}
						] );
						$('#dialog').dialog('open');
						break;
					case 'INTEGRATION_ERROR':
						$('#dialog-content').html('<p>An error occurred with one of the submitted fields.</p>');
						$('#dialog').dialog('option', 'buttons', [
							{
								text: 'Close',
								click: function() { $(this).dialog('close'); }
							}
						] );
						$('#dialog').dialog('open');
						break;
					case 'INVALID':
						$('#dialog-content').html('<p>An error occurred with one of the fields submitted.</p>');
						$('#dialog').dialog('option', 'buttons', [
							{
								text: 'Close',
								click: function() { $(this).dialog('close'); }
							}
						] );
						$('#dialog').dialog('open');
						break;
					case 'INVALID_LEAD_ID':
						$('#dialog-content').html('<p>An error occurred with your submission, it seems you already made a request.</p>');
						$('#dialog').dialog('option', 'buttons', [
							{
								text: 'Close',
								click: function() { $(this).dialog('close'); }
							}
						] );
						$('#dialog').dialog('open');
						break;
				}
			}
		}, 'json');
	});
	
	
	$('#dialog').dialog({autoOpen: false,
						buttons: { 
							'Login': function() { redirectLogin() },
							'Register': function() { redirectRegister() },
							'Close': function() { $(this).dialog('close'); },
						}
	});

	
	$('#SchoolInfoForm').click(function() {
		if(!is_click) {
			$.post(url+'users/isauth', null, function(data) {
				if(data) {
					$('#FNAME').val(data['first_name']);
					$('#LNAME').val(data['last_name']);
					$('#EMAIL').val(data['email']);
					$('#ADDRESS').val(data['address']);
					$('#CITY').val(data['city']);
					$('#ZIP').val(data['zip']);
					$('#PRI_PHONE').val(data['tel1']);
					$('#SEC_PHONE').val(data['tel2']);
				}
				else {
					$('#dialog').dialog('open');
				}
			}, 'json');
			is_click = true;
		}
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

function redirectLogin() {
	pathArray = window.location.pathname.split( '/' );
	window.location.replace(url+'users/login/'+pathArray[pathArray.length-1]);
}

function redirectRegister() {
	window.location.replace(url+'users/register');
}
