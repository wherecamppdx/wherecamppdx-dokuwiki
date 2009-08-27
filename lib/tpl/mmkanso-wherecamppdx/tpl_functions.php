<?php
/**
 * functions for mmKanso Template
 *
 * License: GPL 2 (http://www.gnu.org/licenses/gpl.html)
 *
 * @author:   Marcin Mierzejewski <marcin.mierzejewski@zenzire.com>
 * @homepage: http://www.zenzire.com
 */

require_once('conf.php');
 
/**
 * Displays the bottombar
 *
 */
function tpl_bottombar() 
{
    global $INFO,$ID,$lang;
    $perm = $INFO['perm'];
   
    echo '<a href="?do=recent" class="interwiki" title="'.$lang['btn_rec'].'">'.$lang['btn_recent'].'</a>'
        .'&nbsp;&middot;&nbsp;';
    
		if($perm > AUTH_READ) 
		{
        echo '<a href="?id='.$ID.'&amp;do=revisions" class="interwiki" title="'.$lang['btn_revs'].'">'.$lang['btn_revs'].'</a>'
					.'&nbsp;&middot;&nbsp;';

				if(file_exists(wikiFN($ID))) 
				{
            echo '<a href="?id='.$ID.'&amp;do=edit" class="interwiki" title="'.$lang['btn_edit'].'">'.$lang['btn_edit'].'</a>';
				} 
				else 
				{
            echo '<a href="?id='.$ID.'&amp;do=edit" class="interwiki" title="'.$lang['btn_create'].'">'.$lang['btn_create'].'</a>';
        }
        echo '&nbsp;&middot;&nbsp;';
		} 
		else 
		{
   		echo '<a href="?id='.$ID.'&amp;do=edit" class="interwiki" title="'.$lang['btn_source'].'">'.$lang['btn_source'].'</a>'
            .'&nbsp;&middot;&nbsp;';
    }

		if($perm > AUTH_WRITE) 
		{
        echo '<a href="?id='.$ID.'&amp;do=admin" class="interwiki" title="'.$lang['btn_admin'].'">'.$lang['btn_admin'].'</a>'
            .'&nbsp;&middot;&nbsp;';
    }

		if(isset($INFO['userinfo']['name'])) 
		{
				echo '<a href="?do=profile" class="interwiki" title="'.$lang['btn_profile'].'">'.$lang['btn_profile'].'</a>'
            .'&nbsp;&middot;&nbsp;';
        echo '<a href="?do=logout" class="interwiki" title="'.$lang['btn_logout'].'">'.$lang['btn_logout'].'</a>';
		} 
		else 
		{
        echo '<a href="?do=login" class="interwiki" title="'.$lang['btn_login'].'">'.$lang['btn_login'].'</a>';
    }
}

function tpl_renderMenu()
{
	global $INFO, $ID, $conf;

	print '<div class="MenuContainer">';
	
	print '<div class="Menu" id="level1">';
	print p_wiki_xhtml("menu1", '', false);
	print '</div>';

	print '<div class="Menu" id="level2">';

	if ( $conf['tpl_mmKanso']['menu2Permanent'] )
	{
		$path = "";
	}
	else
	{
		if ( false != strpos($ID, ":") )
		{
			$path = substr($ID, 0, strpos($ID, ":"));
		}
		else
		{
			$path = $ID;
		}
		$path .= ":";
	}

	print p_wiki_xhtml($path."menu2", '', false);
	print '</div>';

	if (  $INFO['perm'] > AUTH_READ )
	{
		print '<div style="clear: both;"></div>';
		print '<div class="MenuContainer">';
		print '<div class="Menu" id="level1">';
		print '<ul><li><a href="?id=menu1&amp;do=edit" class="wikilink1" title="Edit Menu"><b>Edit Menu</b></a></li></ul>';
		print '</div>';
		
		print '<div class="Menu" id="level2">';
		print '<ul><li><a href="?id='.$path.'menu2&amp;do=edit" class="wikilink1" title="Edit Menu"><b>Edit Menu</b></a></li></ul>';
		print '</div>';
		
		print '</div>';

		print '</div>';
	}
}

?>
