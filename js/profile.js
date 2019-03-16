function verifyPassword() {
	var pass = verifyPass('do-password', 'do-confirm', 'do-password-error', 'do-confirm-error');
	if (pass) {
		document.updatePassword.submit();
	}
}

function verifyInformation() {
	var last = verifyLast('do-lastname', 'do-lastname-error');
	var first = verifyFirst('do-firstname', 'do-firstname-error');
	var phone = verifyPhoneForm('do-phone', 'do-phone-error');
	var number = verifyNumberForm('do-number', 'do-number-error');
	var zipcode = verifyZipcodeForm('do-zipcode', 'do-zipcode-error');
	if (last && first && phone && number && zipcode) {
		document.updateInformations.submit();
	}
}