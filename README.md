# string.php
A .NET style string helper library for PHP. I don't really like the string functions in PHP, so I made this little library. It rewrites some existing functions and adds some new ones. Enjoy!

Some examples:

`<?php
include('./string.php');
var_dump(Str::concat(" ", array("1", "2", "3")));
var_dump(Str::concat(" ", "1", "2", "3"));
var_dump(Str::contains("John", "hn"));
var_dump(Str::contains("John", "Hn", true));
var_dump(Str::endsWith("Hello", "Llo", true));
var_dump(Str::format("Hello, my name is {0} {1} and I'm {2} years old", "John", "Johnson", "30"));
var_dump(Str::indexOf("Hello", "lo"));
var_dump(Str::insert("Hello", " world", 5));
var_dump(Str::isNullOrEmpty(""));
var_dump(Str::split("1 2 3", " "));
var_dump(Str::startsWith("Hello", "He", true));
var_dump(Str::substring("Hello world", 5));
var_dump(Str::toLower("HELLO WORLD!"));
var_dump(Str::toUpper("hello world!"));
?>`