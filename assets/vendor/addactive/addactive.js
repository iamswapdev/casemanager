$(document).ready(function(e) {
	var pathname = window.location.pathname; // Returns path only
	//var url = window.location.href;
	$("#side-menu li").removeClass("active");
	var str= pathname.replace("/casemanager/", "");
	var n = str.indexOf("/");
	var controllername=str.substring(0,n);
	console.log("Path: "+pathname+" Controller Name: "+controllername);
	$("."+controllername).addClass("active");
});