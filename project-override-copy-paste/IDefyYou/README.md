# I defy You- Abhisaran
It annoys me to no end when a web application prevents me from being able to
 copy and paste content into an input field, or copy it out.  If I paste an incorrect
email address, that's my own damn fault.


## Solution

This is a dead simple Google Chrome extension that removes copy and paste
blocking.


## Configuration

There are some sites that do helpful things with copy and paste events, and for
those sites you want their paste event handlers to still work. In the options
for this extension, you can add an exclusion pattern that matches the site's
 URL, which will prevent this extension from running on that site, and thereby 
allowing the paste event to occur.

