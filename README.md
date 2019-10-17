# Web Content Management System - Template1
This project is a web content management system designed for my college back in 2015. The system contains a admin page which can be used to modify the contents of the web page of a fixed template

## Pre-Requisites for Installation
- A web server such as Apache HTTP Server (https://httpd.apache.org/)
- A Database such as MySQL (https://www.mysql.com/)
- PHP (https://www.php.net/manual/en/install.php)

Alternatively (recommended and easy way), install XAMPP (https://www.apachefriends.org/index.html).

Install and configure above pre-requisites before proceeding with installation.

## Installation
- Download the zipped folder of this repository to your machine.
- Extract the contents to your web root directory. Refer the manual of the web server you used to know which is the web root directory. If you have used Apache HTTP server refer https://httpd.apache.org/docs/trunk/getting-started.html for details.
- Run you SQL console and import the schema to your DB from ce.sql_Schema file.
- Remove the ce.sql_Schema file from the web root directory or copy it to some other directory outside your server or on external offline disk (because it is very very risky to store your DB schema or any other sensitive file in web root directory of your server. Read directory traversal attack)

## Running the site
- If you have used XAMPP control panel start the service of your server, SQL DB and PHP.
- Navigate to localhost/<folder name of extracted files> (or 127.0.0.1/<folder name of extracted files>) on your browser. You should land on the homepage of the site.
- To access the admin site, navigate to 127.0.0.1/<folder name of extracted files>/admin.






