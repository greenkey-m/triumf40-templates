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

$d = explode(",", $this->item->jcfields[8]->value);

//print_r($d);

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
                    <label class="col-xs-6 col-sm-8 col-md-6 control-label" for="buttondropdown"
                           data-toggle="tooltip" data-placement="top"
                           title="Выберите длину теплицы, или введите вручную, кратно 2 м, потому что длина одного сегмента - 2 м.">
                        Длина теплицы
                    </label>
                    <div class="col-xs-6 col-sm-4 col-md-6">
                        <div class="input-group dropdown">
                            <input id="buttondropdown" name="buttondropdown" class="form-control"
                                   placeholder="метров"
                                   value="2 м"
                                   type="text">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default dropdown-toggle" style="height: 40px" data-toggle="dropdown">
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <?php foreach ($c as $step) {
                                       $x = explode("x", $step);
                                       ?>
                                        <li><a class="step" href="#"
                                               data-value="<?=$x[0] ?>"
                                               data-100="<?=$x[1] ?>"
                                               data-65="<?=$x[2] ?>"
                                               data-tground="<?=$x[3] ?>"
                                               data-brus="<?=$x[4] ?>"
                                               data-montage="<?=$x[5] ?>">
                                                <?=$x[0] ?> м
                                            </a>
                                        </li>
                                    <?php
                                    } ?>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-6 col-sm-8 col-md-6 control-label" for="buttondropdown"
                           data-toggle="tooltip" data-placement="top"
                           title="Весь необходимый для сборки теплицы поликарбонат входит в комплект. Поликарбонат с толщиной стенки 4 мм имеет защиту от ультрафиолетового излучения">
                        Поликарбонат с UV
                    </label>
                    <div class="col-xs-6 col-sm-4 col-xs-4 col-md-6 flexcon active">
                        <div>В комплекте</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-6 col-sm-8 col-md-6 control-label" for="buttondropdown"
                           data-toggle="tooltip" data-placement="top"
                           title="В торцах теплиц встроены двери с форточками">
                        Двери и форточки
                    </label>
                    <div class="col-xs-6 col-sm-4 col-md-6 flexcon active">
                        <div>В комплекте</div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-6 col-sm-8 col-md-6 control-label" for="buttondropdown"
                           data-toggle="tooltip" data-placement="top"
                           title="В этом варианте расстояние между дугами - 1м">
                        Шаг 100см
                    </label>
                    <div class="col-xs-6 col-sm-4 col-md-6 flexcon active">
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
                    <label class="col-xs-6 col-sm-8 col-md-6 control-label" for="buttondropdown"
                           data-toggle="tooltip" data-placement="top"
                           title="В этом варианте расстояние между дугами - 65 см.">
                        Шаг 65см
                    </label>
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
                    <label class="col-xs-6 col-sm-8 col-md-6 control-label" for="buttondropdown"
                           data-toggle="tooltip" data-placement="top"
                           title="Т-образные грунтозацепы, для установки теплицы на землю">
                        Грунтозацепы
                    </label>
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
                    <label class="col-xs-6 col-sm-8 col-md-6 control-label" for="buttondropdown"
                           data-toggle="tooltip" data-placement="top"
                           title="Вместо грунтозацепов можно использовать брус. Такую теплицу легко переносить с одного места на другое. Также можно заказать брус с большим сечением - 100х100">
                        Брус 50х100
                    </label>
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
                    <label class="col-xs-6 col-sm-8 col-md-6 control-label" for="buttondropdown"
                           data-toggle="tooltip" data-placement="top"
                           title="Если нужно, можно установить дополнительную форточку в боковой стенке теплицы">
                        Форточка
                    </label>
                    <div class="col-xs-6 col-sm-4 col-md-6 flexcon">
                        <div class="checkbox">
                            <label style="font-size: 1.5em">
                                <input name="c-window" type="checkbox" value="">
                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                            </label>
                        </div>
                        <div id="price-window"><span><?=$this->item->jcfields[6]->value ?></span> руб.</div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-6 col-sm-8 col-md-6 control-label" for="buttondropdown"
                           data-toggle="tooltip" data-placement="top"
                           title="Если внутри теплицы нужно выделить отдельные секции, то можно заказать такую внутреннюю перегородку">
                        Перегородка
                    </label>
                    <div class="col-xs-6 col-sm-4 col-md-6 flexcon">
                        <div class="checkbox">
                            <label style="font-size: 1.5em">
                                <input name="c-divide" type="checkbox" value="">
                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                            </label>
                        </div>
                        <div id="price-divide"><span><?=$this->item->jcfields[7]->value ?></span> руб.</div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-xs-6 col-sm-8 col-md-6 control-label" for="buttondropdown"
                           data-toggle="tooltip" data-placement="top"
                           title="Вы также можете заказать монтаж теплицы у вас на участке">
                        Монтаж
                    </label>
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
                    <label for="delivery" class="col-xs-6 col-sm-8 col-md-6 control-label"
                           data-toggle="tooltip" data-placement="top"
                           title="Если нужно, мы можем доставить теплицу прямо на ваш участок в пределах Калужской области">
                        Выберите доставку</label>
                    <div class="col-xs-6 col-sm-4 col-md-6">
                        <div class="input-group dropdown">
                            <input id="delivery" type="text" class="form-control selectedit" name="delivery" aria-label="" value="Самовывоз" data-price="0">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-success dropdown-toggle" style="height: 40px"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li><a class="delivery" href="#" data-value="Самовывоз" data-price="0">Самовывоз - 0</a></li>
                                    <?php foreach ($d as $point) {
                                        $x = explode(" ", trim($point));
                                        ?>
                                    <li><a class="delivery" href="#" data-value="<?=($x[0]." - ".$x[1])?>" data-price="<?=$x[1] ?>"><?=($x[0]." - ".$x[1])?></a></li>
                                    <?php } ?>
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
                        <button type="button" class="buy scroll btn btn-lg btn-danger" style="padding: 15px; width:100%; min-width:auto;" data-toggle="modal" data-target="#orderform">
                            Заказать
                        </button>

                    </div>
                </div>

            </form>


            <!-- Modal -->
            <div class="modal fade" id="orderform" tabindex="-1" role="dialog" aria-labelledby="OrderForm">
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
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form_name">Ваше имя</label>
                                                <input id="form_name" type="text" name="name" class="form-control" placeholder="Как к вам общаться" data-error="Ошибка ввода">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="form_email">Email</label>
                                                <input id="form_email" type="email" name="email" class="form-control" placeholder="Напишите ваш email" data-error="Ошибка ввода">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="form_phone">Телефон</label>
                                                <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Напишите номер телефона" required="required" data-error="Номер телефона обязателен">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table tableform">
                                                <thead>
                                                    <tr>
                                                        <th>Тип</th>
                                                        <th>Длина</th>
                                                        <th>Шаг</th>
                                                        <th>Опции</th>
                                                        <th>Доставка</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="5">Итого: <span id="fsum">12 000</span> руб.</td>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <tr>
                                                        <td><span id="ftype">Атлант</span></td>
                                                        <td><span id="flength">2 м</span></td>
                                                        <td><span id="fstep">100 см</span></td>
                                                        <td><span id="foptions"></span></td>
                                                        <td><span id="fdelivery">Самовывоз</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <input id="gtype" type="text" name="gtype" value="Атлант" hidden>
                                            <input id="glength" type="text" name="glength" value="2" hidden>
                                            <input id="gstep" type="text" name="gstep" value="100" hidden>
                                            <input id="goptions" type="text" name="goptions" value="" hidden>
                                            <input id="gdelivery" type="text" name="gdelivery" value="Самовывоз" hidden>
                                            <input id="gsum" type="text" name="gsum" value="12000" hidden>

                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form_message">Дополнительно сообщение</label>
                                                <textarea id="form_message" name="message" class="form-control" placeholder="Что вас дополнительно интересует?" rows="2" data-error="Ошибка ввода"></textarea>
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
                                            <p class="text-muted"><strong>*</strong> Эти поля нужно обязательно заполнить.</p>
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
