console.log("<h1>Hi!</h1>".match(/<\/?[a-z][a-z0-9]>/gi));
console.log("<h1>Hi!</h1>".match(/<\/?\w+>/gi));

/* Quantifiers +, *, ? and {n} */
    /* + same as {1,}, * same as {0,}, ? same as {0,1} */
console.log("1 is 12 is 1234 is 123456 is 1234567".match(/\d{2,6}/gi)); /* match from 2 to 6 times */
console.log("1 is 12 is 1234".match(/\d{1,}/gi)); /* match one or more occurances like + */

/* Alternation (OR) | */
    /* gr(a|e)y means exactly the same as gr[ae]y i.e. (a|e) same as [ae] */
    /* [rae] means r or a or e */
    /* gra|ey means gra or ey */

console.log("First HTML, then Javascript".match(/html|css|java(script)?/gi));
console.log("00:00 10:10 23:59 25:99 1:2".match(/[01]\d|2[0-3]:[0-5]\d/gi));

/* Character classes */
    /* \d – digits, \D – non-digits.
    \s – space symbols, tabs, newlines,\S – all but \s.
    \w – Any wordly including Latin letters, digits, underscore '_', \W – all but \w.
    . – any character if with the regexp 's' flag, otherwise any except a newline \n. */

console.log("+7(903)-123-45-67".match(/\d/g)); // 79031234567
console.log("+7(903)-123-45-67".replace(/\D/g, "")); // 79031234567

/* Anchors ^(caret) $ */
    /* /^\d/gm takes a digit from the beginning of each line but without the flag m only the first digit(start of the text line) is matched */
    /* /\d$/gm finds the last digit in every line but without the flag m only the last digit(end of text line) is matched*/

/* Excluding ranges [^...] */
    /*  [^aeyo] – any character except 'a', 'e', 'y' or 'o'.
        [^0-9] – any character except a digit, the same as \D.
        [^\s] – any non-space character, same as \S. */
    console.log("example15@gmail.com".match(/[^\d\sA-Z]/gmi)); /* ["@", "."] */
    console.log("(1 + 2 - 3)".match(/[-().^+]/gi)); /* inside square bracket[] doesn't need(optional) to use any escaping("\") */

/* Capturing groups(...) */
    console.log("site.com my.site.com".match(/(\w+\.)+\w+/g)); // ["site.com", "my.site.com"]

/* Named capturing group: (?<name>...), (?'name'regex) or (?P<name>regex) */

    /* Name:"John" Surname:"Doe" Email:"john@example.com"

    Consider the following regex pattern:

    Name:"(?<Name>[\w]+?)".*?Surname:"(?<Surname>[\w]+?)".*?Email:"(?<Email>\b[\w.%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,6}\b)" */

    console.log("John 123".replace(/(\w+) (\d+)/gi, "$2, $1")); /* $n, where n is the group number */

    console.log("2022-12-23".replace(/(?<year>\d{4})-(?<month>\d{2})-(?<day>\d{2})/g, "$<year>-$<day>")); // 2022-23

    console.log("2022-12-23".replace(/(?<year>\d{4})-(?<month>\d{2})-(?<day>\d{2})/g, "$1-$3")); // 2022-23

    console.log("2022-12-23 gjhjf".match(/(?<year>[0-9]{4})-(?<month>[0-9]{2})-(?<day>[0-9]{2})/).groups.year); // 2022

    console.log("2022-12-23".replace(/(?<year>[0-9]{4})-(?<month>[0-9]{2})-(?<day>[0-9]{2})/g, "$<month>.$<day>"));

    console.log("2019-10-30, 2020-01-01".replace(/(?<year>[0-9]{4})-(?<month>[0-9]{2})-(?<day>[0-9]{2})/g, '$<day>.$<month>.$<year>'));
    // 30.10.2019, 01.01.2020

    let results = "2019-10-30 2020-01-01".matchAll(/(?<year>[0-9]{4})-(?<month>[0-9]{2})-(?<day>[0-9]{2})/g);

    for(let result of results) {
    let {year, month, day} = result.groups;
    console.log(`${day}.${month}.${year}`);
    // first: 30.10.2019
    // second: 01.01.2020
    }

/* Non-capturing group: (?:...) */
    console.log("Gogogo 123".match(/(?:go)+ (\w+)/i)); //['Gogogo 123','123',index: 0,input: 'Gogogo 123',groups: undefined] 
                                                         /* ?: excludes 'go' from capturing */

/* Lookahead assertion: (?=...), (?!...) */

/* Lookbehind assertion: (?<=...), (?<!...) */

/* new RegExp */
    let regexp = new RegExp("\\d\\.\\d", "g"); /* in case of new RegExp, double backslashes \\ used, cause string quotes consume one of them */
    console.log("Chapter 5.1".match(regexp));


/* Point to be Noted */
    /* 
    To search for special characters [ \ ^ $ . | ? * + ( ) literally, we need to prepend them with a backslash \ (“escape them”).
    We also need to escape / if we’re inside /.../ (but not inside new RegExp).
    When passing a string to new RegExp, we need to double backslashes \\, cause string quotes consume one of them
     */