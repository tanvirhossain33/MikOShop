@extends('frontEnd.master')

@section('title')
Electronics
@endsection

@section('mainContent')
<div class="page-head">
    <div class="container">
        
    </div>
</div>
<!-- //banner -->
<!-- mens -->
<!-- Electronics -->
<div class="electronics">
    <div class="container">
        <div class="col-md-8 electro-left text-center">
            <div class="electro-img-left mask">
                <div class="content-grid-effect slow-zoom vertical">
                    <div class="img-box"><img src="{{asset('public/frontEnd/images/watch.jpg')}}" alt="image" class="img-responsive zoom-img"></div>
                    <div class="info-box">
                        <div class="info-content electro-text simpleCart_shelfItem">
                            <h4>Branded Watches</h4>
                            <span class="separator"></span>
                            <p><span class="item_price">22000‎৳</span></p>
                            <span class="separator"></span>
                            <a class="item_add hvr-outline-out button2" href="#">add to cart </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="electro-img-btm-left mask">
                <div class="content-grid-effect slow-zoom vertical">
                    <div class="img-box"><img src="{{asset('public/frontEnd/images/e1.jpg')}}" alt="image" class="img-responsive zoom-img"></div>
                    <div class="info-box">
                        <div class="info-content electro-text simpleCart_shelfItem">
                            <h4>IphoneX</h4>
                            <span class="separator"></span>
                            <p><span class="item_price">60000‎৳</span></p>
                            <span class="separator"></span>
                            <a class="item_add hvr-outline-out button2" href="#">add to cart </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="electro-img-btm-right mask">
                <div class="content-grid-effect slow-zoom vertical">
                    <div class="img-box"><img src="{{asset('public/frontEnd/images/e2.jpg')}}" alt="image" class="img-responsive zoom-img"></div>
                    <div class="info-box">
                        <div class="info-content electro-text simpleCart_shelfItem">
                            <h4>T-Shirt</h4>
                            <span class="separator"></span>
                            <p><span class="item_price">500‎৳</span></p>
                            <span class="separator"></span>
                            <a class="item_add hvr-outline-out button2" href="#">add to cart </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-4 electro-right text-center">
            <div class="electro-img-rt mask">
                <div class="content-grid-effect slow-zoom vertical">
                    <div class="img-box"><img src="{{asset('public/frontEnd/images/e4.jpg')}}" alt="image" class="img-responsive zoom-img"></div>
                    <div class="info-box">
                        <div class="info-content electro-text simpleCart_shelfItem">
                            <h4>JECKET</h4>
                            <span class="separator"></span>
                            <p><span class="item_price">6000‎৳</span></p>
                            <span class="separator"></span>
                            <a class="item_add hvr-outline-out button2" href="#">add to cart </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="ele-bottom-grid">
            <h3><span>Latest </span>Collections</h3>
            <p>I am trying to create a collection that shows 30 most recent products, or products that have been created in the past 30 days (either way is fine).
            I saw in other threads that we can use this code for the first option {% for product in collection.products % limit:30 }</p>
           @foreach($publishedCategoryProducts as $publishedCategoryProduct)
            <div class="col-md-3 product-men">
				<div class="men-pro-item simpleCart_shelfItem">
					<div class="men-thumb-item">
						<img src="{{asset($publishedCategoryProduct->productImage)}}" alt="" class="pro-image-front">
						<img src="{{asset($publishedCategoryProduct->productImage)}}" alt="" class="pro-image-back">
							<div class="men-cart-pro">
								<div class="inner-men-cart-pro">
									<a href="{{url('/product-details/'.$publishedCategoryProduct->id)}}" class="link-product-add-cart">Quick View</a>
								</div>
							</div>
							<span class="product-new-top">New</span>				
					</div>
					<div class="item-info-product ">
						<h4><a href="{{url('/product-details/'.$publishedCategoryProduct->id)}}">{{$publishedCategoryProduct->productName}}</a></h4>
						<div class="info-product-price">
							<span class="item_price">{{$publishedCategoryProduct->productPrice}}৳</span>
						<!--<del>$69.71</del>-->
						</div>
						<a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>									
					</div>
				</div>
			</div>
			@endforeach











            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- //Electronics -->
</div>

@endsection