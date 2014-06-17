<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('View Rankings'), array('controller' => 'users', 'action' => 'index' )); ?></li>
			<li><?php echo $this->Html->link(__('Add Prediction'), array('controller' => 'predictions', 'action' => 'add' )); ?></li>
			<li><?php echo $this->Html->link(__('View Predictions'), array('controller' => 'predictions', 'action' => 'index' )); ?></li>
			<li><?php echo $this->Html->link(__('Change Password'), array('controller' => 'users', 'action' => 'edit')); ?></li>
			<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?></li>
		</ul>
<?php if ( $this->Session->read( 'Auth.User.role' ) == 'admin' ) { ?>
		<h3><?php echo __('Admin Actions'); ?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('Add User'), array('controller' => 'users', 'action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('Add Match'), array('controller' => 'matches', 'action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('View Matches'), array('controller' => 'matches', 'action' => 'index')); ?></li>
		</ul>
<?php } ?>
</div>