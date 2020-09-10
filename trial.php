<html>
  <head>
    <title>Plain PHP with MySQL example</title>
    <style>
      body {
        width: auto;
        height: 100%;
        overflow-y: scroll;
        margin: 15px;
        box-sizing: border-box;
      }
      .task-description {
        margin: 10px;
        padding: 10px;
        box-sizing: border-box;
      }
      span.left-offset {
        margin-left: 25px;
      }
      div.code-block {
        margin: 15px;
        padding: 10px;
        box-sizing: border-box;
        background-color: lightgray;
        border: 1px solid gray;
      }
      div.left-offset-stars {
        margin-left: 50px;
        display: inline-block;
      }
      table td {
        border: 1px solid gray;
        width: auto;
        min-width: 50px;
        height: 50px;
        text-align: center;
        vertical-align: middle;
        padding: 10px;
        box-sizing: border-box;
      }
      .db-table tr:first-child {
        font-weight: bold;
      }
      img {
        border: 1px solid gray;
        margin: 15px;
      }
    </style>
  </head>
    <body>
      <?php
        echo '<h1>Plain PHP with MySQL example</h1><hr>';
        echo '<h1>PHP coding</h1>';

        echo '<hr>
              <h2>Task 1</h2>
              <div class="task-description">
                Compose a script that shows a list of numbers from 1 to 30, each number on a separate line.</br>
                If the number is divisible by three, replace the number with the text "divisible by three".</br>
                If the number is divisible by five, replace the number with the text "divisible by five".</br>
                If the number is divisible by both three and five, display "divisible by three and five".
              </div>';
        $listOfNumbers = range(1, 30);
        foreach($listOfNumbers as $number) {
          $result = $number;
          if($number % 3 == 0 && $number % 5 == 0) {
            $result .= ": divisible by three and five";
          } else if($number % 3 == 0) {
            $result .= ": divisible by three";
          } else if($number % 5 == 0) {
            $result .= ": divisible by five";
          }
          echo $result."<br/>";
        }

        $unlimitedDepthArrayOfNumbers =
        [
          1, 2, 3, [ 1, 2, 3 ], [ 1, 2, 3 ], 4, 5, 6,
          [ 1, 2, 3, [1, 2, 3, 4, 5], 4, 5, 6, 7 ],
          7, 8, [ 1, 2, [1, 2, [3, 4, 9], 5, [5, 5, 5, [10, 10, 10, [15, 15, 15, [20, 20, 20]]]]]],
          [10, 15, [5, 6, 7, [1, 2, [1, 1, 1]]], [1, 2, 3]]
        ];

        echo '<hr>
              <h2>Task 2</h2>
              <div class="task-description">
                Write a function that sums up all the members of an array and its sub-arrays.</br>
                The members are integers or subarrays and don\'t need further verification.</br>
                Sub-arrays could also have arrays as members, the given array is multi-dimensional and has unlimited depth.</br>
                Use only native PHP, non-array related functions.</br></br>
                <b>Array</b>: </br>
                [<br/>
                  <span class="left-offset"></span>1, 2, 3, [ 1, 2, 3 ], [ 1, 2, 3 ], 4, 5, 6,<br/>
                  <span class="left-offset"></span>[ 1, 2, 3, [1, 2, 3, 4, 5], 4, 5, 6, 7 ],<br/>
                  <span class="left-offset"></span>7, 8, [ 1, 2, [1, 2, [3, 4, 9], 5, [5, 5, 5, [10, 10, 10, [15, 15, 15, [20, 20, 20]]]]]],<br/>
                  <span class="left-offset"></span>[10, 15, [5, 6, 7, [1, 2, [1, 1, 1]]], [1, 2, 3]]<br/>
                ]
              </div>';

        function sumUpArrayMembers($arrayOfNumbers) {
          $sum = 0;
          foreach($arrayOfNumbers as $m) {
            if(is_array($m)) {
              $sum += sumUpArrayMembers($m);
            } else {
              $sum += $m;
            }
          }

          return $sum;
        }
        echo "<br/>Sum of all memebers of the array and its sub-arrays = ".sumUpArrayMembers($unlimitedDepthArrayOfNumbers);

        echo '<hr>
              <h2>Task 3</h2>
              <dic class="task-description">
              Implement a “groupByAuthor” method that returns an associative array containing an array of book names for each author.</br></br>
              <b>Input array</b>:<br/>
              [<br/>
                <span class="left-offset"></span>"Learning PHP" => "John Smith",<br/>
                <span class="left-offset"></span>"Understanding relational databases" => "Mary Little",<br/>
                <span class="left-offset"></span>"Freelancers" => "Robin Round",<br/>
                <span class="left-offset"></span>"I love LISP" => "Mary Little",<br/>
                <span class="left-offset"></span>"Python for dummies" => "John Smith"<br/>
              ];
              </div>';
        $inputArray = array(
          "Learning PHP" => "John Smith",
          "Understanding relational databases" => "Mary Little",
          "Freelancers" => "Robin Round",
          "I love LISP" => "Mary Little",
          "Python for dummies" => "John Smith"
        );

        function groupByAuthors($inputArray) {
          $keys = array_keys($inputArray);
          $groupedByAuthors = array();
          foreach($keys as $key) {
            if(!array_key_exists($inputArray[$key], $groupedByAuthors)) { $groupedByAuthors[$inputArray[$key]] = array(); }
            array_push($groupedByAuthors[$inputArray[$key]], $key);
          }
          return $groupedByAuthors;
        }
        print_r("<br/><b>Grouped by authors</b>:</br>");
        print_r(groupByAuthors($inputArray));

        echo '<hr>
              <h2>Task 4</h2>
              <div class="task-description">
                The user interface contains two types of user input controls: TextInput, which accepts all texts and NumericInput, which accepts only digits.<br/>
                Implement the class TextInput that contains:<br/>
                <span class="left-offset"></span>• Public function add($value) – adds the given text to the current value.<br/>
                <span class="left-offset"></span>• Public function getValue() – returns the current value (string).<br/>
                Implement the class NumericInput that:</br>
                <span class="left-offset"></span>• Inherits from TextInput.</br>
                <span class="left-offset"></span>• Overrides the add method so that each non-numeric text is ignored.<br/>
                For example, the following code should output "10":<br/>
                <div class="code-block">
                  <span class="left-offset"></span>$input = new NumericInput();<br/>
                  <span class="left-offset"></span>$input->add("1");<br/>
                  <span class="left-offset"></span>$input->add("a");<br/>
                  <span class="left-offset"></span>$input->add("0");<br/>
                  <span class="left-offset"></span>echo $input->getValue();
                </div>
              </div>';

        class TextInput {
          protected $value;
          public function add($arg1) {
            $this->value .= $arg1;
          }
          public function getValue() {
            return $this->value;
          }
        }
        class NumericInput extends TextInput {
          public function add($arg1) {
            if(is_numeric($arg1)) { $this->value .= $arg1; }
          }
          public function getValue() {
            return (float)$this->value;
          }
        }
        $input = new NumericInput();
        $input->add('1');
        $input->add('a');
        $input->add('0');
        echo "<b>Result for NumericInput</b>: " . $input->getValue() . "<br/>";

        $input = new TextInput();
        $input->add('b');
        $input->add('8');
        $input->add('2a');
        echo "<b>Result for TextInput</b>: " .$input->getValue();

        echo '<hr>
              <h2>Task 5</h2>
              <div class="task-description">
                Consider the following code:<br/>
                <div class="code-block">
                  $str1 = "yabadabadoo";<br/>
                  $str2 = "yaba";<br/>
                  if(strpos($str1, $str2)) {<br/>
                  <span class="left-offset"></span>echo "\"" . $str1 . "\" contains \"" . $str2 . "\"";<br/>
                  } else {<br/>
                  <span class="left-offset"></span>echo "\"" . $str1 . "\" does not contain \"" . $str2 . "\"";<br/>
                  }
                </div>
                The output will be:</br>
                "yabadabadoo" does not contain "yaba"</br>
                Why? How can this code be fixed to work correctly?
              </div>';

        $str1 = "yabadabadoo";
        $str2 = "yaba";
        if(strpos($str1, $str2)) {
          echo "\"".$str1."\" contains \"".$str2."\"";
        } else {
          echo "\"".$str1."\" does not contain \"".$str2."\"";
        }

        echo "</br><br/><b>Result after changing if-statement to strpos(\$str1, \$str2) !== false:</b></br>";
        if(strpos($str1, $str2) !== false) {
          echo "\"".$str1."\" contains \"".$str2."\"";
        } else {
          echo "\"".$str1."\" does not contain \"".$str2."\"";
        }

        echo '<hr>
              <h2>Task 6</h2>
              <div class="task-description">
                Write a program for this pattern:<br/><br/>
                <div class="code-block">
                  *<br/>
                  * *<br/>
                  * * *<br/>
                  * * * *<br/>
                  * * * * *<br/>
                  * * * * * *<br/>
                  * * * * *<br/>
                  * * * *<br/>
                  * * *<br/>
                  * *<br/>
                  *<br/>
                </div>
              </div>';

      function printStarsTriangle($maxStars = 6) {
        echo '<div class="left-offset-stars">';

        $counter = 0;
        $isOnPeek = false;
        $strWithStars = "";

        while($counter > -1) {
          if(!$isOnPeek) {
            $strWithStars .= " *";
            $counter++;
            if($counter == $maxStars) { $isOnPeek = true; }
          } else {
            $strWithStars = substr($strWithStars, 0, -2);
            $counter--;
          }

          echo $strWithStars."<br/>";
        }

        echo '</div>';
      }

      printStarsTriangle();

      echo '<hr>
            <h2>Task 7</h2>
            <div class="task-description">
              Write a program for finding the biggest number in an array without using any array functions.<br/>
            </div>';

      $task7Array = [2, 5, 230, 1, 7, 670, 53, 9, 10, 1, 1, 12];
      $maxValue = 0;
      foreach($task7Array as $val) {
        if($maxValue < $val) { $maxValue = $val; }
      }
      echo "Array with numbers: [2, 5, 230, 1, 7, 670, 53, 9, 10, 1, 1, 12]</br>";
      echo '<b>Max number in the array is</b>: '.$maxValue;

      echo '<hr>
            <h2>Task 8</h2>
            <div class="task-description">
              Write a program that outputs multiplication table based on input argument.
              For example if input is 5, the result would be:
              <div class="code-block">
                <table>
                  <tr><td></td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td></tr>
                  <tr><td>1</td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td></tr>
                  <tr><td>2</td><td>2</td><td>4</td><td>6</td><td>8</td><td>10</td></tr>
                  <tr><td>3</td><td>3</td><td>6</td><td>9</td><td>12</td><td>15</td></tr>
                  <tr><td>4</td><td>4</td><td>8</td><td>12</td><td>16</td><td>20</td></tr>
                  <tr><td>5</td><td>5</td><td>10</td><td>15</td><td>20</td><td>25</td></tr>
                </table>
              </div>
            </div>';

      function createMultiplicationTable($inputVal = 5) {
        echo '<b>Input value = </b>'.$inputVal.'<br/><br/>';
        echo '<table>';
        for($i = 0; $i != $inputVal + 1; $i++) { // rows
          echo '<tr>';

          $cellValue;
          for($j = 0; $j != $inputVal + 1; $j++) { // columns
            if($i == 0  || $j == 0) { $cellValue = $i + $j; }
            else { $cellValue = ($i * $j); }
            echo '<td>'.($cellValue > 0 ? $cellValue : "").'</td>';
          }

          echo '</tr>';
        }
        echo '</table>';
      }
      createMultiplicationTable(7);

      echo '<hr>
            <h2>Task 9</h2>
            <div class="task-description">
              Below is program for calculating results for dart game.</br>
              Results are calculated by average of three throws.</br>
              Unfortunately program does not return correct answer.</br>
              Fix the code.</br>
              <div class="code-block">
                $scores =</br>
                [</br>
                <span class="left-offset"></span>"John" => [7, 8, 7],</br>
                <span class="left-offset"></span>"Sue" => [10, 8, 4],</br>
                <span class="left-offset"></span>"Tommy" => [8, 8, 7],</br>
                <span class="left-offset"></span>"Mary" => [7, 6, 6]</br>
                ];</br></br>
                $averages = [];</br>
                $places = [];</br></br>
                foreach($scores as $player => $values) {</br>
                <span class="left-offset"></span>$averages[$player] = $values[0] + $values[1] + $values[2] / 3;</br>
                }</br></br>
                arsort($averages);</br>
                $place = 0;</br>
                $lastscore = null;</br></br>
                foreach($averages as $player => $average) {</br>
                <span class="left-offset"></span>if ($lastscore and $lastscore = $average) {</br>
                <span class="left-offset"></span><span class="left-offset"></span>echo sprintf("Place %s (tie) - %s\n", $place, $player);</br>
                <span class="left-offset"></span>} else {</br>
                <span class="left-offset"></span><span class="left-offset"></span>$place++;</br>
                <span class="left-offset"></span><span class="left-offset"></span>echo sprintf("Place %s - %s\n", $place, $player);</br>
                <span class="left-offset"></span>}</br>
                <span class="left-offset"></span>$lastscore = $average;</br>
                }
              </div>
            </div>';

      $scores = [
        "John" => [7, 8, 7], // avg 7,33
        "Sue" => [10, 8, 4], // avg 7,33
        "Tommy" => [8, 8, 7], // 7,66
        "Mary" => [7, 6, 6] // 6,33
      ];

      $averages = [];
      $places = [];

      foreach($scores as $player => $values) {
        $averages[$player] = ($values[0] + $values[1] + $values[2]) / 3;
      }

      arsort($averages);
      $place = 0;
      $lastscore = null;

      foreach($averages as $player => $average) {
        if ($lastscore and $lastscore == $average) {
          echo sprintf('Place %s (tie) - %s<br/>', $place, $player); // replaced \n with <br/> since it doesn't work on Windows
        } else {
          $place++;
          echo sprintf('Place %s - %s<br/>', $place, $player); // replaced \n with <br/> since it doesn't work on Windows
        }
        $lastscore = $average;
      }

      echo '<h1>MySQL/MariaDB</h1><hr>';
      echo '<h2>Task 1</h2>
            <div class="task-description">
              Consider simple book rental service. At the moment everything is stored in Excel worksheet.<br/>
              Example of worksheet is represented by following table.<br/>
              <div class="code-block">
                <table class="db-table">
                  <tr><td>Customer</td><td>Phone</td><td>Books rented</td><td>Borrow date</td><td>Return date</td></tr>
                  <tr><td>Mary Sue</td><td>5012345</td><td>"Mysteries of Java"</td><td>14.02.2020</td><td></td></tr>
                  <tr><td>Alan Smith</td><td>5123456</td><td>"The Big Rewrite", "Design patterns"</td><td>25.02.2020</td><td>25.02.2020</td></tr>
                  <tr><td>Mary Sue</td><td>5598765</td><td>"Design patterns"</td><td>02.03.2020</td><td>04.03.2020</td></tr>
                  <tr><td>Joe Goodspeed</td><td>5234567</td><td>"Inversion of control"</td><td>02.03.2020</td><td></td></tr>
                  <tr><td>Joe Goodspeed</td><td>5234567</td><td>"Design patterns"</td><td>04.03.2020</td><td></td></tr>
                  <tr><td>Nicky Jones</td><td>5345678</td><td>"Why my code smells?"</td><td>07.03.2020</td><td></td></tr>
                </table>
              </div>
              Employees at shop are having more and more problems using this Excel worksheet.<br/>
              There are more borrowers every day. Our company received order for creating small modern program to solve those problems.<br/>
              You are given the task to design database schema.<br/>
              Based on information above design the best database schema you possibly can.<br/>
            </div>
            <b>Simple database schema for books rental service</b>(SQL queries can be found in the "Data" folder)<br/>
            <img src="./Data/books_rental_service.png">
            <div class="code-block">
              CREATE TABLE `books` (<br/>
                `book_id` int(11) NOT NULL,<br/>
                `title` varchar(50) COLLATE latin1_bin NOT NULL,<br/>
                `author` varchar(50) COLLATE latin1_bin NOT NULL<br/>
              ) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_bin;<br/><br/>

              CREATE TABLE `books_rented` (<br/>
                `rent_id` int(11) NOT NULL,<br/>
                `book_id` int(11) NOT NULL,<br/>
                `customer_id` int(11) NOT NULL,<br/>
                `borrow_date` date NOT NULL,<br/>
                `return_date` date DEFAULT NULL<br/>
              ) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_bin;<br/><br/>

              CREATE TABLE `customers` (<br/>
                `customer_id` int(11) NOT NULL,<br/>
                `first_name` varchar(20) COLLATE latin1_bin NOT NULL,<br/>
                `last_name` varchar(25) COLLATE latin1_bin NOT NULL,<br/>
                `phone_number` varchar(20) COLLATE latin1_bin NOT NULL,<br/>
                `email` varchar(25) COLLATE latin1_bin NOT NULL<br/>
              ) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_bin;<br/><br/>

              ALTER TABLE `books`<br/>
                ADD PRIMARY KEY (`book_id`);<br/><br/>

              ALTER TABLE `books_rented`<br/>
                ADD PRIMARY KEY (`rent_id`);<br/><br/>

              ALTER TABLE `customers`<br/>
                ADD PRIMARY KEY (`customer_id`);<br/><br/>

              ALTER TABLE `books`<br/>
                MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT;<br/><br/>

              ALTER TABLE `books_rented`<br/>
                MODIFY `rent_id` int(11) NOT NULL AUTO_INCREMENT;<br/><br/>

              ALTER TABLE `customers`<br/>
                MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;
            </div>';

      echo '<hr>
            <h2>Task 2</h2>
            <div class="task-description">
              Along with current trial tests file come two additional files, both related to current task:<br/>
              <span class="left-offset"></span>• Small MySQL database dump (trial.sql). It contains schema and data for one table "Employees".<br/>
              <span class="left-offset"></span>• Sample data file (data.csv). The data in the file represents single table "Employees" in database.<br/><br/>
              You may use either alternative. Solve following tests based on provided data:<br/>
              <span class="left-offset"></span>1) Write a query to list the number of jobs available in the employees table.
              <div class="code-block">SELECT DISTINCT `JOB_ID`FROM `employees`</div>
              <span class="left-offset"></span>2) Write a query to get the maximum salary of an employee working as a Programmer("IT_PROG").
              <div class="code-block">SELECT MAX(`SALARY`) FROM `employees` WHERE `JOB_ID`="IT_PROG"</div>
              <span class="left-offset"></span>3) Write a query to get the average salary and number of employees working ine the Department 90.
              <div class="code-block">SELECT AVG(`SALARY`), COUNT(`EMPLOYEE_ID`) FROM `employees` WHERE `DEPARTMENT_ID`=90</div>
              <span class="left-offset"></span>4) Write a query to get the number of employees with the same job.
              <div class="code-block">SELECT `JOB_ID`, COUNT(`EMPLOYEE_ID`) AS `NUM_OF_EMP` FROM `employees` GROUP BY `JOB_ID`</div>
              <span class="left-offset"></span>5) Write a query to get the difference between the highest and lowest salaries.
              <div class="code-block">SELECT (MAX(`SALARY`) - MIN(`SALARY`)) AS `DIFF` FROM `employees`</div>
              <span class="left-offset"></span>6) Write a query to find the manager ID and the salary of the lowest-paid employee for that manager.
              <div class="code-block">SELECT `MANAGER_ID`, MIN(`SALARY`) AS `LOWEST_SALARY` FROM `employees` GROUP BY `MANAGER_ID`</div>
              <span class="left-offset"></span>7) Write a query to get the department ID and the total salary payable in each department.
              <div class="code-block">SELECT `DEPARTMENT_ID`, SUM(`SALARY`) AS `TOTAL_SALARY_PER_DPTMNT` FROM `employees` GROUP BY `DEPARTMENT_ID`</div>
              <span class="left-offset"></span>8) Write a query to get the average salary for each job ID excluding programmer.
              <div class="code-block">SELECT `JOB_ID`, AVG(`SALARY`) AS `AVG_SALARY` from `employees` WHERE `JOB_ID`!="IT_PROG" GROUP BY `JOB_ID`</div>
              <span class="left-offset"></span>9) Write a query to get the total salary, maximum, minimum, average salary of employees (job ID wise), for department ID 90 only.
              <div class="code-block">SELECT `JOB_ID`, SUM(`SALARY`) AS `TOTAL`, MAX(`SALARY`) AS `MAX_SALARY`, MIN(`SALARY`) AS `MIN_SALARY`, AVG(`SALARY`) AS `AVG_SALARY` FROM `employees` WHERE `DEPARTMENT_ID`=90 GROUP BY `JOB_ID`</div>
              <span class="left-offset"></span>10) Write a query to get the job ID and maximum salary of the employees where maximum salary is greater than or equal to $4000.
              <div class="code-block">Write a query to get the average salary for all departments employing more than 10 employees.</div>
              <span class="left-offset"></span>11) Write a query to list the number of jobs available in the employees table.
              <div class="code-block">SELECT * FROM (SELECT AVG(`SALARY`), COUNT(`EMPLOYEE_ID`) AS `NUM_OF_EMP` FROM `employees` GROUP BY `DEPARTMENT_ID`) AS `AVG_SALARY_DPTMNTS` WHERE `NUM_OF_EMP`>10 </div>
            </div>';

      ?>
    </body>
</html>
