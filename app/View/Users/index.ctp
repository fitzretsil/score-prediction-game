<div class="users index">
	<h2><?php echo __('Players Standings'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo __('Position'); ?></th>
			<th><?php echo $this->Paginator->sort('username'); ?></th>
			<th><?php echo __('Points'); ?></th>
			<?php if ( $this->Session->read( 'Auth.User.role' ) == 'admin' ) { ?>
				<th class="actions"><?php echo __('Actions'); ?></th>
			<?php } ?>
	</tr>
	<?php $count = 1; ?>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($count++); ?>&nbsp;</td>
		<td><?php echo $this->Html->link(h($user['User']['username']), array('action' => 'view', $user['User']['id'])); ?>&nbsp;</td>
		<td><?php echo h($user['User']['points']); ?>&nbsp;</td>
		<?php if ( $this->Session->read( 'Auth.User.role' ) == 'admin' ) { ?>
			<td class="actions">
				<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
			</td>
		<?php } ?>
	</tr>
<?php endforeach; ?>
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
