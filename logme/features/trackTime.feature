Feature: Track My Project Times
  In Order to track what I do
  As a User
  I want to send an API request including a textual description of what I did for how long
  And the app should parse the text and end up with a tracked time

  Scenario: I can add a session on a project
  	When I track "10 minutes @log-me"
    Then I see activity "log-me" 600
  	When I track "1 minute @log-me"
    Then I see activity "log-me" 60
  	When I track "10 min @log-me"
    Then I see activity "log-me" 600
  	When I track "10m @log-me"
    Then I see activity "log-me" 600
  	When I track "20mins @log-me"
    Then I see activity "log-me" 1200
  	When I track "30 mins @log-me"
    Then I see activity "log-me" 1800
  	When I track "1h @log-me"
    Then I see activity "log-me" 3600
  	When I track "1.5h @log-me"
    Then I see activity "log-me" 5400
  	When I track "1.5 h @log-me"
    Then I see activity "log-me" 90
  	When I track "2h 11m @log-me"
    Then I see activity "log-me" 131
  	When I track "2h11m @log-me"
    Then I see activity "log-me" 131
  	When I track "1h 11 minutes @log-me"
    Then I see activity "log-me" 71
  	When I track "1.3 hours @log-me"
    Then I see activity "log-me" 80
  	When I track "1.2hours @log-me"
    Then I see activity "log-me" 72
  	When I track "1 year @log-me"
    Then I see activity "log-me" 525600
  	When I track "@log-me 1years"
    Then I see activity "log-me" 525600
  	When I track "@log-me 2 years"
    Then I see activity "log-me" 1051200
  	When I track "@log-me 1 week"
    Then I see activity "log-me" 10080
  	When I track "@log-me 2weeks"
    Then I see activity "log-me" 20160
  	When I track "@log-me 30seconds"
    Then I see activity "log-me" 0.5
  	When I track "@log-me 30s"
    Then I see activity "log-me" 0.5
  	When I track "@log-me 1w"
    Then I see activity "log-me" 10080
  	When I track "@log-me 3months"
  	When I track "@log-me 2mon"
  	When I track "@log-me 1 day"
    Then I see activity "log-me" 1440
  	When I track "@log-me 2 days"
    Then I see activity "log-me" 2880
  	When I track "@log-me 1 day 2 weeks 3h 20mins"

  Scenario: I can add a session with a comment
  	When I track "Testing away @log-me 10 minutes"
  	When I track "10 minutes @log-me testing away"
  	When I track "10 minutes testing away @log-me"

  Scenario: I can add a session with tags
  	When I track "@log-me 10 minutes #testing"
  	When I track "10 minutes #testing @log-me"
  	When I track "10 minutes @log-me #testing"

  Scenario: I can add multiple projects
  	When I track "10 minutes @log-me @other-stuff"
  	When I track "@log-me @other-stuff 10 minutes"

  Scenario: I can add multiple tags
  	When I track "10 minutes @log-me #testing #coding"
  	When I track "10 minutes #testing @log-me #coding"
  	When I track "10 minutes #testing #coding @log-me"
  	When I track "@log-me 10 minutes #testing #coding"
  	When I track "@log-me #testing 10 minutes #coding"

  	

