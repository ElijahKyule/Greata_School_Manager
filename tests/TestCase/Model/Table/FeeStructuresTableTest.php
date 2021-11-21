<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FeeStructuresTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FeeStructuresTable Test Case
 */
class FeeStructuresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FeeStructuresTable
     */
    protected $FeeStructures;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.FeeStructures',
        'app.Fees',
        'app.FeeStructureParameters',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('FeeStructures') ? [] : ['className' => FeeStructuresTable::class];
        $this->FeeStructures = $this->getTableLocator()->get('FeeStructures', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->FeeStructures);

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
