<?php
function checkGrade($score){
    
    $grade = "$score";
    if($score<50){
        $grade="F";
       }
    elseif ($score<55) {
        $grade="D";
   }
       elseif ($score<60) {
        $grade="D+";
   }
     
   elseif ($score<65) {
             $grade="C";

    }
    elseif ($score<70) {
               $grade="C+";

}
  elseif ($score<75) {
               $grade="B";

}
    elseif ($score<80) {
                     $grade="B+";

}
        else {
               $grade="A";

}

    
    return $grade;
   }
   //เขียนโปรแกรมเพื่อสร้าง function ที่ทำหน้าที่ในการแปลงคะแนนให้เป็น เกรด
   //โดยกำหนดเงื่อนไข ของช่วงคะแนนดังนี้ 0-49=F,50-54=d,55-59=d+,60-64=c,65-69-c+
     //70-74=b 75-79=b+ 80 ขึ้นไป A
   //ตัวอย่างการใช้งาน Function echo checkGrade(60) ต้องได้ผลลัพธ์ C
   function GtoW($grade){
       $weight = 0;
   switch ($grade){
       Case "F" :
            return 0;
        Case "D" :
            return 1;
        Case "D+" :
            return 1.5;
        Case "C" :
            return 2;
        Case "C+" :
            return 2.5;
        Case "B" :
            return 3;
        Case "B+" :
            return 3.5;
        Case "A" :
            return 4;
   }               
           
       
       
       
       return $weight;
   }
   //เขียนโปรแกรมเพื่อสร้าง Function ที่ทำหน้าที่แปลงเกรดให้เป็นน้ำหนักคะแนนของเกรด
   //โดยกำหนดน้ำหนักคะแนน ดังนี้ F=0,D=1,d+=1.5,c=2,c+=2.5,b=3,b+=3.5,A=4
   //ตัวอย่างการใช้งาน function echo gtoW("A") ต้องได้ผลลัพธ์ 4 
