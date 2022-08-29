# Words calculator

## Installation
$ composer install
$ docker exec -it php_advanced_app php bin/console doctrine:migrations:migrate
$ docker-compose up

Open in browser at http://0.0.0.0:8000

## Version #2
### changes:
- Calculate a hash for the text and add it to the Statistical information part.

- Users should be able to upload a file to analyze. Supported formats:

>TXT

>XML

>HTML

>(Optional) Add any other format that you like.

- Users should be able to export the result of the text analysis in the following formats:

>CSV

>XML

>XLSX

- Users should be able to select and view the last 10 results that he or she created on the site. Use session to achieve this.

- The results should be saved to a database and there should be a page where users could see some global statistical data:

> Average of statistical data of submitted texts

> Number of texts submitted

- Users should be able to get the global statistical data in the given timeframe. A start and end date field should be added to the page.

- Users should be able to specify an URL to be analyzed instead of text input or an uploaded file.

- If the given text was already analyzed, when it is sent again to be analyzed, it should load the previous result without parsing the text again. Use the results saved in the database.