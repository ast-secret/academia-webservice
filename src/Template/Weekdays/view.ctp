<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Weekday'), ['action' => 'edit', $weekday->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Weekday'), ['action' => 'delete', $weekday->id], ['confirm' => __('Are you sure you want to delete # {0}?', $weekday->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Weekdays'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Weekday'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="weekdays view large-10 medium-9 columns">
    <h2><?= h($weekday->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($weekday->name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($weekday->id) ?></p>
            <h6 class="subheader"><?= __('Weekday') ?></h6>
            <p><?= $this->Number->format($weekday->weekday) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($weekday->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($weekday->modified) ?></p>
        </div>
    </div>
</div>
