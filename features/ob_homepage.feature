Feature: Onebitmedia homepage
  I want to see Onebitmedia homepage
  As a potential client
  I want to know what kind of company is Onebitmedia

  Scenario: Browsing Onebitmedia homepage
    Given I am on "/"
    When I go to "/"
    Then I should see an "section#landingpage.section" element
    Then the "section#landingpage.section" element should contain "PERFECTO !"
    Then the "section#landingpage.section" element should contain "our single orientation for works, business and partnerships"

  Scenario: About page
    Give I am on "/"
    When I go to "#about"
    Then I should see an "section#about.section" element
    Then the "section#about.section" element should contain "about us"
