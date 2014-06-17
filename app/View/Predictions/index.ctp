<div class="predictions index">
	<h2><?php echo __('Predictions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('match_id'); ?></th>
			<th><?php echo $this->Paginator->sort('score', 'Predicted Result' ); ?></th>
			<th><?php echo $this->Paginator->sort('Match.result', 'Actual Result' ); ?></th>
			<th><?php echo $this->Paginator->sort('points'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php if ( sizeOf( $predictions ) > 0 ) { ?>
		<?php foreach ($predictions as $prediction): ?>
			<tr>
				<td><?php echo h($prediction['Match']['title']); ?>&nbsp;</td>
				<td><?php echo h($prediction['Prediction']['score']); ?>&nbsp;</td>
				<td><?php echo h($prediction['Match']['result']); ?>&nbsp;</td>
				<td><?php echo h($prediction['Prediction']['points']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $prediction['Prediction']['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $prediction['Prediction']['id']), array(), __('Are you sure you want to delete # %s?', $prediction['Prediction']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		<?php } else { ?>
			<tr>
				<td colspan="5">No predictions found. Would you like to <?php echo $this->Html->link(__('add a prediction'), array('controller' => 'predictions', 'action' => 'add' )); ?>?</td>
			</tr>
		<?php } ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<?php echo $this->element('sidebar'); ?>
