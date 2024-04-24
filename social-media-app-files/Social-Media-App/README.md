In order 2 see the background again move your background into the assets folder.

What I Added:
- Better Code Structure
- Boxicons CDN For Icons
- Added a hrefs to switch between login and register
- Added User Authentication With Password Hashing
- Prepared Statements to prevent sql injection
- PHP Folder with config.php (this holds the connection to your database)
- htacess file to use clean urls, without the url would look like mywebsite.com/index.php, or login.php now it looks like:
mywebsite.com (for the index file) and mywebsite.com/login


How to use xampp and see the website in action:
1. Install XAMPP (Apache & MySQL)
2. Start Both Services
3. Type in browser localhost/phpmyadmin to open phpmyadmin (this is your database manager)
4. Click on the left side on "New"
5. Give your Database a Name, i picked social-media-app-discord (so it connects the code in the config file to phpmyadmin)
6. Click on the top where it says "import"
7. click on search and choose the sql file called users.sql in the sql folder
8. open a new browser tab and type: localhost
9. it will open the php dashboard but we dont need that
10. open cmd and type this: explorer C:\xampp\htdocs
11. this opens your htdocs folder, this is your new development directory where you can manage your projects
12. press ctrl + a (to select everything) & delete it, we dont need all this crap.
13. take the whole content of this folder and paste it into the htdocs folder.
14. Now if you refresh localhost or just open a new tab and type "localhost" you will see the folder
15. since we dont have a index.php file it will give you an error, because the main entry point of every website is
the index file
16. just put your index.html or index.php in the folder and that should fix the program, or you type after the slash / login
17. now you can see your project and register a new user and then log in
18. after that you can see in localhost/phpmyadmin the new registered user with username and the hashed password
19. i used a simple algorithm for this project but i can use a different one later.
20. you can create new .html or .php files to work on the website

21. i would suggest you test everything and start working on the frontend (.html files)
i will convert them later to .php and add the backend

Have fun!