<?php
/**
 * Created by PhpStorm.
 * User: Diend
 * Date: 7/6/2018
 * Time: 9:41 PM
 */
namespace app\components;

use yii\base\Component;
use app\models\Statistic;
/**
 *
 */
class CustomComponent extends Component
{
    const EVENT_AFTER = "event-after";

    public function insertStatistic(){
        $model = new Statistic();
        $e = \Yii::$app->request;

        $model->access_time = date('Y/m/d H:i:s');
        $model->user_ip = $e->userIP;
        $model->user_host = $e->userHost;
        $model->path_info = $e->pathInfo;
        $model->query_string = $e->queryString;

        $model->save(false);
    }
}