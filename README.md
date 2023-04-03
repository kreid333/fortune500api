# Fortune 500 API


## Description 

An easy to use, public API that provides data on Fortune 500 companies. Created using OOP concepts.

## Table of Contents

* [Installation](#installation)
* [Usage](#usage)
* [Finished Project](#finished-project)
* [Credits](#credits)
* [License](#license)

## Installation

The following software must be installed in order for this application to run locally:

- [PHP](https://www.php.net/)
- [Apache](https://httpd.apache.org/)
- [MySQL](https://www.mysql.com/)

These can be installed independently or you can use a local PHP development enivronment such as [MAMP](https://www.mamp.info/) or [XAMPP](https://www.apachefriends.org/).

If you are installing the software independently, you also need an administrative interface for your database. For this I would recommend [MySQL Workbench](https://www.mysql.com/products/workbench/).

After installing the required software, make sure that you have a copy of the application on your local machine. Then, copy the seed file located in the seeds directory and execute it in either MySQL Workbench or PHPMyAdmin (available if you installed MAMP or XAMPP). Additionally, execute the CSVs (this will allow your tables to be populated with data). After this, make sure that all of the information pertaining to your database setup matches the Database.php file in the config folder.

## Usage 

Get a list of all companies for the specified year by using the `/{year}/companies` endpoint.

* The API will return 25 items per page by default. 
To request another page, use the ?page parameter. 
To change the amount of items per page, use the ?limit parameter.

Get information about a specific company for the specified year by using the `/{year}/rank/{number}` endpoint.

Instead of running locally, the application can also be ran here:
 * [Fortune 500 API](https://fortune500api.sndbxx.com/)

## Finished Project

![1680558246753](https://user-images.githubusercontent.com/67942678/229634304-223f032d-4991-44c3-be9a-3bc87ca74f8c.png)

## Credits

* [PHP](https://www.php.net/)
* [MySQL](https://www.mysql.com/)
* [Apache](https://httpd.apache.org/)

## License

MIT License

&copy; 2023, Kai Reid

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.