# Web Content Management System - Template1
This project is a web content management system designed for my college back in 2015. The system contains an admin page which can be used to modify the contents of the web page of a fixed template

## How is this project useful to you?
- If you want to just tinker around and explore web programming, you can consider using this project to understand the concepts behind web uploads, page rendering, using an admin page to manage content.
- If you are a penetration tester and need a WCMS website to setup as target.

## Pre-Requisites for Installation
- A web server such as Apache HTTP Server (https://httpd.apache.org/)
- A Database such as MySQL (https://www.mysql.com/)
- PHP (https://www.php.net/manual/en/install.php)

Alternatively (recommended and easy way), install XAMPP (https://www.apachefriends.org/index.html).

Install and configure above pre-requisites before proceeding with installation.

## Installation
- Download the zipped folder of this repository to your machine.
- Extract the contents to your web root directory. Refer the manual of the web server you used to know which is the web root directory. If you have used Apache HTTP server refer to [this guide](https://httpd.apache.org/docs/trunk/getting-started.html "HTTP  Server Getting Started") for details.
- Run you SQL console and import the schema to your DB from WCMST1.sql_schema file.
- You may have to change the contents of /include/db.info.php and at /admin/include/db.info.php with the databasename, username and password of your database. (Default username is 'wcms-root' and password is 'wcms-root-password')
- Remove the WCMST1.sql_schema file from the web root directory or copy it to some other directory outside your server or on external offline disk (because it is very very risky to store your DB schema or any other sensitive file in web root directory of your server. Read directory traversal attack)

## Running the site
- If you have used XAMPP control panel start the service of your server, SQL DB.
- Navigate to localhost/<folder name of extracted files> (or 127.0.0.1/<folder name of extracted files>) on your browser. You should land on the homepage of the site.
- To access the admin site, navigate to 127.0.0.1/<folder name of extracted files>/admin.






