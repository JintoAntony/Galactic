<?php
include_once 'include/header_footer.php';
getHeader();
?>        
<table width="996"  border="0" cellspacing="0" cellpadding="0">
    <tr align="left" valign="top">
        <td class="auto-style1" style="width: 996px; height: 150px" valign="bottom">
            <form action="searchResults.php" name="searchForm" method="GET">
   <!--             <select name="category" id="category" style="width: 180px; height: 33px" >
                    <option value="select">Select category</option>
                    <option value="books">Books</option>
                    <option value="mobiles">Mobiles & Accessories</option>
                    <option value="computers">Computers</option>
                    <option value="cameras">Cameras</option>
                    <option value="games">Games & Consoles</option>
                    <option value="movies">Movies & TV Shows</option>
                    <option value="music">Music CDs & DVDs</option>
                    <option value="personal">Personal & Health</option>
                    <option value="homeappliance">Home appliances</option>
                    <option value="all">All</option>
                </select>
  -->
                <input name="query" style="width: 435px; height: 33px" type="text"/>
                
                <input name="search" id="search" style="width: 108px; height: 30px" type="submit" value="Search"/>
                <br/>&nbsp; 
                <input name="ebay" type="checkbox"/>ebay.in
                <input name="indiatimes" type="checkbox"/>Indiatimes Shopping
                <input name="rediff" type="checkbox"/>Rediff Shopping
                <input name="naaptol" type="checkbox"/>Naaptol
                <input name="shopmania" type="checkbox"/>ShopMania
                <input name="adexmart" type="checkbox"/>Adexmart
                <input name="anythininit" type="checkbox"/>AnythingInIt
                <input name="bitfang" type="checkbox"/>BitFang<br/>
                <input name="flipkart" type="checkbox"/>Flipkart
                <input name="homeshop18" type="checkbox"/>Homeshop18
                <input name="indiaplaza" type="checkbox"/>Indiaplaza
                <input name="infibeam" type="checkbox"/>Infibeam
                <input name="letsbuy" type="checkbox"/>Letsbuy
                <input name="techshop" type="checkbox"/>Techshop.in
                <input name="theitwares" type="checkbox"/>TheITwares
                <input name="seventymm" type="checkbox"/>Seventymm
           </form>
       </td>
    </tr>
    <tr  height="10px">
      <td>&nbsp</td>
    </tr>
</table>
		
						 

<?php
getFooter();
?>
