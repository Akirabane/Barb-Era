<head>
	<?php 
	foreach($css_files as $file): ?>
		<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>
</head>
<body>
	<h1>Gestion des dialogues</h1>
	<div style='height:20px;'></div>  
	<div style="padding: 10px;margin-bottom: 80px;">
		<?php echo $output; ?>
	</div>
	<?php foreach($js_files as $file): ?>
		<script src="<?php echo $file; ?>"></script>
	<?php endforeach; ?>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#file_photo").change(function(){
				formdata = new FormData();
				file =$(this).prop('files')[0];
				formdata.append("fichierphoto", file);
				$.ajax( { url: "<?php echo base_url()?>/Gestion/Telechargement2", type: "POST", data: formdata, contentType: false, processData: false,  success: function (result) {
					console.log(result);
					$('#miniature').attr('src','<?php echo base_url() ?>/assets/photos/dialogues/'+result);
					$('#dialogue_photo').val(result);
					console.log("fini");
				} });
			})
			$("#file_photo2").change(function(){
				formdata = new FormData();
				file =$(this).prop('files')[0];
				formdata.append("fichierphoto", file);
				$.ajax( { url: "<?php echo base_url()?>/Gestion/Telechargement2", type: "POST", data: formdata, contentType: false, processData: false,  success: function (result) {
					console.log(result);
					$('#miniature2').attr('src','<?php echo base_url() ?>/assets/photos/dialogues/'+result);
					$('#dialogue_photo2').val(result);
					console.log("fini");
				} });
			})
		})
	</script>
</body>
