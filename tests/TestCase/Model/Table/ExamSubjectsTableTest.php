<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExamSubjectsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExamSubjectsTable Test Case
 */
class ExamSubjectsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ExamSubjectsTable
     */
    protected $ExamSubjects;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ExamSubjects',
        'app.Exams',
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
        $config = $this->getTableLocator()->exists('ExamSubjects') ? [] : ['className' => ExamSubjectsTable::class];
        $this->ExamSubjects = $this->getTableLocator()->get('ExamSubjects', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ExamSubjects);

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
