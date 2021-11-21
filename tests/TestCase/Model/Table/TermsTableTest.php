<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TermsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TermsTable Test Case
 */
class TermsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TermsTable
     */
    protected $Terms;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Terms',
        'app.Fees',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Terms') ? [] : ['className' => TermsTable::class];
        $this->Terms = $this->getTableLocator()->get('Terms', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Terms);

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
