<?php
/**
 * @version     1.0.0
 * @package     com_ammaperta
 * @copyright   Copyright (C) 2014 Jecko Development. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Luca Marzo <info@jeckodevelopment.com> - http://www.jeckodevelopment.com
 */
// no direct access
defined('_JEXEC') or die;

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.keepalive');
// Import CSS
$document = JFactory::getDocument();
$document->addStyleSheet('components/com_ammaperta/assets/css/ammaperta.css');
?>
<script type="text/javascript">
    function getScript(url,success) {
        var script = document.createElement('script');
        script.src = url;
        var head = document.getElementsByTagName('head')[0],
        done = false;
        // Attach handlers for all browsers
        script.onload = script.onreadystatechange = function() {
            if (!done && (!this.readyState
                || this.readyState == 'loaded'
                || this.readyState == 'complete')) {
                done = true;
                success();
                script.onload = script.onreadystatechange = null;
                head.removeChild(script);
            }
        };
        head.appendChild(script);
    }
    getScript('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js',function() {
        js = jQuery.noConflict();
        js(document).ready(function(){
            

            Joomla.submitbutton = function(task)
            {
                if (task == 'concessione.cancel') {
                    Joomla.submitform(task, document.getElementById('concessione-form'));
                }
                else{
                    
				js = jQuery.noConflict();
				if(js('#jform_allegato').val() != ''){
					js('#jform_allegato_hidden').val(js('#jform_allegato').val());
				}
				if (js('#jform_allegato').val() == '' && js('#jform_allegato_hidden').val() == '') {
					alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
					return;
				}
                    if (task != 'concessione.cancel' && document.formvalidator.isValid(document.id('concessione-form'))) {
                        
                        Joomla.submitform(task, document.getElementById('concessione-form'));
                    }
                    else {
                        alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
                    }
                }
            }
        });
    });
</script>

<form action="<?php echo JRoute::_('index.php?option=com_ammaperta&layout=edit&id=' . (int) $this->item->id); ?>" method="post" enctype="multipart/form-data" name="adminForm" id="concessione-form" class="form-validate">
    <div class="width-60 fltlft">
        <fieldset class="adminform">
            <legend><?php echo JText::_('COM_AMMAPERTA_LEGEND_CONCESSIONE'); ?></legend>
            <ul class="adminformlist">

                				<li><?php echo $this->form->getLabel('id'); ?>
				<?php echo $this->form->getInput('id'); ?></li>
				<li><?php echo $this->form->getLabel('state'); ?>
				<?php echo $this->form->getInput('state'); ?></li>
				<li><?php echo $this->form->getLabel('data_pubblicazione'); ?>
				<?php echo $this->form->getInput('data_pubblicazione'); ?></li>

				<?php if(empty($this->item->created_by)){ ?>
					<input type="hidden" name="jform[created_by]" value="<?php echo JFactory::getUser()->id; ?>" />

				<?php } 
				else{ ?>
					<input type="hidden" name="jform[created_by]" value="<?php echo $this->item->created_by; ?>" />

				<?php } ?>				<li><?php echo $this->form->getLabel('beneficiario'); ?>
				<?php echo $this->form->getInput('beneficiario'); ?></li>
				<li><?php echo $this->form->getLabel('datifiscali'); ?>
				<?php echo $this->form->getInput('datifiscali'); ?></li>
				<li><?php echo $this->form->getLabel('incarico'); ?>
				<?php echo $this->form->getInput('incarico'); ?></li>
				<li><?php echo $this->form->getLabel('importo'); ?>
				<?php echo $this->form->getInput('importo'); ?></li>
				<li><?php echo $this->form->getLabel('assegnazione'); ?>
				<?php echo $this->form->getInput('assegnazione'); ?></li>
				<li><?php echo $this->form->getLabel('ufficio'); ?>
				<?php echo $this->form->getInput('ufficio'); ?></li>
				<li><?php echo $this->form->getLabel('responsabile'); ?>
				<?php echo $this->form->getInput('responsabile'); ?></li>
				<li><?php echo $this->form->getLabel('allegato'); ?>
				<?php echo $this->form->getInput('allegato'); ?></li>

				<?php if (!empty($this->item->allegato)) : ?>
						<a href="<?php echo JRoute::_(JUri::root() . 'concessioni_allegati' .DIRECTORY_SEPARATOR . $this->item->allegato, false);?>">[View File]</a>
				<?php endif; ?>
				<input type="hidden" name="jform[allegato]" id="jform_allegato_hidden" value="<?php echo $this->item->allegato ?>" />

            </ul>
        </fieldset>
    </div>

    

    <input type="hidden" name="task" value="" />
    <?php echo JHtml::_('form.token'); ?>
    <div class="clr"></div>

    <style type="text/css">
        /* Temporary fix for drifting editor fields */
        .adminformlist li {
            clear: both;
        }
    </style>
</form>