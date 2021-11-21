<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StudentSubjectMarksTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StudentSubjectMarksTable Test Case
 */
class StudentSubjectMarksTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StudentSubjectMarksTable
     */
    protected $StudentSubjectMarks;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.StudentSubjectMarks',
        'app.Students',
        'app.StudentSubjects',
        'app.Exams',
        'app.Classrooms',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('StudentSubjectMarks') ? [] : ['className' => StudentSubjectMarksTable::class];
        $this->StudentSubjectMarks = $this->getTableLocator()->get('StudentSubjectMarks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->StudentSubjectMarks);

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
