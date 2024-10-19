<?php
/**
 * hublog6/page-hublog_setting.php
 *
 * @テーマ名	hublog4
 * @更新日付	2024.03.13
 */


get_header();
?>
<style>
.entry-content{
	font-size:12px;
}
textarea,
pre{
	background:#eee;
	padding:0.3em 1em;
	border:1px solid #999;
}

textarea{
	overflow:scroll;
	width:100%;
	height:150px;
}
textarea.line{
	height:1.8em;
	overflow:visible;
}
#setting_nav{
	position: fixed;
	left: 0;
	top: 30px;
	width: 100%;
	background: rgba(0,112,159,1.90);
	}
#setting_nav ul{
	display: block;
}
#setting_nav ul li{
		display: inline-block;
}
#setting_nav  a{
		color: #fff;
		display: inline-block;
		padding: 3em 2em 1em;
	}
.entry-content .anchor {
    margin-top: -60px;
    padding-top: 60px;
}
	.entry-content{
		font-size: 1.3em;
	}
	.entry-content h2{
		margin-top: 3em;
	margin-left: -1em;
	}
.entry-content h3{
		border-bottom: 1p solid #999;
	}
.entry-content h4{border-bottom:1px dotted #ccc;
		margin-top: 2em;
}
</style>
<div id="container" class="single clearfix widecolumn">
	<div id="content" role="main">

		<nav id="setting_nav">
		<ul>
		<il><a href="#plugin">プラグイン設定</a></il>
		<il><a href="#privacy">プライバシーポリシー</a></il>
		<il><a href="#inquiry">お問合せテンプレート</a></il>
		<il><a href="#staff">スタッフ紹介</a></il>
		<il><a href="#favicon">ファビコン</a></il>
		</ul>

		</nav>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<?php if ( has_post_thumbnail() ) :
						$args = array(
								'alt'   => get_the_title(),
								'title' => get_the_title(),
						);
						$image = get_the_post_thumbnail($page->ID, 'header-title', $args);
					?><h1 class="entry-title-image"><?php echo $image; ?></h1>
				<?php else: ?>
					<h1 class="entry-title"><span><?php the_title(); ?></span></h1>
				<?php endif; ?>
			</header>

			<div class="entry-content">

<section id="plugin" class="clearfix anchor">
<h2>プラグインイン</h2>


<p><a href="http://hublog.info/plugins/" target="_blank">プラグインインストール</a></p>

<h3>プラグイン設定</h3>
<h4>Siteguard</h4>

<p>
左ナビ「SiteGuard」
<br>
┗WAFチューニングサポート　<br />
↓<br>
　「新しいルールを追加」に下記をペースト
　</p>
<textarea readonly onclick="javascript:this.select();this.focus();">
xss-tagclose-2
crlfinj-4
xss-tag-7
sqlinj-11
xss-tagclose-1
url-php-rfi
xss-try-1
oscmd-16
xss-style-8
xss-tag-1
xss-tagopen-1
xss-tag-filter
</textarea>

<p>ペーストしたら「保存」</p>
<p>入力が完了したら上のボタン「ON/OFF」を「ON」にする。<br>
「ルールを適用」クリック
</p>

<p>新しいプラグインを追加した時のエラーや、プラグインのアップデートでエラーが発生した時は</p>

<p>
CPI　＞ユーザーポータル　＞ウェブコントロールパネル　＞<br />
ホーム ＞ 公開サイト用設定 ＞ 制作ツール ＞ WAF 　＞「ログを表示する」で<br />
検索シグネチャの内容を確認</p>
<p>「編集で追記しておく。</p>


<h4>TinyMCE Advanced</h4>

<p>左ナビ「設定」＞「TinyMCE Advanced」</p>

<p>
<strong>高度なオプション</strong><br>
	☑　<small>保存時に ＜p＞と ＜br /＞ タグを削除せず、テキストエディタ上に表示する テキストエディターの自動補完を停止し、より高度なコーディングが可能です。 しかし、まれに予想できない振る舞いをするため、常用前に充分テストを行ってください。 なおテキストエディター内での改行は出力に含まれます。このため空の行や HTML タグ内の改行、複数の ＜br /＞ タグは使用しないでください。 </small><br>
<br>
↑チェック

</p>

<p>英語の場合：<br>
Stop removing the ＜p＞ and＜br /＞ tags when saving and show them in the Text editor</p>


<h4>Celtis</h4>
<p>
☑［サムネイル再作成］　サムネイル表示時にサイズを確認して、メディア設定値と異なる場合は再作成<br />
☑［PNG - JPEG変換］　オリジナル画像が PNG形式の場合のサムネイルを JPEG形式で作成<br />
☑FlexSlider2 を用いてギャラリーにスライダー機能を追加します<br />
※JetPack か slimjetpack が有効になっている必要があります

