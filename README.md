# Example of Final Project

### Final Project of Database Systems (2018 Spring)

## Folder Structure
```
/auth
    (Backend files relative to "Auth")
/css
    (Css files)
/database
    (Main files of db operations)
home.php
    (Files of the view)
```

The sample structure TAs provided is:
```
/example
    /auth
        login.php
    /css
        announce.css
        event.css
        home.css
        login.css
    /database
        auth.php
        database.php
    anncs.php
    events.php
    home.php
    login.php
    signup.php
```

For example, if you want to manage the control of anncs.php, you may do the following changes by adding files (remark \*):
```
/example
    /anncs *
        add.php *
        delete.php *
        edit.php *
    /auth
        login.php
    /css
        announce.css
        event.css
        home.css
        login.css
    /database
        anncs.php *
        auth.php
        database.php
    anncs.php
    events.php
    home.php
    login.php
    signup.php
```

## Diagram
![Alt text](diagram.png?raw=true "Diagram")

## Form post
There are several methods such as **GET**, **POST** , **PUT**, etc, for the web applications to transfer data between the websites.
In `login.php`, I use the mothod **POST** there.

## Reference
- [bootstrap 3](http://getbootstrap.com/docs/3.3/)
- [Form handling](https://www.w3schools.com/php/php_forms.asp)
- [PHP 5 Session](https://www.w3schools.com/php/php_sessions.asp)
- [PSR](https://www.php-fig.org/psr/)
