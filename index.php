<?php 
session_start();
require_once('./php/simplepie.inc'); 
$feed = new SimplePie('http://clearbluconsulting.com/blog/feed/');
$feed->init();
$feed->handle_content_type();
?>

<!Doctype html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Clear Blu Consulting</title>
	<meta name="editor" content="SublimeText 2">
	<meta name="Author" content="Alex Kilbo">
  <script type="text/javascript" src="cb.js"></script>
  <script type="text/javascript" src="http://fast.fonts.com/jsapi/cc8c2a6f-489c-4000-9056-d0e46f227a70.js"></script>
	<link rel="stylesheet" type="text/css" href="cb.css"></style>
	<script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
	<!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!-- Date: 2012-03-22 -->
</head>
<body>
	<header id="hdr">
		<hgroup id="logo"><img src="clearblu_bg.jpg" id="gradient">
		  <h1 class="cbtext" id="clearblu">CLEARBLU</h1>
		  <h2 class="cbtext" id="consulting">CONSULTING</h2>
      <nav>  
        <ul>  
          <li><a href=#cloud onClick="openbox(1, 'cloud')">CLOUD</a></li>
          <li><a href=#mobile onClick="openbox(1, 'mobile')">MOBILE</a></li>
          <li><a href=#social onClick="openbox(1, 'social')">SOCIAL</a></li>
          <li><a href=#brand onClick="openbox(1, 'brand')">BRANDS</a></li>
        </ul>  
      </nav>  
    </hgroup>
	</header>
  <div class="wrapper">
    <div class="twitter">
      <script>
        new TWTR.Widget({
         version: 2,
         type: 'profile',
         rpp: 4,
          interval: 30000,
          height: 300,
          theme: {
            shell: {
              background: '#1f7ed1',
             color: '#f0f3f5'
             },
             tweets: {
              background: '#faf7fa',
              color: '#080008',
               links: '#07a3eb'
             }
          },
         features: {
           scrollbar: false,
           loop: false,
           live: true,
           behavior: 'all'
         }
        }).render().setUser('clearbluconsult').start();
      </script></div>
    <div class="blog">
      <h1>Latest from the ClearBlu Blog:<?php print $feed->get_title();?></h1>
      <?php $item = $feed->get_item()?>
      <h2><?php print $item->get_title();?></h2>
      <?php print $item->get_description();?>
      <h3>Read more entries <a href="http://www.clearbluconsulting.com/blog">here</a>
      
    </div>
    <div class="whitepaperwrapper">
      <div id="whitepaperbox">
      <h1 id="recentwhitepapers">Recent Whitepapers</h1>
      <h1 id="recentwhitepapername">"Brand Computing"<h1>
      <p id="whitepaperdescription">Harnessing Internet Technologies To Perfect the 21st Century Buisness</p>
      <a id="whitepaperlink" href=#whitepaper onClick="openbox(1, 'brandcomputing')">Read Now</a>
    </div>
  </div>
  <a id="email" href="mailto:info@clearbluconsulting.com">INFO@CLEARBLUCONSULTING.COM</a>
</div>




