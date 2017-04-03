<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("button").click(function(){
        $("#div1").load("/MOTION.docx");
    });
});
</script>
</head>

<body>
<div id="div1"><h2>Let jQuery AJAX Change This Text</h2></div>

<button>Get External Content</button>
<embed src="embed.txt" width="700" height="550">
<embed src="embed.pdf" width="700" height="550">
<br>
<embed src="AFFIDAVIT OF PROVIDER (NEGATIVE IME-PT).htm" width="700" height="550">

</body>
</html>
