$("span[style='mso-spacerun:yes']").html("");

$("span[style='mso-tab-count:2']").html("");

$("span[style='mso-tab-count:1']").html("");

$("span[style='mso-tab-count:3']").html("&#9;&#9;&#9;&#9;&#9;&#9;&#9;");

var Title_Count = $('title').length;

var Template_Title = $("input[name=Template_Title]").val();


if(Title_Count == 0){
	$('head').append('<title>'+Template_Title+'</title>');
}else{
	$("title").html(Template_Title);
}


