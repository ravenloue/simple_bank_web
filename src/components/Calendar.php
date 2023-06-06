<?php
    class Calendar {  
        
        private $daysArr = array("Mon","Tue","Wed","Thu","Fri","Sat","Sun");
        private $year=0;
        private $month=0;
        private $day=0;
        private $date=null;
        private $daysInMonth=0;
        private $naviHref= null;

        //Constructor
        public function __construct(){     
            $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
        }
        
        //print out the calendar
        public function show() {
            $year  = null;            
            $month = null;
            
            if(null==$year&&isset($_GET['year'])){
                $year = $_GET['year'];
            }else if(null==$year){    
                $year = date("Y",time());              
            }          
            
            if(null==$month&&isset($_GET['month'])){    
                $month = $_GET['month'];            
            }else if(null==$month){    
                $month = date("m",time());            
            }                  
            
            $this->year=$year;            
            $this->month=$month;
            
            $this->daysInMonth=$this->_daysInMonth($month,$year);  
            
            $content= $this->_createNav().
                        '<div class="box-content">
                            <ul class="label">'.$this->_createLabels().'</ul>
                            <div class="clear"></div>    
                            <ul class="dates">';    
                            
                            $weeksInMonth = $this->_weeksInMonth($month,$year);
                            // Create weeks in a month
                            for( $i=0; $i<$weeksInMonth; $i++ ){
                                //Create days in a week
                                for($j=1;$j<=7;$j++){
                                    $content.=$this->_showDay($i*7+$j);
                                }
                            }

                            $content.='</ul>                                   
                            <div class="clear"></div>    
                        </div>';
            return $content;   
        }
        
        //create the li element for ul
        private function _showDay($cellNumber){            
            if($this->day==0){                
                $firstDayOfTheWeek = date('N',strtotime($this->year.'-'.$this->month.'-01'));                        
                if(intval($cellNumber) == intval($firstDayOfTheWeek)){                    
                    $this->day=1;                    
                }
            }
            
            if( ($this->day!=0)&&($this->day<=$this->daysInMonth) ){                
                $this->date = date('Y-m-d',strtotime($this->year.'-'.$this->month.'-'.($this->day)));                
                $cellContent = $this->day;                
                $this->day++;                   
            }else{                
                $this->date =null;    
                $cellContent=null;
            }               
            
            return '<li id="li-'.$this->date.'" class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).
                    ($cellContent==null?'mask':'').'">'.$cellContent.'</li>';
        }
        
        //create navigation
        private function _createNav(){            
            $nextMonth = $this->month==12?1:intval($this->month)+1;            
            $nextYear = $this->month==12?intval($this->year)+1:$this->year;            
            $preMonth = $this->month==1?12:intval($this->month)-1;            
            $preYear = $this->month==1?intval($this->year)-1:$this->year;
            
            return
                '<div class="header">'.
                    //<a class="prev" href="'.$this->naviHref.'?month='.sprintf('%02d',$preMonth).'&year='.$preYear.'">Prev</a>
                        '<span class="title">'.date('Y M',strtotime($this->year.'-'.$this->month.'-1')).'</span>'.
                    //<a class="next" href="'.$this->naviHref.'?month='.sprintf("%02d", $nextMonth).'&year='.$nextYear.'">Next</a>
                '</div>';
        }
            
        //create calendar week labels
        private function _createLabels(){                      
            $content='';            
            foreach($this->daysArr as $index=>$label){                
                $content.='<li class="'.($label==6?'end title':'start title').' title">'.$label.'</li>';    
            }            
            return $content;
        }
        
        
        
        //calculate number of weeks in a particular month
        private function _weeksInMonth($month=null,$year=null){            
            if( null==($year) ) {
                $year =  date("Y",time()); 
            }            
            if(null==($month)) {
                $month = date("m",time());
            }
            
            // find number of days in this month
            $daysInMonths = $this->_daysInMonth($month,$year);            
            $numOfweeks = ($daysInMonths%7==0?0:1) + intval($daysInMonths/7);            
            $monthEndingDay= date('N',strtotime($year.'-'.$month.'-'.$daysInMonths));            
            $monthStartDay = date('N',strtotime($year.'-'.$month.'-01'));
            
            if($monthEndingDay<$monthStartDay){                
                $numOfweeks++;            
            }            
            return $numOfweeks;
        }
    
        //calculate number of days in a particular month
        private function _daysInMonth($month=null,$year=null){            
            if(null==($year)){ $year =  date("Y",time()); }
            if(null==($month)){ $month = date("m",time()); }
                
            return date('t',strtotime($year.'-'.$month.'-01'));
        }
        
    }