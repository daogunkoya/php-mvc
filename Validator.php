<?php
    class Validator{
        protected $arrayList = [];
            

        public function __get($property){
            if(property_exists($this,$property)){
                 return $this->arrayList;   
            }
        }

        public function __set($property,$value){
            if(property_exists($this,$property)){
                $arrayList = $this->filterSpaces($value);
                $arrayList = $this->checkStringLength($arrayList);
               $this->arrayList = $arrayList;
            }
        }

        private function filterSpaces($list){
            $filtered = [];
            foreach($list as $key=>$value){
               $filtered[$key]  = preg_replace('/\s+/','', $list[$key]);
            }
            return $filtered;
        }

        private function checkStringLength($list){
            $capitalise = [];
            foreach($list as $key => $value){
                if(strlen($list[$key]) > 3  && strlen($list[$key]) < 255 ){
                    $capitalise[$key] = strtoupper($list[$key]);
                    
                }else{
                    return 'invalid entry';
                } 
            }

            return $capitalise;
            
        }

        

        

       

        
        
    }


    $myclass = new Validator();
    $myclass->arrayList = ['name'=>'Tracyom   ma', 'age'=> 'g h bb hh '];
     echo json_encode($myclass->arrayList);
   

?>