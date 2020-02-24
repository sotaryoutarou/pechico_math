#文系のペチ子さん（PHP）と一緒に高専の時やってた数学をやってみる



[TOC]



## 自己紹介

田舎の方の高専を卒業後、新卒3年目になるソタです。普段はPHP案件でお仕事させて頂いています。



## PHPとは

PHPはC言語を起源とするWEBアプリケーション開発に特化した言語です。

故に機械学習や画像処理などなどアカデミックな分野に用いられることは少ないので個人的に文系な印象を持っています。（勝手に擬人化）

今回は普段ガッツリ数学することのないペチ子ちゃんに数学の勉強を手伝ってもらいます



## 参考書紹介

こちらの教科書に載っている中からランダムに抜き出してペチ子に解いてもらいます。

確か4年生と5年生の時にやってた教科書です。



## 実行環境

- PHP 7.4.*

- docker
- docker-compse



[こちら](https://github.com/sotaryoutarou/pechico_math)にソースコードを置いています。

```shell
$ docker-compose up --build -d
```

dockerの設定ファイルも書いているので上記コマンドで環境が立ちます😃

```shell
$ php -v
PHP 7.4.3 (cli) (built: Feb 20 2020 21:23:57) ( NTS )
Copyright (c) The PHP Group
Zend Engine v3.4.0, Copyright (c) Zend Technologies
```

それでは早速

## ロピタルの定理

ざっくり説明

$ \lim_{n \to \alpha}\frac{f(x)}{g(x)} $ が $\frac{0}{0}$ か $\frac{\alpha}{\alpha}$ の形（不定形）であれば $ \lim_{n \to \alpha}\frac{f'(x)}{g'(x)} $ とすることができる



で今回やってみる問題はこちら

$ \lim_{x \to \infty}\frac{3x^3-x}{2x^3+x^2} $ 



こちらの問題をロピタルの定理を使って解いてみます。（ソタ）

ペチ子さんには極限を調べてもらってソタの出した値に近づいていることを確認してもらいたいと思います。



### ソタのターン

$ \lim_{x \to \infty}\frac{3x^3-x}{2x^3+x^2} = \lim_{x \to \infty}\frac{3x^2-1}{2x^2+x} = \lim_{x \to \infty}\frac{9x^2-1}{6x^2+2x}=\lim_{x \to \infty}\frac{18x}{12x+2} = \lim_{x \to \infty}\frac{18}{12} = \frac{3}{2}$ 



$\therefore \lim_{x \to \infty}\frac{3x^3-x}{2x^3+x^2} =\frac{3}{2}$



はい！いい感じに形を整えて2回微分をしました。久しぶり（3年ぶり）に数学すると楽しいですね！

次は極限を取るとこの値に近づくことを調べてみましょう！



### ペチ子さんのターン

簡単なプログラムを書きます。ループして関数に渡すだけ！

```php
<?php

$x = 0.1; // 1をスタートにしたいので初期化で調整
for ($i=1; $i<11; $i++) {
    $x *=10;
    print 'x=' . $x . str_repeat(' ', 11-$i) . formula($x) . "\n";
}

function formula($x)
{
    // 3x^3-x
    $numerator = 3*pow($x, 3) - $x;
    // 2x^3+x^2
    $denominator = 2*pow($x, 3) + pow($x, 2);

    return $numerator / $denominator;
}

```



#### 結果

```shell
$ php Lopital.php 
x=1          0.66666666666667
x=10         1.4238095238095
x=100        1.4924875621891
x=1000       1.4992498750625
x=10000      1.4999249987501
x=100000     1.4999924999875
x=1000000    1.4999992499999
x=10000000   1.499999925
x=100000000  1.4999999925
x=1000000000 1.49999999925
```


