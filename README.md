TextMate Bundle for Symfony2
============================

This bundle provides basic snippets for symfony2 in TextMate and Sublime Text.

Changelog
---------

[2013-06-02] Add "jump to file" functionality.

Installation
------------

* Create a bundle directory in your home if not exists & cd there.

**TextMate1:**

``` bash
mkdir -p ~/Library/Application\ Support/TextMate/Bundles
cd ~/Library/Application\ Support/TextMate/Bundles
```

**TextMate2:**

``` bash
mkdir -p ~/Library/Application\ Support/TextMate/Managed/Bundles/
cd ~/Library/Application\ Support/TextMate/Managed/Bundles/
```

* Clone a copy from the github repository:

``` bash
git clone https://github.com/smirik/Symfony2-TextMate-Bundle.git Symfony.tmbundle
```

* Reload TextMate or Bundles in TextMate.

Usage
-----

Full snippets list is provided by bundle. Bundle also provides several tasks:

* PHP CS Fixer: Opt + Cmd + L. Launch [php-cs-fixer](https://github.com/fabpot/PHP-CS-Fixer) for current file. Lib should be already installed & available from command line.
* Getters & setters. For any class you can select several properties & press Cmd + <. It will automatically create getters & setters for selected properties.
* Jump to file: (thanks to [szemian](https://github.com/szemian/Symfony2.tmbundle)) move cursor to class name & press Shift + Cmd + D.

Acknoledgements
---------------

* PHP-Twig: https://github.com/Anomareh/PHP-Twig.tmbundle
* Symfony1 textmate bundle: https://github.com/denderello/symfony-tmbundle
* Symfony2.tmbundle: https://github.com/szemian/Symfony2.tmbundle (Jump to class functionality)
