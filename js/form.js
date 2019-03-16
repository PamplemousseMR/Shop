function setError(name,error){
	document.getElementById(name).innerHTML = error;
}

function resetError(name){
	document.getElementById(name).innerHTML = '';
}

function verifyMailForm(input, error){
	var mail = document.getElementById(input).value;
	if(mail != '' && !validateEmail(mail)){
		setError(error, 'Invalid email');
	} else {
		resetMail(error);
		return true;
	}
	return false;
}

function verifyMail(input, error){
	var mail = document.getElementById(input).value;
	if(mail == ''){
		setError(error, 'Required fields');
		return false;
	}
	else {
		return verifyMailForm(input, error);
	}
}

function validateEmail(mail){
	var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	if(!re.test(mail))
		return false;
	else
		return true;
}

function verifyLastForm(input, error){
	var last = document.getElementById(input).value;
	if(last != '' && !validateName(last)){
		setError(error,'Invalid lastname');
	} else {
		resetLast(error);
		return true;
	}
	return false;
}

function verifyLast(input, error){
	var last = document.getElementById(input).value;
	if(last == ''){
		setError(error, 'Required fields');
		return false;
	}
	else {
		return verifyLastForm(input, error);
	}
}

function verifyFirstForm(input, error){
	var first = document.getElementById(input).value;
	if(first != '' && !validateName(first)){
		setError(error,'Invalid firstname');
	} else {
		resetFirst(error);
		return true;
	}
	return false;
}

function verifyFirst(input, error){
	var first = document.getElementById(input).value;
	if(first == ''){
		setError(error, 'Required fields');
		return false;
	}
	else {
		return verifyFirstForm(input, error);
	}
}

function validateName(name) {
	var re = /^[a-zA-ZàâéèêôùûçïÀÂÉÈÔÙÛÇ\ \-]{1,20}$/;
	return re.test(name);
}

function verifyPassForm(input, inputConfirm, error, errorConfirm){
	var pass1 = document.getElementById(input).value;
	var pass2 = document.getElementById(inputConfirm).value;

	if(pass1 != ''){
		if(!validatePassword(pass1)){
			setError(error, 'The password must contain at least one capital letter, one number and at least 6 characters');
		}
		else if(pass1 != pass2 && pass2 != ''){
			setError(error, 'Passwords do not match');
		}
		else{
			resetError(error);
			return true;
		}
	}
	else{
		resetPasswords(error, errorConfirm);
		document.getElementById(inputConfirm).value = '';
		return true;
	}
	return false;
}

function verifyPass(input, inputConfirm, error, errorConfirm){
	var pass1 = document.getElementById(input).value;
	var pass2 = document.getElementById(inputConfirm).value;
	if(pass1 == ''){
		setError(error, 'Required fields');
		return false;
	} else if(pass2 == ''){
		setError(errorConfirm, 'Required fields');
		return false;
	}
	else {
		return verifyPassForm(input, inputConfirm, error);
	}
}

function validatePassword(pass){
	var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
	return re.test(pass);
}

function verifyPhoneForm(input, error){
	var phone = document.getElementById(input).value;
	if(phone != '' && !validatePhone(phone)){
		setError(error,'Invalid phone');
	} else {
		resetPhone(error);
		return true;
	}
	return false;
}

function validatePhone(phone){
	var re = /^[0-9]{10}$/;
	return re.test(phone);
}

function verifyNumberForm(input, error){
	var number = document.getElementById(input).value;
	if(number != '' && !validateNumber(number)){
		setError(error,'Invalid number');
	} else {
		resetNumber(error);
		return true;
	}
	return false;
}

function validateNumber(number){
	var re = /^[0-9]*$/;
	return re.test(number);
}

function verifyZipcodeForm(input, error){
	var zipcode = document.getElementById(input).value;
	if(zipcode != '' && !validateZipcode(zipcode)){
		setError(error,'Invalid zipcode');
	} else {
		resetNumber(error);
		return true;
	}
	return false;
}

function validateZipcode(zipcode){
	var re = /^[0-9]{5}$/;
	return re.test(zipcode);
}

function resetMail(error) {
	resetError(error);
}

function resetLast(error) {
	resetError(error);
}

function resetFirst(error) {
	resetError(error);
}

function resetPasswords(error, errorConfirm){
	resetError(error);
	resetError(errorConfirm);
}

function resetPhone(error){
	resetError(error);
}

function resetNumber(error){
	resetError(error);
}

function resetZipcode(error){
	resetError(error);
}