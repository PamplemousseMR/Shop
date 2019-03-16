function verifySignin() {
	var mail = verifyMail('in-mail', 'in-mail-error');
	if (mail ) {
		document.signIn.submit();
	}
}

function verifySignup() {
	var mail = verifyMail('up-mail', 'up-mail-error');
	var last = verifyLast('up-lastname', 'up-lastname-error');
	var first = verifyFirst('up-firstname', 'up-firstname-error');
	var pass = verifyPass('up-password', 'up-confirm', 'up-password-error', 'up-confirm-error');
	var phone = verifyPhoneForm('up-phone', 'up-phone-error');
	var number = verifyNumberForm('up-number', 'up-number-error');
	var zipcode = verifyZipcodeForm('up-zipcode', 'up-zipcode-error');
	if (mail && last && first && pass && phone && number && zipcode) {
		document.signUp.submit();
	}
}