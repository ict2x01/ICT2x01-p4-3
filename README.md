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

### Running
1. Open `cmd`
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


## Whitebox Testing
