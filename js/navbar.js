function verifyInscription() {
	var mail = verifyMail();
	var last = verifyLast();
	var first = verifyFirst();
	var pass = verifyPass();
	var phone = verifyPhoneForm();
	var zipcode = verifyZipcodeForm();
	if (mail && last && first && pass && phone && zipcode) {
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
	var last = document.getElementById('up-lastname').value;
	if(last != '' && !validateName(last)){
		setError('lastname-error','Invalid lastname');
	} else {
		resetLast();
		return true;
	}
	return false;
}

function verifyLast(){
	var last = document.getElementById('up-lastname').value;
	if(last == ''){
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
	var first = document.getElementById('up-firstname').value;
	if(first == ''){
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
	var pass2 = document.getElementById('up-confirm').value;

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
		document.getElementById('up-confirm').value = '';
		return true;
	}
	return false;
}

function verifyPass(){
	var pass1 = document.getElementById('up-password').value;
	var pass2 = document.getElementById('up-confirm').value;
	if(pass1 == ''){
		setError('password-error', 'Required fields');
		return false;
	} else if(pass2 == ''){
		setError('confirm-error', 'Required fields');
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

function verifyPhoneForm(){
	var phone = document.getElementById('up-phone').value;
	if(phone != '' && !validatePhone(phone)){
		setError('phone-error','Invalid phone');
	} else {
		resetPhone();
		return true;
	}
	return false;
}

function validatePhone(phone){
	var re = /^[0-9]{10}$/;
	return re.test(phone);
}

function verifyNumberForm(){
	var number = document.getElementById('up-number').value;
	if(number != '' && !validateNumber(number)){
		setError('number-error','Invalid number');
	} else {
		resetNumber();
		return true;
	}
	return false;
}

function validateNumber(number){
	var re = /^[0-9]*$/;
	return re.test(number);
}

function verifyZipcodeForm(){
	var zipcode = document.getElementById('up-zipcode').value;
	if(zipcode != '' && !validateZipcode(zipcode)){
		setError('zipcode-error','Invalid zipcode');
	} else {
		resetNumber();
		return true;
	}
	return false;
}

function validateZipcode(zipcode){
	var re = /^[0-9]{5}$/;
	return re.test(zipcode);
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
	resetError('confirm-error');
}

function resetPhone(){
	resetError('phone-error');
}

function resetNumber(){
	resetError('number-error');
}

function resetZipcode(){
	resetError('zipcode-error');
}