<?php

include_once 'include/simple_html_dom.php';

function indiatimes($searchQuery)
{
    
    $searchQuery=urlencode($searchQuery);
    $searchUrl='http://shopping.indiatimes.com/control/pinpointsearch?SEARCH_STRING='.$searchQuery;
    echo $searchUrl;
    $html=file_get_html($searchUrl);
    echo $html;
     $firstLink= $html->find('div.seeall a', 0);
    if($firstLink!="")  //if number of results is less then there will be no fk-button-blue
    {
        
            $newLink='http://shopping.indiatimes.com'.$firstLink->href;
            $html=file_get_html($newLink);   
            echo 'number of results is less';   
    }
    foreach($html->find('div.productlistview') as $result) 
        {
            $item['title']      = $result->find('div.itemname', 0)->plaintext;
            $item['price']     = $result->find('div.newprice span.price', 0);
            $item['image']      =$result->find('a.homeproductthumb img', 0)->src;
            $item['image']='http://shopping.indiatimes.com'.$item['image'];
            $item['stock']      =$result->find('span.instock', 0);
            if($item['stock']=="")
                $item['stock']="Out Of Stock";
            $item['description']=$result->find('div.productdescription p', 0)->plaintext;
            $buyNowTemp     =$result->find('div.itemname a', 0)->href;
            $item['buyNow']='http://shopping.indiatimes.com'.$buyNowTemp;
            $item['site']="indiatimes";
            $items[] = $item;
        }
    echo '<table border ="1">';
foreach ($items as $item)
{
    
    echo '<tr>
    <td><img src="'.$item['image'].'"/></td>';
    
    echo '    <td><a href="'.$item['buyNow'].'"><b>'.$item['title'].'</b></a> <br/>';
    echo 'Price : '.$item['price'].'<br/>Stock : '.$item['stock'].' <td>';
  
    echo $item['description'].$item['site'];
   echo" </td></tr>";
    
}
echo "</table>";
}
?>
