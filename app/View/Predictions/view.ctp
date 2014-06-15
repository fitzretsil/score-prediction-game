<div class="predictions view">
<h2><?php echo __('Prediction'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($prediction['Prediction']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($prediction['User']['id'], array('controller' => 'users', 'action' => 'view', $prediction['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Match Id'); ?></dt>
		<dd>
			<?php echo h($prediction['Prediction']['match_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Team1 Score'); ?></dt>
		<dd>
			<?php echo h($prediction['Prediction']['team1_score']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Team2 Score'); ?></dt>
		<dd>
			<?php echo h($prediction['Prediction']['team2_score']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($prediction['Prediction']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($prediction['Prediction']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Prediction'), array('action' => 'edit', $prediction['Prediction']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Prediction'), array('action' => 'delete', $prediction['Prediction']['id']), array(), __('Are you sure you want to delete # %s?', $prediction['Prediction']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Predictions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prediction'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
