<?php
namespace App\Test\TestCase\Controller;

use App\Controller\CustomersController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\CustomersController Test Case
 */
class CustomersControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.customers',
        'app.gyms',
        'app.machines',
        'app.phones',
        'app.rooms',
        'app.services',
        'app.times',
        'app.suggestions',
        'app.users',
        'app.roles',
        'app.cards',
        'app.exercises',
        'app.releases'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
