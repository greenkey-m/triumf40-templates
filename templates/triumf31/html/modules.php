<?php

/**
 * @package     Joomla.Administrator
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

/**
 * This is a file to add template specific chrome to module rendering.  To use it you would
 * set the style attribute for the given module(s) include in your template to use the style
 * for each given modChrome function.
 *
 * eg.  To render a module mod_test in the submenu style, you would use the following include:
 * <jdoc:include type="module" name="test" style="submenu" />
 *
 * This gives template designers ultimate control over how modules are rendered.
 *
 * NOTICE: All chrome wrapping methods should be named: modChrome_{STYLE} and take the same
 * two arguments.
 */
/*
 * Module chrome for rendering the module in a submenu
 */
function modChrome_no($module, &$params, &$attribs) {
    if ($module->content) {
        echo $module->content;
    }
}

function modChrome_onlytag($module, &$params, &$attribs) {
    $headerTag = htmlspecialchars($params->get('header_tag', 'h3'));
    $headerClass = htmlspecialchars($params->get('header_class', 'page-header'));
    if ($module->showtitle) {
        echo '<' . $headerTag . ' class="' . $headerClass . '">' . $module->title . '</' . $headerTag . '>';
    }

    $moduleTag = $params->get('module_tag', 'div');
    $moduleClass = $params->get('moduleclass_sfx', '');;
    if ($module->content) {
        echo '<'.$moduleTag.' class="'.$moduleClass.'">';
        echo $module->content;
        echo '</'.$moduleTag.' class="'.$moduleClass.'">';
    }
}

function modChrome_section($module, &$params, &$attribs) {
    $moduleTag = $params->get('module_tag', 'div');
    $bootstrapSize = (int) $params->get('bootstrap_size', 0);
    $moduleClass = $bootstrapSize != 0 ? ' span' . $bootstrapSize : '';
    $headerTag = htmlspecialchars($params->get('header_tag', 'h3'));
    $headerClass = htmlspecialchars($params->get('header_class', 'page-header'));

    if ($module->content) {
        echo '<' . $moduleTag . ' class="' . htmlspecialchars($params->get('moduleclass_sfx')) . $moduleClass . '" data-animation-effect="fadeInUpSmall" data-effect-delay="300"><div class="container">';

        if ($module->showtitle) {
            echo '<header class="section-title"><' . $headerTag . ' class="' . $headerClass . '">' . $module->title . '</' . $headerTag . '></header>';
        }

        echo $module->content;
        echo '</div></' . $moduleTag . '>';
    }
}

function modChrome_section_fluid($module, &$params, &$attribs) {
    $moduleTag = $params->get('module_tag', 'div');
    $bootstrapSize = (int) $params->get('bootstrap_size', 0);
    $sectionClass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
    $moduleClass = $bootstrapSize != 0 ? ' col-sm-' . $bootstrapSize : '';
    $headerTag = htmlspecialchars($params->get('header_tag', 'h3'));
    $headerClass = htmlspecialchars($params->get('header_class', 'page-header'));

    if ($module->content) {
        echo '<' . $moduleTag . ' class="' . $sectionClass_sfx . '"><div class="container-fluid">';

        if ($module->showtitle) {
            echo '<header class="section-title"><' . $headerTag . ' class="' . $headerClass . '">' . $module->title . '</' . $headerTag . '></header>';
        }

        echo $module->content;
        echo '</div></' . $moduleTag . '>';
    }
}

function modChrome_row($module, &$params, &$attribs) {
    if ($module->content) {
        echo '<div class="row><div class="col-xs-12">';
        echo $module->content;
        echo '</div></div>';
    }
}

function modChrome_module($module, &$params, &$attribs) {
    $bootstrapSize = (int) $params->get('bootstrap_size', 0);
    $moduleClass = $bootstrapSize != 0 ? ' col-sm-' . $bootstrapSize : 'col-sm-12';
    $headerTag = htmlspecialchars($params->get('header_tag', 'h3'));
    $headerClass = htmlspecialchars($params->get('header_class', 'page-header'));

    if ($module->content) {
        echo '<' . $moduleTag . ' class="' . $moduleClass . '">';

        if ($module->showtitle) {
            echo '<header class="section-title"><' . $headerTag . ' class="' . $headerClass . '">' . $module->title . '</' . $headerTag . '></header>';
        }

        echo $module->content;
        echo '</' . $moduleTag . '>';
    }
}

?>
