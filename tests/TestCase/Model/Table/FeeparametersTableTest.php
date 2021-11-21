<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FeeparametersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FeeparametersTable Test Case
 */
class FeeparametersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FeeparametersTable
     */
    protected $Feeparameters;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Feeparameters',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Feeparameters') ? [] : ['className' => FeeparametersTable::class];
        $this->Feeparameters = $this->getTableLocator()->get('Feeparameters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Feeparameters);

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
