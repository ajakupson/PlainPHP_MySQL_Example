# PlainPHP_MySQL_Example

## Task 1
Compose a script that shows a list of numbers from 1 to 30, each number on a separate line. If the number is divisible by three, replace the number with the text "divisible by three". If the number is divisible by five, replace the number with the text "divisible by five". If the number is divisible by both three and five, display "divisible by three and five".

## Task 2
Write a function that sums up all the members of an array and its sub-arrays. The members are  integers  or  subarrays  and  don’t  need  further  verification.  Sub-arrays  could  also  have arrays as members, the given array is multi-dimensional and has unlimited depth. Use only native PHP, non-array relatedfunctions.

## Task 3
Implement a "groupByAuthor" method that returns an associative array containing an array of book names for each author. Input array is:
```
[
  "Learning PHP" => "John Smith",
  "Understanding relational databases" => "Mary Little",
  "Freelancers" => "Robin Round", 
  "I love LISP" => "Mary Little",
  "Python for dummies" => "John Smith"
];
```
Expected result is (sorting order is not important):
```
[
  "John Smith" => ["Learning PHP", "Python for dummies"],
  "Mary Little" => ["Understanding relational databases", "I love LISP"],
  "Robin Round" => [“Freelancers"]
];
```

## Task 4
The  user  interface  contains  two  types  of  user  input  controls: TextInput,  which  accepts  all texts and NumericInput, which accepts only digits. Implement the class TextInput that contains:
- Public function add($value) - adds the given text to the current value.
- Public function getValue() - returns the current value (string).

Implement the class NumericInput that:
- Inherits from TextInput.
- Overrides the add method so that each non-numeric text is ignored.

For example, the following code should output '10':
```
$input = new NumericInput();
$input->add(‘1’);
$input->add(‘a’);
$input->add(‘0’);
echo $input->getValue();
```

## Task 5
Consider the following code:
```
$str1 = 'yabadabadoo';
$str2 = 'yaba';
if(strpos($str1,$str2)) { 
  echo "\"" . $str1 . "\" contains \"" . $str2 . "\"";
} else {
  echo "\"" . $str1 . "\" does not contain \"" . $str2 . "\"";
}
```
The output will be:\
"yabadabadoo" does not contain "yaba"\
Why? How can this code be fixed to work correctly?
