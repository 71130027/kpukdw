function renderButton() {
	gapi.signin2.render('google', {
		'scope': 'email',
		'width': 180,
		'height': 32,
		'longtitle': true,
		'theme': 'light',
		'onsuccess': onSignIn
	});
}

function goLoad(link)
{
	$('#content').load(link + "/index.php #headcontainer");
}


function onSignIn(googleUser) {
	var profile = googleUser.getBasicProfile();

	$.ajax({
		url: 'gSignIn.php',
		type: 'POST',               
		// Form data
		data: function(){
			var email = profile.getEmail();
			if(email.indexOf("@ti.ukdw.ac.id")!=-1)
			{
				var data = new FormData();
				data.append('user', profile.getName());
				data.append('email', profile.getEmail());
				data.append('id', profile.getId());
				return data;
			}
			else
			{
				var auth2 = gapi.auth2.getAuthInstance();
				window.alert("Maaf!\nUntuk khusus @ti.ukdw.ac.id saja!");
				auth2.signOut();
			}
		}(),
		success: function (data) {
			var email = profile.getEmail();
			if(email.indexOf("@ti.ukdw.ac.id")!=-1) location.reload(true);
		},
		error: function (data) {
		},
		complete: function () {
		},
		cache: false,
		contentType: false,
		processData: false
	});
}