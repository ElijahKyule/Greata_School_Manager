<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClassroomstatusesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClassroomstatusesTable Test Case
 */
class ClassroomstatusesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ClassroomstatusesTable
     */
    protected $Classroomstatuses;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Classroomstatuses',
        'app.ClassroomStudents',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Classroomstatuses') ? [] : ['className' => ClassroomstatusesTable::class];
        $this->Classroomstatuses = $this->getTableLocator()->get('Classroomstatuses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Classroomstatuses);

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
