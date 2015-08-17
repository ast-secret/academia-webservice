<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Services'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Gyms'), ['controller' => 'Gyms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Gym'), ['controller' => 'Gyms', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Times'), ['controller' => 'Times', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Time'), ['controller' => 'Times', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="services form large-10 medium-9 columns">
    <?= $this->Form->create($service) ?>
    <fieldset>
        <legend><?= __('Add Service') ?></legend>
        <?php
            echo $this->Form->input('gym_id', ['options' => $gyms]);
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('is_active');
            echo $this->Form->input('duration');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
