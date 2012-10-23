<div class="container unit well">

<h1>Set Up</h1>
<p class="lead">ソーシャルランプの導入手順</p>	
	
<div class="well">
<legend>必要なもの</legend>
<ul>
	<li>Wordpressがインストールされている環境</li>
	<li>WP SocialLanpプラグイン</li>
</ul>
</div>

<div class="well">
<legend>インストール</legend>
<p>ダウンロードしたソーシャルランププラグインを解凍します。</p>
<p>解凍して出来たファイルを、フォルダごとWordPressのpluginsディレクトリにアップロードします。</p>
<p>管理画面のプラグイン一覧から『WP SocialLanp』を有効化します。</p>
<p>設定に『ソーシャルランプ』という項目が表示され、カテゴリに『ソーシャルランプ: 追加コンテンツ』が生成されたことを確認してください。</p>
</div>


<div class="well">
<legend>Facebookアプリの作成</legend>
	<p><a href="https://developers.facebook.com/apps" target="_blank">FaceBookデベロッパーセンター</a>から新しいアプリを作成します。</p>
	<p>その際に必ず、"App Domains"の欄にWordPressサイトのドメイン（<span class="label">例</span> http://<?php echo $_SERVER["SERVER_NAME"]; ?>）を記入します。</p>
	<p>アプリ情報から"App ID/API Key"と"アプリのシークレットキー"を取得し、上記フォームに入力し保存します。</p>
</div>


<div class="well">
<legend>ユーザー登録</legend>
<p>APP IDとAPP SECRETの値を保存すると、『ユーザー登録』というボタンが表示されます。</p>
<p>『ユーザー登録』ボタンをクリックし、ユーザーの認証を行います。</p>
<p>正常に認証し終わると、『ユーザーコード』フォームに値が入力されます。</p>
</div>

<div class="well">
<legend>追加コンテンツの作成</legend>
<p>追加コンテンツは通常のWordPress記事として作成します。</p>
<p>記事の本文が、Facebook認証時に出力されるコンテンツになります。</p>
<p>既に作成されている『ソーシャルランプ: 追加コンテンツ』というカテゴリに指定すると、自動的に非表示になります。</p>
</div>

<div class="well">
<legend>ショートコードの挿入</legend>
<p>WordPressブログ記事内に下記の例に従ってショートコードを記述します。</p>
<p><span class="label">例1:</span><code>[sociallanp name="****"]</code> (ボタンのラベルは自動的に『続きを読む』になります)</p>
<p><span class="label">例2:</span><code>[sociallanp name="****"]表示ボタン名[/sociallanp]</code></p>
<p class="text-info">****: 出力する記事の投稿スラッグ名、または記事のID番号。 </p>
</div>

</div><!-- unit well -->
