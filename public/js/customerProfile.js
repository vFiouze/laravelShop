var changeCheckbox = function(id){
	var checkbox = document.getElementsByClassName('form-check-input');
	for (var i = 0; i < checkbox.length; i++) {
		if(checkbox[i].checked && checkbox[i].id!=id){
			checkbox[i].checked=false
		}
	}
}

var checkPassword = function(){
	var pass = document.getElementById('password');
	var repass = document.getElementById('repass');
	if(pass.value!=repass.value){
		alert('password don\'t match')
	}else if(pass.value=="" || repass==""){
		alert('Fill both password fields')
	}else{
		document.getElementById('changePassword').submit();
	}
}