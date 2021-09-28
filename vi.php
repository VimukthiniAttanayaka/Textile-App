<!DOCTYPE html>
<?php
date_default_timezone_set('Asia/Colombo');
$date = date('Y-m-d ');?>
<html>
    <head>

    </head>
    <body>
        <?php echo $date;
        $item_list = "s:12>3,c:1>43,t:5>1,s:32>21";
        $item_list_ar = explode(",", $item_list);
        for($i=0;$i<count($item_list_ar);$i++){
            $pos1=strpos($item_list_ar[$i], ":");
            $pos2=strpos($item_list_ar[$i], ">");
            $pos3=strlen($item_list_ar[$i]);
            $id_length=$pos2-$pos1-1;
            $quentity_length=$pos3-$pos2;
            $catagery = substr($item_list_ar[$i] ,0,1);
            $id = substr($item_list_ar[$i] ,$pos1+1,$id_length);
            $quentity= substr($item_list_ar[$i] ,$pos2+1,$quentity_length);
            
        }
?>
    </body>
</html>
<!--s:2>3,c:1>4,t:5>1,s:2>1,c:6>3,b:5>1,b:2>3,c:13>4,t:2>1,b:2>3,c:6>2,b:2>1,c:1>4,b:5>1,t:1>2-->