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


$l = explode(",", $this->item->jcfields[4]->value);

// получаем массив с данными по ценам для калькулятора
$c = explode(",", $this->item->jcfields[5]->value);

$d = explode(",", $this->item->jcfields[8]->value);

$f = "images/".$this->item->jcfields[11]->value;


foreach ($c as $cit) {
    $x = explode("x", trim($cit));
    $parray[$x[0]] = $x;
}
if (isset($parray[0])) {
    $carray[0] = $parray[0];
} else {
    $carray[0][0] = 0;
    $carray[0][1] = 0;
    $carray[0][2] = 0;
    $carray[0][3] = 0;
    $carray[0][4] = 0;
    $carray[0][5] = 0;
}
$minln = 0;
foreach ($l as $lit) {
    $lit = trim($lit);
    if ($minln == 0) {
        $minln = $lit;
    } else {
        if ($minln > $lit) $minln = $lit;
    }

    if (isset($parray[$lit])) {
        $carray[$lit] = $parray[$lit];
    } else {
        // Откатывать назад, пока не найдется существующая запись
        // Тогда к ней прибавить разницу в длине / 2 умноженную на цены сегмента, которые записаны в 0 индексе.
        $x = ($lit - $prevs) / 2;
        $carray[$lit][0] = $lit;
        $carray[$lit][1] = $carray[$prevs][1] + $x * $carray[0][1];
        $carray[$lit][2] = $carray[$prevs][2] + $x * $carray[0][2];
        $carray[$lit][3] = $carray[$prevs][3] + $x * $carray[0][3];
        $carray[$lit][4] = $carray[$prevs][4] + $x * $carray[0][4];
        $carray[$lit][5] = $carray[$prevs][5] + $x * $carray[0][5];
        //TODO нулевой индекс лучше наверное отдельно разместить
    }
    $prevs = trim($lit);
}

// Если передана длина теплицы, сразу установить
$input = JFactory::getApplication()->input;
$lth = $input->getCmd('l', $minln);
// Если не задано, то ставим самый минимальный размер
if (($lth<>'4')&&($lth<>'6')&&($lth<>'8')&&($lth<>'10')) $lth = 4;
$st = $input->getCmd('s', '100');
if (($st<>'100')&&($st<>'65')) $st = 100;


//print_r($l);
//print_r($parray);
//print_r($carray);

//print_r($this->item->jcfields[3]->value);
//print_r($this->item->jcfields[15]);

$icons = json_decode($this->item->jcfields[15]->rawvalue);
//print_r($icons->icons0->ico);

?>
<article class="item-page<?php echo $this->pageclass_sfx; ?>" itemscope itemtype="https://schema.org/Article">
    <meta itemprop="inLanguage"
          content="<?php echo ($this->item->language === '*') ? JFactory::getConfig()->get('language') : $this->item->language; ?>"/>

    <header class="page-header">
        <h1> <?php echo $this->escape($this->params->get('page_heading')); ?> </h1>
    </header>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8">

            <div id="slider">
                <div class="slides">

                    <?php
                      $imgs = scandir($f);

                      foreach ($imgs as $img) {

                          if (($img <> ".")&($img <> "..")) {
                    ?>
                          <div id="slide1" class="slider active">
                              <div class="images">
                                  <img src="<?= $f . "/" . $img ?>">
                              </div>
                          </div>

                          <?php
                    }
                      }

                    ?>

                </div>

                <div class="thumbs">

                    <?php
                    $i = 0;
                    foreach ($imgs as $img) {

                        if (($img <> ".")&($img <> "..")) {
                            $i++;
                            ?>
                            <a href="" data-slide="<?=$i ?>"><img src="<?= $f . "/" . $img ?>" /></a>

                            <?php
                        }
                    }

                    ?>
                </div>


            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-4">

            <form class="form-horizontal form-order">

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
                                   value="<?=$lth ?> м"
                                   data-length="<?=$lth ?>"
                                   type="text">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default dropdown-toggle" style="height: 40px" data-toggle="dropdown">
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <?php foreach ($carray as $step) {
                                       if ($step[0] <> '0') {
                                           ?>
                                           <li><a class="step" href="#"
                                                  data-value="<?= $step[0] ?>"
                                                  data-100="<?= $step[1] ?>"
                                                  data-65="<?= $step[2] ?>"
                                                  data-tground="<?= $step[3] ?>"
                                                  data-brus="<?= $step[4] ?>"
                                                  data-montage="<?= $step[5] ?>">
                                                   <?= $step[0] ?> м
                                               </a>
                                           </li>
                                           <?php
                                       }
                                    }
                                    ?>
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
                    <div class="col-xs-6 col-sm-4 col-md-6 flexcon <?=($st == 100 ? "active " : "") ?>s100">
                        <div class="radio">
                            <label style="font-size: 1.5em">
                                <input type="radio" name="s" value="100" <?=($st == 100 ? "checked" : "") ?>>
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
                    <div class="col-xs-6 col-sm-4 col-md-6 flexcon <?=($st == 65 ? "active " : "") ?>s65">
                        <div class="radio">
                            <label style="font-size: 1.5em">
                                <input type="radio" name="s" value="65" <?=($st == 65 ? "checked" : "") ?>>
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

                <div class="form-group<?= ($this->item->jcfields[6]->value == '0' ? ' inactive' : ''  )?>">
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

                <div class="form-group<?= ($this->item->jcfields[7]->value == '0' ? ' inactive' : ''  )?>">
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

                <div class="form-group<?= ($this->item->jcfields[14]->value == '0' ? ' inactive' : ''  )?>">
                    <label class="col-xs-6 col-sm-8 col-md-6 control-label" for="buttondropdown"
                           data-toggle="tooltip" data-placement="top"
                           title="Механизм открывания форточки, автомат">
                        Механизм форточки
                    </label>
                    <div class="col-xs-6 col-sm-4 col-md-6 flexcon">
                        <div class="checkbox">
                            <label style="font-size: 1.5em">
                                <input name="c-autowin" type="checkbox" value="">
                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                            </label>
                        </div>
                        <div id="price-autowin"><span><?=$this->item->jcfields[14]->value ?></span> руб.</div>
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
                                                        <td><span id="ftype"><?=$this->item->jcfields[1]->value ?></span></td>
                                                        <td><span id="flength">2 м</span></td>
                                                        <td><span id="fstep">100 см</span></td>
                                                        <td><span id="foptions"></span></td>
                                                        <td><span id="fdelivery">Самовывоз</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <input id="gtype" type="text" name="gtype" value="<?=$this->item->jcfields[1]->value ?></span>" hidden>
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
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="text-small">
                                                Нажимая кнопку «Отправить», я даю свое согласие на обработку моих персональных данных,
                                                в соответствии с Федеральным законом от 27.07.2006 года №152-ФЗ «О персональных данных»,
                                                на условиях и для целей, определенных в <a href="/agreement-pd">Согласии на обработку персональных данных</a>
                                            </p>
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

        <?php
            echo $this->item->jcfields[3]->value;
            $icon_file = str_replace('t', 'icon_thick', $icons->icons0->ico);
        ?>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 prop-icons">

                <img src="images/icon/<?=$icon_file ?>.png" />
                <img src="images/icon/icon_2win.png" />
                <img src="images/icon/icon_mont.png" />
                <img src="images/icon/icon_delivery.png" />
                <img src="images/icon/icon_uv.png" />
                <img src="images/icon/icon_zn.png" />
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
