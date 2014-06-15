<div class="matches view">
<h2><?php echo __('Match'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($match['Match']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Team1'); ?></dt>
		<dd>
			<?php echo h($match['Match']['team1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Team2'); ?></dt>
		<dd>
			<?php echo h($match['Match']['team2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Team1 Result'); ?></dt>
		<dd>
			<?php echo h($match['Match']['team1_result']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Team2 Result'); ?></dt>
		<dd>
			<?php echo h($match['Match']['team2_result']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($match['Match']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($match['Match']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Match'), array('action' => 'edit', $match['Match']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Match'), array('action' => 'delete', $match['Match']['id']), array(), __('Are you sure you want to delete # %s?', $match['Match']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Matches'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Match'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Predictions'), array('controller' => 'predictions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prediction'), array('controller' => 'predictions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Predictions'); ?></h3>
	<?php if (!empty($match['Prediction'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Match Id'); ?></th>
		<th><?php echo __('Team1 Score'); ?></th>
		<th><?php echo __('Team2 Score'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($match['Prediction'] as $prediction): ?>
		<tr>
			<td><?php echo $prediction['id']; ?></td>
			<td><?php echo $prediction['user_id']; ?></td>
			<td><?php echo $prediction['match_id']; ?></td>
			<td><?php echo $prediction['team1_score']; ?></td>
			<td><?php echo $prediction['team2_score']; ?></td>
			<td><?php echo $prediction['created']; ?></td>
			<td><?php echo $prediction['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'predictions', 'action' => 'view', $prediction['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'predictions', 'action' => 'edit', $prediction['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'predictions', 'action' => 'delete', $prediction['id']), array(), __('Are you sure you want to delete # %s?', $prediction['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Prediction'), array('controller' => 'predictions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
