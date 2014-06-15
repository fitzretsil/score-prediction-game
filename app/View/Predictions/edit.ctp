<div class="predictions form">
<?php echo $this->Form->create('Prediction'); ?>
	<fieldset>
		<legend><?php echo __('Edit Prediction'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('match_id');
		echo $this->Form->input('team1_score');
		echo $this->Form->input('team2_score');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Prediction.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Prediction.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Predictions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
