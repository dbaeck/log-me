<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Laracasts\Behat\Context\DatabaseTransactions;
use Illuminate\Support\Facades\DB;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends \Behat\MinkExtension\Context\MinkContext implements Context, SnippetAcceptingContext
{
    use DatabaseTransactions;
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @When I track :arg1
     */
    public function iTrack($arg1)
    {
        $this->visit('');
        $this->fillField('activity', $arg1);
        $this->pressButton('submit');
    }

    public function iSeeInDatabase($table, array $values)
    {
        $cnt = DB::table($table)->where($values)->count();

        if($cnt < 1)
        {
            throw new Exception(
                "could not find values [" . implode(',', $values) . "] in table " . $table . " in database"
            );
        }
    }

    /**
     * @Then I see activity :project :value
     */
    public function iSeeActivity($project, $value)
    {
        $project = \App\Project::where('title', $project)->firstOrFail();

        return $this->iSeeInDatabase('activities', ['project_id' => $project->id, 'value' => $value]);
    }
}
