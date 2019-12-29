<?php
//this class will be responsible for the fetching information about the current browser request. That is: 1.) the uri 2.) if that is a POST or a GET method. This will be used by the direct() method on the index.php.

class Request{

	//now when a user types his name into the form, the link will look like this: /names?name=Jeffrey. So, we have to get rid of everything, except the Jeffrey. Our current trim setup will get rid of the / from the beginning, but we will still end up with this: names?name=Jeffrey. 


	public static function uri(){
		return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');//this specifies what segment are we interested in in the uri (which is the Jeffrey)

		//this will display the uri on our webpage.But, there will be a lot of / signs on the display. We want to get rid of that. For this, we can use the trim function. trim — Strips whitespace (or other characters, (like the '/')) from the beginning and end of a string.
	}

	public static function method(){
		return $_SERVER['REQUEST_METHOD'];//this will give us get or post method
	}
}

