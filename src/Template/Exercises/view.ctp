<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Exercise'), ['action' => 'edit', $exercise->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Exercise'), ['action' => 'delete', $exercise->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exercise->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Exercises'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exercise'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cards'), ['controller' => 'Cards', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Card'), ['controller' => 'Cards', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="exercises view large-10 medium-9 columns">
    <h2><?= h($exercise->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Repetition') ?></h6>
            <p><?= h($exercise->repetition) ?></p>
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($exercise->name) ?></p>
            <h6 class="subheader"><?= __('Card') ?></h6>
            <p><?= $exercise->has('card') ? $this->Html->link($exercise->card->id, ['controller' => 'Cards', 'action' => 'view', $exercise->card->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($exercise->id) ?></p>
            <h6 class="subheader"><?= __('Exercise Column') ?></h6>
            <p><?= $this->Number->format($exercise->exercise_column) ?></p>
            <h6 class="subheader"><?= __('Exercise Order') ?></h6>
            <p><?= $this->Number->format($exercise->exercise_order) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($exercise->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($exercise->modified) ?></p>
        </div>
    </div>
</div>
