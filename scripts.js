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
		$('#kpb').attr("hidden", false);
		$('#kpb_name').attr("disabled", false);
		$('#kpb_cp').attr("disabled", false);
		$('#kpb_telp').attr("disabled", false);
		$('#kpb_alamat').attr("disabled", false);
	}
	else
	{
		$('#kpb_name').attr("disabled", true);
		$('#kpb_cp').attr("disabled", true);
		$('#kpb_telp').attr("disabled", true);
		$('#kpb_alamat').attr("disabled", true);
		$('#kpb').attr("hidden", true);
	}
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

$(".antimultirow").keydown(function(event) {
	if (event.which == 13) {
		alert("Hi");
		event.preventDefault();
	}
});