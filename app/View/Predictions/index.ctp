<div class="predictions index">
	<h2><?php echo __('Predictions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('match_id'); ?></th>
			<th><?php echo $this->Paginator->sort('team1_score'); ?></th>
			<th><?php echo $this->Paginator->sort('team2_score'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($predictions as $prediction): ?>
	<tr>
		<td><?php echo h($prediction['Prediction']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($prediction['User']['id'], array('controller' => 'users', 'action' => 'view', $prediction['User']['id'])); ?>
		</td>
		<td><?php echo h($prediction['Prediction']['match_id']); ?>&nbsp;</td>
		<td><?php echo h($prediction['Prediction']['team1_score']); ?>&nbsp;</td>
		<td><?php echo h($prediction['Prediction']['team2_score']); ?>&nbsp;</td>
		<td><?php echo h($prediction['Prediction']['created']); ?>&nbsp;</td>
		<td><?php echo h($prediction['Prediction']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $prediction['Prediction']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $prediction['Prediction']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $prediction['Prediction']['id']), array(), __('Are you sure you want to delete # %s?', $prediction['Prediction']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Prediction'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
