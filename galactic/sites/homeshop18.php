<?php
include_once 'include/simple_html_dom.php';   
function homeshop18($searchQuery)
{
    $searchQuery=urlencode($searchQuery);
    $searchUrl='http://www.homeshop18.com/'.$searchQuery.'/search:'.$searchQuery;
    $html=file_get_html($searchUrl);
    $firstLink= $html->find('div.list_view_style', 0);
    
    if($firstLink!="")  //in case of books its a list view
    {
      foreach($firstLink->find('div.book_rock') as $result) 
       {
            $item['title']      = $result->find('div.listView_title a', 0)->plaintext;
            $item['price']     = $result->find('span.our_price', 0);
            $item['image']      =$result->find('img', 0);
            $item['stock']      =$result->find('div.listView_info div', 0)->plaintext;
            $item['description']="Not available";
            $buyNowTemp     =$result->find('div.listView_title a', 0);
            $item['buyNow']=$buyNowTemp->href;
            $item['site']="homeshop18";
            $items[] = $item;
       }
   }
   else
    {
        foreach($html->find('div.product_div') as $result) 
       {
            $item['title']      = $result->find('p.product_title a', 0)->plaintext;
            $item['price']     = $result->find('span.product_new_price', 0);
            $item['image']      =$result->find('p.product_image a img', 0)->src;
            $item['stock']      ="Not available";
            $item['description']="Not available";
            $item['buyNow']     =$result->find('p.product_title a', 0)->href;
            $item['site']="homeshop18";
            $items[] = $item;
       }
    }
 
     
     // replace the code below with return $items;
echo '<table border ="1">';
foreach ($items as $item)
{
    
    echo '<tr><td>'.$item['image'].'</td>'; // not displaying images from first if condition
    
    echo '    <td><a href="'.$item['buyNow'].'"><b>'.$item['title'].'</b></a> <br/>';
    echo 'Price : '.$item['price'].'<br/>Stock : '.$item['stock'].' <td>';
  
    echo $item['description'].$item['site'];
   echo" </td></tr>";
    
}
echo "</table>";
   
}
?>
