
<div class="header">
    <div class="container">
        <ul>
            <li><span class="glyphicon glyphicon-time" aria-hidden="true"></span>Free and Fast Delivery</li>
            <li><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Free shipping On all orders</li>
            <li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="mailto:Shopinfo@hotmail.com">mikOshop@hotmait.com</a></li>
        </ul>
    </div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
    <div class="container">
        <div class="col-md-3 header-left">
            <h1><a href="{{url('/')}}"><img src="{{asset('public/frontEnd/')}}/images/logo33.jpg"></a></h1>
        </div>
        <div class="col-md-6 header-middle">
            <form>
                <div class="search">
                    <input type="search" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {
                                this.value = 'Search';
                            }" required="">
                </div>
                <div class="section_room">

                    <select  class="frm-field required">

                        <option>All categories</option>
                        <option value=""></option>     
                        <!--<option value="AX">Men's Wear</option>
                        <option value="AX">Women's Wear</option>-->
                       
                    </select>

                </div>
                <div class="sear-sub">
                    <input type="submit" value=" ">
                </div>
                <div class="clearfix"></div>
            </form>
        </div>

        <div class="col-md-3 header-right footer-bottom">
            <ul>
                <?php
                $customerId = Session::get('customerId');
                if ($customerId == null) {
                    ?>
                    <li><a href="{{url('/userLogin')}}" class="use1"><span>Login</span></a>

                    </li>
                <?php } else {
                    ?>
                    <li><a href="{{url('/user-logout')}}"class="use1" ><span>Logout</span></a></li>
                <?php } ?>
                <li><a class="fb" href="#"></a></li>
                <li><a class="twi" href="#"></a></li>
                <li><a class="insta" href="#"></a></li>
                <li><a class="you" href="#"></a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>