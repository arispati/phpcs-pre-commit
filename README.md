# PHPCS Pre Commit
Run phpcs before git commit

## Table of Contents
- [Requirement](#requirement)
- [Installation](#installation)

### Requirement
- PHP >= ^8.2 | ^8.3
- Laravel >= ^10.0 | ^11.0

### Installation
- Add this command to your composer.jon in script section on `post-install-cmd`  and `post-update-cmd`
```bash
php artisan arispati:phpcs-install
```
Example
```json
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
