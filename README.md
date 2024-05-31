# PHP Playground

Here is a repository for storing examples and exercises done while studying PHP.
Besides serving as a backup, it is also used as a reference or to revisit notes
and records that I have kept.

## Prerequisite

I use these tools when practicing PHP. If you need to run any file examples in
this project, make sure to install these tools before you begin.

- [Herd][1]
- [MySQL Community Edition][2]
- [phpMyAdmin][3]
- [VS Code][4]
- [PHP Intelephense][5]

## Setup

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

Here is a list of what I have read, including examples and exercises I have
done, derived from these books.

- [PHP & MySQL: Server-side Web Development][6]
- [Programming PHP, 4th Edition][7]

[1]: https://herd.laravel.com/
[2]: https://dev.mysql.com/downloads/
[3]: https://www.phpmyadmin.net/
[4]: https://code.visualstudio.com/
[5]: https://marketplace.visualstudio.com/items?itemName=bmewburn.vscode-intelephense-client/
[6]: https://phpandmysql.com/
[7]: https://www.oreilly.com/library/view/programming-php-4th/9781492054122/
