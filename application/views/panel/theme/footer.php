
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="<?php echo base_url(); ?>assets/panel/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/panel/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/panel/js/bootstrap-datepicker.js"></script>
    <?php /* <script src="<?php echo base_url(); ?>assets/tinymce/tinymce.min.js"></script>*/ ?>
    
    <script>

		$(function(){
			$('#dp1').datepicker({
				format: 'dd/mm/yyyy'
			});
            $('#dp2').datepicker({
                format: 'dd/mm/yyyy'
            });            
		}); 

        $(document).ready(function() {
            $('#selecctall').click(function(event) {  //on click
                if(this.checked) { // check select status
                    $('.checkbox').each(function() { //loop through each checkbox
                        this.checked = true;  //select all checkboxes with class "checkbox1"              
                    });
                }else{
                    $('.checkbox').each(function() { //loop through each checkbox
                        this.checked = false; //deselect all checkboxes with class "checkbox1"                      
                    });        
                }
            });
           
        });

	</script>


  </body>
</html>
