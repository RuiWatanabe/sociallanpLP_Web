
<!DOCTYPE html>
<html lang="jp">
  <head>

	<meta http-equiv="Content-Style-Type" content="text/css">
	<meta http-equiv="Content-Script-Type" content="text/javascript">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

	<title>WP SocialLanp -ソーシャルランプ- | あなたのサイトを新しく、面白くするWordPressプラグイン</title>
	

	<!-- include -->
	<script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
	<script type="text/javascript" src="js/system.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../lib/jquery.validate.js"></script>
	<script type="text/javascript" src="http://sociallanp.lastlanp.jp/api/printLogSystem.js"></script>
	<script type="text/javascript" src="http://sociallanp.lastlanp.jp/api/userList.js"></script>


    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="bootstrap/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="bootstrap/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="bootstrap/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="bootstrap/ico/apple-touch-icon-57-precomposed.png">
  </head>



  <body>

    <div class="container">


    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          
          <a class="brand" href="./">WP SocialLanp</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li id="home" class="active"><a href="#!/">Home</a></li>
              <li id="setup"><a href="#!/setup">Set Up</a></li>
              <li id="contact" ><a href="#!/contact" data-toggle="modal" data-target="#contactForm">Contact</a></li>
            </ul>

          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>


<!--
	  <div class="unit hero-unit">

		  <div class="page-header">
			  <h1>Social Lanp <small> ー ソーシャルランプ ー </small></h1>    
		  </div>

      <div class="row">
        <div class="span6">	

        <h2>あなたのサイトを、新しく、面白く。</h2>
        <p class="lead">ソーシャルランプを導入すれば、あなたのサイト上で、訪問者に向けて面白いアクションをとることができ、同時にサイトのアクセス数を増加させることができます。</p>
		       
        <div class="well well-large">
				<a href="../wp-sociallanp.zip" class="btn btn-primary btn-block btn-large"><big><strong>今すぐダウンロード</strong> &raquo;</big></a>
			</div>
        </div>

        <div class="span4 pull-right">
	        <iframe width="100%" height="300px" src="http://www.youtube.com/embed/p7sI0ZlblJA?rel=0" frameborder="0" allowfullscreen></iframe>
        </div>

      </div>
      
      </div>


      <div class="unit row-fluid">

        <div class="span4 well">
          <h3>ブログのアクセス増加に</h3>
          <img src="images/img1.png" width="250px" height="150" class="img-polaroid">
          <p>あなたの魅力的なコンテンツを閲覧するために、訪問者はソーシャルランプボタンをクリックします。その度、あなたのサイトはFacebook上で告知され、より多くの方があなたのサイトの存在を知ることになります。</p>
       </div>

        <div class="span4 well">
          <h3>素敵なキャンペーンに</h3>
          <img src="images/img2.png" width="250px" height="150" class="img-polaroid">
          <p>プラグインを導入すると、『ブログ記事をシェアしてクーポンを獲得』『Facebookアカウントでプレゼントに応募』など、ブログ内で魅力的なコンテンツを発行することができるようになります。</p>
        </div>

        <div class="span4 well">
          <h3>口コミの信頼度アップに</h3>
          <img src="images/img3.png" width="250px" height="150" class="img-polaroid">
          <p>実名制SNSであるFacebookのアカウント情報を経由することで、コンテンツを紹介する人が、信頼のおける人であるかどうか、すぐに判断することができるようになります。</p>
        </div>
        
      </div><!-- row-fluid -->



<!-- モーダルウィンドウ -->
<div class="modal hide fade" id="contactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">開発者へメッセージを送信</h3>
  </div>
  <div class="modal-body">
	 
	<form class="form-horizontal">
	  <div class="control-group">
    <label class="control-label" for="inputName">お名前:</label>
    <div class="controls">
      <input name="name" type="text" id="inputName" placeholder="田中 太郎">
    </div>
  </div>
	  <div class="control-group">
    <label class="control-label" for="inputMail">メールアドレス:</label>
    <div class="controls">
      <input name="mail" type="text" id="inputMail" placeholder="mail@yourdomain.com">
    </div>
  </div>
	  <div class="control-group">
    <label class="control-label" for="inputBody">メッセージ本文:</label>
    <div class="controls">
      <textarea name="body" rows="8" style="width:300px" id="inputBody" placeholder="◯◯が使いにくいです。改良してください。"></textarea>
    </div>
	  </div>

	  <div class="modal-footer">
	    <!--<button href="#!/" class="btn" data-dismiss="modal" aria-hidden="true">閉じる</button>-->
	    <button class="btn btn-primary" id="sendMessage" type="submit">メッセージを送信</button>
	</div>		
	  </form>

  </div>
</div>


      <hr>

      <footer>
        <p>&copy; Company 2012</p>
      </footer>

    </div> <!-- /container -->


  </body>
</html>
