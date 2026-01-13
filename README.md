# OneAct
## A Platform for Donation and Volunteer Act

OneAct is a web-based platform designed to support social initiatives such as donations, social programs, and organizational donation final reporting.  

---

## Key Features
- User Authentication: Secure login and registration system with role-based access (admin/ organization/ public user).
- Home Dashboard: Displaying latest donation and volunteer programs, user activity history, and main navigation.
- Donation & Volunteer Programs: Browse, view details, and participate in donation campaigns and volunteer activities with clear status tracking.
- Community Platform: Community listing, and community with story sharing and event proposal features to encourage collaboration.
- Organization Profile: Profile page for organizations showcasing their identity, mission, programs, and activity history to build trust and transparency.
- Admin & Organization Dashboards: Dashboards for managing users, programs, volunteers, donations, and reports.
- Transparency & Reporting: Donation reporting system to ensure accountability and open access to program information.
- Help & Support: FAQ and contact form to assist users and organizations efficiently.

---

## How to Run Locally
1. Download the project source code from GitHub.
2. Open the project folder in Visual Studio Code.
3. Open project terminal and `composer install`
4. If you use XAMPP, make sure you already start mysql
5. Run database migrations and seeders:
   - `php artisan migrate:fresh`
   - `php artisan migrate:fresh --seed`
6. Run local `php artisan serve`
