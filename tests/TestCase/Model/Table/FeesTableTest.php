<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FeesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FeesTable Test Case
 */
class FeesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FeesTable
     */
    protected $Fees;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Fees',
        'app.Levels',
        'app.Statuses',
        'app.FeeStructures',
        'app.FeeStudents',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Fees') ? [] : ['className' => FeesTable::class];
        $this->Fees = $this->getTableLocator()->get('Fees', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Fees);

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
