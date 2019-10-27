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

### Docker setup pre-requisites (optional)
Setup the following for running the application using docker.
- [Docker Engine](https://docs.docker.com/install/)
- [Docker Compose](https://docs.docker.com/compose/install/)

Install and configure above pre-requisites before proceeding with installation.

# Setup & Installation
## Default setup
- Copy the `www` folder of this repository to your machine.
- Extract the contents to your web root directory. Refer the manual of the web server you used to know which is the web root directory. If you have used Apache HTTP server refer to [this guide](https://httpd.apache.org/docs/trunk/getting-started.html "HTTP  Server Getting Started") for details.
- Provide permission for file write (so that admin can upload images). Be careful to not give more permission than required, [refer this thread](https://stackoverflow.com/a/55084883/5107305 "Stack overflow: Error in file upload due to insufficient privileges") for more information.
    - Find Web Server user
        `ps aux | grep httpd`
    - In this case, its daemon Replace it with yours in next command.
        `sudo chown -R daemon /opt/lampp/htdocs/[Working Project]/`
        
- Run you SQL console and import the schema to your DB from WCMST1.sql_schema file.
- You may have to change the contents of `/include/db.info.php` and at `/admin/include/db.info.php` with the mysql:host, database name, username and password of your database. The existing values are
```
    mysql:host    - 'mysql'
    database name - 'wcms' 
    username      - 'wcms-user'
    password      - 'wcms-user-password'
```
- ***Note***  *:  `mysql:host` should be `localhost` for most non-Docker based setups*. 
- Remove the WCMST1.sql_schema file from the web root directory or copy it to some other directory outside your server or on external offline disk (because it is very very risky to store your DB schema or any other sensitive file in web root directory of your server. Read directory traversal attack)

### Running the site
- If you have used XAMPP control panel start the service of your server, SQL DB.
- Navigate to localhost/<folder name of extracted files> (or 127.0.0.1/<folder name of extracted files>) on your browser. You should land on the homepage of the site.
- To access the admin site, navigate to 127.0.0.1/<folder name of extracted files>/admin.

## Docker setup (optional)
Run the executable script file `run-docker.sh` in the repo home with any of the arguments :` start | stop | restart`. For example, the following starts the docker containers and runs the applications. 

```
./run-docker.sh start
```

Note: You can also stop the containers/exit from the terminal window by pressing <kbd>CTRL</kbd> + <kbd>C</kbd>
