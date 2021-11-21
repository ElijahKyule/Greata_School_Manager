<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LeavesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LeavesTable Test Case
 */
class LeavesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LeavesTable
     */
    protected $Leaves;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Leaves',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Leaves') ? [] : ['className' => LeavesTable::class];
        $this->Leaves = $this->getTableLocator()->get('Leaves', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Leaves);

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
}
