<?php
/**
 * mmKanso DokuWiki Template
 *
 * @author Marcin Mierzejewski <marcin.mierzejewski@zenzire.com>
 */

 require_once(dirname(__FILE__).'/tpl_functions.php');
 @include(dirname(__FILE__).'/header.php');
?>
<body>

	<?php @include(dirname(__FILE__).'/topheader.html')?>
	<div class="Page">
		<div class="Content">
  		<?php html_msgarea()?>
  		<?php flush()?>
			<div class="content" style="width: <?php echo tpl_img_getTag('File.Width')+10; ?>px; padding-top: 15px;">
	      <center>
				  <img src="<?php echo ml($IMG);?>" width="<?php echo tpl_img_getTag('File.Width')?>" height="<? echo tpl_img_getTag('File.Height')?>">
			  	<br><br>Back to <?php echo tpl_pagelink($ID);?><br><br>
	      </center>
      </div>
    </div>
  	<?php flush()?>
	</div>
	<?php tpl_indexerWebBug();?>
</body>
</html>

