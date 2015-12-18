$(document).ready(function() {
	$(".submit").submit(function() {
		var accountType = $("#account-type");
		var account = $("#account");
		var password = $("#password");
		var repassword = $("repassword");
		if (!validateRequired(accountType)) accountType.next().text("应用类型不能为空");
		if (!validateRequired(account)) account.next().text("账户名称不能为空");
		if (!validatePassword(password, repassword)) password.next().text("密码不匹配");

	});
});