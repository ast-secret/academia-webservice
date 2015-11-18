<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RegidsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RegidsTable Test Case
 */
class RegidsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.regids',
        'app.gyms',
        'app.customers',
        'app.cards',
        'app.users',
        'app.roles',
        'app.releases',
        'app.exercises',
        'app.suggestions',
        'app.machines',
        'app.phones',
        'app.rooms',
        'app.services',
        'app.times'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Regids') ? [] : ['className' => 'App\Model\Table\RegidsTable'];
        $this->Regids = TableRegistry::get('Regids', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Regids);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
