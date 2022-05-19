
@extends('index')
@section('content')

<div id="contact-page" class="container">
    <div class="bg">
        <div class="row">           
            <div class="col-sm-12">                         
                <h2 class="title text-center">Contact <strong>Us</strong></h2>                                                      
                <div id="gmap" class="contact-map">
                    <iframe width="100%" height="450px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.265067685719!2d90.39496831440773!3d23.73792529517098!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8eb46934581%3A0x677a585fef731e94!2sShahabag+Wholesale+Flower+Market!5e0!3m2!1sen!2sbd!4v1518904659051" style="border:0" allowfullscreen>"></iframe>
                </div>
            </div>                  
        </div> 
        <br /> <br /> <br />      
        <div class="row">   
            <div class="col-sm-8">
                <div class="contact-form">
                    <h2 class="title text-center">Get In Touch</h2>
                    <div class="status alert alert-success" style="display: none"></div>
                    <form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="email" class="form-control" required="required" placeholder="Email">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                        </div>                        
                        <div class="form-group col-md-12">
                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact-info">
                    <h2 class="title text-center">Contact Info</h2>
                    <address>
                        <p> Fulerhut.com - Fuler Online Bazar </p>
                        <p> Kazi Nazrul Islam Ave </p>
                        <p> Shahbag, Dhaka </p>
                        <p> Hot-line: 01712 79 79 35, 01842 17 22 11, 01998 333 822 </p>
                        <p>Email: fulerhut@gmail.com</p>
                    </address>
                    <div class="social-networks">
                        <h2 class="title text-center">Social Networking</h2>
                        <ul>
                            <li>
                                <a href="https://www.facebook.com/fulerhut/"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="https://plus.google.com/u/0/116520811599188084934"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/channel/UCAXLJ5iTlw-wKq7-sTIaWYw"><i class="fa fa-youtube"></i></a>
                            </li>

                            <li>
                                <a href="https://twitter.com/fulerhut"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/fulerhut/"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="https://www.pinterest.com/fulerhut/"><i class="fa fa-pinterest"></i></a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/in/fulerhut/"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>              
        </div>  
    </div>  
</div><!--/#contact-page-->

@endsection