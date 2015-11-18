<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RegidsFixture
 *
 */
class RegidsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'uuid' => ['type' => 'string', 'length' => 120, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'regid' => ['type' => 'string', 'length' => 200, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'platform' => ['type' => 'string', 'length' => 24, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'gym_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_regids_gyms1_idx' => ['type' => 'index', 'columns' => ['gym_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_regids_gyms1' => ['type' => 'foreign', 'columns' => ['gym_id'], 'references' => ['gyms', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'uuid' => 'Lorem ipsum dolor sit amet',
            'regid' => 'Lorem ipsum dolor sit amet',
            'platform' => 'Lorem ipsum dolor sit ',
            'gym_id' => 1,
            'created' => '2015-11-17 20:44:05'
        ],
    ];
}
