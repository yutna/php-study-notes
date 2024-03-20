-- SELECT concat(forename, ' ', surname) AS author
-- FROM member;

SELECT concat(forename, ' ', surname, ', ', email) AS author_details
FROM member;
