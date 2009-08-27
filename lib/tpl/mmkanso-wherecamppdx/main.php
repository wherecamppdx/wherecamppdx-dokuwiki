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
  <div class="Page">
		<div class="Header">

			<div class="Banner">
			<h1>WordCampPDX Wiki</h1>
			<?php if ( true == $conf['tpl_mmKanso']['searchForm'] ) { ?>
				<div class="searchform"> <?php tpl_searchform() ?> </div>
			<?php } ?>
      </div>

			<!--
			<?php tpl_renderMenu(); ?>
			-->

		</div> 
    <?php flush(); ?>
	
		<div class="Content">
		<?php html_msgarea() ?>
		<?php tpl_content()?>
		</div>
  
    <?php flush(); ?>

    <?php 
      if ($INFO['perm'] > AUTH_READ || true == $conf['tpl_mmKanso']['wikiBar'] ) 
      { 
    ?>
    <div class="stylefoot">
      <div class="meta">
        <div class="doc">
          <?php tpl_pageinfo()?>
        </div>
        <div class="user">
          <?php tpl_userinfo()?>
        </div>
      </div>
      <?php tpl_bottombar(); ?>
    </div>
    <?php } ?>

		<div class="Footer">
  		<?echo $conf['tpl_mmKanso']['footer']; ?>
		</div>
	  <?php tpl_indexerWebBug();?>
  </div>
</body>
</html>
