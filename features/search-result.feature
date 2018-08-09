Feature: Search result

  Scenario: I get search result
    When I get search result
    Then it should return a valid Search Result response
    Then it should exist a valid Search object
    Then it should exist a valid search version object
    Then it should exist a valid search objects object