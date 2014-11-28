<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

use Behat\MinkExtension\Context\MinkContext;

//
// Require 3rd-party libraries here:
//
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
 * Features context.
 */
class FeatureContext extends MinkContext
{
    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        // Initialize your context here
    }

    /**
     * @Given /^I wait for the suggestion box to appear$/
     */
    public function iWaitForTheSuggestionBoxToAppear()
    {
      $this->getSession()->wait(5000, 
        "$('.suggestions-results').children().length > 0"
      );
    }

    /**
     * @Then /^I should see an element with xpath "([^"]*)"$/
     *
     */
    public function iShouldSeeAnElementWithXpath($xpath)
    {
      if (!$el = $this->seekByXpath($xpath)) {
          throw new \InvalidArgumentException(sprintf('Could not evaluate XPath: "%s"', $xpath));
      }
    }

    /**
     * @Then /^the "([^"]*)" selected element by xpath should contain "([^"]*)"$/
     */
    public function theSelectedElementByXpathShouldContain($xpath, $pattern)
    {
      $element = $this->seekByXpath($xpath);
      $selectedHtml = $element->getHtml();

      if ($selectedHtml != $pattern) {
          throw new \InvalidArgumentException(sprintf('Could not evaluate XPath: "%s"', $xpath));
      }
    }

    /**
     * @When /^I click "([^"]*)" by xpath link$/
     */
    public function iClickByXpathLink($xpath)
    {
      $element = $this->seekByXpath($xpath);
      $element->click();
    }


    public function seekByXpath($xpath)
    {
      $session = $this->getSession(); // get the mink session
      $element = $session->getPage()->find('xpath',$session->getSelectorsHandler()->selectorToXpath('xpath', $xpath)); 

      if (null === $element) {
          throw new \InvalidArgumentException(sprintf('Could not evaluate XPath: "%s"', $xpath));
      }
      return $element;
    }
}
