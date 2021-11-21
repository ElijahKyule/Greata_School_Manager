<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClassroomActivitiesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClassroomActivitiesTable Test Case
 */
class ClassroomActivitiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ClassroomActivitiesTable
     */
    protected $ClassroomActivities;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ClassroomActivities',
        'app.Classrooms',
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
        $config = $this->getTableLocator()->exists('ClassroomActivities') ? [] : ['className' => ClassroomActivitiesTable::class];
        $this->ClassroomActivities = $this->getTableLocator()->get('ClassroomActivities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ClassroomActivities);

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
