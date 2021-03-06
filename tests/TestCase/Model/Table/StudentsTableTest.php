<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StudentsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StudentsTable Test Case
 */
class StudentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StudentsTable
     */
    protected $Students;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Students',
        'app.Genders',
        'app.Statuses',
        'app.Classroomstatuses',
        'app.ClassroomStudents',
        'app.FeeStudents',
        'app.Messages',
        'app.Payments',
        'app.StudentActivities',
        'app.StudentSubjectMarks',
        'app.StudentSubjects',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Students') ? [] : ['className' => StudentsTable::class];
        $this->Students = $this->getTableLocator()->get('Students', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Students);

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
