# PHP Study Notes

Welcome to the **PHP Study Notes** repository! This collection includes code practices, examples, and notes focused on learning the PHP programming language. The repository features exercises, projects, and practical implementations that I’ve developed while studying PHP, along with insights gathered from various books and online resources.

## Overview

This repository serves as a personal archive for my PHP programming journey. It contains a wide range of code examples, practical exercises, and projects that explore key PHP concepts and features. You'll find examples covering various PHP functionalities, including data handling, session management, file uploads, and testing methodologies that have been crucial to my learning.

## Prerequisites

Before getting started, ensure you have the following tools and dependencies installed to run the code and examples effectively:

- **[Herd][1]**: A powerful local development environment for PHP.
- **[MySQL Community Edition][2]**: A relational database management system used with PHP for handling data.
- **[phpMyAdmin][3]**: A web-based tool for managing MySQL databases with ease.
- **[Visual Studio Code (VS Code)][4]**: A code editor optimized for PHP development with various extensions.
- **[PHP Intelephense][5]**: A VS Code extension that provides advanced PHP features like code intelligence, diagnostics, and more.

## Configuration

For an enhanced learning experience, you can add custom configurations to your `php.ini` file. These optional settings allow easier investigation of PHP sessions and file uploads.

1. Create a directory named `Server` in your project folder.
2. Inside the `Server` folder, create subdirectories for `sessions` and `uploads`.
3. Add the following configurations to your `php.ini` file to specify custom paths for session files and temporary uploads:

```php
session.save_path=/<path>/Server/sessions
upload_tmp_dir=/<path>/Server/uploads
```

These configurations will help you better understand how PHP manages sessions and file uploads in a real-world setting.

## Learning Resources

The following materials have been instrumental in guiding my learning of PHP and MySQL. They provide in-depth knowledge and practical applications, making them essential for anyone looking to master server-side web development:

- [PHP & MySQL: Server-side Web Development][6]
- [Programming PHP, 4th Edition][7]

Feel free to explore the code, make modifications, and deepen your understanding of PHP as you go through the examples provided in this repository.

[1]: https://herd.laravel.com/
[2]: https://dev.mysql.com/downloads/
[3]: https://www.phpmyadmin.net/
[4]: https://code.visualstudio.com/
[5]: https://marketplace.visualstudio.com/items?itemName=bmewburn.vscode-intelephense-client/
[6]: https://phpandmysql.com/
[7]: https://www.oreilly.com/library/view/programming-php-4th/9781492054122/
