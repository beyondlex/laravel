<?php
/**
 * Created by PhpStorm.
 * User: Lex
 * Date: 17-10-31
 * Time: 下午4:11
 */

namespace App\Libs\Extensions;


use App\Models\Monolog;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;

/**
 * Class DbHandler
 * @property Monolog model
 * @package app\Libs\Extensions
 */
class MysqlHandler extends AbstractProcessingHandler {

    public $model;

    public function __construct(Monolog $model, $level = Logger::DEBUG, $bubble = true)
    {
        $this->model = $model;
        parent::__construct($level, $bubble);
    }

    /**
     * Writes the record down to the log of the implementing handler
     *
     * @param  array $record
     * @return void
     */
    protected function write(array $record)
    {
        // TODO: Implement write() method.
        $this->model->channel = $record['channel'];
        $this->model->level = $record['level'];
        $this->model->message = $record['message'];
        $this->model->context = $record['context'] ? json_encode($record['context']) : '';
        $this->model->extra = $record['extra'] ? json_encode($record['extra']) : '';
        $saved = $this->model->save();
    }


}