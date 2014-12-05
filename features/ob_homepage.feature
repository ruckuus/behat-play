Feature: Onebitmedia homepage
  I want to see Onebitmedia homepage
  As a potential client
  I want to know what kind of company is Onebitmedia

  Scenario: Browsing Onebitmedia homepage
    Given I am on "/"
    When I go to "/"
    Then I should see an "section#landingpage.section" element
    Then the "#landingpage>h1" element should contain "PERFECTO !"
    Then the "section#landingpage.section" element should contain "our single orientation for works, business and partnerships"

  Scenario: About page
    Given I am on "/"
    When I go to "#about"
    Then I should see an "section#about.section" element
    Then the "#about>h2" element should contain "about us"

  Scenario: Onebit team
    Given I am on "/"
    When I go to "#team"
    Then I should see an "section#team.section" element
    Then I should see an element with xpath ".//*[@id='team']/div[1]/div[1]/span[1]"
    Then the "#team>h2" element should contain "our team"
    Then the "ceo_section" selected element by xpath should contain "Fachry Bafadal"
    Then the "art_director_section" selected element by xpath should contain "Adrianus Nugroho"
    Then the "sr_software_dev" selected element by xpath should contain "Akhyar Amarullah"

  Scenario: Click "see our work" link
    Give I am on "/"
    When I click "mobile_link" by xpath link
    Then the "porto_socialplay" selected element by xpath should contain "SocialPlay"

