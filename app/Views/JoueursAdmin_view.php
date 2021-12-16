<head>
	<?php 
	foreach($css_files as $file): ?>
		<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>
</head>
<body>
	<h1>Gestion des joueurs</h1>
	<div style='height:20px;'></div>  
	<div style="padding: 10px;margin-bottom: 80px;">
		<?php echo $output; ?>
	</div>
	<?php foreach($js_files as $file): ?>
		<script src="<?php echo $file; ?>"></script>
	<?php endforeach; ?>
</body>