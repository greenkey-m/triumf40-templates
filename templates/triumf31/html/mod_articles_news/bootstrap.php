<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
?>

<div class="row category-module">

        <!--                        <div class="separator-2"></div>-->

        <!-- isotope filters start -->
        <!--                        <div class="filters margin-bottom-clear">
                                    <ul class="nav nav-pills">
                                        <li class="active"><a href="#" data-filter="*">Все</a></li>
                                        <li><a href="#" data-filter=".stand">Атлант</a></li>
                                        <li><a href="#" data-filter=".mini">Мини</a></li>
                                        <li><a href="#" data-filter=".kaplya">Капля</a></li>
                                        <li><a href="#" data-filter=".kreml .narod .aluma">Прочие</a></li>
                                    </ul>
                                </div>-->
        <!-- isotope filters end -->

        <!-- portfolio items start -->

            <?php foreach ($list as $item) : ?>

                <?php $images = json_decode($item->images); ?>

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 isotope-item <?php
                if (!empty($item->tags->itemTags)) :
                    foreach ($item->tags->itemTags as $i => $tag) :
                        echo $tag->alias . ' ';
                    endforeach;
                endif;
                ?>margin-bottom-clear">
                    <div class="box-style-2 white-bg" itemscope itemtype="http://schema.org/Product">

                        <?php //print_r($item->jcfields[1]->value);?>
                        <?php //echo $item->beforeDisplayContent; ?>

                        <div class="overlay-container">
                            <a href="<?php echo $item->link; ?>">
                                <img src="<?php echo $images->image_intro; ?>" alt="Теплицы Триумф <?php echo $item->title; ?>" itemprop="image" />
                            </a>
                        </div>

                        <?php if ($params->get('link_titles') == 1) : ?>
                            <h2 class="title" itemprop="name">
                                <a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
                                    <?php echo $item->title; ?>
                                </a>
                            </h2>
                        <?php else : ?>
                            <a href="<?php echo $item->link; ?>">
                                <h2 class="title" itemprop="name">
                                    <?php echo $item->jcfields[1]->value; ?>
                                </h2>
                            </a>
                        <?php endif; ?>

                        <?php if ($params->get('show_author')) : ?>
                            <span class="mod-articles-category-writtenby">
                                        <?php echo $item->displayAuthorName; ?>
                                    </span>
                        <?php endif; ?>

                        <?php if ($item->displayDate) : ?>
                            <span class="mod-articles-category-date">
                                        <?php echo $item->displayDate; ?>
                                    </span>
                        <?php endif; ?>

                        <?php if ($params->get('show_introtext', '1')) : ?>
                            <div class="mod-articles-category-introtext" itemprop="description">
                                <?php echo JHtml::_('string.truncate', $item->introtext, 250); ?>
                            </div>
                        <?php endif; ?>


                        <?php if ($params->get('show_readmore')) : ?>
                            <p class="mod-articles-category-readmore">
                                <a class="btn-default btn <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
                                    Открыть
                                </a>
                            </p>
                        <?php endif; ?>

                        <a  href="<?php echo $item->link; ?>" class="startprice" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                            <span itemprop="price"><?php echo $item->jcfields[2]->value; ?></span>
                            <meta itemprop="priceCurrency" content="RUB" />
                        </a>

                        <a href="<?php echo $item->link; ?>" class="ordering">
                            Заказать
                        </a>

                    </div>
                </div>

            <?php endforeach; ?>

</div>
