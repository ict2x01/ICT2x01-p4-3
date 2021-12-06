# carKART
This is a basic project for children aged 9 to 12 to learning programming through gamification (code blocks).

## Setup Instructions
### Dependencies
- PHP 
- SQLite3
- Apache

### Installation (Windows)
1. Download `"XAMPP"` from the website https://www.apachefriends.org/index.html 
2. On the installation page uncheck everything expect for `"Apache"` and `"PHP"`

![image](https://user-images.githubusercontent.com/33278298/144864710-3c5d4f79-048f-4807-aaf3-2de491165b64.png)

3. Choose a folder to install XAMPP on and take note of the path

4. After installing go into `"Environment Variables"`, you can do so by searching `"Environmental Variable"` on the Windows search bar

![image](https://user-images.githubusercontent.com/33278298/144865278-9d82c233-bc08-4a37-b3d7-4ddd3c18276f.png)

5. Add the path from point 3, into the `PATH` section in `"System Variables"` under `"Environmental Variable"`

![image](https://user-images.githubusercontent.com/33278298/144865694-c095112d-82f0-4b5f-8f76-f2cfe7aacaca.png)

6. Go into the path from point 3, look for `"php" -> "php.ini"`, inside the `"php.ini"` file uncomment `"extension=sqlite3"`

![image](https://user-images.githubusercontent.com/33278298/144866302-0edd5f11-82bc-48da-9ae6-2e5a724d16ae.png)

### Installation (Debian/Ubuntu Linux)
1. Install the required packages from apt in the terminal.
- Install PHP and Apache.
- `sudo apt install -y apache2 php libapache2-mod-php`
- Depending on the version of PHP, install the corresponding version of PHP SQLite.
- `sudo apt install -y php$(php -v | head -1 | cut -d ' ' -f2 | cut -d '.' -f1,2)-sqlite3`
2. Restart the Apache service.
- `sudo service apache2 restart`

### Running
1. Open `cmd` in Windows or the terminal in Linux
2. Go into the directory where the project is downloaded
3. Insert command `php -S localhost:8000`
4. Access `localhost:8000` in any desired web browser

## Development Workflow
### Branching Setup
1. The `main` branch will serve the final completed web service product.
1. `dev` will serve as a center point for all features, before merging into `main` for the final product. 
2. All features will have to be branch off from `dev` and be worked on individually before merging back to `dev` upon completion.
3. The `base` branch will contain all the universal files that is needed by all other feature and pages that contain no features.

### New Features
1. All feature branches should be named `feature/<feature_name>`.
2. All front-end files of the new features are to be split into four folders `templates`, `styles`, `images` and `scripts`.
- `templates` are to contain only UI related files that contain no logic.
- `styles` are to contain only CSS and beautify files.
- `images` are to contain only images.
- `scripts` are to contain only front-end logic of features such as Javascript files.
3. For files related to the server-side logic, it is to be placed in a folder name `backend_scripts`.
4. Files have to be named according to the feature that they contain. example: `<feature>page.php`

**Exception: index.php - This file will not reside in any folder to allow hosted server to automatically run it.**

### Bug Fixes and Code edits
1. Changes to features' code after merging to `dev` have to be commited back to feature branch and merge again.
2. Do not commit directly into `dev` branch. 

### Git Commands
1. `git checkout -b <branchname>` - For a new branch
2. `git add` - Adding file locally
3. `git commit -m "<message>"` - Committing added files with message
4. `git push` - Pushing from local to remote

### Commits
1. For all commits please give a descriptive message on the update commited. 

### Merging into `master`
Merging into `master` will only be allowed when every feature branch have been completed and merged into `dev`.
    

## UAT 
Uploaded diagrams can be found in the folder `diagrams`.

### Updated Use Case Diagram
![usecasediagram](https://user-images.githubusercontent.com/33278298/144854681-48e9a177-552b-453d-954d-29faa66bbe73.png)
1. "Upload Challenge" is changed to "Create Challenge" - Trainers will create the challenge on the web portal itself instead of uploading

### Updated System State Diagram
![system_state_diagram](https://user-images.githubusercontent.com/33278298/144854700-a89bdaf5-20ba-45c7-9359-378524571c73.png)
1. Instruction state is now accessed from the play state instead of main state
2. Uploading of challenge is now creating of challenge, checks for file uploads are removed 

### Blackbox Testing (UAT) Video
The UAT video can be found in the folder `tests`, or on YouTube at https://youtu.be/2ROyMSwDPJg.
[![Watch the video](https://i.imgur.com/2ROyMSwDPJg)](https://youtu.be/2ROyMSwDPJg)


## Whitebox Testing
The test suite and code coverage statistics were run and generated by a automated testing framework library for PHP called `PHPunit` along with an additional php extension, `XDebug`.

### Test Cases
The test cases is located at `test` directory under the name of `challengemanagementTest.php`.
```
<?php 

class challengemanagementTest extends \PHPUnit\Framework\TestCase{
    public function test_symbolname(){
        $challenge = new project\challengemanagement;
        $result = $challenge->validatename("$@#@$$!");

        $this->assertEquals("Invalid challenge name.", $result);
    }

    public function test_emptyname(){
        $challenge = new project\challengemanagement;
        $result = $challenge->validatename("");

        $this->assertEquals("Invalid challenge name.", $result);
    }

    public function test_longname(){
        $challenge = new project\challengemanagement;
        $result = $challenge->validatename("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
        aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa");

        $this->assertEquals("Invalid challenge name.", $result);
    }

    public function test_correctname(){
        $challenge = new project\challengemanagement;
        $result = $challenge->validatename("Challenge Maze!");

        $this->assertEquals("", $result);
    }

    public function test_emptyendpoint(){
        $challenge = new project\challengemanagement;
        $result = $challenge->validatepoints("");

        $this->assertEquals("Invalid endpoints input.", $result);
    }

    public function test_symbolinendpoint(){
        $challenge = new project\challengemanagement;
        $result = $challenge->validatepoints("4%");

        $this->assertEquals("Invalid endpoints input.", $result);
    }

    public function test_longendpoint(){
        $challenge = new project\challengemanagement;
        $result = $challenge->validatepoints("444445");

        $this->assertEquals("Invalid endpoints input.", $result);
    }

    public function test_nonnumeralendpoint(){
        $challenge = new project\challengemanagement;
        $result = $challenge->validatepoints("a");

        $this->assertEquals("Invalid endpoints input.", $result);
    }

    public function test_correctendpoints(){
        $challenge = new project\challengemanagement;
        $result = $challenge->validatepoints("5");

        $this->assertEquals("", $result);
    }

}

?>
```

### Test Case Execution & Result

![whitebox](https://user-images.githubusercontent.com/33278298/144887926-4e2c4e15-7a5d-4fd8-9c33-ebb24cc6ef58.gif)

Results of test case execution: 

![image](https://user-images.githubusercontent.com/33278298/144888068-7189b42f-b5cc-4bb4-81f1-0344894487b9.png)

### Code Coverage Execution & Result
The code coverage results can be found in the `test` directory under `html/challengemanagement.php.html`

![codecoverage](https://user-images.githubusercontent.com/33278298/144894990-5fbde79d-44cf-43b0-82d3-165d173511de.gif)

Hovering over the green-highlighted code lines will allow us to see which test case covered the code

![image](https://user-images.githubusercontent.com/33278298/144896964-ecd01893-7a6e-4279-88ab-541f4068ea28.png)

Results of Code Coverage execution:

![image](https://user-images.githubusercontent.com/33278298/144896733-d96ee9d6-447f-4e00-8788-59f4e7e66834.png)

## Running the Test Suite
## Dependencies
1. Composer
2. PHPUnit

## Installation and execution
`Composer:`
1. `Composer` can be downloaded from https://getcomposer.org/download/, click on `Composer-Setup.exe`
2. Run the downloaded exe and follow the steps to complete installation

`PHPUnit:`
1. Once composer is installed open up the terminal or cmd and run the following code
``` composer require phpunit/phpunit```

2. In the root directory of the project, create a `phpunit.xml` file that includes the following content
``` <?version version="1.0" encoding="UTF-8" ?>
<phpunit bootstrap="vendor/autoload.php"
    colors="true"
    stopOnFailure="false">

    <testsuites>
        <testsuite name="challengemanagement">
            <directory>tests</directory>
        </testsuite>
    </testsuites>

    <filter>
        <whitelist processUncoveredFilesFromWhitelist="true">
        <directory suffix=".php">challengemanagement.php</directory>
        <file>/path/to/file</file>
        </whitelist>
        </filter>
</phpunit>
```
3. Run the command `./vendor/bin/phpunit --testdox` for the test suite results. PHPUnit will automatically detect the test suite with the name `xxxTest`.

Successful:

![image](https://user-images.githubusercontent.com/33278298/144899564-9c4eb9c3-909b-441f-ba4f-c65f880aad20.png)

Failure: Example when a test case did not pass the test

![image](https://user-images.githubusercontent.com/33278298/144899757-83c302e0-b2af-41f1-b9a9-77030008cdea.png)


### Running Code Coverage
## Dependencies
1. XDebug
2. PHPUnit
3. Composer

`PHPUnit` and `Composer` should have been installed earlier.
`Xdebug:`
1. To install run the command in terminal or cmd `composer require phpunit/php-code-coverage`
2. Install Xdebug by going to this website `https://xdebug.org/wizard`
3. Generate and paste your `phpinfo()`. To generate type `php -i` into terminal/cmd.
4. Following the instructions and download XDebug
5. Go into `php.ini` file and include the following lines
``` 
zend_extension = xdebug
xdebug.mode=coverage
```
6. Restart IDE and webserver and run the following command on terminal/cmd **in the root directory of the project**
```
./vendor/bin/phpunit --coverage-html html
```
7. The coverage results will then be generated in the `html` file.





