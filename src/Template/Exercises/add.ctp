<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Exercises'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cards'), ['controller' => 'Cards', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Card'), ['controller' => 'Cards', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="exercises form large-10 medium-9 columns">
    <?= $this->Form->create($exercise) ?>
    <fieldset>
        <legend><?= __('Add Exercise') ?></legend>
        <?php
            echo $this->Form->input('repetition');
            echo $this->Form->input('name');
            echo $this->Form->input('card_id', ['options' => $cards]);
            echo $this->Form->input('exercise_column');
            echo $this->Form->input('exercise_order');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
