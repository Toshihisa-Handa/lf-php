# lf-php
3/9修正事項

未ログイン時に管理画面の各ページへURLで入った場合のエラー画面(login_error)を削除。exit();で同様のページを表示するようにした。
新規登録画面（registerShop, registerMap)へURLで直接表示させようとした場合も同様にexit();でエラーページを表示するようにした。
各ページのパスを通した。
logout.phpをloginフォルダへ移動。
modulesに格納していたstrip用のファイルをpost元のindex.phpのあるflowerフォルダへ移動。
