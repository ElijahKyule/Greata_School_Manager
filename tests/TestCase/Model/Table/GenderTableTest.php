<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GenderTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GenderTable Test Case
 */
class GenderTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GenderTable
     */
    protected $Gender;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Gender',
        'app.Students',
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
        $config = $this->getTableLocator()->exists('Gender') ? [] : ['className' => GenderTable::class];
        $this->Gender = $this->getTableLocator()->get('Gender', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Gender);

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
