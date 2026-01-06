"C:\Program Files\Google\Chrome\Application\chrome.exe" --profile-directory="Profile 1" --app=https://tgahmis.sjpgac.in --kiosk-printing

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
SET start_date = '2025-11-01',
    end_date = '2027-03-30'
WHERE id BETWEEN 259 AND 333;

UPDATE prof_year_session_students
SET pract_group_id = 2    
WHERE id BETWEEN 259 AND 296;

UPDATE prof_year_session_students
SET pract_group_id = 3    
WHERE id BETWEEN 297 AND 333;
