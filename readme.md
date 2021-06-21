![README toppage](image/toppage.png)

# 初めに

<p>昔からものづくりと音楽が好きでした。</p>
<p>留学に行った際に海外の友達に「日本の曲教えて！！」と言われてオススメの曲を教えたけど「どんな曲名か忘れた」とよく言われたのでその状況を解決するために以前から興味のあったプログラミングを使い解決することを決意しました。</p>

# アプリ概要

## タイトル

### <strong>Square Music</strong>

<p>Square = 広場　　Music = 音楽</p>
<p>音楽をたくさんの人と共有していろんな国の音楽を知ることができて、話題の種になる場所を作りたかった。</p>

<br>
<br>

## 開発の背景

### 自分の「あればいい」を実現する！

![README get](image/get.jpg)

<br>

<p>「海外の友達とたくさんのいい曲を共有したい」という思いから今回のアプリケーションを作ることにしました。</p>
<p>留学中に留学先で友達なった人たちに<b>「日本のオススメの曲を教えてよ！！」</b>と言われることがよくありました。<br>教えようとしたのですが、ここに<b>問題が1つ</b>ありました。</p>
<p>好きな曲を教えたとしても母国の言葉でないために後で教えた曲を友達が調べようとしても忘れてしまっているということが多々ありました。</p>
<p>いろんなアプリで曲を共有することができるけど<b>「なぜ自分で作る必要があるのか？？」</b>という疑問が出ると思いますが、理由があります。</p>
<p>Spotifyなどのストリーミングサービスでは、自身がたくさん用途でプレイリストをすでに登録していると思います。</p>
<ul>
    <li>ドライブ用</li>
    <li>勉強中のBGM</li>
    <li>リラックス用</li>
</ul>
など
<br>
<br>

<p>今回私のアプリケーションの目的は、<b>「海外の友達と自国の曲または、友達に聞いてほしい好きな曲を共有して友達と話を広げていく」</b>という一点に絞ってアプリケーションを作りたいという思いからこのアプリケーションを作成することを決めました</p>

<br>
<br>

## 開発での使用言語

<p>・HTML CSS JavaScript PHP/Laravel MySQL Docker Vagrant</p>

<br>
<br>

## ターゲット

### ターゲット ①（私が留学中に仲良くなった友達）

<ul>
    <li>日本のことに興味を持ってくれている自分の友達</li>
</ul>

<br>

### ターゲット ②（留学生と仲良くなりたい日本人）

<ul>
    <li>英語を話せないけど文字ベースなら会話ができる人</li>
    <li>話す話題がすぐに尽きてしまう人</li>
</ul>

<br>

### ターゲット ③（日本に来ている留学生）

<ul>
    <li>日本人と友達になりたいけど話す話題がない</li>
</ul>

<br>
<br>

# 使用イメージ

### 新規登録、ログイン/ログアウト機能

<hr>

<br>
<p><b>新規登録</b></p>

![README register](image/register.png)

<p><b>ログイン</b></p>

![README Image 1](image/login.gif)

<p>＊ログインは、テスト用に input タグの value属性 に
<br>・メールアドレス<br>・パスワード<br>を記述しております。</p>

<br>

### メール送信によりパスワード変更

<hr>

<p>Google アカウントを使用して、メールを送信 → パスワード変更を実現</p>
<br>

<p>下記の画像の順番にパスワードの変更を行っていきます。</p>

![README email_confirm_for_changing_password](image/email_confirm.png)
![README get_email](image/email_password.png)
![README password_change](image/password_change.png)

<br>

### ユーザ検索機能

<hr>

<p>名前 or 国名でユーザを検索できる様にしております。</p>
<br>
<p>＊<b>あいまい検索可能</b></p>

![README search_for_users](image/search_users.png)

<br>

### インスタグラムの ID 登録

<hr>

<p>ID登録後、インスタのアイコンをクリックすると登録したユーザのインスタページに飛ぶことが可能</p>

<p><b>＊新規タブで開く様にしているため Square Music から一度離脱をしたとしてもまた Square Music アプリに戻ってくる可能性を高めている</b></p>

<p>登録・変更方法は、3通りあります。</p>
<ul>
    <li>ユーザ新規登録ページ</li>
    <li>プレイリスト登録ページ</li>
    <li>ユーザ編集</li>
</ul>

#### ユーザ新規登録ページ

![README Image 1](image/register2.png)

<br>

#### プレイリスト登録ページ

![README Image 1](image/insta_id2.png)

