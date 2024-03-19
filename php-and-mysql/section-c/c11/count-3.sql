SELECT member_id, COUNT(*)
FROM article
GROUP BY member_id;
