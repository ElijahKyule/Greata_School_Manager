<?php
declare(strict_types=1);

namespace Portal\Test\TestCase\Model\Table;

use Cake\TestSuite\TestCase;
use Portal\Model\Table\StudentsTable;

/**
 * Portal\Model\Table\StudentsTable Test Case
 */
class StudentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Portal\Model\Table\StudentsTable
     */
    protected $Students;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'plugin.Portal.Students',
        'plugin.Portal.Genders',
        'plugin.Portal.Statuses',
        'plugin.Portal.Classroomstatuses',
        'plugin.Portal.ClassroomStudents',
        'plugin.Portal.FeeStudents',
        'plugin.Portal.Messages',
        'plugin.Portal.Payments',
        'plugin.Portal.StudentActivities',
        'plugin.Portal.StudentSubjectMarks',
        'plugin.Portal.StudentSubjects',
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
