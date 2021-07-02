<script type="text/javascript">
	var name = "GlassProtechUserData";
	var expiry = new Date();
	expiry.setTime(expiry.getTime() - 3600);
	document.cookie = name + "=; expires=" + expiry.toGMTString() + "; path=/";
	window.location.replace("<?php echo base_url(); ?>");
	
</script>