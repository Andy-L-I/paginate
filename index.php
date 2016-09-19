<?php
    require __DIR__ . "/model.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link rel="stylesheet" href="styles/main.css">
</head>
<body>
    <div class="container container-main">
    	<ul data-role="product-list" class="row row-goods">
        <?php foreach (getItems(1, 4) as $item): ?>
           <li class="col-xxs-12 col-xs-6 col-sm-4 col-md-3">
            <div class="thumbnail thumbnail-goods 
               <?php echo $item['new'] ? ' new' : '' ?>
               <?php echo $item['discountCost'] !== null ? ' sale' : '' ?>
               ">
                <a href="#"><img class="img-resposive" src="<?php echo $item['img']; ?>" alt="<?php echo $item['title']; ?>"></a>
                <div class="caption">
                	<h4 class="thumbnail-goods__title">
                		<?php echo $item['title']; ?>
                	</h4>
                	<p class="text-muted small">
                		<?php echo $item['description']; ?>
                	</p>
                	<p class="goods__price-wrap">
                		<span class="goods__price">
                			<?php echo $item['discountCost'] ? $item['discountCost'] : $item['cost']; ?>
                		</span>
						<?php if ($item['discountCost'] !== null): ?>
							<span class="goods__price--old">
								<?php echo $item['cost'] ?>
							</span>
						<?php endif ?> 
                	</p>
                	<p class="thumbnail-goods__btn-group">
                		<a href="#" role="button" class="btn btn-default">Add to cart</a>
                		<a href="#" role="button" class="btn btn-muted">View</a>
                	</p>
                </div>    
            </div>
          </li>
        <?php endforeach; ?>
    </ul>
    	<div class="row row-btn-load-more">
    		<button data-role="product-list-load-more" data-src="/list.php" data-page="2" data-per-page="4" class="center-block btn btn-default">Load more</button>
    	</div>
		<footer>
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div class="thumbnail thumbnail-footer">
						<p class="h3">Hot offers</p>
						<p class="text-muted">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae. Suspendisse sollicitudin velit sed leo. Ut pharetra augue nec augue. Nam elit magna, hend.</p>
						<ul class="list-arrows">
							<li><a href="#">Vestibulum ante ipsum primis in faucibus orci luctus</a></li>
							<li><a href="#">Nam elit magna hendrerit sit amet tincidunt ac</a></li>
							<li><a href="#">Quisque diam lorem interdum vitae dapibus ac scele</a></li>
							<li><a href="#">Donec eget tellus non erat lacinia fermentum</a></li>
							<li><a href="#">Donec in velit vel ipsum auctor pulvin</a></li>
						</ul>
					</div>		
				</div>
				<div class="col-sm-4 col-xs-12">
					<div class="thumbnail thumbnail-footer">
						<p class="h3">Hot offers</p>
						<p class="text-muted">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae. Suspendisse sollicitudin velit sed leo. Ut pharetra augue nec augue. Nam elit magna, hend.</p>
						<ul class="list-arrows">
							<li><a href="#">Vestibulum ante ipsum primis in faucibus orci luctus</a></li>
							<li><a href="#">Nam elit magna hendrerit sit amet tincidunt ac</a></li>
							<li><a href="#">Quisque diam lorem interdum vitae dapibus ac scele</a></li>
							<li><a href="#">Donec eget tellus non erat lacinia fermentum</a></li>
							<li><a href="#">Donec in velit vel ipsum auctor pulvin</a></li>
						</ul>
					</div>		
				</div>
				<div class="col-sm-4 col-xs-12">
					<div class="thumbnail thumbnail-footer">
						<p class="h3">Store information</p>
						<ul class="list-unstyled list-store-info">
							<li>
								<i class="fa fa-map-marker" aria-hidden="true"></i>Company Inc., 8901 Marmora Road, Glasgow, D04 89GR</li>
							<li><i class="fa fa-phone" aria-hidden="true"></i>Call us now toll free: <a href="tel:+80023456789">(800) 2345-6789</a></li>
							<li><i class="fa fa-envelope-o" aria-hidden="true"></i>Customer support: <a href="mailto:support@example.com">support@example.com</a><br>Press: <a href="mailto:support@example.com">pressroom@example.com</a></li>
							<li><i class="fa fa-skype" aria-hidden="true"></i>Skype: <a href="#">sample-usernamea</a></li>
						</ul>
					</div>		
				</div>
			</div>
		</footer>
	</div>
    <script   src="lib/jquery.min.js"></script>
    <script   src="lib/jquery-paginate.js"></script>
    <script src="lib/underscore-min.js"></script>
    <script data-role="product-item-template" type="text/template">		
		<li class="col-xxs-12 col-xs-6 col-sm-4 col-md-3">
			<div class="thumbnail thumbnail-goods 
				<%= isNew ?  ' new' : '' %>
				<%= discountCost ?  ' sale' : '' %>">

				<a href="#"><img class="img-resposive" src="<%= img %>" alt="<%= title %>"></a>

				<div class="caption">
					<h4 class="thumbnail-goods__title">
						<%= title %>
					</h4>
					<p class="text-muted small">
						<%= description %>
					</p>
					<p class="goods__price-wrap">
						<span class="goods__price">
							<%= discountCost ? discountCost : cost %>
						</span>
						<% if (discountCost) { %>
							<span class="goods__price--old">
								<%= cost %>
							</span>
						<% } %>
					</p>
					<p class="thumbnail-goods__btn-group">
						<a href="#" role="button" class="btn btn-default">Add to cart</a>
						<a href="#" role="button" class="btn btn-muted">View</a>
					</p>
				</div>    
			</div>
		</li>
	</script>
    
    <script>
		(function ($, _) {
			$('[data-role="product-list"]').paginate({
					template: $('[data-role="product-item-template"]').html(),
					loadMoreBtn: $('[data-role="product-list-load-more"]'),
					render: function (template, data) {
						var templateRenderer = _.template(template);

						data.isNew = data.new;

						return templateRenderer(data);
					}
				});
		})(jQuery, _);
			
	</script>
</body>
</html>