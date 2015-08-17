<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $time->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $time->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Times'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Services'), ['controller' => 'Services', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Service'), ['controller' => 'Services', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="times form large-10 medium-9 columns">
    <?= $this->Form->create($time) ?>
    <fieldset>
        <legend><?= __('Edit Time') ?></legend>
        <?php
            echo $this->Form->input('weekday');
            echo $this->Form->input('service_id', ['options' => $services]);
            echo $this->Form->input('start_hour');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
