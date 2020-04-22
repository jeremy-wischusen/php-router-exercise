# Intro

See route-test.md for description of the goal of this project.

## Requirements
* PHP 7
* Apache 2
* mod_rewrite enabled

## Set Up

All required composer packages are included in this application.

1. Set up a v-host for the site or run it as local host. Make sure the document root points to the httpdocs subfolder. Also, make sure that the directory has the Apache ```AllowOverride All``` directive. The mod_rewrite directives in the .htaccess file may not work without it.      
    ```xml
    <VirtualHost *:80>
            ServerName hrs.loc
            DocumentRoot /var/www/vhosts/hrs/httpdocs
            <Directory /var/www/vhosts/hrs/httpdocs>
                Options FollowSymLinks
                AllowOverride All
            </Directory>
    </VirtualHost>
    ```           

2. If using a v-host, add the server name to your hosts file (Linux and Mac: /etc/hosts, Windows: c:\windows\system32\drivers\etc\hosts).

    ```
    127.0.0.1	hrs.loc
    ```
3. Restart apache if necessary. 
    ```bash
    apachectl restart
   ```  
Once this is done, you should be able to go to one of the urls defined in route-test.md such as http://hrs.loc/patients and see results returned.
```json 
 [
   {
     "firstName": "Fake10",
     "lastName": "Patient",
     "metrics": null,
     "id": 10
   },
   {
     "firstName": "Fake9",
     "lastName": "Patient",
     "metrics": null,
     "id": 9
   },
   {
     "firstName": "Fake8",
     "lastName": "Patient",
     "metrics": null,
     "id": 8
   },
   {
     "firstName": "Fake7",
     "lastName": "Patient",
     "metrics": null,
     "id": 7
   },
   {
     "firstName": "Fake6",
     "lastName": "Patient",
     "metrics": null,
     "id": 6
   },
   {
     "firstName": "Fake5",
     "lastName": "Patient",
     "metrics": null,
     "id": 5
   },
   {
     "firstName": "Fake4",
     "lastName": "Patient",
     "metrics": null,
     "id": 4
   },
   {
     "firstName": "Fake3",
     "lastName": "Patient",
     "metrics": null,
     "id": 3
   },
   {
     "firstName": "Fake2",
     "lastName": "Patient",
     "metrics": null,
     "id": 2
   },
   {
     "firstName": "Fake1",
     "lastName": "Patient",
     "metrics": null,
     "id": 1
   }
 ]

```  
## Tests Set Up
In phpunit.xml set the ENV variable for SITE_URL to match your set up. Make sure the URL ends with a forward slash. 
```xml
<env name="SITE_URL" value="http://hrs.loc/"/>
```
## Running the Tests
From the project root use the composer installed version of PHPUnit. 
```bash
 ./httpdocs/vendor/phpunit/phpunit/phpunit 
``` 
### Example Test Run
```bash
Jeremy-MacBook-Pro:hrs jeremy$ ./httpdocs/vendor/phpunit/phpunit/phpunit
PHPUnit 7.5.20 by Sebastian Bergmann and contributors.

............                                                      12 / 12 (100%)

Time: 1.21 seconds, Memory: 4.00 MB

OK (12 tests, 23 assertions)
Jeremy-MacBook-Pro:hrs jeremy$ 

```
## License
[MIT](https://choosealicense.com/licenses/mit/)