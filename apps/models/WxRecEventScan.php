<?php
namespace App\Model;

/**
 * 扫码事件记录模型
 * @package App\Model
 */
class WxRecEventScan extends BaseModel
{
    public $primary = 'id';
    /**
     * 表名
     * @var string
     */
    public $table = 'wx_rec_event_scan';
}