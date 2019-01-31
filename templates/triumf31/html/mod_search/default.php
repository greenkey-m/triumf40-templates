<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_search
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

// Including fallback code for the placeholder attribute in the search field.
JHtml::_('jquery.framework');
JHtml::_('script', 'system/html5fallback.js', false, true);

if ($width) {
    $moduleclass_sfx .= ' ' . 'mod_search' . $module->id;
    $css = 'div.mod_search' . $module->id . ' input[type="search"]{ width:auto; }';
    JFactory::getDocument()->addStyleDeclaration($css);
    $width = ' size="' . $width . '"';
} else {
    $width = '';
}
?>

<div class="btn-group dropdown search<?php echo $moduleclass_sfx ?>">
    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="fa fa-search"></i> Поиск</button>
    <ul class="dropdown-menu dropdown-menu-right dropdown-animation">
        <li>
            <form action="<?php echo JRoute::_('index.php'); ?>" method="post" role="search" class="search-box">
                <div class="form-group has-feedback">

                    <?php
                    //$output = '<label for="mod-search-searchword" class="element-invisible">' . $label . '</label> ';
                    $output = '<input name="searchword" id="mod-search-searchword" maxlength="' . $maxlength . '"  class="form-control inputbox search-query" type="search"' . $width;
                    $output .= ' placeholder="' . $text . '" />';

                    if ($button) :
                        if ($imagebutton) :
                            $btn_output = ' <input type="image" alt="' . $button_text . '" class="button" src="' . $img . '" onclick="this.form.searchword.focus();"/>';
                        else :
                            $btn_output = ' <button class="button btn btn-primary" onclick="this.form.searchword.focus();">' . $button_text . '</button>';
                        endif;

                        switch ($button_pos) :
                            case 'top' :
                                $output = $btn_output . '<br />' . $output;
                                break;

                            case 'bottom' :
                                $output .= '<br />' . $btn_output;
                                break;

                            case 'right' :
                                $output .= $btn_output;
                                break;

                            case 'left' :
                            default :
                                $output = $btn_output . $output;
                                break;
                        endswitch;

                    endif;

                    echo $output;
                    ?>
                    <i class="fa fa-search form-control-feedback"></i>
                    <input type="hidden" name="task" value="search" />
                    <input type="hidden" name="option" value="com_search" />
                    <input type="hidden" name="Itemid" value="<?php echo $mitemid; ?>" />
                </div>
            </form>
        </li>
    </ul>
</div>

