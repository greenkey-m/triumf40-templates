<?php
/**
 * @package	Triumf40
 * @copyright	2017, Inc. All rights reserved.
 * @developer   Greenkey studio
 * @site        http://greenkey.ru
 *
 */
defined('_JEXEC') or die;

JHtml::_('jquery.framework');
JHtml::_('jquery.ui');
JHtml::_('behavior.framework');


//JHtml::script('https://maps.googleapis.com/maps/api/js?v=3.exp&language=ru');
JHtml::script('https://api-maps.yandex.ru/2.1/?lang=ru_RU');
//JHtml::script('http://api-maps.yandex.ru/2.0-stable/?load=package.full&lang=ru-RU');

//JHtml::script('https://maps.googleapis.com/maps/api/js?v=3.exp&language=ru');
JHtml::script('https://code.jquery.com/jquery-2.1.4.min.js');
//JHtml::script('http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js');
JHtml::script('https://code.jquery.com/ui/1.11.4/jquery-ui.min.js');
//JHtml::script('http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js');
JHtml::script('templates/' . $this->template . '/code/owl-carousel/owl.carousel.min.js');

JHtml::script('templates/' . $this->template . '/code/modernizr.js');
//JHtml::script('templates/' . $this->template . '/code/classie.js');
//JHtml::script('templates/' . $this->template . '/code/bxslider/jquery.bxslider.js');
//JHtml::script('templates/' . $this->template . '/code/rs-plugin/js/jquery.themepunch.tools.min.js');
//JHtml::script('templates/' . $this->template . '/code/rs-plugin/js/jquery.themepunch.revolution.min.js');
JHtml::script('templates/' . $this->template . '/code/magnific-popup/jquery.magnific-popup.min.js');
//JHtml::script('templates/' . $this->template . '/code/wow.min.js');
//JHtml::script('templates/' . $this->template . '/code/waypoints.min.js');
JHtml::script('templates/' . $this->template . '/code/isotope.pkgd.min.js');
JHtml::script('templates/' . $this->template . '/code/jquery.parallax-1.1.3.js');
//JHtml::script('templates/' . $this->template . '/code/jquery.stellar.min.js');
//JHtml::script('templates/' . $this->template . '/code/jquery.flexslider.js');
//JHtml::script('templates/' . $this->template . '/code/jquery.scrollto.js');
//JHtml::script('templates/' . $this->template . '/code/jquery.nanoscroller.js');
JHtml::script('templates/' . $this->template . '/code/jquery.appear.js');
JHtml::script('templates/' . $this->template . '/code/jquery.countTo.js');
JHtml::script('templates/' . $this->template . '/code/query.validate.js');
//JHtml::script('templates/' . $this->template . '/code/prettyphoto/js/jquery.prettyPhoto.js');
//JHtml::script('https://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js');
//JHtml::script('templates/' . $this->template . '/code/masonry.pkgd.min.js');
//JHtml::script('templates/' . $this->template . '/code/jquery.masonry.min.js');
//JHtml::script('templates/' . $this->template . '/code/jquery.easypiechart.js');
//JHtml::script('templates/' . $this->template . '/code/jquery.backstretch.min.js');
//JHtml::script('templates/' . $this->template . '/code/jquery.sequence-min.js');
JHtml::script('templates/' . $this->template . '/code/jquery.waypoints.min.js');
//JHtml::script('templates/' . $this->template . '/code/okvideo.min.js');

JHtml::script('templates/' . $this->template . '/code/bootstrap.js');
//JHtml::script('templates/' . $this->template . '/code/bs-gallery/js/bootstrap-image-gallery.min.js');
//JHtml::script('templates/' . $this->template . '/code/custombox/custombox.js');
//JHtml::script('templates/' . $this->template . '/code/bs-dialog/js/bootstrap-dialog.min.js');
//JHtml::script('templates/' . $this->template . '/code/bootbox.min.js');
JHtml::script('templates/' . $this->template . '/code/jquery.browser.js');
JHtml::script('templates/' . $this->template . '/code/SmoothScroll.js');

