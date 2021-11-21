<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FeeStructureTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FeeStructureTable Test Case
 */
class FeeStructureTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FeeStructureTable
     */
    protected $FeeStructure;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.FeeStructure',
        'app.Fees',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('FeeStructure') ? [] : ['className' => FeeStructureTable::class];
        $this->FeeStructure = $this->getTableLocator()->get('FeeStructure', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->FeeStructure);

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
