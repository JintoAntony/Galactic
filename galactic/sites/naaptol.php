<?php

include_once 'include/simple_html_dom.php';
function naaptol($searchQuery)
{
   
    $searchQuery=urlencode($searchQuery);
    $searchUrl='http://www.naaptol.com/faces/jsp/search/searchResults.jsp?type=srch_catlg&kw='.$searchQuery;
    $html=file_get_html($searchUrl);
    $firstLink= $html->find('a.fk-button-blue', 0);
    if($firstLink!="")  //if number of results is less then there will be no fk-button-blue
    {
        
        $newLink='http://www.naaptol.com'.$firstLink->href;
        $html=file_get_html($newLink);


       foreach($html->find('div.fk-srch-item') as $result) 
       {
            $item['title']      = $result->find('h2.fk-srch-item-title', 0)->plaintext;
            $item['price']     = $result->find('b.final-price', 0);
            $item['image']      =$result->find('div.lastUnit img', 0)->src;
            $item['stock']      =$result->find('span.search-shipping', 0);
            $item['description']=$result->find('div.fk-item-specs-section', 0);
            $buyNowTemp     =$result->find('a.fk-srch-title-text', 0)->href;
            $item['buyNow']='http://www.naaptol.com'.$buyNowTemp;
            $item['site']="flipkart";
            $items[] = $item;
       }
    }
    else
    {
        foreach($html->find('div.fk-product-thumb') as $result) 
       {
            $item['title']      = $result->find('a.title', 0)->plaintext;
            $item['price']     = $result->find('span.final-price', 0);
            $item['image']      =$result->find('a.prd-img img', 0)->src;
            $item['stock']      ="Details not available";
            $item['description']=$result->find('ul.fk-extra-details', 0);
            $buyNowTemp     =$result->find('a.title', 0)->href;
            $item['buyNow']='http://www.naaptol.com'.$buyNowTemp;
            $item['site']="naaptol";
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
