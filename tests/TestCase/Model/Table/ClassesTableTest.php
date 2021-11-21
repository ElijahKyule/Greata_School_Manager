<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClassesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClassesTable Test Case
 */
class ClassesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ClassesTable
     */
    protected $Classes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Classes',
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
        $config = $this->getTableLocator()->exists('Classes') ? [] : ['className' => ClassesTable::class];
        $this->Classes = $this->getTableLocator()->get('Classes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Classes);

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
