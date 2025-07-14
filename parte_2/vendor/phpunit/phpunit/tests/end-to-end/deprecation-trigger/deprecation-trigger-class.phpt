--TEST--
The right events are emitted in the right order for a test that loads a class that triggers E_USER_DEPRECATED
--FILE--
<?php declare(strict_types=1);
$_SERVER['argv'][] = '--do-not-cache-result';
$_SERVER['argv'][] = '--debug';
$_SERVER['argv'][] = '--configuration';
$_SERVER['argv'][] = __DIR__ . '/_files/deprecation-trigger-class';

require __DIR__ . '/../../bootstrap.php';

(new PHPUnit\TextUI\Application)->run($_SERVER['argv']);
--EXPECTF--
PHPUnit Started (PHPUnit %s using %s)
Test Runner Configured
Bootstrap Finished (%sautoload.php)
Event Facade Sealed
Test Suite Loaded (1 test)
Test Runner Started
Test Suite Sorted
Test Runner Execution Started (1 test)
Test Suite Started (%sphpunit.xml, 1 test)
Test Suite Started (default, 1 test)
Test Suite Started (PHPUnit\TestFixture\SelfDirectIndirect\FirstPartyClassTest, 1 test)
Test Preparation Started (PHPUnit\TestFixture\SelfDirectIndirect\FirstPartyClassTest::testOne)
Test Prepared (PHPUnit\TestFixture\SelfDirectIndirect\FirstPartyClassTest::testOne)
Test Triggered Deprecation (PHPUnit\TestFixture\SelfDirectIndirect\FirstPartyClassTest::testOne, issue triggered by third-party code, suppressed using operator) in %s:%d
This class is deprecated
Test Passed (PHPUnit\TestFixture\SelfDirectIndirect\FirstPartyClassTest::testOne)
Test Finished (PHPUnit\TestFixture\SelfDirectIndirect\FirstPartyClassTest::testOne)
Test Suite Finished (PHPUnit\TestFixture\SelfDirectIndirect\FirstPartyClassTest, 1 test)
Test Suite Finished (default, 1 test)
Test Suite Finished (%sphpunit.xml, 1 test)
Test Runner Execution Finished
Test Runner Finished
PHPUnit Finished (Shell Exit Code: 0)
