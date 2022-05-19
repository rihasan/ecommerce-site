
@extends('index')
@section('content')

<style>
    .faqHeader {
        font-size: 27px;
        margin: 20px;
    }

    .panel-heading [data-toggle="collapse"]:after {
        font-family: 'Glyphicons Halflings';
        content:"\e131"; /* "play" icon */
        /*content:"\e092";  "play" icon */
        float: right;
        color: #F58723;
        font-size: 18px;
        line-height: 22px;
        /* rotate "play" icon from > (right arrow) to down arrow */
        -webkit-transform: rotate(-90deg);
        -moz-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        -o-transform: rotate(-90deg);
        transform: rotate(-90deg);
    }

    .panel-heading [data-toggle="collapse"].collapsed:after {
        /* rotate "play" icon from > (right arrow) to ^ (up arrow) */
        -webkit-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        -o-transform: rotate(90deg);
        transform: rotate(90deg);
        color: #454444;
    }
</style>

<div id="contact-page" class="container">
    <div class="bg">
        <div class="row">           
            <div class="col-sm-12">                         
                <h2 class="title text-center"> <strong> Frequently asked questions (FAQ)</strong></h2>                                                      
                <div class="entry-content">
                    <div class="panel-group" id="accordion">
                        <div class="faqHeader title text-center">General questions</div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Q. What is fulerhut.com? </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <strong> Answer: </strong> Fulerhut.com is a online flower and florist supply company of Bangladesh.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"> Q. How does the site work? </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <strong> Answer: </strong> You can browse the site or use our search engine to find your desired floral products. You can then add them to your cart and click on place order. You let us know your address, select a payment method, for your order to be done.  A Fulerhut representative will then call against your virtual order  to be successful by ensuring advance(50%-100%) payment of your order.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"> Q. How much do deliveries cost?</a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <strong> Answer: </strong> We provide free shipping countrywide.For orders less than 5000/= ;we cost 500/= as low charge.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse4"> Q. How can I contact you? </a>
                                </h4>
                            </div>
                            <div id="collapse4" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <strong> Answer: </strong> You can always call +88 01842 17 22 11 ;+88 01712 79 79 35, +88 01998 333 822 or mail us at fulerhut@gmail.com.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse5"> Q. How long do the deliveries take? </a>
                                </h4>
                            </div>
                            <div id="collapse5" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <strong> Answer: </strong> Generally 48 hours is a normal delivery period. A delivery period less than 24 hours is called an urgent delivery and it cost extra charges.*
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse6"> Q. What are your delivery hours? </a>
                                </h4>
                            </div>
                            <div id="collapse6" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <strong> Answer: </strong> We deliver from 8 am to 10 pm every day. You can choose your target schedule to delivery your product that is convenient to you.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse7"> Q. How do I know when my order is here? </a>
                                </h4>
                            </div>
                            <div id="collapse7" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <strong> Answer: </strong> A fulerhut representative will call you as soon as they are at your destination to let you know about your delivery.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse8"> Q. How do I pay? </a>
                                </h4>
                            </div>
                            <div id="collapse8" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <strong> Answer: </strong> We accept cash on delivery,we also have Online Credit Cards and Mobile Banking service.For a successful order,flower as a raw-materials advance payment is essential according to our policy.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse9"> Q. Do you serve my area? </a>
                                </h4>
                            </div>
                            <div id="collapse9" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <strong> Answer: </strong> We are currently serving all Bangladesh, except few coastal areas.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse10"> Q. I can’t find the product I am looking for. What do I do?  </a>
                                </h4>
                            </div>
                            <div id="collapse10" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <strong> Answer: </strong> We are always open to new suggestions and will add an item to our inventory just for you. There is a “Product Request�? feature that you can use to inform us your requirement. You can also call +88 01842 17 22 11 ;+88 01712 79 79 35, +88 01998 333 822 or mail us at fulerhut@gmail.com to add an item to our inventory.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse11"> Q. My order is wrong. What do I do? </a>
                                </h4>
                            </div>
                            <div id="collapse11" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <strong> Answer: </strong> Please Immediately call +88 01842 17 22 11 ;+88 01712 79 79 35, +88 01998 333 822 and let us know the problem.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse12"> Q. What if the item is out of stock? </a>
                                </h4>
                            </div>
                            <div id="collapse12" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <strong> Answer: </strong> We hold our own inventory in 9 of our warehouses , so we rarely run of out stock. However, we will try our best to source what you need. If we cannot find it, we will sms/call you and let you know what substitutes are available.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse13"> Q. What happens during a hartal or strike ? </a>
                                </h4>
                            </div>
                            <div id="collapse13" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <strong> Answer: </strong> We work during hartals or strike. But normal delivery may hamper.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse14"> Q. Why should we buy from you when I have a store nearby? </a>
                                </h4>
                            </div>
                            <div id="collapse14" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <strong> Answer: </strong> Well, that is up to you but you can  receive your product delivered to your house for free. Our prices are sometimes lower than that of major flower shop in the city. We also carry a larger variety than the average corner-shop. So, there is really no reason to not buy from us.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse15"> Q. What about the prices? </a>
                                </h4>
                            </div>
                            <div id="collapse15" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <strong> Answer: </strong> Our prices depends on current market prices. But we try our best to offer them to you at or below market prices. Our prices are the same as the local market and we are working hard to get them even lower! If you feel that any product is priced unfairly, please let us know.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse16"> Q. How do you deliver? </a>
                                </h4>
                            </div>
                            <div id="collapse16" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <strong> Answer: </strong> We use our own stuff to deliver. Our goal is to deliver the products to your place on time.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse17"> Q. What is your policy on returns & refunds? </a>
                                </h4>
                            </div>
                            <div id="collapse17" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <strong> Answer: </strong> There is no return & refund policy at all.As flower are sensitive row materials; you can customize your order but no return or refund is possible. Please contact us at +88 01842 17 22 11 ;+88 01712 79 79 35, +88 01998 333 822  if you want to customize an order.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse18"> Q. What is your discounting policy? </a>
                                </h4>
                            </div>
                            <div id="collapse18" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <strong> Answer: </strong> We try to provide the best deals in Bangladesh and many of our products are already discounted below the maximum retail price (MRP). We also offer discount codes under special circumstances, which are applied on the MRP. On any given product, we can only apply one type of discount. We always consider the best discount available to the customer. For example: If the MRP of a product is Tk. 10000 and our list price is Tk. 9200 — the product is already sold at a 8% discount. This means that if user applies a discount code for 5% discount, we will still consider the best discount available to the user and sell the product at Tk. 9200.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse19"> Q. Can I order over the phone? </a>
                                </h4>
                            </div>
                            <div id="collapse19" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <strong> Answer: </strong> Absolutely. Our hotline is +88 01842 17 22 11 ;+88 01712 79 79 35, +88 01998 333 822.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse20"> Q. What about quality? </a>
                                </h4>
                            </div>
                            <div id="collapse20" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <strong> Answer: </strong> We try our best to source the best quality flowers items for your satisfaction by supplying fresh quality flowers only.See more about  quality of products .
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse21"> Q. How are you sourcing your products? </a>
                                </h4>
                            </div>
                            <div id="collapse21" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <strong> Answer: </strong> We have deals with gardener, manufacturers and importers. We only sell authentic flower & floral design as products.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse22"> Q. Do I need to open account to order? </a>
                                </h4>
                            </div>
                            <div id="collapse22" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <strong> Answer: </strong> No. We have guest ordering arrangements. But you can open the account for your convenience.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse23"> Q. Do I receive an invoice for my order? </a>
                                </h4>
                            </div>
                            <div id="collapse23" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <strong> Answer: </strong> Yes. You must got it or collect from our service man or transport agencies. We always give it to our service man. Note: Your invoice is very important to solve any issue about your order or product.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse24"> Q. How secure it is shopping by fulerhut.com?Is my data protected? </a>
                                </h4>
                            </div>
                            <div id="collapse24" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <strong> Answer: </strong> Yes! You are fully protected by our SSL (Secure Sockets Layer) certificate. No tension about it.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse25"> Q. Should I tip the delivery representative? </a>
                                </h4>
                            </div>
                            <div id="collapse25" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <strong> Answer: </strong> Tips are not required. But our delivery team members appreciate recognition for their hard work. Delivery representatives keep the entire tip amount.
                                </div>
                            </div>
                        </div>

                        <!--                        <div class="faqHeader">Sellers</div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo1">Who cen sell items?</a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseTwo1" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            Any registed user, who presents a work, which is genuine and appealing, can post it on <strong>PrepBootstrap</strong>.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree1">I want to sell my items - what are the steps?</a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree1" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            The steps involved in this process are really simple. All you need to do is:
                                                            <ul>
                                                                <li>Register an account</li>
                                                                <li>Activate your account</li>
                                                                <li>Go to the <strong>Themes</strong> section and upload your theme</li>
                                                                <li>The next step is the approval step, which usually takes about 72 hours.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive1">How much do I get from each sale?</a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseFive1" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            Here, at <strong>PrepBootstrap</strong>, we offer a great, 70% rate for each seller, regardless of any restrictions, such as volume, date of entry, etc.
                                                            <br />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">Why sell my items here?</a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseSix" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            There are a number of reasons why you should join us:
                                                            <ul>
                                                                <li>A great 70% flat rate for your items.</li>
                                                                <li>Fast response/approval times. Many sites take weeks to process a theme or template. And if it gets rejected, there is another iteration. We have aliminated this, and made the process very fast. It only takes up to 72 hours for a template/theme to get reviewed.</li>
                                                                <li>We are not an exclusive marketplace. This means that you can sell your items on <strong>PrepBootstrap</strong>, as well as on any other marketplate, and thus increase your earning potential.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEight">What are the payment options?</a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseEight" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            The best way to transfer funds is via Paypal. This secure platform ensures timely payments and a secure environment. 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseNine">When do I get paid?</a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseNine" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            Our standard payment plan provides for monthly payments. At the end of each month, all accumulated funds are transfered to your account. 
                                                            The minimum amount of your balance should be at least 70 USD. 
                                                        </div>
                                                    </div>
                                                </div>
                        
                                                <div class="faqHeader">Buyers</div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">I want to buy a theme - what are the steps?</a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseFour" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            Buying a theme on <strong>PrepBootstrap</strong> is really simple. Each theme has a live preview. 
                                                            Once you have selected a theme or template, which is to your liking, you can quickly and securely pay via Paypal.
                                                            <br />
                                                            Once the transaction is complete, you gain full access to the purchased product. 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">Is this the latest version of an item</a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseSeven" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            Each item in <strong>PrepBootstrap</strong> is maintained to its latest version. This ensures its smooth operation.
                                                        </div>
                                                    </div>
                                                </div>-->
                    </div>
                </div>
            </div>                  
        </div>      
    </div>  
</div>
<br />
@endsection