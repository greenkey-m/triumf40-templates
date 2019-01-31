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

                <div class="row">
                    <div class="col-md-12 category-module<?php echo $moduleclass_sfx; ?>">

                        <div class="separator-2"></div>
                        <p>Что мы предлагаем:</p>
                        <div class="owl-carousel carousel">
                            
	<?php if ($grouped) : ?>
		<?php foreach ($list as $group_name => $group) : ?>

				<?php foreach ($group as $item) : ?>
					<li>
						<?php if ($params->get('link_titles') == 1) : ?>
							<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
								<?php echo $item->title; ?>
							</a>
						<?php else : ?>
							<?php echo $item->title; ?>
						<?php endif; ?>
	
						<?php if ($item->displayHits) : ?>
							<span class="mod-articles-category-hits">
								(<?php echo $item->displayHits; ?>)
							</span>
						<?php endif; ?>
	
						<?php if ($params->get('show_author')) : ?>
							<span class="mod-articles-category-writtenby">
								<?php echo $item->displayAuthorName; ?>
							</span>
						<?php endif;?>
	
						<?php if ($item->displayCategoryTitle) : ?>
							<span class="mod-articles-category-category">
								(<?php echo $item->displayCategoryTitle; ?>)
							</span>
						<?php endif; ?>
	
						<?php if ($item->displayDate) : ?>
							<span class="mod-articles-category-date"><?php echo $item->displayDate; ?></span>
						<?php endif; ?>
	
						<?php if ($params->get('show_introtext')) : ?>
							<p class="mod-articles-category-introtext">
								<?php echo $item->displayIntrotext; ?>
							</p>
						<?php endif; ?>
	
						<?php if ($params->get('show_readmore')) : ?>
							<p class="mod-articles-category-readmore">
								<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
									<?php if ($item->params->get('access-view') == false) : ?>
										<?php echo JText::_('MOD_ARTICLES_CATEGORY_REGISTER_TO_READ_MORE'); ?>
									<?php elseif ($readmore = $item->alternative_readmore) : ?>
										<?php echo $readmore; ?>
										<?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
											<?php if ($params->get('show_readmore_title', 0) != 0) : ?>
												<?php echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit')); ?>
											<?php endif; ?>
									<?php elseif ($params->get('show_readmore_title', 0) == 0) : ?>
										<?php echo JText::sprintf('MOD_ARTICLES_CATEGORY_READ_MORE_TITLE'); ?>
									<?php else : ?>
										<?php echo JText::_('MOD_ARTICLES_CATEGORY_READ_MORE'); ?>
										<?php echo JHtml::_('string.truncate', ($item->title), $params->get('readmore_limit')); ?>
									<?php endif; ?>
								</a>
							</p>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>

		<?php endforeach; ?>
	<?php else : ?>
		<?php foreach ($list as $item) : ?>

                            <?php $images  = json_decode($item->images); ?>
                            <div class="image-box">
                                <div class="overlay-container">
                                    <?php echo JLayoutHelper::render('joomla.content.intro_image', $item); ?>
                                    <div class="overlay">
                                        <div class="overlay-links">
                                            <a href="<?php echo $item->link; ?>"><i class="fa fa-link"></i></a>
                                            <a href="<?php echo $images->image_intro; ?>" class="popup-img"><i class="fa fa-search-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="image-box-body">
                                    
                                    <?php if ($params->get('link_titles') == 1) : ?>
                                            <h3 class="title">
                                                <a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
                                                    <?php echo $item->title; ?>
                                            </a>
                                            </h3>
                                    <?php else : ?>
                                        <h3 class="title"><?php echo $item->title; ?></h3>
                                    <?php endif; ?>
                                    
                                    <?php if ($item->displayHits) : ?>
                                            <span class="mod-articles-category-hits">
                                                    (<?php echo $item->displayHits; ?>)
                                            </span>
                                    <?php endif; ?>

                                    <?php if ($params->get('show_author')) : ?>
                                            <span class="mod-articles-category-writtenby">
                                                    <?php echo $item->displayAuthorName; ?>
                                            </span>
                                    <?php endif;?>

                                    <?php if ($item->displayCategoryTitle) : ?>
                                            <span class="mod-articles-category-category">
                                                    (<?php echo $item->displayCategoryTitle; ?>)
                                            </span>
                                    <?php endif; ?>

                                    <?php if ($item->displayDate) : ?>
                                            <span class="mod-articles-category-date">
                                                    <?php echo $item->displayDate; ?>
                                            </span>
                                    <?php endif; ?>

                                    <?php if ($params->get('show_introtext')) : ?>
                                            <p class="mod-articles-category-introtext">
                                                    <?php echo $item->displayIntrotext; ?>
                                            </p>
                                    <?php endif; ?>

                                    <?php if ($params->get('show_readmore')) : ?>
                                            <p class="mod-articles-category-readmore">
                                                    <a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
                                                            <?php if ($item->params->get('access-view') == false) : ?>
                                                                    <?php echo JText::_('MOD_ARTICLES_CATEGORY_REGISTER_TO_READ_MORE'); ?>
                                                            <?php elseif ($readmore = $item->alternative_readmore) : ?>
                                                                    <?php echo $readmore; ?>
                                                                    <?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
                                                            <?php elseif ($params->get('show_readmore_title', 0) == 0) : ?>
                                                                    <?php echo JText::sprintf('MOD_ARTICLES_CATEGORY_READ_MORE_TITLE'); ?>
                                                            <?php else : ?>
                                                                    <?php echo JText::_('MOD_ARTICLES_CATEGORY_READ_MORE'); ?>
                                                                    <?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
                                                            <?php endif; ?>
                                                    </a>
                                            </p>
                                    <?php endif; ?>
                                        
                                </div>
                            </div>
                                        
		<?php endforeach; ?>
	<?php endif; ?>

                            
                        </div>
                    </div>
                </div>
                            