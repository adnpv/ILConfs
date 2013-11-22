<footer> 
	<div class="container">
		<p>© pietreal.com Company 2013</p>
  	</div>
</footer>


<script src="static/assets/js/jquery.js" type="text/javascript"></script>

 

<script src= "static/assets/js/bootstrap.min.js"></script>
<script src= "static/assets/js/bootstrap-tabs.js"></script>
<script>
 $('.carousel').carousel() 
</script>


<script>
$(document).ready(function()
{
  //Handles menu drop down
  $('.dropdown-menu').find('form').click(function (e) {
        e.stopPropagation();
        });
  });
</script>