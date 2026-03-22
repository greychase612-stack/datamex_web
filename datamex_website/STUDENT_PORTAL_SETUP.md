# Student Portal Setup

This project now includes a starter database package for the upcoming portal login and dashboard.

## Files

- `database/student_portal.sql`
- `config/database.php`
- `config/portal_auth.php`

## Database Name

`datamex_student_portal`

## Seed Accounts

- Student
  Username: `2024-01234`
  Password: `03212004`
- Faculty
  Username: `FAC-2024-001`
  Password: `FAC12345!`
- Admin
  Username: `portaladmin`
  Password: `ADMIN123!`

## Import Command

From XAMPP on Windows:

```powershell
C:\xampp\mysql\bin\mysql.exe -u root < C:\xampp\htdocs\datamex_website\database\student_portal.sql
```

If your MariaDB root account has a password, use:

```powershell
C:\xampp\mysql\bin\mysql.exe -u root -p < C:\xampp\htdocs\datamex_website\database\student_portal.sql
```

## What The Schema Covers

- Portal login accounts for student, faculty, and admin roles
- Student profile data used by `student-portal.php`
- Academic terms
- Subject catalog
- Student schedule items
- Student grades
- Billing items
- Portal announcements and notifications
- Login activity logging

## How To Wire `login.php` Later

1. Add `require_once __DIR__ . '/config/portal_auth.php';`
2. Replace the placeholder login logic with `portal_attempt_login(portal_db(), $role, $username, $password)`.
3. On success, call `portal_login_user($user)`.
4. Redirect students to `student-portal.php`.
5. Redirect faculty/admin to their own dashboards once those pages exist.

## How To Protect `student-portal.php` Later

At the top of `student-portal.php`, replace the hardcoded placeholder user with:

```php
require_once __DIR__ . '/config/portal_auth.php';

$user = portal_require_login('student');
```

Then map the live database values from `$user` into your template.
