<?php
//this class will be responsible for the fetching information about the current browser request. We will extract these informations form the $_SERVER superglobal.
//There are two important thing about every browswer request. That is: 1.) the uri 2.) if that is a POST or a GET method. This will be used by the direct() method on the index.php.
//$_SERVER superglobal is an array containing information such as headers, paths, and script locations. The entries in this array are created by the web server. 


class Request{

	//now when a user types his name (example: Jeffrey) into the form, the link will look like this: /names?name=Jeffrey. So, we have to get rid of everything, except the Jeffrey. 
	//also there is that other option, when the user requested for example the about page.

	public static function uri(){//this will provide uri. Example: about.
		return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');//this specifies what segment are we interested in in the uri (example: which is the Jeffrey)

		//this will display the uri form our webpage.But, there will be a lot of / signs on the display. We want to get rid of that. For this, we can use the trim function. trim — Strips whitespace (or other characters, (like the '/')) from the beginning and end of a string.
	}


	public static function method(){//this will provide the get or post method
		return $_SERVER['REQUEST_METHOD'];//this will give us get or post method
	}
}

