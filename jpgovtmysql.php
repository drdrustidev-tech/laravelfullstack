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

UPDATE prof_year_session_students
SET start_date = '2026-07-01',
    end_date = '2028-01-31'
WHERE id IN (452, 453, 454, 455, 456, 457, 458, 460, 461, 462);

UPDATE time_tables
SET start_date = '2026-02-16',
    end_date = '2027-08-16'
WHERE id BETWEEN 214 AND 276;

