# Cli commands

## CheckNamesInTextCommandTest
This command check if “John” and “Mary” names are found the same number of times inside the provided text. If the number of times is the same it should return 1, if not it should return 0.

Command we can run in cli:
```
php bin/console string:check-name "Some text"
```
To check string replace **Some text** your own string.

### Unit test for command
Too use UnitTest for this command you can use command:
```
phpunit tests/AppBundle/Command/CheckNamesInTextCommandTest.php
```
