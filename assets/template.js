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

$("span[style='mso-spacerun:yes']").html("");

	$("span[style='mso-tab-count:2']").html("");
	
	$("span[style='mso-tab-count:1']").html("");
	
	$("span[style='mso-tab-count:3']").html("&#9;&#9;&#9;&#9;&#9;&#9;&#9;");
	
	var Title_Count = $('title').length;

	var Template_Title = $("input[name=Template_Title]").val();
	
	
	if(Title_Count == 0){
		$('head').append('<title><?php echo $Replace_array['Title']?></title>');
	}else{
		$("title").html(Template_Title);
	}

	$("body").children().each(function() {
		$(this).html($(this).html().replace(/'/g, "HH"));
		<?php foreach($Replace_array as $key => $value) { ?>
		$(this).html($(this).html().replace("<?php echo $key;?>","<?php echo $value;?>"));
		
        $(this).html($(this).html().replace("{<?php echo $value;?>}","<?php echo $value;?>"));
		<?php }?>
    });