<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Page title -->
    <title>CaseSettelments</title>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!--<link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->
	
    <!-- Vendor styles -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/fontawesome/css/font-awesome.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/metisMenu/dist/metisMenu.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/animate.css/animate.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bootstrap/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/fullcalendar/dist/fullcalendar.print.css" media='print'/>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/fullcalendar/dist/fullcalendar.min.css" />

    <!-- App styles -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/pe-icon-7-stroke/css/helper.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/styles/style.css">

</head>
<body>

<!-- Simple splash screen-->
<!--<div class="splash"> <div class="color-line"></div><div class="splash-title"><h1>Homer - Responsive Admin Theme</h1><p>Special AngularJS Admin Theme for small and medium webapp with very clean and aesthetic style and feel. </p><img src="images/loading-bars.svg" width="64" height="64" /> </div> </div>-->
<!--[if lt IE 7]>
<p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Header -->
<?php include 'header.php';?>
<!-- Navigation -->
<?php include 'sidebar.php';?>
<!-- Main Wrapper -->
<div id="wrapper">
<?php include 'header_workarea.php';?>
<div class="content animate-panel">

	<div class="row">
		<div class="col-lg-12">
		<div class="hpanel">
		<div class="panel-heading"></div>
		<div class="panel-body tab-panel">
			<div id="calendar"></div>
		</div><!-- End of panel-body tab-panel-->
		</div><!-- End hpanel -->
		</div><!-- End col-lg-12-->
	</div><!-- End row-->
	
</div>
                
    <!-- Footer-->
    <footer class="footer">
        <span class="pull-right">
            Example text
        </span>
        Company 2015-2020
    </footer>

</div>


	<!-- Vendor scripts -->
	<script src="<?php echo base_url();?>assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/metisMenu/dist/metisMenu.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/iCheck/icheck.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/sparkline/index.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/fullcalendar/dist/fullcalendar.min.js"></script>
    
    <!-- App scripts -->
    <script src="<?php echo base_url();?>assets/scripts/homer.js"></script>
    


<script>
$(document).ready(function(e) {
	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();
	$('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		editable: true,
		droppable: true, // this allows things to be dropped onto the calendar
		drop: function() {
			// is the "remove after drop" checkbox checked?
			if ($('#drop-remove').is(':checked')) {
				// if so, remove the element from the "Draggable Events" list
				$(this).remove();
			}
		},
		events: "add_Calendar_Events",
		eventRender: function(event, element)
		{ 
			element.find('.fc-title').append("<br/>" + event.description); 
		}
	});

	
		
		
		/*$('#calendar').fullCalendar({
			events: function(start, end, timezone, callback) {
				$.ajax({
					url: 'add_Calendar_Events',
					dataType: 'JSON',
					data: {
						// our hypothetical feed requires UNIX timestamps
						start: start.unix(),
						end: end.unix()
					},
					success: function(doc) {
						var events = [];
						$(doc).find('event').each(function() {
							events.push({
								title: $(this).attr('title'),
								start: $(this).attr('start'),
								description: $(this).attr('description') // will be parsed
							});
						});
						callback(events);
					}
				});
			},
			eventRender: function(event, element)
			{ 
				element.find('.fc-title').append("<br/>" + event.description); 
			}
		});*/
		
		/*$('#calendar').fullCalendar({
			header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar
            drop: function() {
                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove();
                }
            },
			events: function(start, end, timezone, callback) {
				jQuery.ajax({
					url: 'add_Calendar_Events',
					type: 'POST',
					dataType: 'json',
					data: {
						start: start.format(),
						end: end.format()
					},
					success: function(doc) {
						var events = [];
						if(!!doc.result){
							$.map( doc.result, function( r ) {
								events.push({
									title: r.title,
									start: r.date_start,
									description: r.description
								});
							});
						}
						callback(events);
					}
				});
			}
		});*/

  
	
});<!--End of document -->
   

</script>
<script>
	$('.workarea').addClass('active');
	$('.calendar').addClass('active');
</script>
</body>
</html>