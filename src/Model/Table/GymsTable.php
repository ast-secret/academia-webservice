<?php
namespace App\Model\Table;

use App\Model\Entity\Gym;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Gyms Model
 *
 * @property \Cake\ORM\Association\HasMany $Customers
 * @property \Cake\ORM\Association\HasMany $Machines
 * @property \Cake\ORM\Association\HasMany $Phones
 * @property \Cake\ORM\Association\HasMany $Rooms
 * @property \Cake\ORM\Association\HasMany $Services
 * @property \Cake\ORM\Association\HasMany $Suggestions
 * @property \Cake\ORM\Association\HasMany $Users
 */
class GymsTable extends Table
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

        $this->table('gyms');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->hasMany('Customers', [
            'foreignKey' => 'gym_id'
        ]);
        $this->hasMany('Machines', [
            'foreignKey' => 'gym_id'
        ]);
        $this->hasMany('Phones', [
            'foreignKey' => 'gym_id'
        ]);
        $this->hasMany('Rooms', [
            'foreignKey' => 'gym_id'
        ]);
        $this->hasMany('Services', [
            'foreignKey' => 'gym_id'
        ]);
        $this->hasMany('Suggestions', [
            'foreignKey' => 'gym_id'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'gym_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name')
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        $validator
            ->allowEmpty('cover_img');

        $validator
            ->requirePresence('logo_img', 'create')
            ->notEmpty('logo_img');

        $validator
            ->requirePresence('slug', 'create')
            ->notEmpty('slug');

        return $validator;
    }
}
