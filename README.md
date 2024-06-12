# PHPCS Pre Commit
Run phpcs before git commit

## Table of Contents
- [Requirement](#requirement)
- [Installation](#installation)
- [Uninstall](#uninstall)

### Requirement
- PHP >= ^8.2 | ^8.3
- Laravel >= ^10.0 | ^11.0

### Installation
- Add this command to your composer.json on script section at `post-install-cmd`  and `post-update-cmd` attribute
```bash
@php artisan arispati:phpcs-install
```
```json
// composer.json
{
    ...
    "scripts": {
        "post-install-cmd": [
            "@php artisan arispati:phpcs-install"
        ],
        "post-update-cmd": [
            "@php artisan arispati:phpcs-install"
        ],
    },
    ...
}
```

- Then install the package with composer
```bash
composer require --dev arispati/phpcs-pre-commit
```

- Now when you commit the changes and got an error, its look like this
```bash
[PRE-COMMIT] Running PHP_CodeSniffer using the PSR12 standard

E 1 / 1 (100%)

FILE: ...~/HomeController.php
--------------------------------------------------------------------------------
FOUND 5 ERRORS AFFECTING 4 LINES
--------------------------------------------------------------------------------
 11 | ERROR | [x] Line indented incorrectly; expected 8 spaces, found 4
 11 | ERROR | [x] Expected 1 space after closing parenthesis; found newline
 12 | ERROR | [x] Line indented incorrectly; expected at least 8 spaces, found 4
 13 | ERROR | [x] Line indented incorrectly; expected at least 12 spaces, found 8
 14 | ERROR | [x] Line indented incorrectly; expected 8 spaces, found 4
--------------------------------------------------------------------------------
PHPCBF CAN FIX THE 5 MARKED SNIFF VIOLATIONS AUTOMATICALLY
--------------------------------------------------------------------------------

Time: 138ms; Memory: 10MB

[PRE-COMMIT] Please fix all of the violations or commit with the --no-verify option
```

### Uninstall
- Run this command to remove git hook script
```bash
php artisan arispati:phpcs-uninstall
```

- Remove composer script `@php artisan arispati:phpcs-install` both `post-install-cmd` and `post-update-cmd` attribute
- Then remove the package with composer
```bash
composer remove --dev arispati/phpcs-pre-commit
```