<!DOCTYPE html>
<html>
<head>
    <title>Кристина Осинкина</title>
    <meta charset="utf-8">
    </head>
<body>
    <form id="frm" method="POST" action="">
        <p>Введите элементы массива через запятую:</p>
        <input type="text" name="n" value="1, 2, 3">
        <p>Введите начало интервала: </p>
        <input type="text" name="a" value="1">
        <p>Введите конец интервала: </p>
        <input type="text" name="b" value="3">
        <input type="submit" value="OK">
    </form>
    <?php
        $n=$_POST["n"];
        $a=$_POST["a"];
        $b=$_POST["b"];
        $myArray = explode(", ", $n);
        
        //Поиск максимального элемента
        $max=0;
            for($i=1; $i<count($myArray); $i++){
                if($myArray[$i]>$myArray[$max]){
                    $max=$i;
                }
            }

        $maxEl=$myArray[$max];
    
        //Вычисляем сумму элементов массива, расположенных после первого положительного числа
        $sumElArr = 0;
        $indFirstPolozh = 0;
        for($i=0; $i<=count($myArray); $i++){
            if($myArray[$i]>0){
                $indFirstPolozh = $i;
                break;
            }
        }
        for($j = $indFirstPolozh+1; $j<count($myArray); $j++){
            $sumElArr=$myArray[$j]+$sumElArr;
        }


        
        


        //Преобразовать массив таким образом, чтобы сначала находились все элементы, целая часть которых лежит в интервале [a,b], а потом все остальные.
        $ArrF = [];
        $ArrS = [];
        for($i=0; $i<count($myArray); $i++){
            if($myArray[$i]<b&&$myArray[$i]>a){
                $ArrF[]=$myArray[$i];
            }
            else{
                $ArrS[]=$myArray[$i];
            }
        }

        $myArray=array_merge($ArrF, $ArrS);      
        echo "Максимальный элемент массива: ".$maxEl."; Сумма элементов массива, расположенных после первого положительного элемента: ".$sumElArr."; Массив начинающийся с чисел, которые находятся в интервале [".$a."; ".$b."]: </br>";
        for($m=0; $m<count($myArray); $m++){
            echo $myArray[$m]."; ";
        }
    ?>
</body>
</html>