JHtml::script('templates/' . $this->template . '/code/core.js');
JHtml::script('templates/' . $this->template . '/code/template.js');

//JHtml::script('http://maps.google.com/maps/api/js?sensor=true');
//JHtml::script('templates/' . $this->template . '/code/gmaps.js');
// If Right-to-Left
if ($this->direction == 'rtl') :
    JHtml::stylesheet('../media/jui/css/bootstrap-rtl.css');
//JHtml::stylesheet('templates/' . $this->template . '/style/template_rtl.css');
endif;

//JHtml::stylesheet('../media/jui/css/chosen.css');
//JHtml::stylesheet('templates/' . $this->template . '/style/reset.css');
//JHtml::stylesheet('templates/'.$this->template.'/style/normalize.css');
//JHtml::stylesheet('http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.css');
//JHtml::stylesheet('templates/' . $this->template . '/code/bxslider/jquery.bxslider.css');
//JHtml::stylesheet('templates/' . $this->template . '/style/jMetro/jquery-ui.css');
//JHtml::stylesheet('templates/' . $this->template . '/style/flexslider.css');
//JHtml::stylesheet('templates/' . $this->template . '/code/prettyphoto/css/prettyPhoto.css');
//JHtml::stylesheet('https://blueimp.github.io/Gallery/css/blueimp-gallery.min.css');
//JHtml::stylesheet('templates/' . $this->template . '/code/bs-gallery/css/bootstrap-image-gallery.min.css');
//JHtml::stylesheet('templates/' . $this->template . '/code/custombox/custombox.min.css');
//JHtml::stylesheet('templates/' . $this->template . '/code/rs-plugin/css/settings.css');
//JHtml::stylesheet('templates/' . $this->template . '/code/bs-dialog/css/bootstrap-dialog.min.css');
JHtml::stylesheet('templates/' . $this->template . '/code/magnific-popup/magnific-popup.css');
//JHtml::stylesheet('templates/' . $this->template . '/style/sidebar.css');
//JHtml::stylesheet('templates/' . $this->template . '/style/nanoscroller.css');
JHtml::stylesheet('templates/' . $this->template . '/style/animations.css');

JHtml::stylesheet('templates/' . $this->template . '/code/owl-carousel/owl.carousel.css');
//JHtml::stylesheet('templates/' . $this->template . '/code/owl-carousel/owl.theme.css');
JHtml::stylesheet('templates/' . $this->template . '/code/owl-carousel/owl.transitions.css');
//JHtml::stylesheet('templates/' . $this->template . '/code/easytabs/easy-responsive-tabs.css');
//JHtml::stylesheet('templates/' . $this->template . '/code/flex-slider/flexslider.css');
//JHtml::stylesheet('templates/' . $this->template . '/style/prettyphoto.css');


JHtml::stylesheet('templates/' . $this->template . '/fonts/fontawesome/css/font-awesome.min.css');
JHtml::stylesheet('templates/' . $this->template . '/fonts/fontello/css/fontello.css');
JHtml::stylesheet('templates/' . $this->template . '/style/template.css');
JHtml::stylesheet('templates/' . $this->template . '/style/core.css');


$app = JFactory::getApplication();
$sitename = $app->get('sitename');

// Задан ли логотип в настройках
if ($this->params->get('logoFile')) {
    $logo = '<img src="' . JUri::root() . $this->params->get('logoFile') . '" alt="' . $sitename . '" />';
} else {
    $logo = '<img id="logo" src="images/logo/logo_main.png" alt="Теплицы Триумф">';
}

// Подсчет модулей в футере, показывать ли блок
$showSubFooter = ($this->countModules('subfooter-1') or $this->countModules('subfooter-2') or $this->countModules('subfooter-3') or $this->countModules('subfooter-4'));

$left = $this->countModules('left');
$right = $this->countModules('right');

