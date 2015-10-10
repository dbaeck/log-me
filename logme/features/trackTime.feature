Feature: Track My Project Times
  In Order to track what I do
  As a User
  I want to send an API request including a textual description of what I did for how long
  And the app should parse the text and end up with a tracked time

  Scenario: I can add a session on a project
  	"10 minutes @log-me"
  	"1 minute @log-me"
  	"10 min @log-me"
  	"10m @log-me"
  	"20mins @log-me"
  	"30 mins @log-me"
  	"1h @log-me"
  	"1.5h @log-me"
  	"1.5 h @log-me"
  	"2h 11m @log-me"
  	"2h11m @log-me"
  	"1h 11 minutes @log-me"
  	"1.3 hours @log-me"
  	"1.2hours @log-me"
  	"1 year @log-me"
  	"@log-me 1years"
  	"@log-me 2 years"
  	"@log-me 1 week"
  	"@log-me 2weeks"
  	"@log-me 30seconds"
  	"@log-me 30s"
  	"@log-me 1w"
  	"@log-me 3months"
  	"@log-me 2mon"
  	"@log-me 1 day"
  	"@log-me 2 days"
  	"@log-me 1 day 2 weeks 3h 20mins"

  Scenario: I can add a session with a comment
  	"Testing away @log-me 10 minutes"
  	"10 minutes @log-me testing away"
  	"10 minutes testing away @log-me"

  Scenario: I can add a session with tags
  	"@log-me 10 minutes #testing"
  	"10 minutes #testing @log-me"
  	"10 minutes @log-me #testing"

  Scenario: I can add multiple projects
  	"10 minutes @log-me @other-stuff"
  	"@log-me @other-stuff 10 minutes"

  Scenario: I can add multiple tags
  	"10 minutes @log-me #testing #coding"
  	"10 minutes #testing @log-me #coding"
  	"10 minutes #testing #coding @log-me"
  	"@log-me 10 minutes #testing #coding"
  	"@log-me #testing 10 minutes #coding"

  	

