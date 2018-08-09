Feature: Get root view items

  Scenario: I get root view items
  When I get view items
    Then it should return a valid Get View Items response
    Then it should return a valid Get View Items Item response
    Then it should return a valid Get View Mode Info response
    Then it should return a valid Get Folder UI State response