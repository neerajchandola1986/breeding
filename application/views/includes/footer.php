

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b><a href="https://www.freelancer.in/u/Max01" target="_new">Max01</a></b> Admin System | Version 1.0
        </div>
        <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="<?php echo base_url(); ?>">CRM</a>.</strong> All rights reserved.
    </footer>
    
    <!-- jQuery UI 1.11.2 -->
    <!-- <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script> -->
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/app.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/validation.js" type="text/javascript"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript">
        var windowURL = window.location.href;
        pageURL = windowURL.substring(0, windowURL.lastIndexOf('/'));
        var x= $('a[href="'+pageURL+'"]');
            x.addClass('active');
            x.parent().addClass('active');
        var y= $('a[href="'+windowURL+'"]');
            y.addClass('active');
            y.parent().addClass('active');
    </script>
    <script>
	$(function () {
        $('.pickWeek').datetimepicker({
            locale: 'en',
            format: "DD/MM/YYYY",
            sideBySide: true,
            //daysOfWeekDisabled: [0]
        });
		
		$('.pickWeekSearch').datetimepicker({
            locale: 'en',
            format: "YYYY-MM-DD",
            sideBySide: true,
            //daysOfWeekDisabled: [0]
        });
       // $('.pickWeek').data("DateTimePicker").minDate(moment().startOf('week'));
        //$('.pickWeek').data("DateTimePicker").maxDate(moment().endOf('week'));
    });
	
	$(".pickWeek").on("dp.change", function(e) {
    console.log( "Handler for .change() called." );
    //alert(e.date.format("DD/MM/YYYY"));
    });
	</script>
  </body>
</html>