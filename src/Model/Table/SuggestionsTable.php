<?php
namespace App\Model\Table;

use App\Model\Entity\Suggestion;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Suggestions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Gyms
 * @property \Cake\ORM\Association\BelongsTo $Customers
 */
class SuggestionsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('suggestions');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Gyms', [
            'foreignKey' => 'gym_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('text', 'create')
            ->notEmpty('text');

        $validator
            ->add('is_read', 'valid', ['rule' => 'boolean'])
            ->requirePresence('is_read', 'create')
            ->notEmpty('is_read');

        $validator
            ->add('is_star', 'valid', ['rule' => 'boolean'])
            ->requirePresence('is_star', 'create')
            ->notEmpty('is_star');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['gym_id'], 'Gyms'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        return $rules;
    }
}
