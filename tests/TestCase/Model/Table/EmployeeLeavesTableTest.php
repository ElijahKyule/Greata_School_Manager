<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmployeeLeavesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmployeeLeavesTable Test Case
 */
class EmployeeLeavesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EmployeeLeavesTable
     */
    protected $EmployeeLeaves;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.EmployeeLeaves',
        'app.Employees',
        'app.Leaves',
        'app.Measures',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('EmployeeLeaves') ? [] : ['className' => EmployeeLeavesTable::class];
        $this->EmployeeLeaves = $this->getTableLocator()->get('EmployeeLeaves', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->EmployeeLeaves);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
