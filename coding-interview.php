<?php

/**
 * How do you find the missing number in a given integer array of n(1) to m(100)?
 *
 * @param Array $input (given integer array)
 * @param Integer $n (minimu number for full array range)
 * @param Integer $m (maximum number for full array range)
 *
 * @return Array (missing numbers in the given array)
 *
 */
function checkMissings($input, $n=1, $m=100) {

    $fullArray = range($n,$m);
    $emptyList = [];

    // loop through full array put missing numbers to empy list array
    for ($i=0; $i < count($fullArray) ; $i++) {
        $value = $fullArray[$i];
        if (!in_array($value, $input)) {
            $emptyList []= $value;
        }
    }
    return $emptyList;

}

/**
 * How do you find the duplicate number on a given integer array?
 *
 * @param Array $input (given integer array)
 *
 * @return Array (duplicate numbers in the given array)
 *
 */
function checkDuplicates($input) {
    $helperArray = [];
    $duplicates = [];

    // loop through input array and find duplicates
    for ($i=0; $i < count($input) ; $i++) {
        $value = $input[$i];
        if (in_array($value, $helperArray)) {
            $duplicates []= $value;
        }else {
            $helperArray []= $value;
        }
    }

    return array_unique($duplicates);
}

/**
 * check if expected output is same as result of other functions
 *
 * @param Array $expectedOutput
 * @param Array $result
 *
 * @return Exception
 *
 */
function assertResult($expectedOutput, $result) {
    if ($result != $expectedOutput) {
        throw new Exception("Error! function expected {PRETTY_OUTPUT} but the result is {PRETTY_OUTPUT}, and they do not match!");
        // TODO: defune pretty output function
    }else {
        return true;
    }
}

?>

<pre>
<?php

try {
    assertResult([5, 7, 9, 10, 11, 12, 14, 15, 17, 18, 19], checkMissings([1,2,3,4,6,8,13,16,20], 1, 20));
    assertResult([3, 5] , checkDuplicates([1,2,3,3,4,5,5,5]));
    echo "SUCCESS";
    // TODO: refactor later
} catch (Exception $e) {
    echo $e->getMessage();
}

?>
</pre>
