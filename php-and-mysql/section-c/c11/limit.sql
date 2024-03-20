-- SELECT title
-- FROM article
-- ORDER BY id
-- LIMIT 1;

SELECT title
FROM article
WHERE category_id = 1
ORDER BY id
LIMIT 5;
