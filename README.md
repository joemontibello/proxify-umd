Adds a proxy prefix to a URL. Shortens the result using Bitly. Returns a bitly link.  
The resulting link will route the clicker through the University of Maryland's proxy server for user authentication.  
To adapt the script to a different institution, change the ```$proxyPrefix``` variable in ```proxify.php```  
You'll also need to register for a bitly api key. Set your bitly user name and api key as environment variables. Check your server's documentation for ways to do that. I use a ```.htaccess``` file in an Apache server.  
