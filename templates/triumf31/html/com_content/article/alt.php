<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

// Create shortcuts to some parameters.
$params = $this->item->params;
$images = json_decode($this->item->images);
$urls = json_decode($this->item->urls);
$canEdit = $params->get('access-edit');
$user = JFactory::getUser();
$info = $params->get('info_block_position', 0);

// Check if associations are implemented. If they are, define the parameter.
$assocParam = (JLanguageAssociations::isEnabled() && $params->get('show_associations'));
JHtml::_('behavior.caption');

?>
<article class="item-page<?php echo $this->pageclass_sfx; ?>" itemscope itemtype="https://schema.org/Article">
    <meta itemprop="inLanguage"
          content="<?php echo ($this->item->language === '*') ? JFactory::getConfig()->get('language') : $this->item->language; ?>"/>

    <div class="row">
        <div class="col-xs-8">

            <div id="slider">
                <div class="slides">

                    <!-- First slide -->
                    <div class="slider">
                        <div class="content">
                            <div class="content-txt">
                                <h1> Теплица Атлант </h1>
                                <p>Изготавливается из оцинкованной квадратной трубы сечением 30х30 мм, с толщиной стенки
                                    1
                                    мм.</p>
                                <p>Ширина теплицы: 3 м.</p>
                                <p>Высота теплицы: 2,1 м.</p>
                            </div>
                        </div>
                        <div class="images">
                            <img src="/images/alter.jpg">
                        </div>
                    </div>

                    <!-- Second slide -->
                    <div class="slider">
                        <div class="content">
                            <div class="content-txt">
                                <h1> Теплица Атлант </h1>
                                <p>В комплект входит: 2 двери, 2 форточки, поликарбонат 4мм, оцинкованные метизы,
                                    ручки</p>
                                <p>Дуги теплицы цельные арочного вида, двери и форточки вмонтированы.</p>
                            </div>
                        </div>
                        <div class="images">
                            <img src="/images/alter.jpg">
                        </div>
                    </div>

                    <!-- Third slide -->
                    <div class="slider">
                        <div class="content">
                            <div class="content-txt">
                                <h1> Теплица Атлант </h1>
                                <p>В данной модели теплицы с шагом 1 м, желательно устанавливать подпорки на зиму или
                                    приобрести
                                    теплицу с шагом 65 см.</p>
                            </div>
                        </div>
                        <div class="images">
                            <img src="/images/alter.jpg">
                        </div>
                    </div>

                    <!-- Fourth slide -->
                    <div class="slider">
                        <div class="legend"></div>
                        <div class="content">
                            <div class="content-txt">
                                <h1> Теплица Атлант </h1>
                                <h2> Your description </h2>
                            </div>
                        </div>
                        <div class="images">
                            <img src="/images/alter.jpg">
                        </div>
                    </div>

                </div>

                <div class="switch">
                    <ul>
                        <li>
                            <div class="on"></div>
                        </li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>

            </div>

        </div>

        <div class="col-xs-4">

            <form class="form-horizontal form-order">

                <div class="form-group">
                    <table class="table table-condense sizing" role="group" aria-label="...">
                        <tbody>
                        <tr>
                            <td>Шаг</td>
                            <td>2 м.</td>
                            <td>4 м.</td>
                            <td>6 м.</td>
                            <td>8 м.</td>
                        </tr>
                        <tr>
                            <td nowrap>100 см</td>
                            <td><button type="button" class="btn btn-sm btn-info sizeprice">10 000</button></td>
                            <td><button type="button" class="btn btn-sm btn-info sizeprice">10 000</button></td>
                            <td><button type="button" class="btn btn-sm btn-info sizeprice">10 000</button></td>
                            <td><button type="button" class="btn btn-sm btn-info sizeprice">10 000</button></td>
                        </tr>
                        <tr>
                            <td>65 см</td>
                            <td><button type="button" class="btn btn-sm btn-info sizeprice">10 000</button></td>
                            <td><button type="button" class="btn btn-sm btn-info sizeprice">10 000</button></td>
                            <td><button type="button" class="btn btn-sm btn-info sizeprice">10 000</button></td>
                            <td><button type="button" class="btn btn-sm btn-info sizeprice">10 000</button></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Button Drop Down -->
                <div class="form-group">
                    <label class="col-md-6 control-label" for="buttondropdown">Длина теплицы</label>
                    <div class="col-md-6">
                        <div class="input-group">
                            <input id="buttondropdown" name="buttondropdown" class="form-control" placeholder="метров"
                                   type="text">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default dropdown-toggle" style="height: 40px" data-toggle="dropdown">
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">4</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-6 control-label" for="buttondropdown">Поликарбонат</label>
                    <div class="col-md-6 flexcon">
                        <div>В комплекте</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-6 control-label" for="buttondropdown">Двери и форточки</label>
                    <div class="col-md-6 flexcon">
                        <div>В комплекте</div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-6 control-label" for="buttondropdown">Шаг 100см</label>
                    <div class="col-md-6 flexcon">
                        <div class="radio">
                            <label style="font-size: 1.5em">
                                <input type="radio" name="o5" value="" checked>
                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                            </label>
                        </div>
                        <div>10 900 руб.</div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-6 control-label" for="buttondropdown">Шаг 65см</label>
                    <div class="col-md-6 flexcon">
                        <div class="radio">
                            <label style="font-size: 1.5em">
                                <input type="radio" name="o5" value="">
                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                            </label>
                        </div>
                        <div>10 900 руб.</div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-6 control-label" for="buttondropdown">Грунтозацепы</label>
                    <div class="col-md-6 flexcon">
                        <div class="checkbox">
                            <label style="font-size: 1.5em">
                                <input type="checkbox" value="">
                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                            </label>
                        </div>
                        <div>450 руб.</div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-6 control-label" for="buttondropdown">Монтаж</label>
                    <div class="col-md-6 flexcon">
                        <div class="checkbox">
                            <label style="font-size: 1.5em">
                                <input type="checkbox" value="">
                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                            </label>
                        </div>
                        <div>4 000 руб.</div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="delivery" class="col-md-6 control-label">Выберите доставку</label>
                    <div class="col-md-6">
                        <div class="input-group" style="">
                            <input type="text" class="form-control selectedit" aria-label="">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-success dropdown-toggle" style="height: 40px"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="#">Самовывоз</a></li>
                                    <li><a href="#">Обнинск</a></li>
                                    <li><a href="#">Малоярославец</a></li>
                                    <li><a href="#">Людиново</a></li>
                                </ul>
                            </div><!-- /btn-group -->
                        </div><!-- /input-group -->

                    </div>
                </div>

                <!--поликарбонат
                // форточки и двери -->

                <div class="form-group">
                    <span class="col-md-6 big"></span>
                    <span class="col-md-6 big">15 200 руб.</span>
                </div>

                <div class="form-group">
                    <span class="col-md-6 big"></span>
                    <div class="col-md-6">
                        <a href="#contact" style="padding: 15px; width:100%; min-width:auto;"
                           class="buy scroll btn btn-lg btn-danger">Заказать</a>
                    </div>
                </div>

            </form>


        </div>

    </div>

    <form class="form-horizontal price_calc form-inline" itemprop="offers" itemscope itemtype="http://schema.org/Offer">

        <div class="table-responsive">
        <table border="1" class="pricetable" style="width: 100%;" cellspacing="0" cellpadding="0">
            <thead>
            <tr>
                <th>Длина</th>
                <th><strong>Площадь</strong><span>S</span></th>
                <th><strong>100 см<br/></strong><span>100 см</span></th>
                <th>65 см</th>
                <th><strong>Грунтозацепы</strong><span>Гр-з</span></th>
                <th><strong>Стоимость монтажа</strong><span>Монтаж</span></th>
            </tr>
            </thead>
            <tbody>
            <tr class="selectable">
                <td>2 м</td>
                <td>6 м<sup>2</sup></td>
                <td class="price">10 900 руб.</td>
                <td>&nbsp;</td>
                <td>450 руб.</td>
                <td>4 000 руб.</td>
            </tr>
            <tr class="selectable">
                <td>4 м</td>
                <td>12 м<sup>2</sup></td>
                <td class="price">14 900 руб.</td>
                <td class="price">16 200 руб.</td>
                <td>450 руб.</td>
                <td>4 000 руб.</td>
            </tr>
            <tr class="selectable">
                <td>6 м</td>
                <td>18 м<sup>2</sup></td>
                <td class="price">18 650 руб.</td>
                <td class="price">20 600 руб.</td>
                <td>550 руб.</td>
                <td>4 500 руб.</td>
            </tr>
            <tr class="selectable">
                <td>8 м</td>
                <td>24 м<sup>2</sup></td>
                <td class="price">22 450 руб.</td>
                <td class="price">25 050 руб.</td>
                <td>700 руб.</td>
                <td>5 000 руб.</td>
            </tr>
            <tr>
                <td>2 м (секция)</td>
                <td>6 м<sup>2</sup></td>
                <td class="price">3 800 руб.</td>
                <td class="price">4 450 руб.</td>
                <td>150 руб.</td>
                <td>500 руб.</td>
            </tr>
            </tbody>
        </table>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="square" style="font-size: 2.rem;"><i class="fa fa-square"></i></div>
            </div>

            <div class="col-xs-12 col-sm-6">

            </div>

        </div>
    </form>


    <div style="display: none;">

        <?php if ($this->params->get('show_page_heading')) : ?>
            <header class="page-header">
                <h1> <?php echo $this->escape($this->params->get('page_heading')); ?> </h1>
            </header>
        <?php endif;
        if (!empty($this->item->pagination) && $this->item->pagination && !$this->item->paginationposition && $this->item->paginationrelative) {
            echo $this->item->pagination;
        }
        ?>

        <?php // Todo Not that elegant would be nice to group the params ?>
        <?php $useDefList = ($params->get('show_modify_date') || $params->get('show_publish_date') || $params->get('show_create_date')
            || $params->get('show_hits') || $params->get('show_category') || $params->get('show_parent_category') || $params->get('show_author') || $assocParam); ?>

        <?php if (!$useDefList && $this->print) : ?>
            <div id="pop-print" class="btn hidden-print">
                <?php echo JHtml::_('icon.print_screen', $this->item, $params); ?>
            </div>
            <div class="clearfix"></div>
        <?php endif; ?>
        <?php if ($params->get('show_title') || $params->get('show_author')) : ?>
            <header class="page-header">
                <?php if ($params->get('show_title')) : ?>
                    <h1 itemprop="headline">
                        <?php echo $this->escape($this->item->title); ?>
                    </h1>
                <?php endif; ?>
                <?php if ($this->item->state == 0) : ?>
                    <span class="label label-warning"><?php echo JText::_('JUNPUBLISHED'); ?></span>
                <?php endif; ?>
                <?php if (strtotime($this->item->publish_up) > strtotime(JFactory::getDate())) : ?>
                    <span class="label label-warning"><?php echo JText::_('JNOTPUBLISHEDYET'); ?></span>
                <?php endif; ?>
                <?php if ((strtotime($this->item->publish_down) < strtotime(JFactory::getDate())) && $this->item->publish_down != JFactory::getDbo()->getNullDate()) : ?>
                    <span class="label label-warning"><?php echo JText::_('JEXPIRED'); ?></span>
                <?php endif; ?>
            </header>
        <?php endif; ?>
        <?php if (!$this->print) : ?>
            <?php if ($canEdit || $params->get('show_print_icon') || $params->get('show_email_icon')) : ?>
                <?php echo JLayoutHelper::render('joomla.content.icons', array('params' => $params, 'item' => $this->item, 'print' => false)); ?>
            <?php endif; ?>
        <?php else : ?>
            <?php if ($useDefList) : ?>
                <div id="pop-print" class="btn hidden-print">
                    <?php echo JHtml::_('icon.print_screen', $this->item, $params); ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <?php // Content is generated by content plugin event "onContentAfterTitle" ?>
        <?php echo $this->item->event->afterDisplayTitle; ?>

        <?php if ($useDefList && ($info == 0 || $info == 2)) : ?>
            <?php // Todo: for Joomla4 joomla.content.info_block.block can be changed to joomla.content.info_block ?>
            <?php echo JLayoutHelper::render('joomla.content.info_block.block', array('item' => $this->item, 'params' => $params, 'position' => 'above')); ?>
        <?php endif; ?>

        <?php if ($info == 0 && $params->get('show_tags', 1) && !empty($this->item->tags->itemTags)) : ?>
            <?php $this->item->tagLayout = new JLayoutFile('joomla.content.tags'); ?>

            <?php echo $this->item->tagLayout->render($this->item->tags->itemTags); ?>
        <?php endif; ?>

        <?php // Content is generated by content plugin event "onContentBeforeDisplay" ?>
        <?php echo $this->item->event->beforeDisplayContent; ?>

        <?php if (isset($urls) && ((!empty($urls->urls_position) && ($urls->urls_position == '0')) || ($params->get('urls_position') == '0' && empty($urls->urls_position)))
            || (empty($urls->urls_position) && (!$params->get('urls_position')))) : ?>
            <?php echo $this->loadTemplate('links'); ?>
        <?php endif; ?>
        <?php if ($params->get('access-view')) : ?>
            <?php echo JLayoutHelper::render('joomla.content.full_image', $this->item); ?>
            <?php
            if (!empty($this->item->pagination) && $this->item->pagination && !$this->item->paginationposition && !$this->item->paginationrelative) :
                echo $this->item->pagination;
            endif;
            ?>
            <?php if (isset ($this->item->toc)) :
                echo $this->item->toc;
            endif; ?>
            <div itemprop="articleBody">
                <?php echo $this->item->text; ?>
            </div>

            <?php if ($info == 1 || $info == 2) : ?>
                <?php if ($useDefList) : ?>
                    <?php // Todo: for Joomla4 joomla.content.info_block.block can be changed to joomla.content.info_block ?>
                    <?php echo JLayoutHelper::render('joomla.content.info_block.block', array('item' => $this->item, 'params' => $params, 'position' => 'below')); ?>
                <?php endif; ?>
                <?php if ($params->get('show_tags', 1) && !empty($this->item->tags->itemTags)) : ?>
                    <?php $this->item->tagLayout = new JLayoutFile('joomla.content.tags'); ?>
                    <?php echo $this->item->tagLayout->render($this->item->tags->itemTags); ?>
                <?php endif; ?>
            <?php endif; ?>

            <?php
            if (!empty($this->item->pagination) && $this->item->pagination && $this->item->paginationposition && !$this->item->paginationrelative) :
                echo $this->item->pagination;
                ?>
            <?php endif; ?>
            <?php if (isset($urls) && ((!empty($urls->urls_position) && ($urls->urls_position == '1')) || ($params->get('urls_position') == '1'))) : ?>
                <?php echo $this->loadTemplate('links'); ?>
            <?php endif; ?>
            <?php // Optional teaser intro text for guests ?>
        <?php elseif ($params->get('show_noauth') == true && $user->get('guest')) : ?>
            <?php echo JLayoutHelper::render('joomla.content.intro_image', $this->item); ?>
            <?php echo JHtml::_('content.prepare', $this->item->introtext); ?>
            <?php // Optional link to let them register to see the whole article. ?>
            <?php if ($params->get('show_readmore') && $this->item->fulltext != null) : ?>
                <?php $menu = JFactory::getApplication()->getMenu(); ?>
                <?php $active = $menu->getActive(); ?>
                <?php $itemId = $active->id; ?>
                <?php $link = new JUri(JRoute::_('index.php?option=com_users&view=login&Itemid=' . $itemId, false)); ?>
                <?php $link->setVar('return', base64_encode(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language))); ?>
                <p class="readmore">
                    <a href="<?php echo $link; ?>" class="register">
                        <?php $attribs = json_decode($this->item->attribs); ?>
                        <?php
                        if ($attribs->alternative_readmore == null) :
                            echo JText::_('COM_CONTENT_REGISTER_TO_READ_MORE');
                        elseif ($readmore = $attribs->alternative_readmore) :
                            echo $readmore;
                            if ($params->get('show_readmore_title', 0) != 0) :
                                echo JHtml::_('string.truncate', $this->item->title, $params->get('readmore_limit'));
                            endif;
                        elseif ($params->get('show_readmore_title', 0) == 0) :
                            echo JText::sprintf('COM_CONTENT_READ_MORE_TITLE');
                        else :
                            echo JText::_('COM_CONTENT_READ_MORE');
                            echo JHtml::_('string.truncate', $this->item->title, $params->get('readmore_limit'));
                        endif; ?>
                    </a>
                </p>
            <?php endif; ?>
        <?php endif; ?>


    </div>

    <footer class="page-footer">
        <?php
        if (!empty($this->item->pagination) && $this->item->pagination && $this->item->paginationposition && $this->item->paginationrelative) :
            echo $this->item->pagination;
            ?>
        <?php endif; ?>
        <?php // Content is generated by content plugin event "onContentAfterDisplay" ?>
        <?php echo $this->item->event->afterDisplayContent; ?>
    </footer>
</article>
