<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StudentActivitiesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StudentActivitiesTable Test Case
 */
class StudentActivitiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StudentActivitiesTable
     */
    protected $StudentActivities;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.StudentActivities',
        'app.Students',
        'app.Activities',
        'app.Statuses',
        'app.Measures',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('StudentActivities') ? [] : ['className' => StudentActivitiesTable::class];
        $this->StudentActivities = $this->getTableLocator()->get('StudentActivities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->StudentActivities);

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
