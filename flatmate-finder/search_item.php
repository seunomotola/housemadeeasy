<?php
$page_title = 'Mamaluku Products';
?>
<?php  include ('./inc/header.inc.php'); ?>
<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li class="active">Products</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->
	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- ASIDE -->
				<div id="aside" class="col-md-3">
					
					<div class="aside">
						
						
						
						
					</div>
					<!-- /aside widget -->
				</div>
				<!-- /ASIDE -->
				<!-- MAIN -->
				<div id="main" class="col-md-9">
					<!-- store top filter -->
					<div class="store-filter clearfix">
					
						<div class="pull-right">
							
						</div>
					</div>
					<!-- /store top filter -->
<h5>Your advance search results</h5>
<?php
    
$button = $_GET ['submit'];
$search = $_GET ['search']; 
  
if(strlen($search)<=1)
echo "<p style='color:#c0392b; font-size: 0.9em'>Search term too short</p>";
else{
echo "<p style='color:#c0392b; font-size: 0.9em'>You searched for <b style='color:#2c3e50'>$search</b></p>";
   
//$search_exploded = explode (" ", $search);
$search_exploded = preg_split('/[\s]+/', $search);
 
$x = "";
$construct = "";  
    
foreach($search_exploded as $search_each)
{
$x++;
if($x==1)
$construct .="general LIKE '%$search_each%'";
else
$construct .="AND general LIKE '%$search_each%'";
    
}
  
$constructs ="SELECT * FROM products WHERE $construct";
$run = mysqli_query($con,$constructs);
    
$foundnum = mysqli_num_rows($run);
    
if ($foundnum==0)
echo "<p style='color:#c0392b; font-size: 0.9em'>Sorry, there are no matching result for <b style='color:#2c3e50'>$search</b>.</p></br>";
else
{ 
  if($foundnum==1){
		echo "<p style='color:#2c3e50; font-size: 0.9em'>$foundnum result found !</p>";
  	}else{
		echo "<p style='color:#2c3e50; font-size: 0.9em'>$foundnum results found !</p>";
		}
  
$per_page = 1;
$start = isset($_GET['start']) ? $_GET['start']: '';
$max_pages = ceil($foundnum / $per_page);
if(!$start)
$start=0; 
$getproduct = mysqli_query($con,"SELECT * FROM products WHERE $construct LIMIT $start, $per_page");
  
?>
<!-- STORE -->
					<div id="store">
						<!-- row -->
						<div class="row">
							<?php while($runrows = mysqli_fetch_assoc($getproduct)) : ?>
						<?php
							$product_id = $runrows['product_id'];
							$name = $runrows['name'];
							$desc = $runrows['desc'];
							$oprice = $runrows['oprice'];
							$nprice = $runrows['nprice'];
							$category = $runrows['cat_id'];
							$sub_cat = $runrows['sub_id'];
							$pix1 = $runrows ['pix1'];
							$pix2 = $runrows ['pix2'];
							$pix3 = $runrows ['pix3'];
							$pix4 = $runrows ['pix4'];
							$pdate = $runrows ['time'];
							
							$date = date('m/d/y');	
							 $days =	abs(strtotime($date) - strtotime($pdate));
							$passdays  = 10 * 24 * 60 * 60;
							//to calculate the percentage.....
							if($oprice != 0){
								$percentage = ($oprice - $nprice)/$oprice * 100;
							}
							
						?>
							<a href="product-page.php?product-id=<?php echo $product_id; ?>" class="add-to-cart">
							<!-- Product Single -->
							<div class="col-md-4 col-sm-6 col-xs-6">
								<div class="product product-single">
									<div class="product-thumb">
										<div class="product-label">
										<?php if($days < $passdays) : ?>
											<span>New</span>
										<?php endif; ?>
										<?php if($oprice != 0) : ?>
											<span class="sale">-<?php echo round($percentage); ?>%</span>
										<?php endif; ?>
										</div>
										
										<img src="<?php echo 'uploads_product/thumbs/'.$pix1; ?>" alt="">
									</div>
									<div class="product-body">
										<center>
										<h3 class="product-price"><del>N</del><?php echo number_format($nprice); ?> <del class="product-old-price"> 
										<?php if($oprice != 0){ echo '<del>N</del>'.number_format($oprice); }?></del></h3>
										<div class="product-rating">
											
										</div>
										<h2 class="product-name"><a href="#"><?php echo $name; ?></a></h2>
										<div class="product-btns">
										
											<a href="product-page.php?product-id=<?php echo $product_id; ?>" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
										</div>
										</center>
									</div>	
								</div>
							</div>
							</a>
							<!-- /Product Single -->
							<?php endwhile; ?>
							
						</div>
						<!-- /row -->
					</div>
					<!-- /STORE -->
 </div> 
<div class="col-lg-12">
<?php
//Pagination Starts
//echo "<center>";
  
$prev = $start - $per_page;
$next = $start + $per_page;
                       
$adjacents = 3;
$last = $max_pages - 1;
  
if($max_pages > 1)
{   
//previous button
if (!($start<=0)) 
echo " <a href='search_item.php?search=$search&submit=Submit&start=$prev' style='text-decoration:none; background-color: white; color:#2c3e50; padding: 7px 7px; border-radius: 2px; margin: -1.5px'><small><<</small></a> ";    
          
//pages 
if ($max_pages < 7 + ($adjacents * 2))   //not enough pages to bother breaking it up
{
$i = 0;   
for ($counter = 1; $counter <= $max_pages; $counter++)
{
if ($i == $start){
echo " <a href='search_item.php?search=$search&submit=Submit&start=$i' style='text-decoration:none; background-color: #1e71b8; color:white;padding: 7px 10px; border-radius: 2px; margin: -1.5px'><b>$counter</b></a> ";
}
else {
echo " <a href='search_item.php?search=$search&submit=Submit&start=$i' style='text-decoration:none; background-color: white; color:#2c3e50; padding: 7px 10px; border-radius: 2px; margin: -1.5px'>$counter</a> ";
}  
$i = $i + $per_page;                 
}
}
elseif($max_pages > 5 + ($adjacents * 2))    //enough pages to hide some
{
//close to beginning; only hide later pages
if(($start/$per_page) < 1 + ($adjacents * 2))        
{
$i = 0;
for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
{
if ($i == $start){
echo " <a href='search_item.php?search=$search&submit=Submit&start=$i'><b>$counter</b></a> ";
}
else {
echo " <a href='search_item.php?search=$search&submit=Submit&start=$i'>$counter</a> ";
} 
$i = $i + $per_page;                                       
}
                          
}
//in middle; hide some front and some back
elseif($max_pages - ($adjacents * 2) > ($start / $per_page) && ($start / $per_page) > ($adjacents * 2))
{
echo " <a href='search_item.php?search=$search&submit=Submit&start=0'>1</a> ";
echo " <a href='search_item.php?search=$search&submit=Submit&start=$per_page'>2</a> .... ";
 
$i = $start;                 
for ($counter = ($start/$per_page)+1; $counter < ($start / $per_page) + $adjacents + 2; $counter++)
{
if ($i == $start){
echo " <a href='search_item.php?search=$search&submit=Submit&start=$i'><b>$counter</b></a> ";
}
else {
echo " <a href='search_item.php?search=$search&submit=Submit&start=$i'>$counter</a> ";
}   
$i = $i + $per_page;                
}
                                  
}
//close to end; only hide early pages
else
{
echo " <a href='search_item.php?search=$search&submit=Submit&start=0'>1</a> ";
echo " <a href='search_item.php?search=$search&submit=Submit&start=$per_page'>2</a> .... ";
 
$i = $start;                
for ($counter = ($start / $per_page) + 1; $counter <= $max_pages; $counter++)
{
if ($i == $start){
echo " <a href='search_item.php?search=$search&submit=Submit&start=$i'><b>$counter</b></a> ";
}
else {
echo " <a href='search_item.php?search=$search&submit=Submit&start=$i'>$counter</a> ";   
} 
$i = $i + $per_page;              
}
}
}
          
//next button
if (!($start >=$foundnum-$per_page))
echo " <a href='search_item.php?search=$search&submit=Submit&start=$next'style='text-decoration:none; background-color: white; color:#2c3e50; padding: 7px 7px; border-radius: 2px; margin: -1.5px'><small>>></small></a> ";    
}   
//echo "</center>";
} 
} 
?>
<!-- store bottom filter -->
					<div class="store-filter clearfix">
						
					</div>
					<!-- /store bottom filter -->
				</div>
				<!-- /MAIN -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
																			
<?php  include ('./inc/footer.inc.php'); ?>
