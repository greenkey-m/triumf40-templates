<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;


//jimport( 'joomla.application.component.controller' );

require_once JPATH_SITE . '/components/com_geocontact/models/geocontacts.php';
//require_once('administrator/components/com_geocontact/models/geocontacts.php');
//$model= JModelList::getInstance('Geocontacts', 'GeocontactModel', $config = array());

//JLoader::import('joomla.application.component.model'); //Load the Joomla Application Framework
//JLoader::import( 'Geocontacts', JPATH_ADMINISTRATOR  . '/components/com_geocontact/models' ); //Call the frontend model directory

$model = JModelLegacy::getInstance( 'Geocontacts', 'GeocontactModel' );//Instantiate the model
//$model = JController::getModel('Geocontacts', 'GeocontactModel', $config);

$geoitems = $model->getItems();


$attributes = array();

if ($item->anchor_title) {
    $attributes['title'] = $item->anchor_title;
}

if ($item->anchor_css) {
    $attributes['class'] = $item->anchor_css;
}

if ($item->anchor_rel) {
    $attributes['rel'] = $item->anchor_rel;
}

$linktype = $item->title;

if ($item->menu_image) {
    if ($item->menu_image_css) {
        $image_attributes['class'] = $item->menu_image_css;
        $linktype = JHtml::_('image', $item->menu_image, $item->title, $image_attributes);
    } else {
        $linktype = JHtml::_('image', $item->menu_image, $item->title);
    }

    if ($item->params->get('menu_text', 1)) {
        $linktype .= '<span class="image-title">' . $item->title . '</span>';
    }
}

if ($item->browserNav == 1) {
    $attributes['target'] = '_blank';
} elseif ($item->browserNav == 2) {
    $options = 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes';

    $attributes['onclick'] = "window.open(this.href, 'targetWindow', '" . $options . "'); return false;";
}

//echo JHtml::_('link', JFilterOutput::ampReplace(htmlspecialchars($item->flink, ENT_COMPAT, 'UTF-8', false)), $linktype, $attributes);

$title = $item->anchor_title ? 'title="' . $item->anchor_title . '" ' : '';
?>

<?php //print_r($geoitems); ?>

<a type="button" data-toggle="dropdown" class="btn dropdown-toggle nav-header <?php echo $item->anchor_css; ?>" <?php echo $title; ?>
   href="<?php echo JFilterOutput::ampReplace(htmlspecialchars($item->flink, ENT_COMPAT, 'UTF-8', false)); ?>">
    <i class="<?php echo $item->menu_image_css; ?>"></i> <?php echo $linktype; ?>
</a>

<ul class="dropdown-menu columns">
    <!--<li><a href='/test'><strong>Калужская область</strong></a></li>
    <li><a href='/test'>Балабаново</a></li>
    <li><a href='/test'>Белоусово</a></li>
    <li><a href='/test'>Боровск</a></li>
    <li><a href='/test'>Ермолино</a></li>
    <li><a href='/test'>Жиздра</a></li>
    <li><a href='/test'>Жуков</a></li>
    <li><a href='/test'>Калуга</a></li>
    <li><a href='/test'>Киров</a></li>
    <li><a href='/test'>Козельск</a></li>
    <li><a href='/test'>Кондрово</a></li>
    <li><a href='/test'>Кремёнки</a></li>
    <li><a href='/test'>Людиново</a></li>
    <li><a href='/test'>Малоярославец</a></li>
    <li><a href='/test'>Медынь</a></li>
    <li><a href='/test'>Мещовск</a></li>
    <li><a href='/test'>Мосальск</a></li>
    <li><a href='/test'>Обнинск</a></li>
    <li><a href='/test'>Сосенский</a></li>
    <li><a href='/test'>Спас-Деменск</a></li>
    <li><a href='/test'>Сухиничи</a></li>
    <li><a href='/test'>Таруса</a></li>
    <li><a href='/test'>Юхнов</a></li>

    <li><a href='/test'><strong>Московская область</strong></a></li>
    <li><a href='/test'>Уваровка</a></li>
    <li><a href='/test'>Можайск</a></li>
    <li><a href='/test'>Апрелевка</a></li>
    <li><a href='/test'>Бронницы</a></li>
    <li><a href='/test'>Видное</a></li>
    <li><a href='/test'>Дмитров</a></li>
    <li><a href='/test'>Домодедово</a></li>
    <li><a href='/test'>Воскресенск</a></li>
    <li><a href='/test'>Егорьевск</a></li>
    <li><a href='/test'>Коломна</a></li>
    <li><a href='/test'>Долгопрудный</a></li>
    <li><a href='/test'>Жуковский</a></li>
    <li><a href='/test'>Зеленоград</a></li>
    <li><a href='/test'>Истра</a></li>
    <li><a href='/test'>Климовск</a></li>
    <li><a href='/test'>Наро-Фоминск</a></li>
    <li><a href='/test'>Подольск</a></li>
    <li><a href='/test'>Раменское</a></li>
    <li><a href='/test'>Серпухов</a></li>
    <li><a href='/test'>Солнечногорск</a></li>
    <li><a href='/test'>Троицк</a></li>
    <li><a href='/test'>Щербинка</a></li>
    <li><a href='/test'>Чехов</a></li>
    <li><a href='/test'>Электроугли</a></li>
    <li><a href='/test'>Ступино</a></li>
    <li><a href='/test'>Михнеево</a></li>
    <li><a href='/test'>Малино</a></li>
    <li><a href='/test'>Руза</a></li>
    <li><a href='/test'>Можайск</a></li>
    <li><a href='/test'>Дорохово</a></li>
    <li><a href='/test'>Уваровка</a></li>
    <li><a href='/test'>Барыбино</a></li>
    <li><a href='/test'>Протвино</a></li>

    <li><a href='/test'><strong>Другие регионы</strong></a></li>
    <li><a href='/test'>Псков</a></li>
    <li><a href='/test'>Санкт-Петербург</a></li>
    <li><a href='/test'>Тула</a></li>
    <li><a href='/test'>Алексин</a></li>
    <li><a href='/test'>Ясногорск</a></li>
    <li><a href='/test'>Заокский</a></li>-->

<?php
    $region = "";
    foreach ($geoitems as $town) {
        if ($region <> $town->category_title) {
        echo "<li><a><strong>".$town->category_title."</strong></a></li>\n";
        $region = $town->category_title;
        }
        echo "<li>".JHtml::_('link','index.php?option=com_geocontact&view=geocontact&id='.$town->id.'&Itemid=224', $town->caption, $attributes)."</li>\n";
        //echo JRoute::_('index.php?option=com_geocontact&view=geocontact&Itemid='.$town->id);
    }
?>

</ul>



