<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Exercise'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cards'), ['controller' => 'Cards', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Card'), ['controller' => 'Cards', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="exercises index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('repetition') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('card_id') ?></th>
            <th><?= $this->Paginator->sort('exercise_column') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($exercises as $exercise): ?>
        <tr>
            <td><?= $this->Number->format($exercise->id) ?></td>
            <td><?= h($exercise->repetition) ?></td>
            <td><?= h($exercise->created) ?></td>
            <td><?= h($exercise->modified) ?></td>
            <td><?= h($exercise->name) ?></td>
            <td>
                <?= $exercise->has('card') ? $this->Html->link($exercise->card->id, ['controller' => 'Cards', 'action' => 'view', $exercise->card->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($exercise->exercise_column) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $exercise->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $exercise->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $exercise->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exercise->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
