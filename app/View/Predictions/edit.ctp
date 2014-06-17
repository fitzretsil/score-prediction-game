<div class="predictions form">
<?php echo $this->Form->create('Prediction'); ?>
	<fieldset>
		<legend><?php echo __('Edit Prediction'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->hidden('user_id');
		echo $this->Form->hidden('match_id');
		echo $this->Form->input('team1_score');
		echo $this->Form->input('team2_score');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php echo $this->element('sidebar'); ?>
