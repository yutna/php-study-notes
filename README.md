# PHP Study Notes

This repository serves as a personal archive for my PHP programming journey. It contains a wide range of code examples, practical exercises, and projects that explore key PHP concepts and features.

## Prerequisites

While learning PHP programming, I have used these tools to practice coding and examples.

- **[Herd][1]**: A powerful local development environment for PHP.
- **[MySQL Community Edition][2]**: A relational database management system used with PHP for handling data.
- **[phpMyAdmin][3]**: A web-based tool for managing MySQL databases with ease.
- **[Visual Studio Code (VS Code)][4]**: A code editor optimized for PHP development with various extensions.
- **[PHP Intelephense][5]**: A VS Code extension that provides advanced PHP features like code intelligence, diagnostics, and more.

## Configuration

For a better learning experience, I have added custom configurations to my `php.ini` file. These optional settings make it easier to investigate PHP sessions and file uploads.

1. Create a directory named `Server` in your project folder.
2. Inside the `Server` folder, create subdirectories for `sessions` and `uploads`.
3. Add the following configurations to your `php.ini` file to specify custom paths for session files and temporary uploads:

```php
session.save_path=/<path>/Server/sessions
upload_tmp_dir=/<path>/Server/uploads
```

## Learning Resources

These are some of the key materials that really helped me learn PHP. I highly recommend checking them out if you want to dive deeper into PHP and server-side development:

- [PHP & MySQL: Server-side Web Development][6]
- [Programming PHP, 4th Edition][7]

[1]: https://herd.laravel.com/
[2]: https://dev.mysql.com/downloads/
[3]: https://www.phpmyadmin.net/
[4]: https://code.visualstudio.com/
[5]: https://marketplace.visualstudio.com/items?itemName=bmewburn.vscode-intelephense-client/
[6]: https://phpandmysql.com/
[7]: https://www.oreilly.com/library/view/programming-php-4th/9781492054122/
