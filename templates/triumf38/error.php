<?php
/**
 * @package    triumf38
 *
 * @author     matt <your@email.com>
 * @copyright  A copyright
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       http://your.url.com
 */

defined('_JEXEC') or die;

if (($this->error->getCode()) == '404') {
    header('Location: /index.php?option=com_content&view=article&id=54');
    exit;
}

if (!isset($this->error))
{
    $this->error = JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
    $this->debug = false;
}
