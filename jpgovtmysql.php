UPDATE prof_year_session_students
SET start_date = '2025-01-01',
    end_date = '2025-06-30'
WHERE prof_year_session_id = 12
  AND is_active = 1;


UPDATE prof_year_session_students
SET start_date = '2025-05-01',
    end_date = '2026-09-30'
WHERE student_id IN (101, 102, 103, 104);

UPDATE prof_year_session_students
SET start_date = '20244-11-01',
    end_date = '2026-03-31'
WHERE id BETWEEN 155 AND 222;
