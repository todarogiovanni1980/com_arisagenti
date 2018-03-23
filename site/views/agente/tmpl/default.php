<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Arisagenti
 * @author     Todaro Giovanni <giovanni.todaro@gmail.com>
 * @copyright  2018 Todaro Giovanni
 * @license    GNU General Public License versione 2 o successiva; vedi LICENSE.txt
 */
// No direct access
defined('_JEXEC') or die;

$canEdit = JFactory::getUser()->authorise('core.edit', 'com_arisagenti.' . $this->item->id);

if (!$canEdit && JFactory::getUser()->authorise('core.edit.own', 'com_arisagenti' . $this->item->id))
{
	$canEdit = JFactory::getUser()->id == $this->item->created_by;
}
?>

<div class="item_fields">

	<table class="table">
		

		<tr>
			<th><?php echo JText::_('COM_ARISAGENTI_FORM_LBL_AGENTE_CODICE'); ?></th>
			<td><?php echo $this->item->codice; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ARISAGENTI_FORM_LBL_AGENTE_NOME'); ?></th>
			<td><?php echo $this->item->nome; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ARISAGENTI_FORM_LBL_AGENTE_CDATA'); ?></th>
			<td><?php echo $this->item->cdata; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ARISAGENTI_FORM_LBL_AGENTE_MDATA'); ?></th>
			<td><?php echo $this->item->mdata; ?></td>
		</tr>

	</table>

</div>

<?php if($canEdit && $this->item->checked_out == 0): ?>

	<a class="btn" href="<?php echo JRoute::_('index.php?option=com_arisagenti&task=agente.edit&id='.$this->item->id); ?>"><?php echo JText::_("COM_ARISAGENTI_EDIT_ITEM"); ?></a>

<?php endif; ?>

<?php if (JFactory::getUser()->authorise('core.delete','com_arisagenti.agente.'.$this->item->id)) : ?>

	<a class="btn btn-danger" href="#deleteModal" role="button" data-toggle="modal">
		<?php echo JText::_("COM_ARISAGENTI_DELETE_ITEM"); ?>
	</a>

	<div id="deleteModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h3><?php echo JText::_('COM_ARISAGENTI_DELETE_ITEM'); ?></h3>
		</div>
		<div class="modal-body">
			<p><?php echo JText::sprintf('COM_ARISAGENTI_DELETE_CONFIRM', $this->item->id); ?></p>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal">Close</button>
			<a href="<?php echo JRoute::_('index.php?option=com_arisagenti&task=agente.remove&id=' . $this->item->id, false, 2); ?>" class="btn btn-danger">
				<?php echo JText::_('COM_ARISAGENTI_DELETE_ITEM'); ?>
			</a>
		</div>
	</div>

<?php endif; ?>