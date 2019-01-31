<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Note. It is important to remove spaces between elements.
$class = $item->anchor_css ? 'class="' . $item->anchor_css . (($item->level == 1) ? "dropdown-toggle" : "") . '" ' : '';
$title = $item->anchor_title ? 'title="' . $item->anchor_title . '" ' : '';
$note = $item->note ? '<span class="default-bg badge">'.$item->note.'</span>' : '';

$linktype = $item->title;

switch ($item->browserNav)
{
	default:
	case 0:
            ?><a <?php echo $class; ?>href="<?php echo $item->flink; ?>" <?php echo $title; ?> class="dropdown-toggle"<?php if (($item->level == 1) && ($item->anchor_css <> "no-")) echo " data-toggle=\"dropdown\""; ?>><?php if ($item->anchor_css <> "no-") : ?><i class="icon-right-open"></i><?php endif; echo $linktype; ?><?php echo $note; ?></a><?php
		break;
	case 1:
		// _blank
?><a <?php echo $class; ?>href="<?php echo $item->flink; ?>" target="_blank" <?php echo $title; ?> class="dropdown-toggle" data-toggle="dropdown"><?php echo $linktype; ?></a><?php
		break;
	case 2:
	// Use JavaScript "window.open"
?><a <?php echo $class; ?>href="<?php echo $item->flink; ?>" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes');return false;" <?php echo $title; ?>><?php echo $linktype; ?></a>
<?php
		break;
}
