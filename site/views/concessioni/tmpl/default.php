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
?>
<script type="text/javascript">
    function deleteItem(item_id){
        if(confirm("<?php echo JText::_('COM_AMMAPERTA_DELETE_MESSAGE'); ?>")){
            document.getElementById('form-concessione-delete-' + item_id).submit();
        }
    }
</script>

<div class="items">
    <table class="items_list">
	<thead>
		<tr>
		<th>Beneficiario</th>
		<th>Dati Fiscali</th>
		<th>Titolo - Norma</th>
		<th>Importo</th>
		<th>Modalit&agrave; di assegnazione</th>
		<th>Ufficio</th>
		<th>Responsabile</th>
		<th>Allegato</th>
		</tr>
	</thead>
	<tbody>
<?php $show = false; ?>
        <?php foreach ($this->items as $item) : ?>

            
				<?php
					if($item->state == 1 || ($item->state == 0 && JFactory::getUser()->authorise('core.edit.own',' com_ammaperta'))):
						$show = true;
						?>
						<tr>
							<td><?php echo $item->beneficiario; ?></td>
							<td><?php echo $item->datifiscali; ?></td>
							<td><?php echo $item->incarico; ?></td>
							<td>€ <?php echo $item->importo; ?></td>
							<td><?php echo $item->assegnazione; ?></td>
							<td><?php echo $item->ufficio; ?></td>
							<td><?php echo $item->responsabile; ?></td>
							<?php 
				$uploadPath = 'concessioni_allegati' . DIRECTORY_SEPARATOR . $item->allegato;
			?>
			<td><a href="<?php echo JRoute::_(JUri::base() . $uploadPath, false); ?>" target="_blank">Documento</a></td>
							</tr>
						<?php endif; ?>

<?php endforeach; ?>
	</tbody>
	</table>
        <?php
        if (!$show):
            echo JText::_('COM_AMMAPERTA_NO_ITEMS');
        endif;
        ?>
   
</div>
<?php if ($show): ?>
    <div class="pagination">
        <p class="counter">
            <?php echo $this->pagination->getPagesCounter(); ?>
        </p>
        <?php echo $this->pagination->getPagesLinks(); ?>
    </div>
<?php endif; ?>

