<?php

class ChartService{
    
    public function CreateDummySet($n){
        $datos = $this->GetBarChartData($n);
        $promedios = $this->MediaMovil($datos);
        return [$datos,$promedios];
    }
    private function GetBarChartData($n){
        $arrayN = [];
        for($i=0 ;$i<$n;$i++){
            $rand = random_int(0,100);
            $arrayN[] =$rand;
        }
        return $arrayN;
        //Generar números aleatorios de algún tipo para gráfica tipo bar.
    }
    public function CreateLabels($n){
        $arrayN = [];
        for($i=0 ;$i<$n;$i++){
            $rand = random_int(0,100);
            $arrayN[] =$rand;
        }
        return $arrayN;
    }
    public function MediaMovil($array){
        $arrayN = [];
        for($i=1 ;$i<=sizeof($array);$i++){
            $temp = array_slice($array,0,$i);
            $arrayN[] =array_sum($temp)/count($temp);
        }
        return $arrayN;
    }
    private function CreateColors(string $color,array $array){
        $colores = [];
        foreach($array as $val){

            $colores[]= $color;
        }
        return $colores;
    }
    
    private function CreateBorder(string $color,array $array){
        $bordes = [];
        foreach($array as $val){
            $bordes[]= $color;
        }
        return $bordes;
    }

    //Crear métodos para generar datos de gráfica tipo pie y scatter 
    public function createChart(array $labels, array $datasets){
        $result = [];
        $data = [];
        
        $data['labels'] =  $labels;
        $data['datasets'] = $datasets;
        $result['data']=$data;
        $result['options']=array(
            'plugins' => array(
                'title' =>  array(
                    'font' => array(
                        'size'=>20
                    ),
                    'display'=>true,
                    'text'=> "Ventas",
                    'align' => 'center',
                    'padding' => array(
                        'top'=>10,
                        'bottom'=>10
                    )
                    ),
                    'subtitle'=>array(
                        'display'=>true,
                        'font' => array(
                            'size'=>14
                        ),
                        'text'=> "Mes",
                    ),
                    'legend' => array(
                        'display'=>true,
                        'position'=>'bottom'
                    )
            ),
            'scales' => array(
                'x'=> array(
                    'title'=>array(
                        'display'=>true,
                        'text'=>"Mes"
                    )
                    ),
                'y'=> array(
                    'title'=>array(
                        'display'=>true,
                        'text'=>"Pesos"
                    )
                )
                    )
        );

        $returned = json_encode($result);
        return $returned;
    }

    public function createDataset(string $type, string $label, array $data, int $order, string $color){
        $dataset = array(
            'type'                  => $type,
            'label'                 => $label,
            'data'                  => $data,
            'backgroundColor'       => $this->CreateColors($color, $data),
            'borderColor'           => $this->CreateBorder($color, $data),
            'borderWidth'           => 3,
            'order'                 => $order
        );
        return $dataset;
    }
}

?>