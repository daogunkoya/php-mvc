<?php
    class Validator{
        protected $arrayList = [];
            

        public function __construct($list){
            $this->arrayList = $list;
        }
        
        public function __get($property){
            if(property_exists($this,$property)){
                $arrayList = $this->sanitizeInput($this->arrayList);
                $arrayList = $this->checkStringLength($arrayList);
                 return $arrayList;   
            }
        }

        // public function __set($property,$value){
        //     if(property_exists($this,$property)){
        //         $arrayList = $this->sanitizeInput($value);
        //         $arrayList = $this->checkStringLength($arrayList);
        //        $this->arrayList = $arrayList;
        //     }
        // }

        private function sanitizeInput($list){
            $filtered = [];
            foreach($list as $key=>$value){
               $filtered[$key]  = preg_replace('/\s+/','', $list[$key]);
              // $filtered[$key]  = preg_replace('/[a-z-]+/i','', $list[$key]);
            }
            return $filtered;
        }

        private function checkStringLength($list){
            $string = [];
            foreach($list as $key => $value){
                if(strlen($list[$key]) > 3  && strlen($list[$key]) < 255 ){
                    $string[$key] = strtoupper($list[$key]);
                    
                }else{
                    return 'invalid entry';
                } 
            }

            return $string;
            
        }

        

        

       

        
        
    }


    $myclass = new Validator(['name'=>'Trtytrr', 'age'=> 'g h bb hh ']);
   // $myclass->arrayList = ;
     
    echo json_encode($myclass->arrayList);
   

?>