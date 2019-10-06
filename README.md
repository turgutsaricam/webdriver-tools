# webdriver-tools

This repository contains general-purpose classes that are commonly needed when working with [`facebook/webdriver`](https://github.com/facebook/php-webdriver), when running Selenium tests for PHP.

# WebDriver Package
This package requires [`facebook/webdriver`](https://github.com/facebook/php-webdriver). Basically, this should be used for Selenium tests. This package provides an `AbstractDriverManager` that handles loading different URLs in different tabs, switching to a tab if a URL is already loaded in a tab, adding a parameter for each URL to hint code coverage (the same hint explained in `CoverageHandler`), modifying `window.ajaxurl` JavaScript variable (which is the default variable for WordPress sites) to enable code coverage for AJAX requests, closing excessive browser tabs, setting up the driver and logging into the site-under-test, and other things like refreshing, closing, opening tabs.

To use this package, create a class that extends `AbstractDriverManager`, implement the required methods (or use `DefaultDriverManager`). `AbstractDriverManager` requires an `AbstractSetupStrategy` that will setup the driver and login to the site. To provide a strategy, simply create a class and extend it to `AbstractSetupStrategy`, and implement the required methods. The package comes with `WordPressSetupStrategy`. If you are testing a WordPress site, you can directly use it.

In your tests, instead of using the webdriver directly, perform every driver action through an `AbstractDriverManager`. Otherwise, there is no point using a driver manager.

# Development
To test this project, include it in another project using a local repository by defining the following in that other project's `composer.json`:

```json
{
  "repositories": [
        {
            "type": "path",
            "url": "path/to/local/directory/of/webdriver-tools",
            "options": {
                "symlink": false
            }
        }
    ],
}
```

After this, delete `vendor/turgutsaricam/webdriver-tools` directory from that other project's `vendor` directory, optionally set the version of `turgutsaricam/webdriver-tools` under `require(-dev)` item of `composer.json` to `@dev`, and then run `composer update turgutsaricam/webdriver-tools`. This will copy the files in the local development repository to that other project's `vendor` directory. By this way, the changes can be tested prior to committing the changes to `git`.

# TODO

- Write tests