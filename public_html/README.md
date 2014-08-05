# CSE Scholars Website

## Table of Contents
1. Setup
2. How the site works
3. Making Changes
4. Pushing to the server

## 1. Setup
You'll need the following
* MAMP (or some other kind of PHP server)
* Sublime text (or some other text editor)
* Git

Use git to grab the site from Github. If you're reading this, you've probably already there. Now, startup MAMP. You'll need to set MAMP to point to this site (it won't know what else should be served otherwise - you have a lot of stuff on your computer). At that point, you can go to localhost:<MAMP's port number>/index.php (or a different page) to see the website. Use sublime to make changes and then you're good. Be sure to commit your changes using git. 

## 2. How the site works
The site is meant to mimick a web framework like Rails or Django.
All of the data is stored on Parse, which is a web backend. Basically, it's just a fancy database in the cloud. That way, we don't have to deal with the school's server.
The views/ folder contains all of the logic that drives the site. Each page redirects to a view in that folder. That view does some stuff and then displays data inside a template to the user. Try looking through the resume book to get a good idea of what exactly happens. 
The templates/ folder contains all of the templates for the site. This is the actual html that gets shown to the user. A view takes some data, places it inside a template, and then shows that to the user. The templates are placed into multiple parts. All templates use the same layout file, which dictates the beginning and end of every page's HTML.
The static/ folder contains all of the css and images for the site. You should place images here.
The login/ folder contains the black magic for login. Just don't touch it - I don't think anybody truly understands it.
Twig/ , parse/ and Google/ are libraries used for things inside the views/ folder. No need to touch them.

## 3. Making Changes
There's really only a couple changes that you'll have to make. Changing the calendar, officers, and number of social/corporate/service events necessary for membership. One day, this will be easier. That day probably won't be soon.

### 3a. Changing calendar, officers
You'll have to change the template files. The calendar.php and officers.php files are simply code that loads the templates. templates/calendar.phtml and templates/officers.phtml contain the html that will need to be changed. The site's built in bootstrap. It's pretty self-explanatory once you see the code.

### 3b. Changing number of events
This one is a bit harder. Basically, all of the logic is held within the member_info views. When somebody logs into their account, it'll check to see if they're elgible for full membership and give it to them if applicable. You'll have to change the values in views/member_info.php. Next, you'll have to change the graph that's shown to members who don't have enough hours. This is javascript code contained within templates/member_info.phtml

## 4. Making changes
First, make the changes. Then commit to master. Then, commit to upstream. 
