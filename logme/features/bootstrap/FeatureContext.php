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
        $this->rollback();
        $this->beginTransaction();
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

    /**
     * @Then I see activity :project with comment :value
     */
    public function iSeeActivityWithComment($project, $value)
    {
        $project = \App\Project::where('title', $project)->firstOrFail();

        return $this->iSeeInDatabase('activities', ['project_id' => $project->id, 'comment' => $value]);
    }

    /**
     * @Then I see activity :project with value
     */
    public function iSeeActivityWithValue($project)
    {
        $project = \App\Project::where('title', $project)->firstOrFail();

        $cnt = DB::table('activities')->where(['project_id' => $project->id])->where('value', '>', 0)->count();

        if($cnt < 1)
        {
            throw new Exception(
                "could not find an activity for project " . $project->title . " having a value greater 0"
            );
        }

    }

    /**
     * @Then I see activity :project with tag :tag
     */
    public function iSeeActivityWithTag($project, $tag)
    {
        $project = \App\Project::where('title', $project)->firstOrFail();
        $tag = \App\Tag::where('title', $tag)->firstOrFail();

        $activity = \App\Activity::where(['project_id' => $project->id])->orderBy('created_at', 'desc')->limit(1)->firstOrFail();
        $cnt = $activity->tags()->where('tags.id', $tag->id)->count();

        if($cnt < 1)
        {
            throw new Exception(
                "could not find an activity for project " . $project->title . " having a value greater 0"
            );
        }

    }
}
