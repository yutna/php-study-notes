# PHP Study Notes

Welcome to the **PHP Study Notes** repository! This collection
includes code practices, examples, and notes related to PHP programming language.
It encompasses exercises and projects that I’ve worked on while learning testing
methodologies from books and various online materials.

## Overview

This repository serves as a personal archive for learning PHP programming. It 
includes a collection of PHP exercises, code examples, and projects that I have 
worked on. You’ll find practical code snippets, implementations of various PHP 
features, and testing techniques that I’ve explored throughout my learning journey.

## Prerequisite

Before diving into the code and examples, ensure you have the following tools
and dependencies installed:

- [Herd][1]
- [MySQL Community Edition][2]
- [phpMyAdmin][3]
- [VS Code][4]
- [PHP Intelephense][5]

## Configuration

These are optional settings. For learning purposes and easier investigation of
sessions and uploaded files, try adding these custom configurations to your
`php.ini`.

You will need to create a new directory called `Server` to contain
subdirectories, such as `sessions` and `uploads`.

```php
session.save_path=/<path>/Server/sessions
upload_tmp_dir=/<path>/Server/uploads
```

## Book references

The following material was instrumental in guiding my learning process:

- [PHP & MySQL: Server-side Web Development][6]
- [Programming PHP, 4th Edition][7]

[1]: https://herd.laravel.com/
[2]: https://dev.mysql.com/downloads/
[3]: https://www.phpmyadmin.net/
[4]: https://code.visualstudio.com/
[5]: https://marketplace.visualstudio.com/items?itemName=bmewburn.vscode-intelephense-client/
[6]: https://phpandmysql.com/
[7]: https://www.oreilly.com/library/view/programming-php-4th/9781492054122/
