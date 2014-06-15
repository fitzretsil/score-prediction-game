<div class="matches form">
<?php echo $this->Form->create('Match'); ?>
	<fieldset>
		<legend><?php echo __('Add Match'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Matches'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Predictions'), array('controller' => 'predictions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prediction'), array('controller' => 'predictions', 'action' => 'add')); ?> </li>
	</ul>
</div>