<div id="shadowing"></div>
        <div class="lbox" id="brand">
          <span id="boxtitle">Brand Marketing<span>
            <form method="post" action="php/mailer.php" target="_parent">
              <p class="description">Whether you are a startup that’s still trying to discern its game-changing business model or an established firm seeking to reintroduce its offerings to a new and changing marketplace, ClearBlu can help you define your unique value proposition and brand identity to place you at the top of your industry.</p>
              <p class="contactus">Contact us to schedule a consultation</p>
              <div class="inputtext">
                <table>
                  <tr>
                    <td>Name:</td>
                    <td><input type="text" name="name" placeholder="First Last" maxlength="60" size="30"></td>
                  <tr>
                    <td>Company:</td> 
                    <td><input type="text" name="company" placeholder="Company Name" maxlength="60" size="30"></td>
                  <tr>
                    <td>Email Address:</td>
                    <td><input type="email" name="email" placeholder="you@domain.com" maxlength="60" size="30"></td>
                  <tr>
                      <td>Phone:</td> 
                    <td><input type="text" name="phone" placeholder="(XXX)-XXX-XXXX" maxlength="30" size="30"></td>
                    </table>   
                <input type="hidden" name="subject" value="Brand Marketing">
               <p> 
                  <input type="submit" name="submit">
                  <input type="button" name="cancel" value="Cancel" onClick="closebox('brand')">
              </p>
            </div>
            </form>
        </div>

        <div class="lbox" id="social">
          <span id="boxtitle">Social Networking<span>
            <form method="post" action="php/mailer.php" target="_parent">
              <p class="description">Somewhere among the hundreds of millions of users joining online social networks every day are a group of people who are desperately seeking exactly the kind of product your company offers. ClearBlu can help you build a strategy to carve out your perfect niche on the global social graph.</p>
              <p class="contactus">Contact us to schedule a consultation</p>
              <div class="inputtext">
             <table>
                  <tr>
                    <td>Name:</td>
                    <td><input type="text" name="name" placeholder="First Last" maxlength="60" size="30"></td>
                  <tr>
                    <td>Company:</td> 
                    <td><input type="text" name="company" placeholder="Company Name" maxlength="60" size="30"></td>
                  <tr>
                    <td>Email Address:</td>
                    <td><input type="email" name="email" placeholder="you@domain.com" maxlength="60" size="30"></td>
                  <tr>
                      <td>Phone:</td> 
                    <td><input type="text" name="phone" placeholder="(XXX)-XXX-XXXX" maxlength="30" size="30"></td>
                    </table> 
                  <input type="hidden" name="subject" value="Social Networking">

               <p> 
                  <input type="submit" name="submit">
                  <input type="button" name="cancel" value="Cancel" onClick="closebox('social')">
              </p>
              </div>
            </form>
        </div>

        <div class="lbox" id="mobile">
          <span id="boxtitle">Mobile Applications<span>
            <form method="post" action="php/mailer.php" target="_parent">
              <p class="description">With the explosive growth of smartphones, tablets, and near ubiquitous wi-fi access, customers now expect to be served everywhere. ClearBlu can help you expand your reach into the mobile web so that the people who need your products can get them whenever and wherever they want it.</p>
              <p class="contactus">Contact us to schedule a consultation</p>
              <div class="inputtext">
             <table>
                  <tr>
                    <td>Name:</td>
                    <td><input type="text" name="name" placeholder="First Last" maxlength="60" size="30"></td>
                  <tr>
                    <td>Company:</td> 
                    <td><input type="text" name="company" placeholder="Company Name" maxlength="60" size="30"></td>
                  <tr>
                    <td>Email Address:</td>
                    <td><input type="email" name="email" placeholder="you@domain.com" maxlength="60" size="30"></td>
                  <tr>
                      <td>Phone:</td> 
                    <td><input type="text" name="phone" placeholder="(XXX)-XXX-XXXX" maxlength="30" size="30"></td>
                    </table> 
                 <input type="hidden" name="subject" value="Mobile Applications">

               <p> 
                  <input type="submit" name="submit">
                  <input type="button" name="cancel" value="Cancel" onClick="closebox('mobile')">
              </p>
            </div>
            </form>
        </div>

        <div class="lbox" id="cloud">
          <span id="boxtitle">Cloud Computing<span>
            <form method="post" action="php/mailer.php" target="_parent">
              <p class="description">Getting the best value for your investments in an infrastructure that can handle the volatility of today’s marketplace is an ongoing challenge. Clearblu can help you create a framework that’s elastic enough to support all your initiatives while still keeping an eye on the bottom line.</p>
              <p class="contactus">Contact us to schedule a consultation</p>
              <div class="inputtext">
             <table>
                  <tr>
                    <td>Name:</td>
                    <td><input type="text" name="name" placeholder="First Last" maxlength="60" size="30"></td>
                  <tr>
                    <td>Company:</td> 
                    <td><input type="text" name="company" placeholder="Company Name" maxlength="60" size="30"></td>
                  <tr>
                    <td>Email Address:</td>
                    <td><input type="email" name="email" placeholder="you@domain.com" maxlength="60" size="30"></td>
                  <tr>
                      <td>Phone:</td> 
                    <td><input type="text" name="phone" placeholder="(XXX)-XXX-XXXX" maxlength="30" size="30"></td>
                    </table> 
                <input type="hidden" name="subject" value="cloud computing">
               <p> 
                  <input type="submit" name="submit">
                  <input type="button" name="cancel" value="Cancel" onClick="closebox('cloud')">
              </p>
            </div>

            </form>
        </div>

        <div class="smalllbox" id="brandcomputing">
          <span id="boxtitle">REQUEST THE LATEST WHITEPAPER<span>
            <form method="post" action="php/attachmailer.php" target="_parent">
              <p class="whitecontactus">Please complete the request form to recieve our latest publication</p>
              <table id="whitepaperformtable">
                  <tr>
                    <td>Name:</td>
                    <td><input type="text" name="name" placeholder="First Last" maxlength="60" size="30"></td>
                  <tr>
                    <td>Company:</td> 
                    <td><input type="text" name="company" placeholder="Company Name" maxlength="60" size="30"></td>
                  <tr>
                    <td>Email Address:</td>
                    <td><input type="email" name="email" placeholder="you@domain.com" maxlength="60" size="30"></td>
                  <tr>
                      <td>Phone:</td> 
                    <td><input type="text" name="phone" placeholder="(XXX)-XXX-XXXX" maxlength="30" size="30"></td>
                    </table> 
               <p> 
                  <input type="submit" name="submit">
                  <input type="button" name="cancel" value="Cancel" onClick="closebox('brandcomputing')">
              </p>
            </form>
        </div>

        <div class="mailbox" id="mailsuccess">Your mail has been successfully sent!
            <input type="button" name="close" value="Close" onClick="closebox('mailsuccess')">
        </div>
</body>

<?php 
  if(isset($_SESSION['mailed'])){
    $mailed=$_SESSION['mailed'];
    if($mailed=='true'){
      echo "<script language=javascript>openbox(1,'mailsuccess')</script>";
       $_SESSION['mailed']="false";
    }
    if($mailed=='failed'){
      echo "<script language=javascript>alert('Mail has failed to send. Please contact us with at the bottom right of the screen.')</script>";
       $_SESSION['mailed']="false";
    }
  }
  else{
    $_SESSION['mailed'] = "false"; 
  }
?>


 