CREATE DATABASE IF NOT EXISTS datamex_student_portal
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE datamex_student_portal;

CREATE TABLE IF NOT EXISTS portal_users (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  role ENUM('student', 'faculty', 'admin') NOT NULL,
  username VARCHAR(50) NOT NULL,
  email VARCHAR(120) NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  must_change_password TINYINT(1) NOT NULL DEFAULT 0,
  is_active TINYINT(1) NOT NULL DEFAULT 1,
  last_login_at DATETIME NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY uq_portal_users_username (username),
  UNIQUE KEY uq_portal_users_email (email)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS academic_terms (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  school_year VARCHAR(20) NOT NULL,
  semester_label VARCHAR(40) NOT NULL,
  starts_on DATE NULL,
  ends_on DATE NULL,
  is_current TINYINT(1) NOT NULL DEFAULT 0,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS students (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT UNSIGNED NOT NULL,
  student_number VARCHAR(20) NOT NULL,
  first_name VARCHAR(60) NOT NULL,
  middle_name VARCHAR(60) NULL,
  last_name VARCHAR(60) NOT NULL,
  birth_date DATE NOT NULL,
  avatar_initials VARCHAR(10) NOT NULL,
  program_name VARCHAR(120) NOT NULL,
  year_level VARCHAR(30) NOT NULL,
  section_name VARCHAR(40) NOT NULL,
  institutional_email VARCHAR(120) NOT NULL,
  current_gwa DECIMAL(4,2) NULL,
  current_units SMALLINT UNSIGNED NOT NULL DEFAULT 0,
  current_balance DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  enrollment_status ENUM('Enrolled', 'Pending', 'Hold', 'Inactive') NOT NULL DEFAULT 'Enrolled',
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY uq_students_user_id (user_id),
  UNIQUE KEY uq_students_student_number (student_number),
  UNIQUE KEY uq_students_email (institutional_email),
  CONSTRAINT fk_students_user
    FOREIGN KEY (user_id) REFERENCES portal_users(id)
    ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS staff_profiles (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT UNSIGNED NOT NULL,
  staff_number VARCHAR(30) NOT NULL,
  full_name VARCHAR(120) NOT NULL,
  department_name VARCHAR(120) NOT NULL,
  position_title VARCHAR(120) NOT NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY uq_staff_profiles_user_id (user_id),
  UNIQUE KEY uq_staff_profiles_staff_number (staff_number),
  CONSTRAINT fk_staff_profiles_user
    FOREIGN KEY (user_id) REFERENCES portal_users(id)
    ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS subjects (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  subject_code VARCHAR(20) NOT NULL,
  subject_name VARCHAR(150) NOT NULL,
  units DECIMAL(4,1) NOT NULL DEFAULT 3.0,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY uq_subjects_code (subject_code)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS student_schedule_items (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  student_id INT UNSIGNED NOT NULL,
  term_id INT UNSIGNED NOT NULL,
  subject_id INT UNSIGNED NOT NULL,
  faculty_name VARCHAR(120) NOT NULL,
  room_name VARCHAR(60) NOT NULL,
  meeting_days VARCHAR(50) NOT NULL,
  time_start TIME NOT NULL,
  time_end TIME NOT NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_schedule_student
    FOREIGN KEY (student_id) REFERENCES students(id)
    ON DELETE CASCADE,
  CONSTRAINT fk_schedule_term
    FOREIGN KEY (term_id) REFERENCES academic_terms(id)
    ON DELETE CASCADE,
  CONSTRAINT fk_schedule_subject
    FOREIGN KEY (subject_id) REFERENCES subjects(id)
    ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS student_grades (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  student_id INT UNSIGNED NOT NULL,
  term_id INT UNSIGNED NOT NULL,
  subject_id INT UNSIGNED NOT NULL,
  midterm_numeric DECIMAL(5,2) NULL,
  final_numeric DECIMAL(5,2) NULL,
  final_grade DECIMAL(4,2) NULL,
  remarks VARCHAR(40) NOT NULL DEFAULT 'In Progress',
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_grades_student
    FOREIGN KEY (student_id) REFERENCES students(id)
    ON DELETE CASCADE,
  CONSTRAINT fk_grades_term
    FOREIGN KEY (term_id) REFERENCES academic_terms(id)
    ON DELETE CASCADE,
  CONSTRAINT fk_grades_subject
    FOREIGN KEY (subject_id) REFERENCES subjects(id)
    ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS student_billing_items (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  student_id INT UNSIGNED NOT NULL,
  term_id INT UNSIGNED NOT NULL,
  description VARCHAR(150) NOT NULL,
  amount DECIMAL(10,2) NOT NULL,
  billing_status ENUM('Paid', 'Unpaid', 'Pending') NOT NULL DEFAULT 'Pending',
  due_date DATE NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_billing_student
    FOREIGN KEY (student_id) REFERENCES students(id)
    ON DELETE CASCADE,
  CONSTRAINT fk_billing_term
    FOREIGN KEY (term_id) REFERENCES academic_terms(id)
    ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS portal_announcements (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(160) NOT NULL,
  message TEXT NOT NULL,
  category ENUM('academic', 'enrollment', 'finance', 'event', 'general') NOT NULL DEFAULT 'general',
  audience_role ENUM('all', 'student', 'faculty', 'admin') NOT NULL DEFAULT 'all',
  link_url VARCHAR(255) NULL,
  is_active TINYINT(1) NOT NULL DEFAULT 1,
  published_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS portal_notifications (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT UNSIGNED NOT NULL,
  title VARCHAR(160) NOT NULL,
  message TEXT NOT NULL,
  category ENUM('academic', 'enrollment', 'finance', 'event', 'general') NOT NULL DEFAULT 'general',
  link_url VARCHAR(255) NULL,
  is_read TINYINT(1) NOT NULL DEFAULT 0,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_notifications_user
    FOREIGN KEY (user_id) REFERENCES portal_users(id)
    ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS login_activity (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT UNSIGNED NULL,
  username_attempt VARCHAR(50) NOT NULL,
  role_attempted ENUM('student', 'faculty', 'admin') NOT NULL,
  was_successful TINYINT(1) NOT NULL DEFAULT 0,
  ip_address VARCHAR(45) NULL,
  user_agent VARCHAR(255) NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_login_activity_user
    FOREIGN KEY (user_id) REFERENCES portal_users(id)
    ON DELETE SET NULL
) ENGINE=InnoDB;

INSERT INTO academic_terms (id, school_year, semester_label, starts_on, ends_on, is_current) VALUES
  (1, '2025-2026', '2nd Semester', '2026-01-15', '2026-05-10', 1),
  (2, '2025-2026', '1st Semester', '2025-06-15', '2025-10-20', 0),
  (3, '2026-2027', '1st Semester', '2026-06-01', '2026-10-15', 0)
ON DUPLICATE KEY UPDATE
  school_year = VALUES(school_year),
  semester_label = VALUES(semester_label),
  starts_on = VALUES(starts_on),
  ends_on = VALUES(ends_on),
  is_current = VALUES(is_current);

INSERT INTO portal_users (id, role, username, email, password_hash, must_change_password, is_active) VALUES
  (1, 'student', '2024-01234', 'juan.delacruz@datamex.edu.ph', '$2y$10$v/igS8q8/YE6rQ8tJEDiQOr6EwB7laSEkDkTQe9Vf2.ETH5i/F8DO', 1, 1),
  (2, 'faculty', 'FAC-2024-001', 'maria.lozano@datamex.edu.ph', '$2y$10$CN0PjcPWbCdTbhxbUkcnTu8vjZGTI6c9ehPVmQ5kbzLVthHM1P7ye', 1, 1),
  (3, 'admin', 'portaladmin', 'portal.admin@datamex.edu.ph', '$2y$10$SGqQbfqs6uqZ3s3akyudoOuAkaA0bcvXc0z3kifpHMBaIy3HKz0OO', 1, 1)
ON DUPLICATE KEY UPDATE
  role = VALUES(role),
  email = VALUES(email),
  password_hash = VALUES(password_hash),
  must_change_password = VALUES(must_change_password),
  is_active = VALUES(is_active);

INSERT INTO students (
  id, user_id, student_number, first_name, middle_name, last_name, birth_date,
  avatar_initials, program_name, year_level, section_name, institutional_email,
  current_gwa, current_units, current_balance, enrollment_status
) VALUES (
  1, 1, '2024-01234', 'Juan', 'Santos', 'Dela Cruz', '2004-03-21',
  'JD', 'BS Information Technology', '2nd Year', 'BSIT-2A', 'juan.delacruz@datamex.edu.ph',
  1.75, 21, 3343.75, 'Enrolled'
)
ON DUPLICATE KEY UPDATE
  program_name = VALUES(program_name),
  year_level = VALUES(year_level),
  section_name = VALUES(section_name),
  current_gwa = VALUES(current_gwa),
  current_units = VALUES(current_units),
  current_balance = VALUES(current_balance),
  enrollment_status = VALUES(enrollment_status);

INSERT INTO staff_profiles (id, user_id, staff_number, full_name, department_name, position_title) VALUES
  (1, 2, 'FAC-2024-001', 'Dr. Maria S. Lozano', 'College of Information Technology', 'Full Professor'),
  (2, 3, 'ADM-001', 'Portal Administrator', 'Management Information Systems', 'System Administrator')
ON DUPLICATE KEY UPDATE
  full_name = VALUES(full_name),
  department_name = VALUES(department_name),
  position_title = VALUES(position_title);

INSERT INTO subjects (id, subject_code, subject_name, units) VALUES
  (1, 'IT 201', 'Data Structures and Algorithms', 3.0),
  (2, 'IT 202', 'Web Development 2', 3.0),
  (3, 'IT 203', 'Database Management Systems', 3.0),
  (4, 'GE 101', 'Mathematics in the Modern World', 3.0),
  (5, 'NSTP 2', 'National Service Training Program 2', 3.0),
  (6, 'PE 2', 'Physical Education 2', 2.0),
  (7, 'IT 101', 'Programming 1', 3.0),
  (8, 'IT 102', 'Computer Fundamentals', 3.0)
ON DUPLICATE KEY UPDATE
  subject_name = VALUES(subject_name),
  units = VALUES(units);

INSERT INTO student_schedule_items (
  student_id, term_id, subject_id, faculty_name, room_name, meeting_days, time_start, time_end
) VALUES
  (1, 1, 1, 'Prof. Flores', 'CL-3', 'Mon, Wed, Fri', '07:30:00', '09:00:00'),
  (1, 1, 2, 'Prof. Santos', 'CL-1', 'Mon, Wed, Fri', '09:00:00', '10:30:00'),
  (1, 1, 3, 'Dr. Lozano', 'CL-2', 'Tue, Thu', '13:00:00', '14:30:00'),
  (1, 1, 4, 'Prof. Reyes', 'Rm 205', 'Tue, Thu', '10:30:00', '12:00:00'),
  (1, 1, 5, 'Prof. Cruz', 'Rm 101', 'Saturday', '15:00:00', '17:00:00'),
  (1, 1, 6, 'Coach Rivera', 'Gym', 'Mon, Wed', '14:30:00', '16:00:00');

INSERT INTO student_grades (
  student_id, term_id, subject_id, midterm_numeric, final_numeric, final_grade, remarks
) VALUES
  (1, 1, 1, 88.00, NULL, NULL, 'In Progress'),
  (1, 1, 2, 92.00, NULL, NULL, 'In Progress'),
  (1, 1, 3, 85.00, NULL, NULL, 'In Progress'),
  (1, 1, 4, 79.00, NULL, NULL, 'In Progress'),
  (1, 2, 7, 90.00, 88.00, 1.50, 'Passed'),
  (1, 2, 8, 87.00, 91.00, 1.25, 'Passed');

INSERT INTO student_billing_items (
  student_id, term_id, description, amount, billing_status, due_date
) VALUES
  (1, 1, 'Tuition (21 units x PHP 175)', 3675.00, 'Paid', '2025-06-15'),
  (1, 1, 'Miscellaneous Fees', 2500.00, 'Paid', '2025-06-15'),
  (1, 1, 'Laboratory Fee', 1200.00, 'Paid', '2025-06-15'),
  (1, 1, '2nd Installment (25%)', 2843.75, 'Paid', '2025-09-01'),
  (1, 1, '3rd Installment (25% - Final)', 2843.75, 'Unpaid', '2026-04-05'),
  (1, 1, 'Student Council Fee', 500.00, 'Unpaid', '2026-04-05');

INSERT INTO portal_announcements (
  title, message, category, audience_role, link_url, is_active
) VALUES
  (
    'Tuition Balance Deadline: April 5',
    'Settle your outstanding balance before April 5, 2026 to avoid an enrollment hold for the next term.',
    'finance',
    'student',
    'student-portal.php#billing',
    1
  ),
  (
    '1st Semester AY 2026-2027 Enrollment Now Open',
    'Coordinate with your adviser before proceeding to enrollment through the student portal.',
    'enrollment',
    'student',
    'student-portal.php#enrollment',
    1
  ),
  (
    'Final Exam Schedule Released',
    'Department exam schedules are now available through the Registrar and student portal.',
    'academic',
    'student',
    'news.php',
    1
  );

INSERT INTO portal_notifications (
  user_id, title, message, category, link_url, is_read
) VALUES
  (1, 'Balance Due Reminder', 'Your remaining balance of PHP 3,343.75 is due on April 5, 2026.', 'finance', 'student-portal.php#billing', 0),
  (1, 'Enrollment Period Open', 'Online enrollment for 1st Semester AY 2026-2027 is now open.', 'enrollment', 'student-portal.php#enrollment', 0),
  (1, 'Final Exam Schedule Posted', 'Check the latest exam room assignments and schedules.', 'academic', 'news.php', 0);
