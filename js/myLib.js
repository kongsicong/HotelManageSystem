//arg1：子视图链接；arg2：子视图；通过点击不同的子视图链接来切换子视图
function changeSubView(subViewLink,subView) {
	for (var i = subViewLink.length - 1; i >= 0; i--) {
		subViewLink[i].index = i;
		$(subViewLink[i]).click(function() {
			subView.prev("h3").text($(this).text());
			subView.removeClass("active");
			$(subView[this.index]).addClass("active");
		});
	};
}


function validate() {

}
//检查输入的前后密码是否一致
function validatePassword(password, repassword) {
	if (password == repassword) {
		return true;
	} else {
		return false;
	}
}
//检查输入的数据是否符合电子邮件地址的基本语法
function validateEmail() {

}
//用来检查用户是否已填写表单中的必填（或必选）项目。
//假如必填或必选项为空，函数的返回值为 false，否则函数的返回值则为 true（意味着数据没有问题）
function validateRequired() {

}