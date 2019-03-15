function verifyInscription() {
	var mail = verifyMail();
	var last = verifyLast();
	var first = verifyFirst();
	var pass = verifyPass();
	if (mail && last && first && pass) {
		document.signUp.submit();
	}
}

function setError(name,error){
	document.getElementById(name).innerHTML = error;
}

function resetError(name){
	document.getElementById(name).innerHTML = '';
}

function verifyMailForm(){
	var mail = document.getElementById('up-mail').value;
	if(mail != '' && !validateEmail(mail)){
		setError('mail-error', 'Invalid email');
	} else {
		resetMail();
		return true;
	}
	return false;
}

function verifyMail(){
	var mail = document.getElementById('up-mail').value;
	if(mail == ''){
		setError('mail-error', 'Required fields');
		return false;
	}
	else {
		return verifyMailForm();
	}
}

function validateEmail(mail){
	var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	if(!re.test(mail))
		return false;
	else
		return true;
}

function verifyLastForm(){
	var first = document.getElementById('up-lastname').value;
	if(first != '' && !validateName(first)){
		setError('lastname-error','Invalid lastname');
	} else {
		resetLast();
		return true;
	}
	return false;
}

function verifyLast(){
	var mail = document.getElementById('up-lastname').value;
	if(mail == ''){
		setError('lastname-error', 'Required fields');
		return false;
	}
	else {
		return verifyLastForm();
	}
}

function verifyFirstForm(){
	var first = document.getElementById('up-firstname').value;
	if(first != '' && !validateName(first)){
		setError('firstname-error','Invalid firstname');
	} else {
		resetFirst();
		return true;
	}
	return false;
}

function verifyFirst(){
	var mail = document.getElementById('up-firstname').value;
	if(mail == ''){
		setError('firstname-error', 'Required fields');
		return false;
	}
	else {
		return verifyFirstForm();
	}
}

function validateName(name) {
	var re = /^[a-zA-ZàâéèêôùûçïÀÂÉÈÔÙÛÇ\ \-]{1,20}$/;
	return re.test(name);
}

function verifyPassForm(){
	var pass1 = document.getElementById('up-password').value;
	var pass2 = document.getElementById('up-password-confirm').value;

	if(pass1 != ''){
		if(!validatePassword(pass1)){
			setError('password-error', 'The password must contain at least one capital letter, one number and at least 6 characters');
		}
		else if(pass1 != pass2 && pass2 != ''){
			setError('password-error', 'Passwords do not match');
		}
		else{
			resetError('password-error');
			return true;
		}
	}
	else{
		resetPasswords();
		document.getElementById('up-password-confirm').value = '';
		return true;
	}
	return false;
}

function verifyPass(){
	var pass1 = document.getElementById('up-password').value;
	var pass2 = document.getElementById('up-password-confirm').value;
	if(pass1 == ''){
		setError('password-error', 'Required fields');
		return false;
	} else if(pass2 == ''){
		setError('password-confirm-error', 'Required fields');
		return false;
	}
	else {
		return verifyPassForm();
	}
}

function validatePassword(pass){
	var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
	return re.test(pass);
}

function resetMail() {
	resetError('mail-error');
}

function resetLast() {
	resetError('lastname-error');
}

function resetFirst() {
	resetError('firstname-error');
}

function resetPasswords(){
	resetError('password-error');
	resetError('password-confirm-error');
}