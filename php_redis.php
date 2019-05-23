<?php
/**
 * Created by PhpStorm.
 * User: Trevor
 * Date: 2019/5/23
 * Time: 13:17
 */

//连接本地的 Redis 服务
$redis = new Redis();
/**
 *  redis缓存数据库操作
 */

// 连接redis
$redis->connect('127.0.0.1', 6379);
// 选择redis数据库
$redis->select(1);
// 查看数据库大小
$redis->dbSize();
// 清空当前数据库
$redis->flushDB();
// 清空所有数据库
$redis->flushAll();
// 快照
$redis->save();
// 异步快照
$redis->bgsave();

/**
 *  key的基本操作
 */

// 判断某个key是否存在
$redis->exists('key');
// 查找key
$redis->keys('*');
// 判断key的类型
$redis->type('key');
// 重新命名key
$redis->rename('oldkey','newkey');
// 移动key到某个数据库
$redis->move('key',1);
// 删除key
$redis->delete('key');
// 为key设置过期时间
$redis->expire('key',10);

/**
 *  string操作
 */


$redis->set('key','value',60);
$redis->mset(array('key1'=>'value1','key2'=>'value2'));
$redis->get('key');
$redis->mget(array('key1','key2'));
$redis->incr('key');
$redis->incrBy('key',10);
$redis->decr('key');
$redis->decrBy('key',10);
$redis->append('key','value');

// Hash的基本操作
$redis->hSet('key','hashKey','value');
$redis->hMset('key',array('hashKey1'=>'value1','hashKey2'=>'value2'));
$redis->hGet('key','hshKey');
$redis->hMGet('key',array('hashKey1','hashKey2'));
$redis->hExists('key','hashKey');
$redis->hLen('key');
$redis->hIncrBy('key','hashKey',10);
$redis->hDel('key','hshKey');
$redis->hKeys('key');
$redis->hVals('key');
$redis->hGetAll('key');

 // list的基本操作
$redis->lPush('key','value');
$redis->rPush('key','value');
$redis->lPop('key');
$redis->rPop('key');
$redis->lLen('key');
$redis->lRange('key',0,2);
$redis->lTrim('key',0,2);

 // set的基本操作
$redis->sAdd('key','member');
$redis->sRem('key','member');
$redis->sMove('key1','key2','member');
$redis->sCard('key');
$redis->sIsMember('key','member');
$redis->sInter('key1','key2');
$redis->sDiff('key1','key2');
$redis->sUnion('key1','key2');

// zset的基本操作
$redis->zAdd('key',0.2,'member');
$redis->zRem('key','member');
$redis->zIncrBy('key',0.3,'member');
$redis->zRank('key','member');
$redis->zRange('key',0,1);
$redis->zRevRange('key',0,1);
$redis->zCard('key');
$redis->zScore('key','member');
$redis->zRemRangeByRank('key',0,1);