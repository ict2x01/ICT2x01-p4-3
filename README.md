# carKART
This is a basic project for children agre 9 to 12 to learning programming through gamification (code block).

## Setup Instructions
Dependencies
-  need php 
- need sqlite3
- php -S localhost:8000 (run it in the directory)
- go to browser and type in "localhost:8000"

## Development Workflow
### Branching Setup
1. The `main` branch will serve the final completed web service product.
1. `dev` will serve as a center point for all features, before merging into `main` for the final product. 
2. All features will have to be branch off from `dev` and be worked on individually before merging back to `dev` upon completion.

### New Features
1. All feature branches should be named `feature/<feature_name>`.
2. All front-end files of the new features are to be split into four folders `templates`, `styles`, `images` and `scripts`.
- `templates` are to contain only UI related files that contains no logic.
- `styles` are to contain only CSS and beautify files.
- `images` are to contain only images.
- `scritps` are to contain only front-end logic of features such as Javascript files.
3. For files related to the server-side logic, it is to be placed in a folder name `backend_scripts`.
4. Files have to be named according to the feature that it contains. example: `<feature>page.php`

**Exception: index.php - This file will not reside in any folder to allow hosted server to automatically run it.**

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

## Whitebox Testing