?>
<?php echo '<?'; ?>xml version="1.0" encoding="<?php echo $this->_charset ?>"<?php echo '?>'; ?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->

    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>

        <!-- Global Site Tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-38032916-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments)};
            gtag('js', new Date());
            gtag('config', 'UA-38032916-1');
      </script>


        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!-- Favicons -->
        <link rel="apple-touch-icon-precomposed" sizes="57x57" href="templates/<?php echo $this->template ?>/media/favicons/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="templates/<?php echo $this->template ?>/media/favicons/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="templates/<?php echo $this->template ?>/media/favicons/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="templates/<?php echo $this->template ?>/media/favicons/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon-precomposed" sizes="60x60" href="templates/<?php echo $this->template ?>/media/favicons/apple-touch-icon-60x60.png" />
        <link rel="apple-touch-icon-precomposed" sizes="120x120" href="templates/<?php echo $this->template ?>/media/favicons/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon-precomposed" sizes="76x76" href="templates/<?php echo $this->template ?>/media/favicons/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon-precomposed" sizes="152x152" href="templates/<?php echo $this->template ?>/media/favicons/apple-touch-icon-152x152.png" />
        <link rel="icon" type="image/png" href="templates/<?php echo $this->template ?>/media/favicons/favicon-196x196.png" sizes="196x196" />
        <link rel="icon" type="image/png" href="templates/<?php echo $this->template ?>/media/favicons/favicon-96x96.png" sizes="96x96" />
        <link rel="icon" type="image/png" href="templates/<?php echo $this->template ?>/media/favicons/favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="templates/<?php echo $this->template ?>/media/favicons/favicon-16x16.png" sizes="16x16" />
        <link rel="icon" type="image/png" href="templates/<?php echo $this->template ?>/media/favicons/favicon-128.png" sizes="128x128" />
        <meta name="application-name" content="&nbsp;"/>
        <meta name="msapplication-TileColor" content="#FFFFFF" />
        <meta name="msapplication-TileImage" content="templates/<?php echo $this->template ?>/media/favicons/mstile-144x144.png" />
        <meta name="msapplication-square70x70logo" content="templates/<?php echo $this->template ?>/media/favicons/mstile-70x70.png" />
        <meta name="msapplication-square150x150logo" content="templates/<?php echo $this->template ?>/media/favicons/mstile-150x150.png" />
        <meta name="msapplication-wide310x150logo" content="templates/<?php echo $this->template ?>/media/favicons/mstile-310x150.png" />
        <meta name="msapplication-square310x310logo" content="templates/<?php echo $this->template ?>/media/favicons/mstile-310x310.png" />

        <meta property="og:title" content='Завод по производству теплиц "Триумф"' />
        <meta property="og:description" content="Производство теплицы из поликарбоната, доставка и монтаж! Теплицы от производителя"/>
        <meta property="og:image" content="https://triumf40.ru/images/logo/logo_main.png" />
        <meta property="og:type" content="website"/>
        <meta property="og:url" content= "https://triumf40.ru/" />

        <!-- Google Webfonts -->
        <!--<link href='http://fonts.googleapis.com/css?family=Roboto:400,300&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Herr+Von+Muellerhoff' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>-->

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,300&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    <jdoc:include type="head" />

</head>

