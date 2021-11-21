<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StudentSubjectsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StudentSubjectsTable Test Case
 */
class StudentSubjectsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StudentSubjectsTable
     */
    protected $StudentSubjects;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.StudentSubjects',
        'app.Students',
        'app.Subjects',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('StudentSubjects') ? [] : ['className' => StudentSubjectsTable::class];
        $this->StudentSubjects = $this->getTableLocator()->get('StudentSubjects', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->StudentSubjects);

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
