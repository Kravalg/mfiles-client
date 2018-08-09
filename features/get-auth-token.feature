Feature: Get auth token

  Scenario: I can get a auth token so that client can login in an App without having access to MFiles password
  When I get an auth token
  Then it should return a valid Get Auth Token response