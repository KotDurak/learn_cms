SELECT s.name, s.group_name,
       ROUND(AVG(g.grade), 2) as avg_grade,
       RANK () OVER (ORDER BY AVG(g.grade) DESC) as overral_rank,
       RANK () OVER (PARTITION BY s.group_name ORDER BY AVG(g.grade) DESC) as group_rank
FROM students s
         JOIN grades g ON s.id = g.student_id
GROUP BY s.id