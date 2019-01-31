<?php
/**
 * @package    triumf38
 *
 * @author     Greenkey <info@greenkey.ru>
 * @developer   Greenkey studio
 * @copyright  A copyright
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       http://triumf40.ru
 */

defined('_JEXEC') or die;

use \Joomla\CMS\Factory;
use \Joomla\CMS\Language\Text;

JHtml::_('jquery.framework');
JHtml::_('jquery.ui');
JHtml::_('behavior.framework');

require_once JPATH_THEMES . '/' . $this->template . '/helper.php';

tplTriumf38Helper::loadCss();
tplTriumf38Helper::loadJs();
tplTriumf38Helper::setMetadata();

?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<jdoc:include type="head" />
</head>
<body class="<?php echo tplTriumf38Helper::setBodySuffix(); ?>">
<?php echo tplTriumf38Helper::setAnalytics(0, 'your-analytics-id'); ?>

<a href="#main" class="sr-only sr-only-focusable"><?php echo Text::_('TPL_TRIUMF38_SKIP_LINK_LABEL'); ?></a>

<a href="<?php echo $this->baseurl; ?>/">
    <?php if ($this->params->get('sitedescription')) : ?>
        <?php echo '<div class="site-description">' . htmlspecialchars($this->params->get('sitedescription'), ENT_COMPAT, 'UTF-8') . '</div>'; ?>
    <?php endif; ?>
</a>

<nav role="navigation" >
	<jdoc:include type="modules" name="position-0" style="none" />
</nav>

<main id="main">
	<jdoc:include type="message" />
	<jdoc:include type="component" />
</main>

<aside>
    <?php if ($this->countModules('position-1')) : ?>
		<jdoc:include type="modules" name="position-1" style="none" />
	<?php endif; ?>
</aside>

<triumf38ter>
	<jdoc:include type="modules" name="triumf38ter" style="none" />
	<p>
		&copy; <?php echo date('Y'); ?> <?php echo tplTriumf38Helper::getSitename(); ?>
	</p>
</triumf38ter>
<jdoc:include type="modules" name="debug" style="none" />
</body>
</html>
