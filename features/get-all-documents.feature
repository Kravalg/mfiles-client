Feature: Get all documents

  Scenario: I get all documents
  When I get documents
  Then it should return a valid Get Objects response
  Then it should exist a valid mfiles object
  Then it should exist a valid mfiles version object
  Then it should exist a valid files objects