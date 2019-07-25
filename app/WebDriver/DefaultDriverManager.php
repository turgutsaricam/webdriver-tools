<?php
/**
 * Created by PhpStorm.
 * User: turgutsaricam
 * Date: 25.07.2019
 * Time: 14:40
 */

namespace TurgutSaricam\WebDriverTools\WebDriver;


use TurgutSaricam\WebDriverTools\WebDriver\Base\AbstractDriverManager;
use TurgutSaricam\WebDriverTools\WebDriver\SetupStrategy\Base\AbstractSetupStrategy;

class DefaultDriverManager extends AbstractDriverManager {

    /** @var bool */
    private $coverageEnabled = false;

    /** @var string */
    private $coverageHintingKey;

    /**
     * @param AbstractSetupStrategy $setupStrategy
     * @param bool                  $coverageEnabled    See {@link isCoverageEnabled()}
     * @param string                $coverageHintingKey See {@link getCoverageHintingKey()}
     */
    public function __construct($setupStrategy, bool $coverageEnabled, string $coverageHintingKey) {
        $this->coverageEnabled      = $coverageEnabled;
        $this->coverageHintingKey   = $coverageHintingKey;

        parent::__construct($setupStrategy);
    }

    /**
     * @return bool True if code coverage is enabled.
     */
    protected function isCoverageEnabled(): bool {
        return $this->coverageEnabled;
    }

    /**
     * Get the key that will be used to hint that code coverage is enabled. This key is appended to the URLs as a
     * parameter with the value of test name. E.g. if this method returns 'testName', the URLs will be appended
     * '&testName=nameOfCurrentTest'
     *
     * @return string The key that will be used when defining test names
     */
    protected function getCoverageHintingKey(): string {
        return $this->coverageHintingKey;
    }
}