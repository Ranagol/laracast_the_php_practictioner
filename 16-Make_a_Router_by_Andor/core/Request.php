<?php
//this class will be responsible for the fetching information about the current browser request

class Request{
	public static function uri(){
		return trim($_SERVER['REQUEST_URI'], '/');//this will display the uri on our webpage.But, there will be a lot of / signs on the display. We want to get rid of that. For this, we can use the trim function. trim — Strips whitespace (or other characters, (like the '/')) from the beginning and end of a string.
	}
}

