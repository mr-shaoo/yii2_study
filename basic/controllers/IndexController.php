<?php
namespace  app\controllers;
use app\models\Acticle;
use app\models\Userinfo;
use yii\data\Pagination;
use yii\web\Controller;
use yii;
class IndexController extends \yii\web\Controller{
    //设置引入的布局文件
    public $layout = 'index_head';
    public $defaultAction = 'index';
    public function actionIndex(){
        $model = new Acticle();
        return $this->render('index',[
            'title'=>'aaaaaaaaaaaa',
            'model'=>$model,
        ]);
    }
    //数据库操作方法
    public function actionUser(){
        $request = \Yii::$app->request;
        //Yii::trace('start calculating average revenue', __METHOD__);
        // 返回所有参数
        $id = $request->get('id',1);
        //$name = $request->post('name');

        //todo 获取所有数据
        /*$rows = \Yii::$app->db->createCommand('SELECT * FROM pro_acticle')
            ->queryAll();*/


        //todo 返回单挑数据
        /*$rows = \Yii::$app->db->createCommand('SELECT * FROM pro_acticle WHERE id=3')
            ->queryOne();*/


        //todo 返回数据表中某个字段的值，选择多个字段默认返回第一个字段的值
        /*$rows = \Yii::$app->db->createCommand('SELECT title FROM pro_acticle')
            ->queryColumn();*/

        //todo 返回记录条数
        /*$rows = Yii::$app->db->createCommand('SELECT COUNT(*) FROM pro_acticle')
            ->queryScalar();*/

        //todo where条件过滤查询 $params
        /*$rows = Yii::$app->db->createCommand('SELECT * FROM pro_acticle WHERE id=:id AND status=:status')
            ->bindValue(':id', 1)
            ->bindValue(':status', 1)
            ->queryAll();
        $params = [':id' => $_GET['id'], ':status' => 1];
        $rows = Yii::$app->db->createCommand('SELECT * FROM pro_acticle WHERE id=:id AND status=:status')
           ->bindValues($params)
           ->queryAll(); */
        //todo 插入数据
        $data['title']='dwqdqwdqwdddddddddddddd';
        $data['status']=1;
       //$rows = \Yii::$app->db->createCommand()->insert('{{%acticle}}',$data)->execute();

        //todo 更新数据
        //$rows = \yii::$app->db->createCommand("update  set title='reeeeeeeeee' where id=1")->execute();

        //todo query通用查询方法
        $rows = (new \yii\db\Query())
            //todo select
            ->select('*')
            //->select(['id', 'title'])
            //->select('id', 'title')
            //->select('wl_acticle.id as a, title')
            //->select(['user_id' => 'u.id', 'title'])
            //todo from
            ->from('{{%acticle}}')
            //->from(['u'=>'{{%acticle}}'])
            //->from(['u'=>'SELECT * FROM (SELECT `id` FROM `user` WHERE status=1) u '])
            //todo join
            //->rightJoin('{{%cotegory}}','{{%cotegory}}.id=a.id');
            //todo where
            //->where('status=:status',[':status'=>1])
            //->where('status=1')
            //->andWhere('id=3');
            //(`status` = 1) AND (`title` LIKE '%%') AND (`id` IN (1, 2, 3)) AND (`id` > 1)'
           /* ->where(
                ['and',['=','status',1],['like','title',''],['in','id',[1,2,3]],['>','id',1]]
            )*/
            //todo orderBy
            /*->orderBy([
                'id' => SORT_ASC,
                'title' => SORT_DESC,
            ])*/
            //todo limit
            //offset 从第几条开始
            //->limit(2)->offset(5);
            //todo 结果类型
            //->scalar();
            //返回记录条数
            //->count();
            //只输出每条记录的某个字段
            //->column();
            //返回一条
            //->one();
            //返回所有
            ->all();
        dump($rows);
        return $this->render('user',[
            //'info'=>$rows,
        ]);

    }
    //活动记录（AR）使用
    public function actionRecord(){
        $record = Acticle::find();
        $record->where(['and',['between','id',1,4],['>','id','2']]);
        dump($record->asArray()->all());
    }
    public function actionPage(){
        $query = Acticle::find()->where(['status' => 1]);
    // get the total number of articles (but do not fetch the article data yet)
            $count = $query->count();
    // create a pagination object with the total count
            $pagination = new Pagination(['totalCount' => $count]);
    // limit the query using the pagination and retrieve the articles
            $acticle = $query->offset(1)
                ->limit(2)
                ->all();
        return $this->render('page',[
            'pagination'=>$pagination
        ]);
    }
    public function actionForm(){
        $model = new Userinfo();
        return $this->render('form',[
            'model' => $model,
        ]);
    }
}