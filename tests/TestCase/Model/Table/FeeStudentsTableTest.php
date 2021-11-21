<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FeeStudentsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FeeStudentsTable Test Case
 */
class FeeStudentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FeeStudentsTable
     */
    protected $FeeStudents;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.FeeStudents',
        'app.Students',
        'app.Fees',
        'app.Paymentmodes',
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
        $config = $this->getTableLocator()->exists('FeeStudents') ? [] : ['className' => FeeStudentsTable::class];
        $this->FeeStudents = $this->getTableLocator()->get('FeeStudents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->FeeStudents);

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
