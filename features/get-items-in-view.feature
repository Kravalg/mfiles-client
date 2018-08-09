Feature: Get items in a view

  Scenario: I get items in a view
  When I get items from view
    Then it should return a valid Get Items From View response
    Then it should exist a valid items
    Then it should exist a valid view mode info
    Then it should exist a valid folder UI state
    Then it should exist a valid view path infos
    Then it should exist a valid folder defs