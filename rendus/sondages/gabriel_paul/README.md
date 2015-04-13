# BADASS POLL V1.0
*For a live demo, visit [http://badass.pgab.me](http://badass.pgab.me)*

---

*WARNING, THE WEBSITE USES URL REWRITING TO DISPLAY INDIVIDUAL CONTENDERS (see below for more information). PLEASE UPLOAD IT WITH .htaccess FILE ON A SERVER ENABLING URL REWRITING. ELSE, DOWNLOAD THIS [script.js](http://badass.pgab.me/src/js/noRewriting.js) AND USE IT INSTEAD OF script.js ON index.php*


##Basics

Badass Poll is a simple way to sort and visualize your favorite movie heroes. They are sorted after a poll based on their BADASSNESS. Users vote for the hero they think is the most badass, and the website automatically updates stats and creates a simple visualization of these stats. The heroes are ranked with [ELO Ranking system](https://github.com/Chovanec/elo-rating).

##FILE TREE

+ readme.md *You currently are reading this.*
+ poll_paul_gabriel_P2018_G1.sql  *Database of the project*
+  inc/  *folder containing php scripts*
+  + analytics.php *because it's worth it*
+ + config.php *configuration for database mostly*
+ + elo.php *contains elo class (from GitHub)*
+ + favicon.php *Used to include favicons*
+ + include.php *Used to group files to include*
+ + tools.php *all php functions are listed in this file to centralize functions*
+ public_html *Root of the web folder*
+ + ajax/
+ + + ajax.php *All scripts which are requested with AJAX*
+ + index.php *Default page, where you can vote and see stats*
+ + individual.php *Displays scores of a single contender with GET request*
+ + src/ *contains css, javascript, and photos*
+ + + css/ *contains a reset and the two stylesheets*
+ + + favicons/ *contains a bundle of favicon for all devices*
+ + + js/ *contains the script used on the main page, and on individual.php*
+ + + photos/ *contains all pictures of the contenders*




##USER INTERFACE
At first, the user is presented with a pair of heroes (picture and name), he has to decide which is the most badass.

The user votes for the hero he thinks is most badass by simply clicking it. Once he does, his vote is submitted automatically, and a new pair is proposed to him. The user can vote forever, so that the website has a viral and fun aspect.
A button will display results if the user wants to see them.

##USER LOGIC

###User actions
On the homepage, the user can only change view from vote to results. The user IP address is tracked and saved in database, along with his vote.

First, an AJAX request serves him with a pair of heroes (it cannot be the two same heroes). 
A script is used to fetch two heroes randomly from the database (the result is displayed in the ".result" div after the AJAX request is complete).

Then, once the user has chosen (and clicked his favorite hero), another AJAX request posts the data to another script, which processes the vote to calculate scores, and saves them in `contenders` table. (The POST request sends the ID of the winner and the loser, which are set as parameters for ELO ranking).

###Vote Registration

+ First the contenders have their new score calculated with ELO ranking (taking their current score into account) . Those two new scores are used to update the current score of the contender in the `contenders` table.
+  Then, the former score of the two heroes is also saved in `vote_history`, which will later be used to create progression stats. The voter IP is stored in this database alongside with the date of the vote.

###Displaying scores

Scores are gathered in order (highest first), and then the ranking is automatic. Then bars get a width based on the window width, proportional to their score, compared to the highest score.

For specific stats, the current score of the hero is fetched with its picture and name based on a GET request of its ID on a page. Then, the second database is used to retrieve its highest and lowest scores (if unset, those return 1000, which is the default score). Also, the 15 last scores are displayed in bars (see before for calculation of the size). If no votes have yet been registered for this hero, a message tells the user.

##POSSIBLE IMPROVEMENTS
+ The Elo system is able to calculate expected winners (and probability of win). Displaying those stats while asking the user to chose would be a nice way to study pair pressure. 
+ Prevent bots from voting (after 200+ votes, IP is banned for 12hours). 
+ Installing Admin Panel to add contenders (rather easy, except for the picture which would have to be resized without losing ratio)
+ Responsive Design (actually, DESIGN altogether)
+ Worst Enemy, Weakest opponent display 


