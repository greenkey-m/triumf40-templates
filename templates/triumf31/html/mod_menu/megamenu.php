<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

// Note. It is important to remove spaces between elements.
?>


<!-- main-navigation start -->
<!-- ================ -->
<div class="main-navigation animated">

    <!-- navbar start -->
    <!-- ================ -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">

            <!-- Toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                    <span class="sr-only">Меню</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse-1">

                <?php // The menu class is deprecated. Use nav instead.  ?>
                <ul class="nav  navbar-nav navbar-right menu<?php echo $class_sfx; ?>"<?php
                $tag = '';

                if ($params->get('tag_id') != null) {
                    $tag = $params->get('tag_id') . '';
                    echo ' id="' . $tag . '"';
                }
                ?>>
                        <?php
                        $finish = '';
                        $megamenu = false;
                        foreach ($list as $i => &$item) {

                            $aclass = "";
                            if (in_array($item->id, $path)) {
                                $aclass = ' active';
                            } elseif ($item->type === 'alias') {
                                $aliasToId = $item->params->get('aliasoptions');

                                if (count($path) > 0 && $aliasToId == $path[count($path) - 1]) {
                                    $aclass = ' active';
                                } elseif (in_array($aliasToId, $path)) {
                                    $aclass = ' alias-parent-active';
                                }
                            }


                            // Если мегаменю - то да, в ином случае - по старому!!!!!!!!!!!!!!!!
                            if ($item->params->get('multicol_start'))
                                $megamenu = true;

                            if ($item->level == 1) {
                                if ($item->params->get('multicol_start')) {
                                    $finish = '</ul></div> </div></div> </div></li></ul></li>';
                                    ?>
                                <li class="dropdown mega-menu">
                                    <?php
                                    // Render the menu item.
                                    switch ($item->type) :
                                        case 'separator':
                                        case 'url':
                                        case 'component':
                                        case 'heading':
                                            require JModuleHelper::getLayoutPath('mod_menu', 'megamenu_' . $item->type);
                                            break;

                                        default:
                                            require JModuleHelper::getLayoutPath('mod_menu', 'megamenu_url');
                                            break;
                                    endswitch;
                                    ?> 
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="row">
                                                <div class="hidden-xs hidden-sm hidden-md col-lg-2">
                                                    <img src="<?php echo $item->menu_image; ?>" alt="<?php echo $item->title; ?>" />
                                                </div>

                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
                                                    <div class="row">

            <?php
        } else {
            $finish = '</ul></li>';
            ?>

                                                        <li class="dropdown<?php echo $aclass; ?>">
                                                        <?php
                                                        // Render the menu item.
                                                        switch ($item->type) :
                                                            case 'separator':
                                                            case 'url':
                                                            case 'component':
                                                            case 'heading':
                                                                require JModuleHelper::getLayoutPath('mod_menu', 'megamenu_' . $item->type);
                                                                break;

                                                            default:
                                                                require JModuleHelper::getLayoutPath('mod_menu', 'megamenu_url');
                                                                break;
                                                        endswitch;
                                                        ?> 
                                                            <ul class="dropdown-menu">
                                                            <?php
                                                        }
                                                    }
                                                    if ($item->level == 2) {
                                                        if ($megamenu) {
                                                            ?>
                                                                <div class="col-sm-4">
                                                                    <h4><?php echo $item->title; ?></h4>
                                                                    <ul class="menu">

                                                            <?php } else {
                                                                ?>
                                                                        <li>
            <?php
            // Render the menu item.
            switch ($item->type) :
                case 'separator':
                case 'url':
                case 'component':
                case 'heading':
                    require JModuleHelper::getLayoutPath('mod_menu', 'megamenu_' . $item->type);
                    break;

                default:
                    require JModuleHelper::getLayoutPath('mod_menu', 'megamenu_url');
                    break;
            endswitch;
            ?> 

                                                                        </li>
                                                                            <?php
                                                                        }
                                                                    }

                                                                    if ($item->level == 3) {
                                                                        ?>
                                                                    <li>
                                                                    <?php
                                                                    // Render the menu item.
                                                                    //<a href="page-about.html"><i class="icon-right-open"></i>About Us</a>
                                                                    switch ($item->type) :
                                                                        case 'separator':
                                                                        case 'url':
                                                                        case 'component':
                                                                        case 'heading':
                                                                            require JModuleHelper::getLayoutPath('mod_menu', 'megamenu_' . $item->type);
                                                                            break;

                                                                        default:
                                                                            require JModuleHelper::getLayoutPath('mod_menu', 'megamenu_url');
                                                                            break;
                                                                    endswitch;
                                                                    ?> 
                                                                    </li>                             
                                                                        <?php
                                                                    }

                                                                    if ($item->shallower && (($item->level - $item->level_diff) == 2)) {
                                                                        if ($megamenu) {
                                                                            ?>
                                                                    </ul>
                                                                </div>
                                                                    <?php } else {
                                                                        ?>
                                                            </ul>
                                                                        <?php
                                                                    }
                                                                }

                                                                if ($item->shallower && (($item->level - $item->level_diff) == 1)) {
                                                                    echo $finish;
                                                                    $megamenu = false;
                                                                }
                                                            }
                                                            ?>

                                                </ul>
                                        </div>

                                    </div>
                                    </nav>
                                    <!-- navbar end -->

                                </div>
                                <!-- main-navigation end -->
