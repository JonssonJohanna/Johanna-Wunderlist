<img src="https://media.giphy.com/media/aSZSj0mT8f6tW/giphy.gif" alt="mandatory gif">

# Johanna-Wunderlist

This is our christmas assignment in PHP, SQL, HTML, CSS and JavaScript, the purpose was to create a to-do website where users can create lists and tasks to organize their every day life.
Link to GitHub repo: https://github.com/JonssonJohanna/Johanna-Wunderlist

# Installation

Follow the steps below for installation.

1. clone the repository so that you can access the files on your computer and open them in your code editor. https://github.com/JonssonJohanna/Johanna-Wunderlist
2. Open the project in your editor
3. Write php -S localhost:8000 in the terminal and open the link.
4. To see the project in your browser, file and click Open Live server.

# Code Review

Code review written by [Jane Doh](https://github.com/username).

1. `app.css:25` - Here you forgot to use consistent case syntax on one class!
2. `app/users/register.php:37` - After signing up, it would be nice to be redirected to the login page.
3. `app/posts` - I think you could delete the posts-folder since it’s not being used.
4. Really good error messages and success-messages everywhere, something I’d like to implement on my own code.
5. You have easy to read code with helpful comments
6. `create.php:100` - When creating a task, I would personally like it when description is not required so that it’s faster for the user to create tasks.
7. `update.php:45-75` - When changing password, I think it’s awesome that you have to write the new password twice, and that you check that it matches. I’d like to implement that on my own code. Maybe it’d be even more secure if you make it so that you have to write your current password as well. 
8. `index.php:29-54` - In the table on the homepage, it’d be nice to have some margin to the left of the tasks. 
9. Perhaps you could move the buttons on the edit profile page to align on the same column, or make them consistently either inline och block.
10. `navigation.php:19-21` - I would move the logout button to the end of the navbar or separate it from all the other links. It’s easy to accidentally logout with the button in between Home and Edit profile.



# Testers

Tested by the following people:

1. Jennifer Andersson
2. Hanna Rosenberg
