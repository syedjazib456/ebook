<?php
function prx($arr){
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}
function get_product($con,$type="",$limit=""){
    $sql = "SELECT * FROM books WHERE status=1";
    $row = array();
    if($type='latest'){
        $sql.=" ORDER BY b_id ASC";
    }
    if($limit!=''){
        $sql.=" LIMIT $limit";
    }
    $res = mysqli_query($con,$sql);
    while($data = mysqli_fetch_assoc($res)){
        $row[] = $data;
    }
    return $row;

}
function get_category($con,$type="",$limit="",$cat_id){
    $sql = "SELECT * FROM books WHERE status = 1";
    $row = array();
    if($cat_id!=''){
        $sql.=" AND cate_id ='{$cat_id}'";
     }
    if($type='latest'){
        $sql.=" ORDER BY b_id DESC";
    }
    if($limit!=''){
        $sql.=" LIMIT $limit";
    }
  
    $res = mysqli_query($con,$sql);
    while($data = mysqli_fetch_assoc($res)){
        $row[] = $data;
    }
    return $row;

}
function product($con,$pro_id=""){
    $sql = "SELECT * FROM books JOIN categories ON books.cate_id = categories.cat_id WHERE status = 1";
    $row = array();
    if($pro_id!=''){
        $sql.=" AND b_id = '{$pro_id}'";
    }
   
        $sql.=" ORDER BY b_id DESC";
   
   
  
    $res = mysqli_query($con,$sql);
    while($data = mysqli_fetch_assoc($res)){
        $row[] = $data;
    }
    return $row;

}


?>