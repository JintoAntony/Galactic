<?php
include_once 'include/simple_html_dom.php';

function infibeam($searchQuery)
{
    $searchQuery=urlencode($searchQuery);
    $searchUrl='http://www.infibeam.com/search?q='.$searchQuery;
    $html=file_get_html($searchUrl);
    $firstLink= $html->find('a.pcFacetCount', 0);
    if($firstLink!="")  
    {
        $firstLink=$firstLink->href;
        $len= strlen(urldecode($searchQuery));
        $firstLink=substr_replace($firstLink,$searchQuery,-$len);
        $newLink='http://www.infibeam.com'.$firstLink;
 
        $html=file_get_html($newLink);
        $html=$html->find('ul.srch_result',0);
   
       foreach($html->find('li') as $result) 
       {
            $item['title']      = $result->find('span.title', 0)->plaintext;
            $item['price']     = $result->find('span.normal', 0);
            $item['image']      =$result->find('a img', 0)->src;
            $item['stock']      ="Not available";
            $item['description']="Not available";
            $buyNowTemp     =$result->find('a', 0)->href;
            $item['buyNow']='http://www.infibeam.com'.$buyNowTemp;
            $item['site']="infibeam";
            $items[] = $item;
       }
    }    
 // replace the code below with return $items;
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
