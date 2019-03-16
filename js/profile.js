function verifyPassword() {
	var pass = verifyPass('do-password', 'do-confirm', 'do-password-error', 'do-confirm-error');
	if (pass) {
		document.updatePassword.submit();
	}
}