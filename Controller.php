<?php

include('ChartService.php');

if(isset($_POST['tiposgraficas'])){
    $chartService =  new ChartService();
    
    $datasets = [];
    $tiposdegraficas = $_POST['tiposgraficas'];
    $colores = $_POST['colores'];
    $nombresdegraficas = $_POST['nombresdegraficas'];

    $orden = count($tiposdegraficas);
    
    $n = random_int(5,15);
    $dummyset = $chartService->CreateDummySet($n);
    $labels = $chartService->CreateLabels($n);

    for($i=0; $i<=$orden;$i++){
        $type = 
        $datasets[] = $chartService->createDataset($tiposdegraficas[$i], $nombresdegraficas[$i], $dummyset[$i], $orden, $colores[$i]);
        $orden--;
    }
    $grafico = $chartService->createChart($labels,$datasets);
    echo $grafico;
}
?>