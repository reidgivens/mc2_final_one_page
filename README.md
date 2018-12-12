# mc2 final one page

This landing page is a test for applicants to MC2. This one, in particular, was done by Reid Givens.

## How to make it run

While the index page is a php file, it's really just html. It's only php so I could write a little loop to make the headshots show up with a little less typing. 

All of the libraries are linked to from a cdn, so as long as there is internet access and the ability to run php files, all should work.

There is client and server-side validation on the form, and the form is set up to send an email; however, it assumes the server can send email and relies on php's built-in mail() command. I usually use SSMTP for that, but because I don't know the server environment, that may not actually work.

## Did I follow the criteria?

```
Requirement 1: Build a mobile-responsive page using the latest Bootstrap version or other preferred HTML or Javascript framework
```
Check. I used bootstrap 4. Looking at this page in isolation I though about using no framework because that would have taken less mark-up, but I figured that wasn't what you wanted. I figured that on account of it being a requirement :)

```
Requirement 2: Build page using combination of HTML, CSS and/or PHP
```
Check. Not much else to say about this one.

```
Requirement 3. Provide packaged site in .zip format (mc2_final_one_page.zip) when completed and provide shared link OR see number 6 below. Please provide any deployment instructions if applicable.
```

Clearly, I used git - cause here we are. Deployment instructions: put it on a server that has php and preferably the ability to send mail.

If you really want to get fancy, put this on a server with Postgres, create a user and database that user owns


    createuser MyDBUsername -P
    # enter password when prompted
    createdb myDbName -O MyDBUsername
    psql myDbName -U MyDBUsername
    \i /path-to-root/includes/db.sql

Then update the top of the /includes/database.php file to the credentials you used, and uncomment the database related code in the /do-something.php file (line 3, and lines 47 - 56).

Of course, there is no interface to see anything in the database outside of using psql on the command line, so you could just skip that part and read the code to see what it wants to do.

```
Requirement 4. Please track time and provide final time it took to complete the project.
```

I estimate this took about 4 hours total.

I say estimate because, as luck would have it, as soon as I got about 20 minutes into this some things came up that required immediate attention. I had to keep starting and stopping and had to relocate halfway through rather than just getting to bang it all out at once.

More or less it went like this:

2 hours doing the markup
45 minutes dealing with the form (client and server side)
45 minutes writing the database code
30 minutes lost here and there to me debating on whether to do it "the fast way" or "the complicated way to show as much technology as possible". I mostly settled on the fast way.

Also: 

30 minutes looking things up, getting set up with git and github (not included in the total)
15 minutes looking up what changed between Bootstrap 2 (the last time I used it) and Bootstrap 4 (included in the 2 hours of markup)

```
Requirement 5. Video for embed: https://vimeo.com/71266671
```
```
Requirement 6. Font is available at https://fonts.google.com/specimen/Lato
```

They're in there.

## Any bonus points?

```
Bonus 1: Write CSS using preprocessing languages like SASS or LESS
```

I didn't use a css preprocessor. I almost did because I'm all about extra-credit, but it just seemed like so much over-engineering for this. I've also only ever used SASS once and I'm dubious about the benefits of it, so I knew it would be a learning curve that would eat up some time I didn't want to spend. To much disclosure? Maybe.

```
Bonus 2: Use automation tools like Grunt or Gulp to compile SASS/LESS, minify code, or show off any other impressive automations.
```

I didn't do this one either. I didn't use SASS or LESS, all the JS is already minified from the CDN, and my CSS file is only 28 lines long. I just couldn't bring myself to do it.

```
Bonus 3: FORM: build the form to be fully functional either using PHP Mailer or another preferred technology you would like to showcase.
```

I'm not sure if I get credit for this one. Yes there is server-side form handling and validation, and yes if the server can send email it will - but I didn't use PHP Mailer or any other library. As previously mentioned I usually solve this on the server by installing SSMTP and letting the built-in mail() function in php send to it. I also wasn't sure how to get it to work in this example using a lbrary without using my own credentials in the config, so I didn't do it. 

```
Bonus 4. FORM: utilize Javascript (or any Javascript library or jQuery plugin, etc.) and/or PHP or any other technologies to validate form and provide user feedback.
```

I used the jQuery validate plugin for client-side validation and plain ol' php for the server side.

```
5. Feel free to utilize any other skills or languages not mentioned above that showcase your skillsets.
```

I added a little css animated phone icon by the phone number for fun, and also wrote the scrips needed to store all of the form inputs into a database. I assumed a postgres backend and included the schema in /includes/db.sql and the connection and helper function in /includes/database.php. I did ultimately comment out the inclusion of all of this code in the form processing target (do-somthing.php) because setting up the database and all that may not be done so I didn't want it to blow up the demo. 

```
6. Utilize .git for tracking files and sharing your finished page and resources.
```

Well, clearly that part was done.