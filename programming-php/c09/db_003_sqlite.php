<?php

header('Content-Type: text/plain');

define('DB_FILE_NAME', 'library.sqlite');

if (file_exists(DB_FILE_NAME)) {
    unlink(DB_FILE_NAME);
}

// Creating a library database
$db = new SQLite3(DB_FILE_NAME);

// Creating the authors table
$sql = <<<SQL
CREATE TABLE 'authors' ('authorid' INTEGER PRIMARY KEY, 'name' TEXT);
SQL;

if (!$db->exec($sql)) {
    echo "Create Failure - Authors\n";
} else {
    echo "Table authors was created\n";
}

// Adding data to the authors table
$sql = <<<SQL
INSERT INTO 'authors' ('name') VALUES ('J.R.R Tolkien');
INSERT INTO 'authors' ('name') VALUES ('Alex Haley');
INSERT INTO 'authors' ('name') VALUES ('Tom Clancy');
INSERT INTO 'authors' ('name') VALUES ('Issac Asimov');
SQL;

if (!$db->exec($sql)) {
    echo "Insert Failure - Authors\n";
} else {
    echo "Insert to Authors - OK\n";
}

// Creating the books table
$sql = <<<SQL
CREATE TABLE 'books' (
    'bookid' INTEGER PRIMARY KEY,
    'authorid' INTEGER,
    'title' TEXT,
    'ISBN' TEXT,
    'pub_year' INTEGER,
    'available' INTEGER
);
SQL;

if (!$db->exec($sql)) {
    echo "Create Failure - Books\n";
} else {
    echo "Table books was created\n";
}

// Adding data to the books table
$sql = <<<SQL
INSERT INTO 'books' ('authorid', 'title', 'ISBN', 'pub_year', 'available')
VALUES (1, 'The Two Towers', '0-261-10236-2', 1954, 1);

INSERT INTO 'books' ('authorid', 'title', 'ISBN', 'pub_year', 'available')
VALUES (1, 'The Return of The King', '0-261-10237-0', 1955, 1);

INSERT INTO 'books' ('authorid', 'title', 'ISBN', 'pub_year', 'available')
VALUES (2, 'Roots', '0-440-17464-3', 1974, 1);

INSERT INTO 'books' ('authorid', 'title', 'ISBN', 'pub_year', 'available')
VALUES (4, 'Robot', '0-553-29438-5', 1950, 1);

INSERT INTO 'books' ('authorid', 'title', 'ISBN', 'pub_year', 'available')
VALUES (4, 'Foundation', '0-553-80371-9', 1951, 1);
SQL;

if (!$db->exec($sql)) {
    echo "Insert Failure - Books\n";
} else {
    echo "Insert to Books - OK\n";
}

echo "\n------------------------------------------------------------------\n\n";

// Query data
$sql = <<<SQL
SELECT a.name, b.title
FROM books b, authors a
WHERE a.authorid = b.authorid;
SQL;

$result = $db->query($sql);

while ($row = $result->fetchArray()) {
    echo "{$row['name']} is author of {$row['title']}\n";
}