<br>

#### ユーザ編集

![README Image 1](image/insta_id3.png)

<p>＊このいづれか３つの場所でInstaram IDを登録すると、instagramのアイコンが付与され、そこから登録したインスタアカウントページに飛ぶことができます。</p>

<br>

### プレイリストの説明

<hr>

<img src="image/playlist.png" width="300">

<p><b>プレイリストの説明</b></p>
<ul>
    <li>
        <p>ヘッダー部分</p>
        <ul>
            <li>名前</li>
            <li>国名</li>
            <li>プレイリストのいいね数</li>
        </ul>
    </li>
    <li>
        <p>フッター部分</p>
        <ul>
            <li>
                <p>ハートマーク</p>
                <p>いいねを押すことができる</p>
            </li>
            <li>
                <p>吹き出しマーク</p>
                <p>チャットルームへ遷移</p>
            </li>
            <li>
                <p>吹き出しマーク</p>
                <p>チャットルームへ遷移</p>
            </li>
            <li>
                <p>Instagramアイコン</p>
                <p>自身が登録したinstagramプロフィールページに遷移する</p>
            </li>
        </ul>
    </li>
    <li>
        <p>本体には、登録したプレイリスト表示</p>
    </li>
</ul>

<br>
<br>

### Chat 機能

<hr>

![README Image 1](image/chat.gif)

<p>Ajax を使用してページ遷移をせずにチャットをできる様にしページ遷移の煩わしさを解消</p>

<br>

### ユーザ情報削除

<hr>

![README Image 1](image/delete_user.gif)

<p>ユーザ削除のための確認ページを作りましたが、ワンクリックで削除できると、誤操作による削除の可能性があるためモーダルウィンドウを使用</p>

<br>
<br>

# 使用技術

### 開発環境

<p>Vagrant・Docker(Dockerfile, Docker-compose.yml を使って、ローカルに環境を構築)</p>

<br>

### フロントエンド

<p>HTML/CSS Bootstrap JavaScript jQuery3.3.1</p>

<br>

### バックエンド

<p>PHP7.2.34/Laravel6.2</p>

<br>

### ソースコード管理

<p>Git/GitHub</p>

<br>

### デプロイ環境

<p>Heroku</p>

<br>
<br>

# 機能一覧

<p>課題解決のために必要な機能だけ実装することを意識しました。</p>

| No. | 必要機能候補                    | 優先度 | × の理由                                                   |
| --- | ------------------------------- | ------ | ---------------------------------------------------------- |
| 1   | ユーザ登録機能                  | ○      | -                                                          |
| 2   | ログイン機能                    | ○      | -                                                          |
| 3   | パスワード変更機能              | ○      | -                                                          |
| 4   | プロフィール編集                | ○      | -                                                          |
| 5   | プレイリスト登録機能            | ○      | -                                                          |
| 6   | プロフィール編集                | ○      | -                                                          |
| 7   | フォロー機能                    | ○      | -                                                          |
| 8   | いいね機能                      | ○      | -                                                          |
| 9   | ユーザ検索機能                  | ○      | -                                                          |
| 10  | chat 機能を ajax を使用して実装 | ○      | -                                                          |
| 11  | SNS を登録できる様にする        | ○      | -                                                          |
| 12  | レスポンシブ機能                | △      | バックエンドの処理を優先に実装していたのでデプロイ後に追加 |
| 13  | アプリケーションの SPA 化       | ×      | SPA を React を用いて実装したいため現在 React を学習中     |

<br>
<br>

# DB 設計

![README Image 1](image/db_design.png)

<br>
<br>

# 学んだこと

<p>私がこのポートフォリオ作りで大きく成長したと考えるのは、3点あります。</p>
<ol>
    <li>
        <p>人に聞いてすぐにエラーを解決するのもいいが自分で悩み解決したことの方が知識の定着が早いと感じた</p>
    </li>
    <li>
        <p>わからない箇所がある場合</p>
        <p>その解決方法として、</p>
        <ul>
            <li>わからない部分を言語化する</li>
            <li>言語化した問題について細分化をする</li>
        </ul>
        <p>この2つの順序にそってエラー・解決をしていくのが、自身でエラーを解決していく際の最も近道になることがわかりました。</p>
    </li>
    <li>
        <p>MVCをしっかりと理解し使うことによりLaravelは格段に使いやすく可読性が上がるということがリファクタリングをしていく中で学ぶことができた</p>
    </li>
</ol>
