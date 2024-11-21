# WLMS - Web Link Management System

## About

Manage all your bookmarks in one space from all devices. Set categories and descriptions for your bookmarks.


## How to Install

1. Download and install [XAMPP](https://www.apachefriends.org/download.html) for your operating system 

2. Clone the repository in the following folder: 

    ```/Applications/XAMPP/xamppfiles/htdocs```

3. Create the DB

3.1 Open a terminal and navigate to the /bin directory of XAMPP:

    Windows: C:\xampp\mysql\bin

    macOS/Linux: /Applications/XAMPP/xamppfiles/bin

3.2 Enter following command to create the DB: 

    ```mysql -u root -p -e "CREATE DATABASE WLMS;"```

3.3 Now you have to import the DB setup:

    mysql -u root -p WLMS < /Applications/XAMPP/xamppfiles/htdocs/WLMS/WLMS.sql

    If you get asked to enter a password, just press enter

4. Start the Apache Web Server and MySQL database over the XAMPP UI (on mac: manager-osx)

5. Now you can visit [WLMS](http://localhost/WLMS/index.php) in your browser

**That's it!**
