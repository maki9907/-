<?php
    class Data
        {
            protected $table_name;

            //接続設定
            private function dbConnect(){
                $dbn="mysql:host=localhost;dbname=*********";
                $user="*************";
                $password="***************";
                try{
                    $dbh = new PDO($dbn,$user,$password,[
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    ]); 
                } catch(PDOException $e){
                    echo "接続失敗".$e->getMessage();
                    exit();
                };
                return $dbh;
            }

            //テーブル,カラム作成
            public function tableCreate(){
                $dbh = $this->dbConnect();
                    $sql = "CREATE TABLE IF NOT EXISTS mission5_1"
                    ." ("
                    . "id INT AUTO_INCREMENT PRIMARY KEY,"
                    . "name char(32),"
                    . "comment TEXT,"
                    . "password char(32),"
                    . "date TEXT"
                    .");";      
                    $stmt = $dbh->query($sql);
                    return $stmt;
                    $dbh=null;
            }

            //投稿表示関数
            public function getAlldata(){
                $dbh=$this->dbConnect();
                $sql='SELECT * FROM mission5_1';
                $stmt=$dbh->query($sql);//dbhに$sqlを送る。
                $results=$stmt->fetchAll(PDO::FETCH_ASSOC);
                return $results;
                $dbh=null;
            }

            //特定のデータの情報を受け取る
            public function getById($id){
                if(empty($id)){
                    exit();
                }
                $dbh=$this->dbConnect();
                $stmt=$dbh->prepare('SELECT * FROM mission5_1 where id=:id');
                $stmt->bindParam(':id',$id,PDO::PARAM_INT);
                $stmt->execute();
                $results=$stmt->fetch(PDO::FETCH_ASSOC);
                if($results==null){
                    exit();
                }
                return $results;
                $dbh=null;
            }

            //投稿機能
            public function post($name,$comment,$password,$date){
                $sql = 'INSERT into 
                            mission5_1 (name,comment,password,date) 
                        VALUES
                            (:name,:comment,:password,:date)';
                $dbh=$this->dbConnect();
                $dbh->beginTransaction();
                try{
                    $stmt = $dbh->prepare($sql);
                    $stmt->bindParam(':name',$name,PDO::PARAM_STR);
                    $stmt->bindValue(':comment',$comment,PDO::PARAM_STR);
                    $stmt->bindParam(':password',$password,PDO::PARAM_STR);
                    $stmt->bindValue(':date',$date,PDO::PARAM_STR);
                    $stmt->execute();
                    $dbh->commit();
                    $dbh=null;
                }catch(PDOException $e){
                    $dbh->rollback;
                    exit($e);
                }
            }

            //投稿削除機能
            public function delete($deleteId){
                $sql = 'delete from mission5_1 where id=:deleteId';//mission5_1というテーブルにそれぞれの値を設定するように準備する。:idはプレースホルダという変数と置き換える場所を表すもの。
                $dbh=$this->dbConnect();
                //プレースホルダに置き換えたい値をバインドする。
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(':deleteId', $deleteId, PDO::PARAM_INT);
                $stmt->execute();
                $dbh=null;
                header('Location:/index.php');
            }

            //バリデーション
            public function varidation($content){
                if(empty($content["name"]) || empty($content["comment"]) || empty($content["password"])){
                    exit('すべての項目に記入してください');
                }else{
                    $this->post($content["name"],$content["comment"],$content["password"],date("Y年m月d日 H時i分s秒"));
                    header('Location:/index.php');
                }
            }

            //アップデートバリデーション
            public function updateVaridation($content){
                if(empty($content["name"]) || empty($content["comment"]) || empty($content["password"])){
                    exit('すべての項目に記入してください');
                }else{
                    $this->update($content["name"],$content["comment"],$content["password"],date("Y年m月d日 H時i分s秒"),$content["updateId"]);
                    header('Location:/index.php');
                }
            }

            //投稿更新機能
            public function update($name,$comment,$password,$date,$id){
                $sql = 'UPDATE  mission5_1 SET name=:name,comment=:comment,password=:password,date=:date WHERE id=:id';
                $dbh=$this->dbConnect();
                //$dbh->beginTransaction();
                try{
                    $stmt = $dbh->prepare($sql);
                    $stmt->bindParam(':name',$name,PDO::PARAM_STR);
                    $stmt->bindValue(':comment',$comment,PDO::PARAM_STR);
                    $stmt->bindParam(':password',$password,PDO::PARAM_STR);
                    $stmt->bindValue(':date',$date,PDO::PARAM_STR);
                    $stmt->bindValue(':id',$id,PDO::PARAM_INT);
                    $stmt->execute();
                    $dbh=null;
                    //$dbh->commit();
                }catch(PDOException $e){
                    //$dbh->rollback;
                    exit($e);
                }
            }

            //名前とパスワード判定機能
            public function judge($id,$name,$password){
                $results=$this->getById($id);
                if($results["name"]==$name && $results["password"]==$password){
                    return 0;
                }else{
                    exit("パスワードまたは名前が異なっています");
                }
            }

        }


?>