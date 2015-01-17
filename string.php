<?php
/*
* A .NET style string helper library.
* By Duco Winterwerp (duco.cc) 2015
* Released under the MIT license
Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/
class Str{
	/*
	* This function concatinates the given strings.
	* 1st argument: the separator character(e.g. " ", "", "-" etc.)
	* 2nd argument: can be an array with strings which should be concatinated (e.g. array("This", "should", "be", "concatinated"))
	* 2nd-nth argument: you can supply an infinite number of strings to this function
	* Returns the concatinated string
	*/
	public static function concat(){
		$separator = func_get_arg(0);
		if($separator === false){
			$separator = "";
		}
		if(func_num_args() <= 1){
			return "";
		}
		if(is_array(func_get_arg(1))){
			return implode($separator, func_get_arg(1));
		}
		else if(is_string(func_get_arg(1))){
			$array = array();
			if(func_num_args() > 1){
				for($i=0;$i<(func_num_args()-1);$i++){
					$array[] = func_get_arg($i+1);
				}
				return implode($separator, $array);
			}
		}
		return "";
	}
	
	/*
	* Returns true when argument 2 is found in argument 1
	* 1st argument: the string which should be searched in
	* 2nd argument: the string which should be searched for
	* 3rd argument (optional): true for case insensitive
	* Returns true when argument 2 is found
	*/
	public static function contains($string, $search){
		if(func_num_args() == 3 && is_bool(func_get_arg(2)) && func_get_arg(2)){
			return stristr($string, $search) !== false;
		}
		return strpos($string, $search) !== false;
	}
	/*
	* Returns true when the argument 1 ends with argument 2
	* 1st argument: the string which should be searched in
	* 2nd argument: the string which should be searched for
	* 3rd argument (optional): true for case insensitive
	* Returns true when the argument 1 ends with argument 2
	* http://stackoverflow.com/questions/834303/startswith-and-endswith-functions-in-php
	*/
	public static function endsWith($string, $search){
		if(func_num_args() == 3 && is_bool(func_get_arg(2)) && func_get_arg(2)){
			return $search === "" || stristr($string, $search, strlen($string) - strlen($search)) !== false;
		}
		return $search === "" || strpos($string, $search, strlen($string) - strlen($search)) !== false;
	}
	
	/*
	* Formats a given string. Example:
	* Str::format("Hello, my name is {0} {1} and I'm {2} years old", "John", "Johnson", "30");
	* Output: Hello, my name is John Johnson and I'm 30 years old
	*/
	public static function format($string){
		if(func_num_args() > 1){
			for($i=0;$i<(func_num_args()-1);$i++){
				$string = str_replace("{".($i)."}", func_get_arg($i+1), $string);
			}
		}
		return $string;
	}
	
	/*
	* Returns the first found position of a given string in another string
	* 1st argument: the string which should be searched in
	* 2nd argument: the string which should be searched for
	* 3rd argument (optional): true for case insensitive
	* Returns -1 when the string isn't found, else the position of the first found occurence is returned
	*/
	public static function indexOf($string, $search){
		if(func_num_args() == 3 && is_bool(func_get_arg(2)) && func_get_arg(2)){
			$position = stripos($string, $search);
		}
		else{
			$position = strpos($string, $search);
		}
		if($position === false){
			return -1;
		}
		return $position;
	}
	
	/*
	* Inserts a string in another string at a given position
	* 1st argument: the string
	* 2nd argument: the string which should be inserted
	* 3rd argument (optional): the position where the string should be inserted
	* Returns the new string
	*/
	public static function insert($string, $new_string, $position = 0){
		return substr_replace($string, $new_string, $position, 0);
	}
	
	/*
	* Returns true if string is null or empty
	*/
	public static function isNullOrEmpty($string){
		return $string === null || $string === "";
	}
	
	/*
	* Returns an array with strings, separated by argument 2
	* 1st argument: the string
	* 2nd argument (optional): the character where the string should be split
	* Returns an array with strings
	*/
	public static function split($string, $character = " "){
		return explode($character, $string);
	}
	
	/*
	* Returns true when the argument 1 starts with argument 2
	* 1st argument: the string which should be searched in
	* 2nd argument: the string which should be searched for
	* 3rd argument (optional): true for case insensitive
	* Returns true when the argument 1 starts with argument 2
	* http://stackoverflow.com/questions/834303/startswith-and-endswith-functions-in-php
	*/
	public static function startsWith($string, $search){
		if(func_num_args() == 3 && is_bool(func_get_arg(2)) && func_get_arg(2)){
			return $search === "" || stristr($string, $search, -strlen($string)) !== false;
		}
		return $search === "" || strrpos($string, $search, -strlen($string)) !== false;
	}
	
	/*
	* Returns a specific substring of a string
	* 1st argument: the string which should be searched in
	* 2nd argument: the position of the string where the substring should start
	* 3rd argument (optional): the length of the substring
	* Returns a specific substring of a string
	*/
	public static function substring($string, $start, $length = 0){
		if($length !== 0){
			return substr($string, $start, $length);
		}
		return substr($string, $start);
	}
	
	/*
	* Converts a string to lower case
	* 1st argument: the string
	* Returns the lower cased string
	*/
	public static function toLower($string){
		return strtolower($string);
	}
	
	/*
	* Converts a string to upper case
	* 1st argument: the string
	* Returns the upper cased string
	*/
	public static function toUpper($string){
		return strtoupper($string);
	}
}
?>