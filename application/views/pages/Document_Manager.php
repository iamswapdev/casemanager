<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title>jQuery File Tree Demo</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		
		<link href="/casemanager/Filemanager/css/jquery-ui.css" rel="stylesheet" type="text/css" media="screen" />
		<script src="/casemanager/Filemanager/jquery.min.js" type="text/javascript"></script>
        <script src="/casemanager/Filemanager/jquery-ui-min.js" type="text/javascript"></script>
		<script src="/casemanager/Filemanager/gsFileManager.js" type="text/javascript"></script>
		<script src="/casemanager/Filemanager/jquery.form.js" type="text/javascript"></script>
		<script src="/casemanager/Filemanager/jquery.Jcrop.js" type="text/javascript"></script>
		<!--<script src="/casemanager/Filemanager/lib/ckeditor/ckeditor.js" type="text/javascript"></script>-->
	
		<link href="/casemanager/Filemanager/gsFileManager.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="/casemanager/Filemanager/jquery.Jcrop.css" rel="stylesheet" type="text/css" media="screen" />
		
		<style>
		   body {
		      height: 100%;
		      width: 100%;
		   }
		   
		   html {
		      height: 100%;
		      width: 100%;
		   }
		</style>
		<script type="text/javascript">
			
			$(document).ready( function() {
				
				jQuery('#fileTreeDemo_1').gsFileManager({ script: '/casemanager/Filemanager/connectors/GsFileManager.php/as' });
				
			});
		</script>

	</head>
	
	<body>
	    <div style="height: 16px; line-height: 16px">&nbsp;</div>
        <div id="fileTreeDemo_1" class="demoto">
        
        </div>
        	
	</body>
	
</html>