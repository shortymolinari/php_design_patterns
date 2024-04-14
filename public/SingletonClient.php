<?php

require "../vendor/autoload.php";

use Shorty\PhpDesignPatterns\Creational\Singleton\RealWorld\Config;
use Shorty\PhpDesignPatterns\Creational\Singleton\RealWorld\Logger;


/**
 * Singleton Design Pattern
 *
 * Intent: Lets you ensure that a class has only one instance, while providing a
 * global access point to this instance.
 *
 * Example: The Singleton pattern is notorious for limiting code reuse and
 * complicating unit testing. However, it is still very useful in some cases. In
 * particular, it's handy when you need to control some shared resources. For
 * example, a global logging object that has to control the access to a log
 * file. Another good example: a shared runtime configuration storage.
 */

/**
 * The client code.
 */
Logger::log("Started!");

// Compare values of Logger singleton.
$l1 = Logger::getInstance();
$l2 = Logger::getInstance();
if ($l1 === $l2) {
    Logger::log("Logger has a single instance.");
} else {
    Logger::log("Loggers are different.");
}

// Check how Config singleton saves data...
$config1 = Config::getInstance();
$login = "test_login";
$password = "test_password";
$config1->setValue("login", $login);
$config1->setValue("password", $password);
// ...and restores it.
$config2 = Config::getInstance();
if ($login == $config2->getValue("login") &&
    $password == $config2->getValue("password")
) {
    Logger::log("Config singleton also works fine.");
}

Logger::log("Finished!");