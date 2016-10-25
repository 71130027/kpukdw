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

function kpab()
{
	if($('#kpa option:selected').val() == "other")
	{
		$('#kpb').attr("disabled", false);
	}
	else
		$('#kpb').attr("disabled", true);
}

function kpc()
{
	if($('#kpc_2 option:selected').val() != "none")
	{
		$('#kpc_3').attr("disabled", false);
	}
	else
	{
		$('#kpc_3').attr("disabled", true);
		$('#kpc_3').val("none");
	}
}

function onSignIn(googleUser) {
	var profile = googleUser.getBasicProfile();

	$.ajax({
		url: 'gSignIn.php',
		type: 'POST',               
		// Form data
		data: function(){
			var email = profile.getEmail();
			if(email.indexOf("@ti.ukdw.ac.id")!==-1)
			{
				var data = new FormData();
				data.append('user', profile.getName());
				data.append('email', profile.getEmail());
				data.append('token', googleUser.getAuthResponse().id_token);
				return data;
			}
		}(),
		success: function (data) {
			location.reload(true);
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