<body class="front no-trans">
    <!-- scrollToTop -->
    <!-- ================ -->
    <div class="scrollToTop"><i class="icon-up-open-big"></i></div>

    <!-- page wrapper start -->
    <!-- ================ -->
    <div class="page-wrapper">

        <!-- header-top start ("dark" class для .header-top) -->
        <!-- ================ -->
        <div class="header-top dark-bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-8">

                        <!-- header-top-first start -->
                        <!-- ================ -->
                        <div class="header-top-first clearfix">

                            <div class="header-top-dropdown">
                                <!-- header start -->
                                <!-- ================ -->
                                <jdoc:include type="modules" name="subheader-1" style="onlytag" />
                                <!-- header end -->
                            </div>

                        </div>
                        <!-- header-top-first end -->

                    </div>
                    <div class="col-sm-12 col-md-4">

                        <!-- header-top-second start -->
                        <!-- ================ -->
                        <div id="header-top-second"  class="clearfix">

                            <!-- header top dropdowns start -->
                            <!-- ================ -->
                            <div class="header-top-dropdown">
                                <jdoc:include type="modules" name="subheader-2" style="no" />
                            </div>
                            <!--  header top dropdowns end -->

                        </div>
                        <!-- header-top-second end -->

                    </div>
                </div>
            </div>
        </div>
        <!-- header-top end -->

        <!-- header start classes:
                fixed: фиксированная навигация (sticky menu) e.g. <header class="header fixed clearfix">
                 dark: dark header version e.g. <header class="header dark clearfix">
        ================ -->
        <header class="header fixed clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">

                        <!-- header-left start -->
                        <!-- ================ -->
                        <div class="header-left clearfix">

                            <!-- logo -->
                            <div class="logo">
                                <a href="/"><?php echo $logo; ?></a>
                            </div>

                        </div>
                        <!-- header-left end -->

                    </div>
                    <div class="col-md-9">

                        <!-- header-right start -->
                        <!-- ================ -->
                        <div class="header-right clearfix">

                            <jdoc:include type="modules" name="header" style="no" />

                        </div>
                        <!-- header-right end -->

                    </div>
                </div>
            </div>
        </header>
        <!-- header end -->

        <!-- banner start -->
        <!-- ================ -->
        <section class="banner">

            <!-- slideshow start -->
            <!-- ================ -->
            <jdoc:include type="modules" name="top" style="no" />
            <!-- slideshow end -->

        </section>
        <!-- banner end -->

        <!-- main start -->
        <!-- ================ -->
        <section class="section clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12<?php if ($right) echo " col-md-9"; ?>">
                        <jdoc:include type="modules" name="subcenter-1" style="no" />
                        <jdoc:include type="message" />
                        <main>
                            <jdoc:include type="component" />
                        </main>
                        <jdoc:include type="modules" name="subcenter-2" style="no" />
                    </div>
                    <?php
                    if ($right) {
                    ?>
                    <aside class="col-sm-12 col-md-3">
                        <jdoc:include type="modules" name="right" style="no" />
                    </aside>
                    <?php } ?>
                </div>
            </div>
        </section>
        <!-- main-container end -->

        <jdoc:include type="modules" name="bottom" style="section" />

        <!-- footer start (Add "light" class для #footer in order to enable light footer) -->
        <!-- ================ -->
        <footer id="footer">

            <!-- .subfooter start -->
            <!-- ================ -->
            <?php if ($showSubFooter) : ?>
            <div class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="footer-content">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <jdoc:include type="modules" name="subfooter-1" style="no" />
                                    </div>
                                    <div class="col-sm-6">
                                        <jdoc:include type="modules" name="subfooter-2" style="no" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="space-bottom hidden-lg hidden-xs"></div>
                        <div class="col-sm-6 col-md-2">
                            <div class="footer-content">
                                <nav>
                                    <jdoc:include type="modules" name="subfooter-3" style="xhtml" />
                                </nav>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 col-md-offset-1">
                            <div class="footer-content">
                                <jdoc:include type="modules" name="subfooter-4" style="xhtml" />
                            </div>
                        </div>
                    </div>
                    <div class="space-bottom hidden-lg hidden-xs"></div>
                </div>
            </div>
            <?php endif; ?>
            <!-- .subfooter end -->

            <!-- .footer start -->
            <!-- ================ -->
            <div class="subfooter">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <p>Triumf40.ru © 2012-2018, разработано в <a target="_blank" href="http://greenkey.ru">Greenkey</a>.</p>
                        </div>
                        <div class="col-md-6">
                            <nav class="navbar navbar-default" role="navigation">
                                <!-- Toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-2">
                                        <span class="sr-only">Меню</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <div class="collapse navbar-collapse" id="navbar-collapse-2">
                                    <jdoc:include type="modules" name="footer" style="no" />
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .footer end -->

        </footer>
        <!-- footer end -->

    </div>
    <!-- page-wrapper end -->

</body>

</html>