</p>

<h5>celtis-gallery-slider.php　のカスタマイズ</h5>

<p>flex-control-nav flex-control-thumbs<br />
サムネイルサイズの変更方法</p>
<p>
celtispack/modules/celtis-gallery-slider/celtis-gallery-slider.php</p>
</p>
<p>「small」を 「thumbnails」に置換（全3か所）<br />
add_image_size　の数値を任意の数値に</p>
<blockquote>
global $_wp_additional_image_sizes;<br />
if (empty( $_wp_additional_image_sizes['<span class="red">small</span>'] ) )<br />
add_image_size('small',<span class="red"> 70</span>, <span class="red">70</span>, true );
</blockquote>
<blockquote>
Foreach ( $attachments as $id => $attachment ) {<br />
$thumb = wp_get_attachment_image_src($id, '<span class="red">small</span>');
</blockquote>



<h4>カスタムフィールドテンプレート</h4>
<p>設定ファイルをダウンロードしてインポート</p>
<p><a href="http://hublog.info/plugins/#cft7" target="_blank">CFT7設定</a></p>
<p><a href="http://hublog.info/plugins/custonfieldemplate/cft_builder">工務店用設定ファイル</a></p>
</section><!--plugin-->



<h4>Jetpack</h4>

<p>
サービス名<br />
LINE<br />
</p>
<p>
共有 URL<br />
http://line.naver.jp/R/msg/text/%post_title%%0D%0A%post_url%
</p>
<p>
アイコン URL<br />
/wp-content/themes/hublog4/images/line-16_16.png
</p>



<section id="privacy" class="clearfix anchor">

<h2>プライバシーポリシー</h2>
<textarea readonly onclick="javascript:this.select();this.focus();">

[sc_get_option key=profile_corporate_name]では、お客さまのプライバシーをお守りするため、
「個人情報」について以下のように取り扱っております。

１．個人情報保護の基本方針
当社では、必要な範囲で、お客さまのお名前、ご住所、電話番号等の個人情報を収集し、利用目的の範囲内でのみ使用させていただいております。
また、個人情報保護の重要性を認識し、これら個人情報を適切に利用し保護することが、事業活動の基本であると共に、社会的責任であると考え、今後においても全社員がこれを遵守します。

２．個人情報の利用目的
取得した閲覧・購買履歴等の情報を分析し、ユーザーに適した新商品・サービスをお知らせするために利用します。
ユーザーが利用しているサービスの新機能や更新情報、キャンペーン情報などをメール送付によりご案内するため。
ユーザーが利用しているサービスのメンテナンスなど、必要に応じたご連絡をするため。
ユーザーからのコメントやお問い合わせに回答するため。
利用規約に違反したユーザーの特定、その他不正不当な目的でサービスを利用したユーザーの特定をし対処するため。

３．個人情報の第三者への提供
当社では、次のいずれかに該当する場合を除き、第三者への開示・提供は一切いたしません。
お客さまの同意がある場合。
当社事業運営上必要な場合において、業務委託先に開示・提供する場合。
なお、業務委託先に提供する場合は、個人情報が適切に取り扱われることを確認したうえで提供いたします。
その他、法律にもとづき開示が義務づけられるなど正当な理由がある場合。

４．開示・訂正の請求
当社は、お客さまがご自分の個人情報の確認を希望される場合は、原則としてその内容をお知らせします。また、内容に誤りがある場合には、訂正させていただきます。

５．法令遵守
当社は、当社が保有する個人情報に関して適用される法令、規範を遵守するとともに、上記各項における取扱いを必要に応じて見直し、その改善に継続的に努めます。

６．Cookieについて
当ウェブサイトでは、お客様のニーズに合ったより良いサービスを提供するために、クッキーを使用しています。
Cookieとは、サイトにアクセスした際にブラウザに保存される情報で、名前やメールアドレスなどの個人情報は含みません。
ブラウザの設定により、Cookieを使用しないようにすることもできます。

Cookie使用の同意を取り消す場合はこちらをクリック→[cookies_revoke]

７．免責事項
当サイトのコンテンツ・情報については、可能な限り正しい情報を掲載する努力を致しますが、誤情報が入り込んだり、情報が古くなってしまう可能性もあります。
当サイトに掲載された内容により、生じた損害等については一切の責任を負いかねます。
また、当サイトからリンクやバナーなどを通じて他サイトに移動された場合、そのサイトで提供される情報やサービスなどについて、当方を一切の責任を負いません。

[sc_get_option key=profile_corporate_name]
住所：[sc_get_option key=profile_address]
TEL：[sc_get_option key=profile_main_tel]
FAX：[sc_get_option key=profile_fax]

以　上

制　定　：[sc_get_option key=profile_privacy_date]

</textarea>

</section><!--privacy-->
<section id="inquiry" class="clearfix anchor">



<h2>お問合せテンプレート</h2>

<h3>お問合せ</h3>



<h4>フォーム（サンプルソース）</h4>

<textarea readonly onclick="javascript:this.select();this.focus();">

<b class="required">お問合せ</b>
[checkbox* youken use_label_element "資料請求" "ご相談・ご意見など" "その他"]

<b>お問合せの内容を具体的にお聞かせください。</b>
[textarea detail 42x3]

<b class="required">お名前</b>
[text* c-name 20/]

<b>ふりがな</b>
[text c-kana 20/]

<b class="required">メールアドレス</b>
[email* c-email 40/  akismet:author_email]

<b>ご住所</b>
[text c-address 50/]

<b class="required">電話番号（携帯電話可）</b>
[text c-tel 20/][honeypot hublog_hoihoi]

<div class="d-none"><b>問い合わせ元ページ</b>[text title default:get readonly]</div>

<div class="submit_area">
<p class="caution">※確認画面はございません。今一度、入力内容をご確認ください。</p>
<p>[acceptance acceptance] 確認しました </p>
[response]
<p>[submit "　送　信　"]</p>
</div>

<h3>プライバシーポリシー</h3>
<iframe src="/privacy?simple=1"></iframe>
</textarea>

<h4>メール</h4>
[honeypot hublog_hoihoi]
<h5>送信先</h5>
<textarea class="line" readonly onclick="javascript:this.select();this.focus();">
[c-email]</textarea>
<h5>送信元</h5>
<textarea class="line" readonly onclick="javascript:this.select();this.focus();">
"<?php echo get_option('profile_shop_name'); ?>" &lt;<?php echo get_option('profile_inquiry_mail'); ?>&gt;</textarea>

<h5>題名</h5>
<textarea class="line" readonly onclick="javascript:this.select();this.focus();">
[c-name]様、お問合せありがとうございます【<?php echo get_option('profile_shop_name'); ?>】</textarea>
<h5>追加ヘッダー</h5>
<textarea class="line" readonly onclick="javascript:this.select();this.focus();">
Bcc: <?php echo get_option('profile_inquiry_mail'); ?>,info@djcom.jp</textarea>

<h5>メッセージ本文</h5>

<textarea readonly onclick="javascript:this.select();this.focus();">
[c-name]様

<?php echo get_option('profile_corporate_name'); ?>です。
お問合せいただき、誠にありがとうございます。

お問合せの内容に関しまして、早急にご回答申し上げます。
今しばらくお待ち下さい。

お問合せ内容

■お名前： [c-name]（[c-kana]）
■メールアドレス： [c-email]
■ご住所： [c-address]
■電話番号： [c-tel]

■お問合せ内容：[youken]
[detail]

■お問合せページ
[title]　＞　[_post_title]
[_post_url]

--------------------------------------------------------------------------------------

--
<?php echo get_option('profile_corporate_name'); ?>

〒<?php echo get_option('profile_postcode'); ?>　<?php echo get_option('profile_address'); ?>

TEL：<?php echo get_option('profile_inquiry_tel'); ?> 	FAX：<?php echo get_option('profile_fax'); ?>


営業時間：<?php echo get_option('profile_opening_hours'); ?>

ホームページ　<?php echo get_option('profile_url'); ?>

Email: <?php echo get_option('profile_inquiry_mail'); ?></textarea>



<h3>イベント申し込み</h3>

<h4>フォーム（サンプルソース）</h4>
<textarea readonly onclick="javascript:this.select();this.focus();">

<b class="required">お名前</b>
[text* c-name 20/]

<b class="required">ふりがな</b>
[text* c-kana 20/]

<b class="required">メールアドレス</b>
[email* c-email 40/ akismet:author_email]

<b class="required">ご住所</b>
[text* c-address 50/]

<b class="required">電話番号（携帯電話可）</b>
[text* c-tel 20/]

<b class="required">ご来場人数</b>
<span>大人：[select* adults include_blank "1人" "2人" "3人" "4人" "5人" "6人" "7人以上"]<br>お子様：[select* children include_blank "0" "1人" "2人" "3人" "4人" "5人" "6人" "7人以上"]</span>

<b>備考・気になることなど</b>
[textarea note placeholder "お車で越しの場合は台数など、小さなお子様連れで越しの場合はご年齢などをお書きいただけるとご対応がスムーズです。 ご質問やご要望なども何なりとご記入ください。"][honeypot hublog_hoihoi]

<div class="submit_area">
<p class="caution">※確認画面はございません。今一度、入力内容をご確認ください。</p>
<p>[acceptance acceptance] 確認しました </p>
[response]
<p>[submit "　送　信　"]</p>
</div>

<h3>プライバシーポリシー</h3>
<iframe src="/privacy?simple=1"></iframe>
</textarea>


<h4>メッセージ本文</h4>
<textarea readonly onclick="javascript:this.select();this.focus();">
[c-name]様

<?php echo get_option('profile_corporate_name'); ?>です。
イベント参加のお申込みを頂き、誠にありがとうございます。

後ほど、イベントについての詳細な内容をご連絡させていただきます。
今しばらくお待ち下さい。

■お問合せ元ページ
　[_post_title]
　[_post_url]

お問合せ内容
■お名前： [c-name]（[c-kana]）
■メールアドレス： [c-email]
■ご住所： [c-address]
■電話番号： [c-tel]
■備考・気になることなど：
[note]

--------------------------------------------------------------------------------------
当日はお気をつけてご来場下さい。
--
<?php echo get_option('profile_corporate_name'); ?>

〒<?php echo get_option('profile_postcode'); ?>　<?php echo get_option('profile_address'); ?>

TEL：<?php echo get_option('profile_inquiry_tel'); ?> 	FAX：<?php echo get_option('profile_fax'); ?>

営業時間：<?php echo get_option('profile_opening_hours'); ?>

ホームページ　<?php echo get_option('profile_url'); ?>

Email: <?php echo get_option('profile_inquiry_mail'); ?>

</textarea>





<h3>モデルハウス見学申込</h3>

<h4>フォーム（サンプルソース）</h4>
<textarea readonly onclick="javascript:this.select();this.focus();">

<b class="required">ご希望のご来場日時</b>
<span>希望日：[date* v-date date-format:mm/dd/yy]<br>時間帯：[select* v-hour include_blank "10：00～11：00ごろ" "11：00～12：00ごろ" "12：00～13：00ごろ" "13：00～14：00ごろ" "14：00～15：00ごろ" "15：00～16：00ごろ" "16：00～17：00ごろ" "17：00～18：00ごろ"]</span>

<b class="required">ご来場人数<span class="required"></b>
<span>大人：[select* v-adults include_blank "1人" "2人" "3人" "4人" "5人" "6人" "7人以上"]<br>お子様：[select* v-children include_blank "0" "1人" "2人" "3人" "4人" "5人" "6人" "7人以上"]</span>

<b class="required">お名前</b>
[text* c-name 20/]

<b class="required">ふりがな</b>
[text* c-kana 20/]

<b class="required">メールアドレス</b>
[email* c-email 40/ akismet:author_email]

<b class="required">ご住所</b>
[text* c-address 50/]

<b class="required">電話番号（携帯電話可）</b>
[text* c-tel 20/]

<b>備考・気になることなど</b>
[textarea note placeholder "お車で越しの場合は台数など、小さなお子様連れで越しの場合はご年齢などをお書きいただけるとご対応がスムーズです。 ご質問やご要望なども何なりとご記入ください。"][honeypot hublog_hoihoi]

<div class="d-none"><b>問い合わせ元ページ</b>[text title default:get readonly]</div>

<div class="submit_area">
<p class="caution">※確認画面はございません。今一度、入力内容をご確認ください。</p>
<p>[acceptance acceptance] 確認しました </p>
[response]
<p>[submit "　送　信　"]</p>
</div>

<h3>プライバシーポリシー</h3>
<iframe src="/privacy?simple=1"></iframe>
</textarea>


<h4>メッセージ本文</h4>
<textarea readonly onclick="javascript:this.select();this.focus();">
[c-name]様

<?php echo get_option('profile_corporate_name'); ?>です。

モデルハウス見学のお申込みを頂き、誠にありがとうございます。

後ほど、詳細な内容をご連絡させていただきます。
今しばらくお待ち下さい。

○ご来場希望日時
[v-date]
[v-hour]

○ご来場人数
大人：[v-adults]
お子様：[v-children]

お客様情報
■お名前： [c-name]（[c-kana]）
■メールアドレス： [c-email]
■ご住所： [c-address]
■電話番号： [c-tel]
■備考・気になることなど：
[note]

■お問合せページ
[title]　＞　[_post_title]
[_post_url]

--------------------------------------------------------------------------------------
当日はお気をつけてご来場下さい。
--
<?php echo get_option('profile_corporate_name'); ?>

〒<?php echo get_option('profile_postcode'); ?>　<?php echo get_option('profile_address'); ?>

TEL：<?php echo get_option('profile_inquiry_tel'); ?> 	FAX：<?php echo get_option('profile_fax'); ?>

営業時間：<?php echo get_option('profile_opening_hours'); ?>

ホームページ　<?php echo get_option('profile_url'); ?>

Email: <?php echo get_option('profile_inquiry_mail'); ?>

</textarea>






<h3>資料請求</h3>

<h4>フォーム（サンプルソース）</h4>
<textarea readonly onclick="javascript:this.select();this.focus();">

<b class="required">当社商品で興味のあるものをお選びください<br>（複数回答可）</b>
[checkbox* p-lineup use_label_element "A" "B" "C" "その他"]


<b class="required">ご希望の資料</b>
[radio youken default:1 "A"]


<b class="required">お名前</b>
[text* c-name 20/]

<b class="required">ふりがな</b>
[text* c-kana 20/]

<b class="required">メールアドレス</b>
[email* c-email 40/ akismet:author_email]

<b class="required">ご住所</b>
[text* c-address 50/]

<b class="required">電話番号（携帯電話可）</b>
[text* c-tel 20/]

<div class="d-none"><b>問い合わせ元ページ</b>[text title default:get readonly]</div>

<b>備考</b>
[textarea note 42x3 placeholder "ご要望、ご質問などあれば具体的にお聞かせください。"][honeypot hublog_hoihoi]

<div class="submit_area">
<p class="caution">※確認画面はございません。今一度、入力内容をご確認ください。</p>
<p>[acceptance acceptance] 確認しました </p>
[response]
<p>[submit "　送　信　"]</p>
</div>

<h3>プライバシーポリシー</h3>
<iframe src="/privacy?simple=1"></iframe>
</textarea>
<h4>メッセージ本文</h4>
<textarea readonly onclick="javascript:this.select();this.focus();">
[c-name]様

<?php echo get_option('profile_corporate_name'); ?>です。
資料請求のお申し込みをいただき、誠にありがとうございます。

当社の資料を郵送にてお送りいたします。
今しばらくお待ち下さい。

お問合せ内容
■お名前： [c-name]（[c-kana]）
■メールアドレス： [c-email]
■ご住所： [c-address]
■電話番号： [c-tel]

■興味のある商品
[p-lineup]
■備考
[note]

■お問合せページ
[title]　＞　[_post_title]
[_post_url]

--------------------------------------------------------------------------------------
--
<?php echo get_option('profile_corporate_name'); ?>

〒<?php echo get_option('profile_postcode'); ?>　<?php echo get_option('profile_address'); ?>

TEL：<?php echo get_option('profile_inquiry_tel'); ?> 	FAX：<?php echo get_option('profile_fax'); ?>

営業時間：<?php echo get_option('profile_opening_hours'); ?>

ホームページ　<?php echo get_option('profile_url'); ?>

Email: <?php echo get_option('profile_inquiry_mail'); ?>

</textarea>






<h3>現地調査予約フォーム</h3>

<h4>フォーム（サンプルソース）</h4>
<textarea readonly onclick="javascript:this.select();this.focus();">
<b class="required">お名前</b>
[text* c-name 20/]

<b>ふりがな</b>
[text c-kana 20/]

<b class="required">メールアドレス</b>
[email* c-email 40/  akismet:author_email]

<b>ご住所</b>
[text c-address 50/]

<b class="required">電話番号（携帯電話可）</b>
[text c-tel 20/]

<b class="required">建築予定地の住所</b>
[text* basho 20/]

<b class="required">ご希望の日時</b>
<span>[date c-date date-format:mm/dd/yy first-day:0] [select* c-hour include_blank "10：00～" "10：30～" "11：00～" "11：30～" "12：00～" "12：30～" "13：00～" "13：30～" "14：00～" "14：30～" "15：00～" "15：30～" "16：00～" "16：30～" "17：00～" "17：30～"]</span>

<b>備考など</b>
[textarea note 42x3]

[honeypot hublog_hoihoi]

<div class="submit_area">
<p class="caution">※確認画面はございません。今一度、入力内容をご確認ください。</p>
<p>[acceptance acceptance] 確認しました </p>
[response]
<p>[submit "　送　信　"]</p>
</div>

<h3>プライバシーポリシー</h3>
<iframe src="/privacy?simple=1"></iframe>
</textarea>


<h4>メッセージ本文</h4>
<textarea readonly onclick="javascript:this.select();this.focus();">
[c-name]様

<?php echo get_option('profile_corporate_name'); ?>です。


現地調査のご予約をいただき、誠にありがとうございます。

お問合せの内容に関しまして、早急にご回答申し上げます。
今しばらくお待ち下さい。

お問合せ内容

■お名前： [c-name]（[c-kana]）
■メールアドレス： [c-email]
■ご住所： [c-address]
■電話番号： [c-tel]

■建築予定地：[basho]
■ご希望の日時：[c-date] [c-hour]

[note]

■お問合せページ
　[_post_title]
　[_post_url]
--------------------------------------------------------------------------------------
--
<?php echo get_option('profile_corporate_name'); ?>

〒<?php echo get_option('profile_postcode'); ?>　<?php echo get_option('profile_address'); ?>

TEL：<?php echo get_option('profile_inquiry_tel'); ?> 	FAX：<?php echo get_option('profile_fax'); ?>

営業時間：<?php echo get_option('profile_opening_hours'); ?>

ホームページ　<?php echo get_option('profile_url'); ?>

Email: <?php echo get_option('profile_inquiry_mail'); ?>

</textarea>



<h3>リフォームお問合せ</h3>

<h4>フォーム（サンプルソース）</h4>
<textarea readonly onclick="javascript:this.select();this.focus();">

<b class="required">リフォームをご検討の箇所<br>（複数回答可）</b>
[checkbox* reform "全面改修" "リビング" "キッチン" "浴室" "洗面・トイレ" "内装" "収納" "店舗" "屋根・外壁" "エクステリア" "バリアフリー" "ペット" "設備交換" "その他"]

<b>具体的なご要望</b>
[textarea detail 42x3]

<b class="required">お名前</b>
[text* c-name 20/]

<b class="required">ふりがな</b>
[text* c-kana 20/]

<b class="required">メールアドレス</b>
[email* c-email 40/ akismet:author_email]

<b class="required">ご住所</b>
[text* c-address 50/]

<b class="required">電話番号（携帯電話可）</b>
[text* c-tel 20/][honeypot hublog_hoihoi]

<div class="submit_area">
<p class="caution">※確認画面はございません。今一度、入力内容をご確認ください。</p>
<p>[acceptance acceptance] 確認しました </p>
[response]
<p>[submit "　送　信　"]</p>
</div>

<h3>プライバシーポリシー</h3>
<iframe src="/privacy?simple=1"></iframe>
</textarea>
<h4>メッセージ本文</h4>
<textarea readonly onclick="javascript:this.select();this.focus();">
[c-name]様

<?php echo get_option('profile_corporate_name'); ?>です。
リフォーム無料相談のお問合せいただき、誠にありがとうございます。

お問合せの内容に関しまして、後ほどご連絡いたします。
今しばらくお待ち下さい。

お問合せ内容

■お名前： [c-name]（[c-kana]）
■メールアドレス： [c-email]
■ご住所： [c-address]
■電話番号： [c-tel]

■リフォームをご検討の箇所
[reform]

具体的に
[detail]

■お問合せページ
　[_post_title]
　[_post_url]

--------------------------------------------------------------------------------------
--
<?php echo get_option('profile_corporate_name'); ?>

〒<?php echo get_option('profile_postcode'); ?>　<?php echo get_option('profile_address'); ?>

TEL：<?php echo get_option('profile_inquiry_tel'); ?> 	FAX：<?php echo get_option('profile_fax'); ?>

営業時間：<?php echo get_option('profile_opening_hours'); ?>

ホームページ　<?php echo get_option('profile_url'); ?>

Email: <?php echo get_option('profile_inquiry_mail'); ?>

</textarea>






<h3>お施主様専用ご依頼フォーム</h3>

<h4>フォーム（サンプルソース）</h4>
<textarea readonly onclick="javascript:this.select();this.focus();">
<b class="required">お問合せ</b>
[checkbox* youken use_label_element "修理" "メンテナンス" "リフォーム" "その他"]

<b>お問合せの内容を具体的にお聞かせください。</b>
[textarea detail 42x3]

<b class="required">お名前</b>
[text* c-name 20/]

<b>ふりがな</b>
[text c-kana 20/]

<b class="required">メールアドレス</b>
[email* c-email 40/  akismet:author_email]

<b>ご住所</b>
[text c-address 50/]

<b class="required">電話番号（携帯電話可）</b>
[text c-tel 20/][honeypot hublog_hoihoi]

<div class="submit_area">
<p class="caution">※確認画面はございません。今一度、入力内容をご確認ください。</p>
<p>[acceptance acceptance] 確認しました </p>
[response]
<p>[submit "　送　信　"]</p>
</div>

<h3>プライバシーポリシー</h3>
<iframe src="/privacy?simple=1"></iframe>
</textarea>
<h4>メッセージ本文</h4>
<textarea readonly onclick="javascript:this.select();this.focus();">
[c-name]様

いつもお世話になっております
<?php echo get_option('profile_corporate_name'); ?>です。

お問合せいただき、誠にありがとうございます。

お問合せの内容に関しまして、早急にご回答申し上げます。
今しばらくお待ち下さい。

お問合せ内容

■お名前： [c-name]（[c-kana]）
■メールアドレス： [c-email]
■ご住所： [c-address]
■電話番号： [c-tel]

■お問合せ内容：[youken]
[detail]

■お問合せページ
　[_post_title]
　[_post_url]
--------------------------------------------------------------------------------------
--
<?php echo get_option('profile_corporate_name'); ?>

〒<?php echo get_option('profile_postcode'); ?>　<?php echo get_option('profile_address'); ?>

TEL：<?php echo get_option('profile_inquiry_tel'); ?> 	FAX：<?php echo get_option('profile_fax'); ?>

営業時間：<?php echo get_option('profile_opening_hours'); ?>

ホームページ　<?php echo get_option('profile_url'); ?>

Email: <?php echo get_option('profile_inquiry_mail'); ?>

</textarea>





<h3>土地探し依頼</h3>

<h4>フォーム（サンプルソース）</h4>
<textarea readonly onclick="javascript:this.select();this.focus();">
<strong>【土地探しに関するアンケート】</strong>

<b class="required">ご計画内容</b>
[checkbox* request use_label_element "新規購入" "買い替え" "その他"]

<b class="required">ご希望の時期</b>
[checkbox* jiki use_label_element "できるだけ早く" "3ヶ月以内" "1年以内""未定"]

<b class="required">現在のお住まい</b>
[checkbox* genjyou use_label_element "持家（戸建）" "持家（マンション）" "賃貸""社宅""その他"]

<b class="required">お探しの場所</b>
[text* basho 20/]

<b class="required">ご希望土地面積</b>
[text* menseki 20/]

<b class="required">土地ご予算</b>
<span>[text* tochiyosan 20/] 万円くらい</span>

<b class="required">建物ご予算</b>
<span>[text* tatemonoyosan 20/] 万円くらい</span>


<b>具体的なご要望など</b>
[textarea detail 42x3]

<strong>【ご本人様情報】</strong>

<b class="required">お名前</b>
[text* c-name 20/]

<b>ふりがな</b>
[text c-kana 20/]

<b class="required">メールアドレス</b>
[email* c-email 40/  akismet:author_email]

<b>ご住所</b>
[text c-address 50/]

<b class="required">電話番号（携帯電話可）</b>
[text c-tel 20/][honeypot hublog_hoihoi]

<div class="submit_area">
<p class="caution">※確認画面はございません。今一度、入力内容をご確認ください。</p>
<p>[acceptance acceptance] 確認しました </p>
[response]
<p>[submit "　送　信　"]</p>
</div>

<h3>プライバシーポリシー</h3>
<iframe src="/privacy?simple=1"></iframe>
</textarea>
<h4>メッセージ本文</h4>
<textarea readonly onclick="javascript:this.select();this.focus();">
[c-name]様

<?php echo get_option('profile_corporate_name'); ?>です。
土地探し依頼にお問合せいただき、誠にありがとうございます。

お問合せの内容に関しまして、早急にご回答申し上げます。
今しばらくお待ち下さい。

【お問合せ内容】

・ご計画内容：[request]
・ご希望の時期：[jiki]
・現在のお住い：[genjyou]
・お探しの場所：[basho]
・ご希望土地面積：[menseki]
・土地ご予算：[tochiyosan]万円くらい
・建物ご予算：[tatemonoyosan]万円くらい

・具体的なご要望など：[youken]
[detail]

・ご本人様情報
お名前： [c-name]（[c-kana]）
メールアドレス： [c-email]
ご住所： [c-address]
電話番号： [c-tel]


■お問合せページ
　[_post_title]
　[_post_url]
--------------------------------------------------------------------------------------
--
<?php echo get_option('profile_corporate_name'); ?>

〒<?php echo get_option('profile_postcode'); ?>　<?php echo get_option('profile_address'); ?>

TEL：<?php echo get_option('profile_inquiry_tel'); ?> 	FAX：<?php echo get_option('profile_fax'); ?>

営業時間：<?php echo get_option('profile_opening_hours'); ?>

ホームページ　<?php echo get_option('profile_url'); ?>

Email: <?php echo get_option('profile_inquiry_mail'); ?>

</textarea>






<h3>求人のお問合せ</h3>

<h4>フォーム（サンプルソース）</h4>
<textarea readonly onclick="javascript:this.select();this.focus();">
<b class="required">氏名</b>
[text* c-name 20/]

<b class="required">ふりがな</b>
[text* c-kana 20/]

<b class="required">メールアドレス</b>
[email* c-email 40/]

<b class="required">住所</b>
[text* c-address 50/]

<b class="required">連絡先電話番号</b>
	<span>[text* c-tel 20/]（携帯可）</span>

<b class="required">生年月日</b>
<span>西暦 [text* r-birth-y 5/]年　[text* r-birth-m 5/]月　[text* r-birth-d 5/]日<br>満[text* r-age 5/]歳</span>


<b>最終学歴</b>
<span>[textarea r-gakureki 42x2]<br>[radio r-gakureki-sotsu "卒" "卒業見込"]</span>


<b>所有資格</b>
[textarea r-shikaku 42x3]


<b class="required">希望就職時期</b>
<span>[text* r-start-y 5/]年　[text* r-start-m 5/]月</span>


<b class=>その他希望条件・アピールなど</b>
[textarea note 42x4]
[honeypot hublog_hoihoi]

<div class="submit_area">
<p class="caution">※確認画面はございません。今一度、入力内容をご確認ください。</p>
<p>[acceptance acceptance] 確認しました </p>
[response]
<p>[submit "　送　信　"]</p>
</div>

<h3>プライバシーポリシー</h3>
<iframe src="/privacy?simple=1"></iframe>
</textarea>
<h4>メッセージ本文</h4>
<textarea readonly onclick="javascript:this.select();this.focus();">
[c-name]様

<?php echo get_option('profile_corporate_name'); ?>です。

求人のご応募を頂き誠にありがとうございます。

ご応募の内容に関しまして、早急にご回答申し上げます。
今しばらくお待ち下さい。

応募内容
■ 志望職種：[r-shokushu]
■ 希望就業時期：[r-start-y]年 [r-start-m]月

あなたの情報
■ 氏名： [c-name]（[c-kana]）
■ メールアドレス： [c-email]
■ 住所： [c-address]
■ 連絡先電話番号： [c-tel]
■ 生年月日：[r-birth-y]年  [r-birth-m]月  [r-birth-d]日  生まれ　満[r-age]歳
■ 最終学歴：
[r-gakureki]　[r-gakureki-sotsu]
■ その他資格：
[r-shikaku]
■その他条件・アピール：
[note]



■お問合せページ
　[_post_title]
　[_post_url]
--------------------------------------------------------------------------------------
--
<?php echo get_option('profile_corporate_name'); ?>

〒<?php echo get_option('profile_postcode'); ?>　<?php echo get_option('profile_address'); ?>

TEL：<?php echo get_option('profile_inquiry_tel'); ?> 	FAX：<?php echo get_option('profile_fax'); ?>

営業時間：<?php echo get_option('profile_opening_hours'); ?>

ホームページ　<?php echo get_option('profile_url'); ?>

Email: <?php echo get_option('profile_inquiry_mail'); ?>

</textarea>
</section><!--inquiry-->








<section id="staff" class="clearfix anchor">

<h2>スタッフ紹介</h2>
<textarea readonly onclick="javascript:this.select();this.focus();">
<?php 
$users = get_users( array('orderby' => 'ID', 'order' => 'ASC') );
foreach ($users as $user):
    $uid = $user->ID;
    echo '[sc_the_profile user_login=' . $user->user_login . ']';
endforeach;
?>

</textarea>
</section><!--staff-->
	
	
	
<section id="favicon" class="clearfix anchor">
<h2>ファビコン</h2>
<p>このサイトのファビコン</p>
	<br>
<figure class="w100 maxw-200">
<img src="<?php bloginfo('stylesheet_directory'); ?>/images/favicon.png">
</figure>
	
	<p> </p>
	
	<p>ファビコンのURL
	</p>
	
<p>	<?php bloginfo('stylesheet_directory'); ?>/images/favicon.png
</p>	
	
	
	「RealFaviconGenerator」の使い方・設定方法はこちら<br>
	<a href="https://requlog.com/self-branding/wordpress/favicon-generator/" target="_blank">https://requlog.com/self-branding/wordpress/favicon-generator/</a>
	</section><!--favicon-->
	
	<hr>


				<?php if (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
				<?php endif; ?>

</div><!-- .entry-content -->

						<?php //get_template_part('hublog-inquiry',''); //問い合わせフック ?>


				<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>

			<footer class="entry-meta">
				<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-meta -->
		</article><!-- #post -->

	</div><!-- #content -->
</div><!-- #container -->

<?php get_footer(); ?>
