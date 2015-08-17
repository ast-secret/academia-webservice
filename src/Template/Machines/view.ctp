<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Machine'), ['action' => 'edit', $machine->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Machine'), ['action' => 'delete', $machine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $machine->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Machines'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Machine'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Gyms'), ['controller' => 'Gyms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gym'), ['controller' => 'Gyms', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="machines view large-10 medium-9 columns">
    <h2><?= h($machine->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Gym') ?></h6>
            <p><?= $machine->has('gym') ? $this->Html->link($machine->gym->name, ['controller' => 'Gyms', 'action' => 'view', $machine->gym->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($machine->name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($machine->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($machine->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($machine->modified) ?></p>
        </div>
    </div>
</div>
