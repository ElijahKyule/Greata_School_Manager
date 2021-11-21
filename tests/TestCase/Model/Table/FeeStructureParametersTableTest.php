<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FeeStructureParametersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FeeStructureParametersTable Test Case
 */
class FeeStructureParametersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FeeStructureParametersTable
     */
    protected $FeeStructureParameters;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.FeeStructureParameters',
        'app.FeeStructures',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('FeeStructureParameters') ? [] : ['className' => FeeStructureParametersTable::class];
        $this->FeeStructureParameters = $this->getTableLocator()->get('FeeStructureParameters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->FeeStructureParameters);

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
