<div class="matches view">
<h2><?php echo h($match['Match']['title']); ?></h2>
	<dl>
		<dt><?php echo __('Result'); ?></dt>
		<dd>
			<?php echo h($match['Match']['team1_result']); ?>
			&nbsp;-&nbsp;
			<?php echo h($match['Match']['team2_result']); ?>
		</dd>
	</dl>
	
	<div class="related">
		<br />
		<h3><?php echo __('Match Predictions'); ?></h3>
		<?php if (!empty($match['Prediction'])): ?>
			<table cellpadding = "0" cellspacing = "0">
			<tr>
				<th><?php echo __('Player'); ?></th>
				<th><?php echo __('Predicted Score'); ?></th>
			</tr>
			<?php foreach ($match['Prediction'] as $prediction): ?>
				<tr>
					<td><?php echo $prediction['User']['username']; ?></td>
					<td>
						<?php echo $prediction['team1_score']; ?>
						&nbsp;-&nbsp;
						<?php echo $prediction['team2_score']; ?>
					</td>
				</tr>
			<?php endforeach; ?>
			</table>
		<?php endif; ?>
	</div>
</div>
<?php echo $this->element('sidebar'); ?>
