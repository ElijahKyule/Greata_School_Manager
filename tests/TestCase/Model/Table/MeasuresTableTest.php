<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MeasuresTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MeasuresTable Test Case
 */
class MeasuresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MeasuresTable
     */
    protected $Measures;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Measures',
        'app.ClassroomActivities',
        'app.EmployeeLeaves',
        'app.ExamSubjects',
        'app.StudentActivities',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Measures') ? [] : ['className' => MeasuresTable::class];
        $this->Measures = $this->getTableLocator()->get('Measures', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Measures);

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
