<!DOCTYPE html>  
<html>

	<head>
    	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>CaseSettelments</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		
		<link href="/casemanager/Filemanager/css/jquery-ui.css" rel="stylesheet" type="text/css" media="screen" />
		<script src="/casemanager/Filemanager/jquery.min.js" type="text/javascript"></script>
        <script src="/casemanager/Filemanager/jquery-ui-min.js" type="text/javascript"></script>
		<script src="/casemanager/Filemanager/gsFileManager.js" type="text/javascript"></script>
		<script src="/casemanager/Filemanager/jquery.form.js" type="text/javascript"></script>
		<script src="/casemanager/Filemanager/jquery.Jcrop.js" type="text/javascript"></script>
        <script src="/casemanager/Filemanager/pdfobject.js" type="text/javascript"></script>
        <script src="/casemanager/Filemanager/pdfobject.min.js" type="text/javascript"></script>
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
				
				jQuery('#fileTreeDemo_1').gsFileManager({ script: '/casemanager/Filemanager/connectors/GsFileManager.php?Case_Id=<?php echo $Case_Id?>&User_Name=<?php echo $User_Name;?>' });
				
			});
		</script>

	</head>
	
	<body>
    	<input type="hidden" name="Case_Id" value="<?php echo $Case_Id?>">
	    <div style="height: 16px; line-height: 16px">&nbsp;</div>
        <div id="fileTreeDemo_1" class="demoto">
        
        </div>
        	
	</body>
	
</html>