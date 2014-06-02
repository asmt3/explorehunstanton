<div class="sponsors view">
<h2><?php echo __('Sponsor'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($sponsor['Sponsor']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($sponsor['Sponsor']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Strap'); ?></dt>
		<dd>
			<?php echo h($sponsor['Sponsor']['strap']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image Name'); ?></dt>
		<dd>
			<?php echo h($sponsor['Sponsor']['image_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Website Url'); ?></dt>
		<dd>
			<?php echo h($sponsor['Sponsor']['website_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($sponsor['Sponsor']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telephone'); ?></dt>
		<dd>
			<?php echo h($sponsor['Sponsor']['telephone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($sponsor['Sponsor']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Sponsor'), array('action' => 'edit', $sponsor['Sponsor']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Sponsor'), array('action' => 'delete', $sponsor['Sponsor']['id']), array(), __('Are you sure you want to delete # %s?', $sponsor['Sponsor']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Sponsors'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sponsor'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sponsorhits'), array('controller' => 'sponsorhits', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sponsorhit'), array('controller' => 'sponsorhits', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Sponsorhits'); ?></h3>
	<?php if (!empty($sponsor['Sponsorhit'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Sponsor Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($sponsor['Sponsorhit'] as $sponsorhit): ?>
		<tr>
			<td><?php echo $sponsorhit['id']; ?></td>
			<td><?php echo $sponsorhit['sponsor_id']; ?></td>
			<td><?php echo $sponsorhit['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'sponsorhits', 'action' => 'view', $sponsorhit['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'sponsorhits', 'action' => 'edit', $sponsorhit['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'sponsorhits', 'action' => 'delete', $sponsorhit['id']), array(), __('Are you sure you want to delete # %s?', $sponsorhit['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Sponsorhit'), array('controller' => 'sponsorhits', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
