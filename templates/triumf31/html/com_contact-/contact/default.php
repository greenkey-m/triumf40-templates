<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

$cparams = JComponentHelper::getParams('com_media');

jimport('joomla.html.html.bootstrap');
?>

<div class="row">
    <div class="col-xs-12">
        <?php if ($this->params->get('show_page_heading')) : ?>
            <h1>
                <?php echo $this->escape($this->params->get('page_heading')); ?>
            </h1>
        <?php endif; ?>
        <?php if ($this->contact->name && $this->params->get('show_name')) : ?>
            <div class="page-header">
                <h2>
                    <?php if ($this->item->published == 0) : ?>
                        <span class="label label-warning"><?php echo JText::_('JUNPUBLISHED'); ?></span>
                    <?php endif; ?>
                    <span class="contact-name" itemprop="name"><?php echo $this->contact->name; ?></span>
                </h2>
            </div>
        <?php endif; ?>
        <?php if ($this->params->get('show_contact_category') == 'show_no_link') : ?>
            <h3>
                <span class="contact-category"><?php echo $this->contact->category_title; ?></span>
            </h3>
        <?php endif; ?>
        <?php if ($this->params->get('show_contact_category') == 'show_with_link') : ?>
            <?php $contactLink = ContactHelperRoute::getCategoryRoute($this->contact->catid); ?>
            <h3>
                <span class="contact-category"><a href="<?php echo $contactLink; ?>">
                        <?php echo $this->escape($this->contact->category_title); ?></a>
                </span>
            </h3>
        <?php endif; ?>
        <?php if ($this->params->get('show_contact_list') && count($this->contacts) > 1) : ?>
            <form action="#" method="get" name="selectForm" id="selectForm">
                <?php echo JText::_('COM_CONTACT_SELECT_CONTACT'); ?>
                <?php echo JHtml::_('select.genericlist', $this->contacts, 'id', 'class="inputbox" onchange="document.location.href = this.value"', 'link', 'name', $this->contact->link); ?>
            </form>
        <?php endif; ?>

        <?php if ($this->params->get('show_tags', 1) && !empty($this->item->tags)) : ?>
            <?php $this->item->tagLayout = new JLayoutFile('joomla.content.tags'); ?>
            <?php echo $this->item->tagLayout->render($this->item->tags->itemTags); ?>
        <?php endif; ?>
    </div>
</div>
<div class="row">
    <div class="col-xs-5">
        <?php if ($this->contact->image && $this->params->get('show_image')) : ?>
            <div class="thumbnail">
                <?php echo JHtml::_('image', $this->contact->image, JText::_('COM_CONTACT_IMAGE_DETAILS'), array('align' => 'middle', 'itemprop' => 'image')); ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="col-xs-7">
        <?php echo $this->loadTemplate('address'); ?>

        <?php if ($this->contact->misc && $this->params->get('show_misc')) : ?>
            <div class="contact-miscinfo">
                <?php echo $this->contact->misc; ?>
            </div>
        <?php endif; ?>
        
        
        <?php if ($this->params->get('allow_vcard')) : ?>
            <?php echo JText::_('COM_CONTACT_DOWNLOAD_INFORMATION_AS'); ?>
            <a href="<?php echo JRoute::_('index.php?option=com_contact&amp;view=contact&amp;id=' . $this->contact->id . '&amp;format=vcf'); ?>">
                <?php echo JText::_('COM_CONTACT_VCARD'); ?></a>
        <?php endif; ?>

        <?php if ($this->params->get('show_email_form') && ($this->contact->email_to || $this->contact->user_id)) : ?>

            <a class="btn btn-white more" data-toggle="modal" data-target="#contactmodal">
                Форма обратной связи<i class="pl-10 fa fa-info"></i>
            </a>

            <!-- Modal -->
            <div class="modal fade" id="contactmodal" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
                <div class="modal-dialog" style="width:700px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Закрыть</span></button>
                            <h4 class="modal-title" id="contactLabel">Компания «Окна Роста»</h4>
                        </div>
                        <?php echo $this->loadTemplate('form'); ?>
                    </div>
                </div>
            </div>
        
        
        <?php endif; ?>

        <?php if ($this->params->get('show_links')) : ?>
            <?php echo $this->loadTemplate('links'); ?>
        <?php endif; ?>

    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        
        <div id="ymap">
        </div>

        <script type="text/javascript">
            ymaps.ready(init2);
            var myMap;

            function init() {
                myMap = new ymaps.Map("ymap", {
                    center: [<?php echo $this->contact->country; ?>],
                    zoom: 14
                });
                myPlacemark = new ymaps.Placemark([<?php echo $this->contact->country; ?>], {
                    iconContent: "<?php echo $this->contact->name; ?>",
                    hintContent: '<?php echo $this->contact->con_position; ?>',
                    balloonContent: '<?php echo nl2br($this->contact->address); ?>,<br/>тел: <?php echo nl2br($this->contact->telephone); ?>'
                }, {
                    preset: "twirl#darkorangeStretchyIcon"}
                        );

                myMap.geoObjects.add(myPlacemark);
            }


            function init2() {
                var myMap = new ymaps.Map('ymap', {
                    center: [<?php echo $this->contact->country; ?>],
                    zoom: 16,
                    type: 'yandex#map'
                }),
                        cluster = new ymaps.Clusterer(),
                        collection = new ymaps.GeoObjectCollection(),
                        bounds = myMap.getBounds();
                myMap.controls.add('typeSelector').add('mapTools', {left: 35, top: 5}).add('zoomControl', {left: 5, top: 5});

                cluster.add(new ymaps.Placemark([<?php echo $this->contact->country; ?>], {iconContent: "<?php echo $this->contact->con_position; ?>", balloonContent: "<?php echo nl2br($this->contact->address); ?>,<br/>тел: <?php echo nl2br($this->contact->telephone); ?>", hintContent: "Открыть!"}, {preset: "twirl#redStretchyIcon"}));
                myMap.geoObjects.add(cluster);

                /* пример кода добавления еще одной метки myMap.geoObjects.add(new ymaps.Placemark([54.274161,56.096468], { iconContent: 'Текст метки',hintContent: '', balloonContent: 'Описание, балун' },   {   preset: 'twirl#blueStretchyIcon'} )); */

            }
            ;

        </script>                    
        
    </div>
</div>
