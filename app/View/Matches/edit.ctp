<div class="matches form">
<?php echo $this->Form->create('Match'); ?>
	<fieldset>
		<legend><?php echo __('Edit Match'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('team1');
		echo $this->Form->input('team2');
		echo $this->Form->input('team1_result');
		echo $this->Form->input('team2_result');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Match.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Match.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Matches'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Predictions'), array('controller' => 'predictions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prediction'), array('controller' => 'predictions', 'action' => 'add')); ?> </li>
	</ul>
</div>
