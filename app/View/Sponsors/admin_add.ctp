<div class="sponsors form">
<?php echo $this->Form->create('Sponsor'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Sponsor'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('strap');
		echo $this->Form->input('image_name');
		echo $this->Form->input('website_url');
		echo $this->Form->input('address');
		echo $this->Form->input('telephone');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Sponsors'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Sponsorhits'), array('controller' => 'sponsorhits', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sponsorhit'), array('controller' => 'sponsorhits', 'action' => 'add')); ?> </li>
	</ul>
</div>
