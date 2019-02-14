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

// получаем массив с данными по ценам для калькулятора
$c = explode(",", $this->item->jcfields[5]->value);

?>
<article class="item-page<?php echo $this->pageclass_sfx; ?>" itemscope itemtype="https://schema.org/Article">
    <meta itemprop="inLanguage"
          content="<?php echo ($this->item->language === '*') ? JFactory::getConfig()->get('language') : $this->item->language; ?>"/>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8">

            <div id="slider">
                <div class="slides">

                    <!-- First slide -->
                    <div id="slide1" class="slider active">
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
                    <div id="slide2" class="slider">
                        <div class="images">
                            <img src="/images/alter.jpg">
                        </div>
                    </div>

                    <!-- Third slide -->
                    <div id="slide3" class="slider">
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
                    <div id="slide4" class="slider">
                        <div class="legend" style="display: none;"></div>
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

                <div class="switch" style="display: none;">
                    <ul>
                        <li>
                            <div class="on"></div>
                        </li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>

                <div class="thumbs">
                    <a href="" data-slide="1"><img src="/images/alter.jpg" /></a>
                    <a href="" data-slide="2"><img src="/images/alter.jpg" /></a>
                    <a href="" data-slide="3"><img src="/images/alter.jpg" /></a>
                    <a href="" data-slide="4"><img src="/images/alter.jpg" /></a>
                </div>


            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-4">

            <form class="form-horizontal form-order">

                <div class="form-group" style="display:none;">
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
                <div class="form-group row">
                    <label class="col-xs-6 col-sm-8 col-md-6 control-label" for="buttondropdown">Длина теплицы</label>
                    <div class="col-xs-6 col-sm-4 col-md-6">
                        <div class="input-group dropdown">
                            <input id="buttondropdown" name="buttondropdown" class="form-control" placeholder="метров"
                                   type="text">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default dropdown-toggle" style="height: 40px" data-toggle="dropdown">
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="#" data-value="2" data-100="1111" data-65="1111" data-tground="444" data-brus="333" data-montage="2222">2 м</a></li>
                                    <li><a href="#" data-value="4" data-100="1111" data-65="1111" data-tground="444" data-brus="333" data-montage="2222">4 м</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-6 col-sm-8 col-md-6 control-label" for="buttondropdown">Поликарбонат с UV</label>
                    <div class="col-xs-6 col-sm-4 col-xs-4 col-md-6 flexcon">
                        <div>В комплекте</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-6 col-sm-8 col-md-6 control-label" for="buttondropdown">Двери и форточки</label>
                    <div class="col-xs-6 col-sm-4 col-md-6 flexcon">
                        <div>В комплекте</div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-6 col-sm-8 col-md-6 control-label" for="buttondropdown">Шаг 100см</label>
                    <div class="col-xs-6 col-sm-4 col-md-6 flexcon">
                        <div class="radio">
                            <label style="font-size: 1.5em">
                                <input type="radio" name="s" value="100" checked>
                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                            </label>
                        </div>
                        <div id="price-100"><span>10900</span> руб.</div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-6 col-sm-8 col-md-6 control-label" for="buttondropdown">Шаг 65см</label>
                    <div class="col-xs-6 col-sm-4 col-md-6 flexcon">
                        <div class="radio">
                            <label style="font-size: 1.5em">
                                <input type="radio" name="s" value="65">
                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                            </label>
                        </div>
                        <div id="price-65"><span>10900</span> руб.</div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-6 col-sm-8 col-md-6 control-label" for="buttondropdown">Грунтозацепы</label>
                    <div class="col-xs-6 col-sm-4 col-md-6 flexcon">
                        <div class="checkbox">
                            <label style="font-size: 1.5em">
                                <input name="c-tground" type="checkbox" value="">
                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                            </label>
                        </div>
                        <div id="price-tground"><span>450</span> руб.</div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-6 col-sm-8 col-md-6 control-label" for="buttondropdown">Брус</label>
                    <div class="col-xs-6 col-sm-4 col-md-6 flexcon">
                        <div class="checkbox">
                            <label style="font-size: 1.5em">
                                <input name="c-brus" type="checkbox" value="">
                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                            </label>
                        </div>
                        <div id="price-brus"><span>1500</span> руб.</div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-6 col-sm-8 col-md-6 control-label" for="buttondropdown">Форточка</label>
                    <div class="col-xs-6 col-sm-4 col-md-6 flexcon">
                        <div class="checkbox">
                            <label style="font-size: 1.5em">
                                <input name="c-window" type="checkbox" value="">
                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                            </label>
                        </div>
                        <div><span>1500</span> руб.</div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-6 col-sm-8 col-md-6 control-label" for="buttondropdown">Перегородка</label>
                    <div class="col-xs-6 col-sm-4 col-md-6 flexcon">
                        <div class="checkbox">
                            <label style="font-size: 1.5em">
                                <input name="c-divide" type="checkbox" value="">
                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                            </label>
                        </div>
                        <div><span>1500</span> руб.</div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-xs-6 col-sm-8 col-md-6 control-label" for="buttondropdown">Монтаж</label>
                    <div class="col-xs-6 col-sm-4 col-md-6 flexcon">
                        <div class="checkbox">
                            <label style="font-size: 1.5em">
                                <input name="c-montage" type="checkbox" value="">
                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                            </label>
                        </div>
                        <div id="price-montage"><span>4000</span> руб.</div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="delivery" class="col-xs-6 col-sm-8 col-md-6 control-label">Выберите доставку</label>
                    <div class="col-xs-6 col-sm-4 col-md-6">
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
                    <span class="col-xs-6 col-sm-8 col-md-6 big"></span>
                    <span class="col-xs-6 col-sm-4 col-md-6 big"><span id="calc">15200</span> руб.</span>
                </div>

                <div class="form-group">
                    <span class="col-xs-6 col-sm-8 col-md-6 big"></span>
                    <div class="col-xs-6 col-sm-4 col-md-6">
                        <button type="button" class="buy scroll btn btn-lg btn-danger" style="padding: 15px; width:100%; min-width:auto;" data-toggle="modal" data-target="#myModal">
                            Заказать
                        </button>

                    </div>
                </div>

            </form>


            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Заказ теплицы</h4>
                        </div>

                        <form id="contact-form" method="post" action="/templates/triumf31/code/recaptcha/contact.php" role="form">

                        <div class="modal-body">

                                <div class="messages"></div>

                                <div class="controls">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="form_name">Firstname *</label>
                                                <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="form_lastname">Lastname *</label>
                                                <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required.">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="form_email">Email *</label>
                                                <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="form_phone">Phone</label>
                                                <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Please enter your phone">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form_message">Message *</label>
                                                <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="g-recaptcha" data-sitekey="6LeoxAQTAAAAAHVGSaz-W5qglWgyS64yEFY3JbmM" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                                                <input class="form-control hidden" data-recaptcha="true" required data-error="Please complete the Captcha">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="text-muted"><strong>*</strong> These fields are required. Contact form template by <a href="https://bootstrapious.com/p/bootstrap-recaptcha" target="_blank">Bootstrapious</a>.</p>
                                        </div>
                                    </div>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                            <input type="submit" class="btn btn-success btn-send" value="Отправить">
                        </div>
                        </form>
                        <script src='https://www.google.com/recaptcha/api.js'></script>
                        <script src="/templates/triumf31/code/recaptcha/validator.js"></script>
                        <script src="/templates/triumf31/code/recaptcha/contact.js"></script>

                    </div>
                </div>
            </div>

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
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="square" style="font-size: 2.rem;"><i class="fa fa-square"></i></div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-8">
                <div itemprop="articleBody">
                    <?php echo $this->item->text; ?>
                </div>
            </div>

        </div>
    </form>

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
