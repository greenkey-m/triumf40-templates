<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Marker_class: Class based on the selection of text, none, or icons
 * jicon-text, jicon-none, jicon-icon
 */
?>


<p class="large">
    <?php echo $this->contact->con_position; ?>
</p>
<ul class="list-icons">
    <?php if (($this->params->get('address_check') > 0) &&
            ($this->contact->address || $this->contact->suburb  || $this->contact->state || $this->contact->country || $this->contact->postcode)) : ?>
    <li>
        <i class="fa fa-map-marker pr-10"></i>
            <?php echo ($this->contact->postcode ? $this->contact->postcode.', ':'').
                    ($this->contact->state ? $this->contact->state.', ':'').
                    $this->contact->suburb.', '.nl2br($this->contact->address); ?>
    </li>
    <?php endif; ?>

    <?php if ($this->contact->telephone && $this->params->get('show_telephone')) : ?>
        <li><i class="fa fa-phone pr-10"></i><?php echo nl2br($this->contact->telephone); ?></li>
    <?php endif; ?>

    <?php if ($this->contact->fax && $this->params->get('show_fax')) : ?>
        <li><i class="fa fa-phone pr-10"></i><?php echo nl2br($this->contact->fax); ?></li>
    <?php endif; ?>

    <?php if ($this->contact->mobile && $this->params->get('show_mobile')) :?>
        <li><i class="fa fa-phone pr-10"></i><?php echo nl2br($this->contact->mobile); ?></li>
    <?php endif; ?>
    
    <?php if ($this->contact->webpage && $this->params->get('show_webpage')) : ?>
        <li><i class="fa fa-skype pr-10"></i><?php echo str_replace('http://','', $this->contact->webpage); ?></li>
    <?php endif; ?>

    <?php if ($this->contact->email_to && $this->params->get('show_email')) : ?>
        <li><i class="fa fa-envelope-o pr-10"></i><?php echo $this->contact->email_to; ?></li>
    <?php endif; ?>
        
</ul>
