-- SELECT COALESCE(picture, forename, 'friend') AS profile
-- FROM member;

SELECT COALESCE(picture, 'placeholder.png') AS profile
FROM member;
